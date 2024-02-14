<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Validator;
use Session;

class CategoryController extends Controller


{
    // public function index() {
    //     return view('category.index');
    // }

    
    public function test1() {
        //Select all db by model
        $categories = Category::all();
        return view('category.test1', ['categories' => $categories]);
        // return view('category.test1')->with('categories', $categories);
    }
    public function test2() {
        //Select db by query
        $categories = DB::table('categories')->get();
        return view('category.test2', ['categories' => $categories]);
    }
    public function test3() {
        //Select db with select statement
        $categories = DB::select('SELECT * FROM categories');
        return view('category.test3', ['categories' => $categories]);
    }


    public function index() {
        // $categories = Category::all();
        // return view('category.index')->with('categories', $categories);
        $categories = Category::paginate(5);
        return view('category.index')->with('categories',$categories);
    }    
    

    public function create(){
        return view('category.create');
    }

    public function store(Request $request)
    {
    //die("TEST");
    $request->validate([
        'name' => 'required|max:255',
        'description' => 'required|max:255',
    ]);

    // Create The Category
    $category = new Category;
    $category->name = $request->name;
    $category->description = $request->description;
    $category->save();
    
    return redirect('category');
    }

   
    // Edit The category
    public function edit($id)
    {
        $category = Category::find($id);
        return view('category.edit')->with('category', $category);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
			'name' => 'required|max:20|min:3',
            'description' => 'required|max:20|min:3',
		]);
		if ($validator->fails()) {
			return redirect('category/' . $id . '/edit')
            ->withInput()
            ->withErrors($validator);
		}
		// Create The Category
		$category = Category::find($id);
		$category->name = $request->Input('name');
        $category->description = $request->Input('description');
		$category->save();
		Session::flash('category_update','Category is Update');
		return redirect('category');
    }
    
    public function destroy($id) {
    	$category = Category::find($id);
    	$category->delete();
    	Session::flash('category_delete','Category is Delete');
    	return redirect('category');
    }


}









