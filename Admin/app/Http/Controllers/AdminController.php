<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Cources;
use App\Models\Lecture;
use App\Models\Student;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function home(){

        $c_count = Cources::count();
        $l_count = Lecture::count();
        $s_count = Student::count();
        $c_list = Cources::select('name', 'created_at')
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get()
            ->map(function ($course) {
                return [
                    'name' => $course->name,
                    'created_at_diff' => $course->created_at->diffForHumans()
                ];
            });
        return view('dashboard')->with(compact('c_count', 'l_count', 'c_list' , 's_count'));
    }

    public function courseShow()
    {
        $courceData = Cources::where('is_active', 1)->orderBy('id', 'desc')->paginate(5);
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
            ->paginate(4);

        // Lecture::orderBy('id', 'desc')->paginate(5);
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

            $lecture = new Lecture();
            $lecture->f_name = $request->f_name;
            $lecture->l_name = $request->l_name;
            $lecture->mobile = $request->mobile;
            $lecture->email = $request->email;
            $lecture->qualification = $request->description;
            $lecture->cid = $request->category;
            $lecture->Address = $request->addreess;
            $lecture->dob = $request->dob;
            $lecture->nic = $request->nic;
            // $lecture->image = $imagePath ?? null;
            $lecture->save();

            return response()->json(['status' => 'success', 'lecture_id' => $lecture->id]);
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
            $course->nic = $request->identification;
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

    public function lecturesView($id)
    {
        $lecture = Lecture::findOrFail($id);
        // $studentCount = Student::where('cid', $id)->count(); // Update table/column names as per your DB

        return view('lectures.view', compact('lecture' ));
    }
    public function studentsView($id)
    {
        $student = Student::findOrFail($id);
        // $studentCount = Student::where('cid', $id)->count(); // Update table/column names as per your DB

        return view('student.view', compact('student' ));
    }

    public function courseUpdateshow($id)
    {
        $course = Cources::findOrFail($id);
        return view('courses.update', compact('course'));
    }

    public function lectureUpdateshow($id){

        $lecture = Lecture::findOrFail($id);
        $courseList = Cources::select('id', 'name')->orderBy('id', 'desc')->get()->toArray();
        return view('lectures.update', compact('lecture' , 'courseList'));
    }

    public function studentsUpdateshow($id){

        $student = Student::findOrFail($id);
        $courseList = Cources::select('id', 'name')->orderBy('id', 'desc')->get()->toArray();
        $batchList = Batch::select('id', 'name')->orderBy('id', 'desc')->get()->toArray();

        return view('student.update', compact('student' , 'courseList', 'batchList'));
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

    public function lectureDelete($id)
    {
        $course = Lecture::find($id);
        if ($course) {
            $course->is_active =  0;
            $course->delete();
            return response()->json(['success' => true, 'message' => 'Lecture deleted successfully.']);
        }

        return response()->json(['success' => false, 'message' => 'Lecture not found.'], 404);
    }

    public function studentDelete($id)
    {
        $student = Student::find($id);
        if ($student) {
            $student->is_active =  0;
            $student->delete();
            return response()->json(['success' => true, 'message' => 'Student deleted successfully.']);
        }

        return response()->json(['success' => false, 'message' => 'Lecture not found.'], 404);
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

    public function lectureUpdate(Request $request){
    
        $lecture = Lecture::find($request->l_id);

        if ($lecture) {
            $lecture->f_name = $request->f_name;
            $lecture->l_name = $request->l_name;
            $lecture->mobile = $request->mobile;
            $lecture->email = $request->email;
            $lecture->qualification = $request->description;
            $lecture->cid = $request->category;
            $lecture->Address = $request->addreess;
            $lecture->dob = $request->dob;
            $lecture->nic = $request->nic;
            $lecture->update();

            return response()->json(['success' => true, 'message' => 'Course deleted successfully.']);
        }
    }

    public function studentsUpdate(Request $request){
        $student = Student::find($request->s_id);

        if ($student) {
            $student->f_name = $request->f_name;
            $student->l_name = $request->l_name;
            $student->mobile = $request->mobile;
            $student->email = $request->email;
            $student->cid = $request->category;
            $student->bid = $request->batch;
            $student->nic = $request->identification;
            $student->update();

            return response()->json(['success' => true, 'message' => 'Student deleted successfully.']);
        }
    }
}
