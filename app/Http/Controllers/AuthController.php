<?php

namespace App\Http\Controllers;


use App\Models\Student;
use App\Models\Student_Class;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use mysql_xdevapi\Exception;

class AuthController extends Controller
{
    public function signUp(Request $request)
    {
        try {
            $validateData = $request->validate(['name' => 'required|string|max:255', 'email' => 'required|string|email|max:255|unique:users', 'password' => 'required|string|min:8']);
            $user = User::Create(['name' => $validateData['name'], 'email' => $validateData['email'], 'password' => $validateData['password']]);
            $student = Student::create(['user_ID' => $user->id]);
            return response()->json(['message' => 'student created succeffully'], 201);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

    public function langTest()
    {
        dd(App::getLocale());
    }

    public function signIn(Request $request)
    {
        $credintails = $request->validate(['email' => ['required', 'email'], 'password' => ['required']]);
        // attempt to authenticate him/her
        if (Auth::attempt($credintails)) {
            //success
            $token = $request->user()->createToken('API Token')->plainTextToken;
            return \response()->json(['token' => $token], 200);
        }
        return response()->json(['error' =>(__('auth.failed'))], 401, [], JSON_UNESCAPED_UNICODE);
    }

    public function signOut(Request $request)
    {
        $request->user()->tokens()->delete();
        return \response()->json(['message' => (__('validation.logout'))], 200);
    }
}
