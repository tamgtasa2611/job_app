<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobRequest;
use App\Models\Category;
use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
{
    public function index() {
        $jobs = Job::paginate(2);
        $categories = Category::all();
        return view('jobs.index', compact('jobs', 'categories'));
    }

    public function create() {
        $categories = Category::all();
        return view('jobs.create', compact('categories'));
    }

    public function store(StoreJobRequest $request) {
        $validated = $request->validated();

        if($validated) {
            $imagePath = "";
            if ($request->file('image')) {
                $imagePath = $request->file('image')->getClientOriginalName();
                if (!Storage::exists('public/jobs/' . $imagePath)) {
                    Storage::putFileAs('public/jobs/', $request->file('image'), $imagePath);
                }
            }
            $data = [
                'title' => $request->title,
                'salary' => $request->salary,
                'date' => Carbon::now(),
                'description' => $request->description,
                'category_id' => $request->category_id ?? 0,
                'image' => $imagePath,
            ];
            Job::create($data);
            return Redirect::route('jobs')->with('success', 'Success!');
        } else {
            return back()->with('fail', 'Something went wrong!');
        }
    }

    public function edit(Job $job) {
        $categories = Category::all();
        return view('jobs.edit', compact('job', 'categories'));
    }

    public function update(Job $job, StoreJobRequest $request) {
        $validated = $request->validated();

        if($validated) {
            $imagePath = "";
            //Kiểm tra nếu đã chọn ảnh thì Lấy tên ảnh đang được chọn
            //không chọn ảnh thì sẽ lấy tên ảnh cũ trên db
            if ($request->file('image')) {
                $imagePath = $request->file('image')->getClientOriginalName();
            } else {
                $imagePath = $job->image;
            }
            //Kiểm tra nếu file chưa tồn tại thì lưu vào trong folder code
            if (!Storage::exists('public/jobs/' . $imagePath)) {
                Storage::putFileAs('public/jobs/', $request->file('image'), $imagePath);
            }
            $data = [
                'title' => $request->title,
                'salary' => $request->salary,
                'date' => Carbon::now(),
                'description' => $request->description,
                'category_id' => $request->category_id,
                'image' => $imagePath,
            ];
            $job->update($data);
            return Redirect::route('jobs')->with('success', 'Success!');
        } else {
            return back()->with('fail', 'Something went wrong!');
        }
    }

    public function destroy(Job $job) {
        $job->delete();
        return Redirect::route('jobs')->with('success', 'Success!');
    }
}
