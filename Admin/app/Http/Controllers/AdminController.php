<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Cources;
use App\Models\Lecture;
use App\Models\Student;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function courseShow()
    {

        $courceData = Cources::orderBy('id', 'desc')->paginate(10);

        return view('courses')
            ->with(compact('courceData'));
    }

    public function studentShow()
    {

        $courceData = Student::orderBy('id', 'desc')->paginate(10);
        $courseList = Cources::select('id', 'name')->orderBy('id', 'desc')->get()->toArray();
        $batchList = Batch::select('id', 'name')->orderBy('id', 'desc')->get()->toArray();

         $courceData = Student::leftJoin('cources', 'students.cid', '=', 'cources.id')
         ->leftJoin('batches', 'students.bid', '=', 'batches.id')
            ->select('students.*', 'batches.name as b_name', 'cources.name as c_name',)
            ->orderBy('students.id', 'desc')->paginate(10);

        return view('students')->with(compact('courceData', 'courseList', 'batchList'));
    }
    public function lectureShow()
    {

        $courseList = Cources::select('id', 'name')->orderBy('id', 'desc')->get()->toArray();

        // dd( $courseList );

        $lectureData = Lecture::leftJoin('cources', 'lectures.cid', '=', 'cources.id')
            ->select('lectures.*', 'cources.name as course_name')
            ->orderBy('lectures.id', 'desc')
            // ->get();

            ->paginate(10);

        // dd(  $lectureData);

        Cources::orderBy('id', 'desc')->paginate(10);

        return view('lectures')->with(compact('lectureData', 'courseList'));
    }

    public function courseSave(Request $request)
    {
        try {
            // Validate input
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'category' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);


            // Handle file upload
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('courses', 'public');
            }

            // dd( $request);
            // Save to DB (example)
            $course = new Cources();
            $course->name = $request->name;
            $course->description = $request->description;
            $course->category = $request->category;
            $course->durrarion = $request->durration;
            $course->image = $imagePath ?? null;
            $course->save();

            return response()->json(['status' => 'success', 'course_id' => $course->id]);
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function lecturesSave(Request $request)
    {
        try {

            // Handle file upload
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('courses', 'public');
            }

            // dd( $request);
            $course = new Lecture();
            $course->f_name = $request->f_name;
            $course->l_name = $request->l_name;
            $course->mobile = $request->mobile;
            $course->email = $request->email;
            $course->qualification = $request->description;
            $course->cid = $request->category;
            // $course->image = $imagePath ?? null;
            $course->save();

            return response()->json(['status' => 'success', 'course_id' => $course->id]);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function studentSave(Request $request)
    {
        try {

            // Handle file upload
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('courses', 'public');
            }

            // dd( $request);
            $course = new Student();
            $course->f_name = $request->f_name;
            $course->l_name = $request->l_name;
            $course->mobile = $request->mobile;
            $course->email = $request->email;
            $course->cid = $request->category;
            $course->bid = $request->batch;
            // $course->image = $imagePath ?? null;
            $course->save();

            return response()->json(['status' => 'success', 'course_id' => $course->id]);
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
