<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ebook;
use App\Models\Category;
use Validator;
use Session;

class EbookProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

    	$categories = Category::all();
        $Ebook = Ebook::find(7);
        $Ebook1 = Ebook::find(1);
        $Ebook2 = Ebook::find(3);
        $Ebook3 = Ebook::find(4);
    	return  view('ebook.index')
                ->with('ebooks', Ebook::orderBy('created_at','DESC')->paginate(4))
                ->with('categories', $categories)
                ->with('feature_ebook',$Ebook)
                ->with('feature_ebook1',$Ebook1)
                ->with('feature_ebook2',$Ebook2)
                ->with('feature_ebook3',$Ebook3);
        //return view("ebook.main");
        //return 'hello';

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        $categories = array();
  
        foreach (Category::all() as $category) {
          $categories[$category->id] = $category->name;
        }
  
        return view('ebook.create')
          ->with('categories', $categories);
      }
	
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'category_id' => 'required|integer',
        'title' => 'required|max:20|min:3',
        'author' => 'required|max:20|min:3',
        'image' => 'required|mimes:jpg,jpeg,png,gif',
        'short_desc' => 'required|max:50|min:10',
        'description' => 'required|max:1000|min:10',
    ]);

      
     if ($validator->fails()) {
        return redirect('ebook/create')
            ->withInput()
            ->withErrors($validator);
    }

    // Create The Ebook

    $image = $request->file('image');
    $upload = 'img/posts/';
    $filename = time().$image->getClientOriginalName();
    $path = move_uploaded_file($image->getPathName(), $upload. $filename);

    $post = new Ebook;
    $post->category_id = $request->category_id;
    $post->title = $request->title;
    $post->author = $request->author;
    $post->image = $filename;
    $post->short_desc = $request->short_desc;
    $post->description = $request->description;
    $post->save();

    Session::flash('ebook_create','New E-Book is Created');

    return redirect('ebook-frontend');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show() {

        $Ebooks = Ebook::all();
    	return view('ebook.backend')->with('ebooks', $Ebooks);
        // return 'hello';

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
        $categories = array();
        foreach (Category::all() as $category) {
            $categories[$category->id] = $category->name;
        }
        $ebook = Ebook::findOrFail($id);
        return view('ebookfrontend.edit')->with('ebook', $ebook)->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|integer',
            'title' => 'required|max:20|min:3',
            'author' => 'required|max:20|min:3',
            'image' => 'mimes:jpg,jpeg,png,gif',
            'short_desc' => 'required|max:50|min:10',
            'price' => 'required|max:50|min:2',
            'description' => 'required|max:1000|min:10',
        ]);

        $ebook = Ebook::find($id);

        if ($validator->fails()) {
            return redirect('post/' . $ebook->id . '/edit')
                ->withInput()
                ->withErrors($validator);
        }

        // Create The Post
        if ($request->file('image') != "") {
            $image = $request->file('image');
            $upload = 'img/posts/';
            $filename = time() . $image->getClientOriginalName();
            move_uploaded_file($image->getPathName(), $upload . $filename);
        }

        $ebook->category_id = $request->category_id;
        $ebook->title = $request->Input('title');
        $ebook->author = $request->Input('author');
        if (isset($filename)) {
            $ebook->image = $filename;
        }
        $ebook->price = $request->Input('price');
        $ebook->short_desc = $request->Input('short_desc');
        $ebook->description = $request->Input('description');
        $ebook->save();

        Session::flash('post_update', 'Post is updated!');
        return redirect('ebook-frontend');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
