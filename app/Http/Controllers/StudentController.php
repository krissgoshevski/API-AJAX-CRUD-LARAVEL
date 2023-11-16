<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Carbon\Carbon;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

 
    public function index()
    {
        $students = Student::all();
    
        if ($students->isEmpty()) {
            return response()->json([
                "message" => "No students found",
                "status" => 404,
            ]);
        } else {
            return response()->json([
                "message" => "List of all students",
                "students" => $students,
                "status" => 200,
            ]);
        }
    }
     

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $student = new Student; // instance from model
            $student->name = $request->name;
            $student->father_name = $request->father_name;
            $student->email = $request->email;
            $student->phone = $request->phone;
            $student->created_at = Carbon::now();
            $student->updated_at = Carbon::now();
            $student->save();

            return response()->json([
                "message"=> "Student created succesfully",
                "student" => $student, // this will return response with all informations of student 
                "status"=> 200,]);


        } 
        catch(\Exception $e) {
                return response()->json([
                    "message"=> "Student not created yet",
                    "student" => $student, // this will return response with all informations of student 
                    "status"=> 400, // 400 Bad Request for errors
                    "error" => $e ]);
            }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student = Student::find($id);

        if ($student) {
            return response()->json([
                "message" => "Student details",
                "student" => $student,
                "status" => 200,
            ]);
        } else {
            return response()->json([
                "message" => "Student not found with the provided ID",
                "status" => 404,
            ], 404);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
    
        if (!$student) {
            return response()->json([
                "message" => "Student not found with the provided ID",
                "status" => 404,
            ], 404);
        }
    
        // Update only the fields that are present in the request
        $student->fill($request->only(['name', 'father_name', 'email', 'phone']));
        $student->save();
    
        return response()->json([
            "message" => "Student updated successfully",
            "student" => $student,
            "status" => 200,
        ]);
    }
    

    public function destroy(string $id)
{
    $student = Student::find($id);

    if ($student) {
        $student->delete();
        return response()->json([
            "message" => "Student deleted successfully",
            "status" => 200,
        ]);
    } else {
        return response()->json([
            "message" => "Student not found with the provided ID",
            "status" => 404,
        ], 404); // Explicitly set the status code to 404 Not Found
    }
}

    

    }
