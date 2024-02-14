<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\Category;
use App\Models\post;
use Illuminate\Support\Facades\DB;
class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * // use this function for find buy id
     */
    public function index() {

        $categories = Category::all();
        $post = Post::find(5);
    	return  view('frontend.index')
                ->with('posts', Post::orderBy('created_at','DESC')->paginate(4))
                ->with('categories', $categories)
                ->with('feature_post',$post);
        //return view("frontend.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * // use this methode for loop
     */
    public function show($id)
    {
        $categories = Category::all();
       // $post = Post::find(4);
        return view('frontend.show')
            ->with('post', Post::find($id))
            ->with('categories',$categories);
       //     ->with('feature_post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * // use this function for search by category
     */
    public function getByCategory($id) {
        $categories = Category::all();
        $posts = DB::table('posts')->where('category_id', $id)->paginate(4);
        //dd($posts);
        return view('frontend.category')->with('posts', $posts)->with('categories', $categories);
    }

      /**
     * Show the form for searsh the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * // use this function for search by searchbox
     */
    public function getBySearch(Request $request) {

        $keyword = !empty($request->input('keyword'))?$request->input('keyword'):"";
        $categories = Category::all();
        if( $keyword != ""){
            return view('frontend.search')
                ->with('posts', Post::where('title', 'LIKE', '%'.$keyword.'%')->paginate(4))
                ->with('keyword', $keyword)
                ->with('categories', $categories);
        } else {
            //return redirect('/') ;
            return view('frontend.search')
                ->with('posts', Post::paginate(4))
                ->with('keyword', $keyword)
                ->with('categories', $categories);
        } 

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
