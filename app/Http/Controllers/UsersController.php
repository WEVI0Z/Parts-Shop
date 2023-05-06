<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    private function getCategories() {
        $products = Product::query()->select("category")->get();

        $categories = [];

        foreach ($products as $product) {
            $categories[count($categories)] = $product->category;
        }

        $categories = array_unique($categories);

        return $categories;
    }

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

            return redirect()->route("main")->with("message", "Register success");
        }

        $title = "Register";

        return view("register", compact("title"));
    }

    function logout() {
        Auth::logout();

        return redirect()->route("main")->with("message", "Logout success");
    }

    function favourites(Request $request) {
        $title = "Favourites";

        $parts = Product::with("favourites")->whereHas("favourites", function ($query) {
            $query->where("user_id", "=", Auth::user()->id);
        })->paginate(9);

        $categories = $this->getCategories();

        return view("catalog", compact("title", "parts", "categories"));
    }

    function addToFavourites(Request $request) {
        Favourite::query()->create([
            "user_id" => Auth::user()->id,
            "product_id" => $request->route("id"),
        ]);

        return redirect()->back()->with("message", "Product added to your favourites");
    }
}
