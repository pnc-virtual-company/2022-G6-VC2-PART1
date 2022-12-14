<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Student::orderBy('id', 'desc')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'min:3|max:20|required',
            'class_room' => 'required',
            'bacth' => 'required',
            'phone_number' => 'required',
            'gender' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password' => 'required',

        ]);
        $student=new Student();
        $student->name=$request->name;
        $student->class_room=$request->class_room;
        $student->bacth=$request->bacth;
        $student->phone_number=$request->phone_number;
        $student->gender=$request->gender;
        $student->email=$request->email;
        $student->password=bcrypt($request->password);
        if ($request->picture) {
            $student->picture = $request->file('picture')->hashName();
            $request->file('picture')->store('public/images');
        }
        $student->save();
        // $token=$student->createToken('myToken')->plainTextToken;
        return response()->json(['mes'=>'store is Successfully'],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Student::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'min:3|max:20|required',
            'class_room' => 'required',
            'gender' => 'required',
            'email' => 'required',
        ]);
        $student= Student::findOrFail($id);
        $student->name=$request->name;
        $student->class_room=$request->class_room;
        $student->gender=$request->gender;
        $student->email=$request->email;
        $student->phone_number=$request->phone_number;
        $student->bacth=$request->bacth;
        $student->save();
        return response()->json(['mes'=>'Update is very Successfully'],201);
    }
    public function updateImage(Request $request, $id)
    {
        $student= Student::findOrFail($id);
        // if ($request->picture) {
            $student->picture = $request->file('picture')->hashName();
            $request->file('picture')->store('public/images');
        // }
        $student->save();
        return response()->json(['mes'=>'Update is Successfully'],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student  $id)
    {
        return $id->delete();
    }
    
    /**
     * Login user with specified email and password
     * 
     * @param \App\Models\Student $studdent
     */
    public function login(Request $request)
    {
       // check email
       $student = Student::where('email',$request->email)->first();
       // check password
       if(!$student|| !Hash::check($request->password, $student->password))
       {
           return response()->json(['mas'=>'Invalide password']);
       }
        $id = Auth::id();
        $token = $student->createToken('mytoken')->plainTextToken; 
        return response()->json(['mas'=> 'success','token'=>$token], 200); 
    } 

    /**
     * Logout with specified user
     * 
     * @return delete token of user
     */
    public function logout(Request $request){
        Auth::user()->tokens()->delete(); 
        return response()->json(['message' => 'Sign out success!'], 200);
    }


    public function resetPassword(Request $request, $id){
        $student= Student::findOrFail($id);
        if (Hash::check($request->oldPassword,$student->password)){
            $student->password=bcrypt($request->newPassword);
            $student->save();
            return response()->json($student);
        }
        return response()->json(['message' => 'reset password fail']);
    }

    
}
