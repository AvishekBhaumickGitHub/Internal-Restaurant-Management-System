<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;//Here we are using the Category model.

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(3);
        return view('management.category')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('management.createCategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //  After clicking teh save button on creat category it fetches the post method using request and stores the data into tha database 
    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required|unique:categories|max:10|min:3|alpha'],
            [
                'name.unique'=>'Data already exist',
                'name.min'=>'Minimum three characters needed',
                'name.,max'=>'Maximum ten characters allowed',
                'name.alpha'=>'No numeric value allowed'
            
            
            ]
        );

        // To create a new record in the database, create a new model instance, 
        // set attributes on the model, then call the save method:
        $category = new Category;
        $category->name = $request->name;
        $category->save();
        $request->session()->flash('status', $request->name. " is save successfully");
        return(redirect('/management/category'));
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
    // After clicking the  edit option it calls the edit function
    public function edit($id)
    {
        $category = Category::find($id);
        return view('management.editCategory')->with('category',$category);
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
            'name' => 'required|unique:categories|max:255'
        ]);
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        $request->session()->flash('status', $request->name. " is updated successfully");
        return(redirect('/management/category'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        Session()->flash('status', 'The category is deleted successfully');
        return redirect('/management/category');
    }
}
