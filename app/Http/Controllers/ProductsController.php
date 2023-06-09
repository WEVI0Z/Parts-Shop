<?php

namespace App\Http\Controllers;

use App\Models\Parameter;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
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

    private function getPopular() {
        $parts = [];

        $products = Product::query()->get();

        foreach ($products as $product) {
            $likes = count($product->favourites);

            $parts[count($parts)] = [$product->id => $likes];
        }

        usort($parts, function ($a, $b) {
           if ($a[key($a)] >= $b[key($b)]) {
               return 1;
           } else {
               return 0;
           }
        });

        $parts = array_reverse($parts);

        $products = [];

        foreach ($parts as $part) {
            if(count($products) < 3) {
                $products[count($products)] = Product::find(key($part));
            } else {
                break;
            }
        }

        return $products;
    }

    function main() {
        $title = "Parts shop";

        $popularParts = $this->getPopular();

        $categories = $this->getCategories();

        return view("main", compact("title", "popularParts", "categories"));
    }

    function createPart(Request $request) {
        if ($_POST) {
            $rules = [
                "name" => "max:20|required",
                "category" => "max:20|required",
                "description" => "max:200|required",
                "price" => "integer|required",
                "image" => "required|mimes:png,jpeg,jpg|max:2048",
                "parameters_title.*" => "required",
                "parameters_info.*" => "required"
            ];

            $messages = [
                "name.max" => "20 symbols in the name maximum",
                "name.required" => "Name is required",
                "category.required" => "Category is required",
                "description.required" => "Description is required",
                "price.required" => "Price is required",
                "image.required" => "Image is required",
                "parameters_title.*.required" => "Parameter title is required",
                "parameters_info.*.required" => "Parameter info is required",
                "category.max" => "20 symbols in the category maximum",
                "description.max" => "200 symbols in the description maximum",
                "image.mimes" => "Image must be png or jpg",
                "image.max" => "Image must not be bigger then 2048 kilobytes",
            ];

            $validator = validator()->make($request->all(), $rules, $messages);

            $validator->validate();

            $image = $request->file("image")->store("public");

            $product = Product::create([
                "name" => $request->name,
                "category" => $request->category,
                "description" => $request->description,
                "price" => $request->price,
                "image" => $image
            ]);

            for ($i = 0; $i < count($request->parameters_title); $i++) {
                Parameter::query()->create([
                    "product_id" => $product->id,
                    "title" => $request->parameters_title[$i],
                    "info" => $request->parameters_info[$i],
                ]);
            }

            return redirect()->route("info", ["id" => $product->id]);
        }

        $title = "Create part";

        return view("create-part", compact("title"));
    }

    function catalog() {
        $title = "Catalog";

        $parts = Product::query()->paginate(9);

        $categories = $this->getCategories();

        return view("catalog", compact("title", "parts", "categories"));
    }

    function category(Request $request) {
        $title = "Catalog";

        $parts = Product::query()->where("category", "=", $request->route("category"))->paginate(9);

        $categories = $this->getCategories();

        return view("catalog", compact("title", "parts", "categories"));
    }

    function info(Request $request) {
        $part = Product::query()->find($request->route("id"));

        $popularParts = $this->getPopular();

        $title = $part->name;

        return view("info", compact("title", "part", "popularParts"));
    }
}
