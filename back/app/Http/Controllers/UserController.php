<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Cookie; 

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     // get user funtion
    public function getUsers()
    {
        // return User::latest()->get();
        return User::all();
    }

    //register user
    public function createUser(Request $request)
    {
        $request-> validate([
            'name'=>'required|string|max:200',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|string|min:8',
            
        ]);

        $user = new User();
        $user-> name = $request -> name;
        $user-> gender = $request -> gender;
        $user -> email = $request -> email;
        $user -> password = bcrypt($request->password);

        $user ->save();
        // $token = $user->createToken('myToken')->plainTextToken;

        $response = [
            'user' => $user,
            // 'token' => $token
        ];
        return response()->json($response);
    }

//login 
    public function login(Request $request) { 
        if(Auth::attempt($request->only('email', 'password'))){ 
            return response()->json(['mas'=> 'success'], 200);
        } 

        $user = Auth::user(); 
        return response()->json(['mas'=>"Invalid"]); 
        // $token = $user->createToken('mytoken')->plainTextToken; 
        // $cookie = cookie('jwt', $token, 60*24); 
        // return response()->json(['mas'=> 'success','token'=>$token], 200)->withCookie($cookie); 
    }
     
    // public function logout() { 
    //      $cookie = Cookie::forget('jwt'); 
    //      return response()->json(['mes'=>'Logged out Successfully'])->withCookie($cookie); 
    // }

        // $user = Auth::user(); 
        // $token = $user->createToken('mytoken')->plainTextToken; 
        // $cookie = cookie('jwt', $token, 60*24); 
        // return response()->json(['mas'=> 'success','token'=>$token], 200)->withCookie($cookie); 
        // return response()->json(['mas'=> 'success'], 200);
    //  } 
     
//      public function logout() { 
//          $cookie = Cookie::forget('jwt'); 
//          return response()->json(['mes'=>'Logged out Successfully'])->withCookie($cookie); 
//    }

    public function getUser($id)
    {
        return User::findOrFail($id);
    }
    
//create user
    public function updateUser(Request $request, $id)
    {
        $user=User::findOrFail($id);
        $user-> name = $request -> name;
        $user-> gender = $request -> gender;
        $user -> email = $request -> email;
        $user -> password = bcrypt($request->password);
        $user->save();

        return response()->json(['message' => 'User Update Successfully!'], 200);
      
    }

    //Delete 
    public function destroyUser($id)
    {
    
        $iSDelete = User::destroy($id);
        if ($iSDelete === 1) {
            return response()->json(['message' => 'User deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'User cannot delete'], 404);
        }
    }
}