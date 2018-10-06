<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CheckupType;

class CheckupTypeController extends Controller
{
    public function add_checkupCategory(Request $r){
    	$category = new CheckupType;
    	$category->categoryName = $r->categoryName;
    	$category->url = str_slug($r->categoryName);
    	$category->save();
    	return back();
    }
}

// use App\Queue;
// public function test() {
// 	$q = new Queue;
// 	$q->queueID = $categoryID.'-'.(count(Queue::where('categoryID', 3)->get()) + 1);
// }