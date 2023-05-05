<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    function login(Request $request) {
        if($_POST) {
            if(Auth::attempt(["password" => $request->password, "login" => $request->login])) {
                return redirect()->route("main")->with("message", "Login succesful");
            } else {
                return redirect()->back()->with("error", "Incorrect login or password");
            }
        }

        $title = "Login";

        return view("login", compact("title"));
    }

    function register(Request $request) {
        if($_POST) {
            $rules = [
                "login" => "required|unique:users",
                "password" => "required|confirmed",
            ];

            $messages = [
              "login.required" => "The login is required",
              "login.unique" => "The user already exists",
              "password.required" => "The password is required",
              "password.confirmed" => "Passwords do not match"
            ];

            $validator = \validator()->make($request->all(), $rules, $messages);

            $validator->validate();

            $user = User::create([
                "login" => $request->login,
                "password" => Hash::make($request->password)
            ]);

            Auth::login($user);

            return redirect()->route("main")->with("Register success");
        }

        $title = "Register";

        return view("register", compact("title"));
    }

    function logout() {
        Auth::logout();

        return redirect()->back()->with("message", "Logout success");
    }
}
