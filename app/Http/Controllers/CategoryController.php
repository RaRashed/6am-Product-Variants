<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category=Category::orderBy('id','desc')->get();
       // $category =  DB::table('categories')->select('categories.*')->get();
       //$category = Category::whereNull('category_id')
       //->with('childrenCategories')
       //->get();
       //dd($category);
    return view('admin.category.index',['categories'=>$category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$categories= Category::orderBy('name','desc')->where('category_id',NULL)->get();
        $categories= Category::orderBy('name','desc')->get();

        return view('admin.category.create',['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required'

        ]);

//dd($request->all());
       Category::create($request->all());


      return redirect()->route('category.index')

                        ->with('success','Category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $category = Category::find($id);
        return view('category.show',['category'=>$category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $categories= Category::orderBy('name','desc')->get();

        return view('admin.category.edit',['category' => $category,'categories'=>$categories]);
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
        $request->validate([

            'name' => 'required',


        ]);


         $category = Category::find($id);
        $category->update($request->all());



        return redirect()->route('category.index')

                        ->with('success','Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $categgory = Category::find($id);
        $categgory->delete();



        return redirect()->route('category.index')

                        ->with('success','Category deleted successfully');
    }
}
