<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Student;

use App\User;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::paginate(5);

        $users = User::lists('name', 'id');

        return view('student.index', compact('students', 'users'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changeFranchisee(Request $request){

        $input = $request->user_id;

        $student_id = $request->student_id;

        $student = Student::findOrFail($student_id); 

        $student->user_id = $input;

        $student->save();

        return redirect()->back();
    }

    public function spamStudent(){
        // for ($i=0; $i < 500 ; $i++) { 
            
        //     $student = new Student;
        //     $student->user_id = 1;
        //     $student->course_id = 1;
        //     $student->name = "Spammer";
        //     $student->status=1;
        //     $student->code = "STD";

        //     $student->save();
        // }

        return redirect()->back();
    }

    public function bulkDelete(Request $request){

        /*$students = Student::findOrFail($request->checkBoxDeleteArray);

        foreach($students as $student){
            $student->delete();
        }

        return redirect()->back();*/

        return $request->all();
    }
}
