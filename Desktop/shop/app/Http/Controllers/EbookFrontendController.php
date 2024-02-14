<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\Category;
use App\Models\Ebook;
use Illuminate\Support\Facades\DB;

class EbookFrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * // use this function for find buy id
     */
    public function index() {

        $Ebooks = Ebook::all();
    	return view('ebookfrontend.index')->with('ebooks', $Ebooks);
        // return 'hello';

    }

     /**
     * Display the specified resource.
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
        return view('ebookfrontend.show')
            ->with('ebook', Ebook::find($id))
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
        $ebooks = DB::table('ebooks')->where('category_id', $id)->paginate(4);
        //dd($ebooks);
        return view('ebookfrontend.category')->with('ebooks', $ebooks)->with('categories', $categories);
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
            return view('ebookfrontend.search')
                ->with('ebooks', Ebook::where('title', 'LIKE', '%'.$keyword.'%')->paginate(4))
                ->with('keyword', $keyword)
                ->with('categories', $categories);
        } else {
            //return redirect('/') ;
            return view('ebookfrontend.search')
                ->with('ebooks', Ebook::paginate(4))
                ->with('keyword', $keyword)
                ->with('categories', $categories);
        } 

    }


}
