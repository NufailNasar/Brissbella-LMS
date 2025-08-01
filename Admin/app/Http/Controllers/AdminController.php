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
        $courceData = Cources::where('is_active', 1)->orderBy('id', 'desc')->paginate(10);
        return view('courses')->with(compact('courceData'));
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
        $lectureData = Lecture::leftJoin('cources', 'lectures.cid', '=', 'cources.id')
            ->select('lectures.*', 'cources.name as course_name')
            ->orderBy('lectures.id', 'desc')
            ->paginate(10);

        Cources::orderBy('id', 'desc')->paginate(10);
        return view('lectures')->with(compact('lectureData', 'courseList'));
    }

    public function courseSave(Request $request)
    {
        try {

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('courses', 'public');
            }

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
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('courses', 'public');
            }

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

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('courses', 'public');
            }

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

    public function courseView($id)
    {
        $course = Cources::findOrFail($id);
        $studentCount = Student::where('cid', $id)->count(); // Update table/column names as per your DB

        return view('courses.view', compact('course', 'studentCount'));
    }

    public function courseUpdateshow($id)
    {
        $course = Cources::findOrFail($id);
        return view('courses.update', compact('course'));
    }

    public function courseDelete($id)
    {
        $course = Cources::find($id);
        if ($course) {
            $course->is_active =  0;
            $course->update();
            return response()->json(['success' => true, 'message' => 'Course deleted successfully.']);
        }

        return response()->json(['success' => false, 'message' => 'Course not found.'], 404);
    }

    public function courseUpdate(Request $request){
        
        $course = Cources::find($request->course_id);
        if ($course) {
            $course->name = $request->name;
            $course->description = $request->description;
            $course->category = $request->category;
            $course->durrarion = $request->durration;
            $course->update();
            return response()->json(['success' => true, 'message' => 'Course deleted successfully.']);
        }
    }
}
