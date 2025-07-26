<?php

namespace App\Http\Controllers;

use App\Models\Cources;
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

        $courceData = Cources::orderBy('id', 'desc')->paginate(10);

        return view('students')->with('courceData', $courceData);
    }
    public function lectureShow()
    {

        $courseList = Cources::select('id', 'name')->orderBy('id', 'desc')->get()->toArray();

        // dd( $courseList );

        $lectureData = Cources::orderBy('id', 'desc')->paginate(10);

        return view('lectures') ->with(compact('lectureData','courseList'));
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
}
