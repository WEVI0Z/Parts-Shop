<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    function main() {
        $title = "Parts shop";

        return view("main", compact("title"));
    }
}
