<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategotyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


       // $data['category_list'] = category::where('created_by',Auth::id())->get();
      //  return view('layouts.categories.index',$data);

      // for api
      $category_list = category::get();
      return $category_list;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.categories.create');
        // $categoty = new category();
        // $categoty->name = 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        // $category = new category();
        // $category->name = $request->category_name;
        // $category->created_by = Auth::id();
        // $category->save();

        // return redirect('/categories');
//for api 

        $category = new category();
        $category->name = $request->category_name;
        $category->created_by = $request->user_name;
        $category->save();

        return 'success';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $data['category'] = category::find($id);
        // return view('layouts.categories.edit',$data);
// for api
        $category = category::find($id);
        return $category;
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
         
        //  $category = category::where('created_by',Auth::id())->find($id);
        //  if(!$category)
        //  {
        //      return redirect('/categories');
        //  }
        //   $category->name = $request->category_name;
        //  $category->save();

        //  return redirect('/categories');


        //for api

        $category = category::find($id);
         if(!$category)
         {
             return 'failure request';
         }
          $category->name = $request->category_name;
         $category->save();

         return 'success';
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = category::find($id);
        if(!$category)
        {
            return 'fail';
        }
        $category->delete();

        return 'delete success';
    }
}
