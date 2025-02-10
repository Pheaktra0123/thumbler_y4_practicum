<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\ModelTumbler;
use Illuminate\Http\Request;

class TumblerController extends Controller
{
    // view table of tumbler products
    public function tumbler(){
        $models = ModelTumbler::all();
        $categories = Categories::all();
        return view("CRUD/Product_Crud/View_Product",compact('models','categories'));
    }

}
