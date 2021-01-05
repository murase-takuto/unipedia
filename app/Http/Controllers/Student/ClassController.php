<?php

namespace App\Http\Controllers\Student;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClassAddRequest;
use App\Http\Requests\PostRequest;
use App\Schedule;
use App\Lecture;
use App\Post;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request, Post $post)
    {
        if (!$request->body && !$request->image) {
            return redirect()->back()
                ->with('error', '投稿に失敗しました');
        }

        //投稿内容required validation
        if ($request->image) {
            $img = Image::make($request->image);
            $img_path = 'unipedia_' . uniqid() . '.jpg';
            $img->save(storage_path() . '/app/public/post_board_img/' .  $img_path);
            $post->image_path = $img_path;
            $result = true;
        }

        if ($request->body) {
            $post->body = $request->body;
            $result = false;
        }

        $post->user_id = Auth::id();
        $post->class_id = $request->id;
        $post->save();
        return redirect()->back()
            ->with('message', $result === true ? '画像を投稿しました' : '投稿しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $class = $_GET['class_id'];
        $user_id = Auth::id();
        $user_name = Auth::user()->name;
        $schedule = Schedule::where('user_id', $user_id)->first();
        $class_id = 'class_' . $id;
        $schedule_id = $schedule->$class_id;
        $lecture = Lecture::where('id', $schedule_id)->first();
        $posts = Post::with('user')
            ->where('class_id', $class)
            ->orderBy('created_at', 'dsc')
            ->paginate(10);
        return view('schedule.detail', compact('id', 'lecture', 'posts', 'class'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //授業登録時に時間割表も更新する
    public function update(ClassAddRequest $request, $id)
    {
        if (Config::has('time.' . $id)) {
            DB::beginTransaction();
            try {
                $user_info = Auth::user();
                //授業情報関係 //classesテーブル
                $lecture = Lecture::firstOrNew([
                    'university_id' => $user_info->university_id,
                    'fuculty_id' => $user_info->fuculty_id,
                    'subject_id' => $user_info->subject_id,
                    'name' => $request->name,
                    //$idは何曜何限かの情報
                    'day_id' => $id,
                    'teacher' => $request->teacher,
                    'room_number' => $request->room_number
                ]);
                ++$lecture->count;
                $lecture->save();
                $day_id = $lecture->day_id;
                $lecture_id = $lecture->id;
                //ユーザーの時間割表更新
                $schedule = Schedule::where('user_id', $user_info->id)->first();
                $class_id = 'class_' . $day_id;
                $schedule->$class_id = $lecture_id;
                $schedule->save();
                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
            };
        } else {
            return redirect()->back()
                ->with('error', '登録に失敗しました。');   
        }

        return redirect()->route('schedules.index')
            ->with('status', '授業を登録しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_id = Auth::id();
        $class_id = 'class_' . $id;
        $color_id = 'color_' . $id;
        $user_schedule = Schedule::where('user_id', $user_id)->first();
        $class = Lecture::find($user_schedule->$class_id);
        --$class->count;
        $class->save();
        $user_schedule->$class_id = NULL;
        $user_schedule->$color_id = 0;
        $user_schedule->save();
        return redirect()->route('schedules.index')
            ->with('status', '更新しました');
    }
}
