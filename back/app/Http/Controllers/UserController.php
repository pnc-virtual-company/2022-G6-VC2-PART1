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
    public function getUsers()
    {
        return User::all();
    }

/******************************** Create New User *********************************** */
    public function createUser(Request $request){
        $request-> validate([
            'name'=>'required|string|max:200',
            'email'=>'required|unique:users,email,$this->id,id',
            // 'password'=>'required|string|min:8',

        ]);
        $user = new User();
        $user-> name = $request -> name;
        $user-> gender = $request -> gender;
        $user -> email = $request -> email;
        $user -> password = bcrypt($request->password);

        $user ->save();
        // $token = $user->createToken('myToken')->plainTextToken;

        return response()->json($user);

        return response()->json(['message' => 'User create Sucessfully']);

    }

/********************************** User Log In ************************************* */
    public function login(Request $request) { 
        if(Auth::attempt($request->only('email', 'password'))){ 
            $user = Auth::user(); 
            $token = $user->createToken('mytoken')->plainTextToken; 
            $cookie = cookie('jwt', $token, 60*1); 
            return response()->json(['mas'=> 'success','token'=>$token], 200)->withCookie($cookie); 
        } 
        return response()->json(['mas'=>"Invalid"]); 
    } 
    
/************************************ Log out ****************************************/
    public function logout() { 
         $cookie = Cookie::forget('jwt'); 
         return response()->json(['mes'=>'Logged out Successfully'])->withCookie($cookie); 
    }     

/************************************ Get One User With Id ***************************/
    public function getUser($id){
        return User::findOrFail($id);
    }
    
/************************************ Update User Data ******************************* */
    public function updateUser(Request $request, $id){
        $user=User::findOrFail($id);
        $user-> name = $request -> name;
        $user-> gender = $request -> gender;
        $user -> email = $request -> email;
        $user -> password = bcrypt($request->password);
        $user->save();

        return response()->json(['message' => 'User Update Successfully!'], 200);
    }

/************************************* Delete user *********************************** */
    public function destroyUser($id){
        $iSDelete = User::destroy($id);
        if ($iSDelete === 1) {
            return response()->json(['message' => 'User deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'User cannot delete'], 404);
        }
    }

    public function resetAdminPassword(Request $request, $id){
        $user = User::find($id);
        if (Hash::check($request->oldPassword,$user->password)){
            $user->password=bcrypt($request->newPassword);
            $user->save();
            return $user;
        }
        return 'password can not change!!';

    }
}