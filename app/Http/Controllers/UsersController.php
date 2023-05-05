<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    function login(Request $request) {
        if($_POST) {
            return dd("post");
        }

        $title = "Login";

        return view("login");
    }

    function register(Request $request) {
        if($_POST) {
            return dd("post");
        }

        $title = "Register";

        return view("register");
    }
}
