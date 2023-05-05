<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    private function getCategories() {
        return [1, 2, 3];
    }

    private function getPopular() {
        return [1, 2, 3];
    }

    function main() {
        $title = "Parts shop";

        $popularParts = $this->getPopular();

        $categories = $this->getCategories();

        return view("main", compact("title", "popularParts", "categories"));
    }
}
