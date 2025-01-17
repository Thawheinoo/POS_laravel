<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function list(){
        //show category_list in category list page
        $category_list = Category::orderBy('created_at' , 'desc')->paginate(5);
        return view('admin.category.list' , compact('category_list'));
    }

    //create category to table
    public function create(Request $request){

        $this->validateCategory($request);

        $category = [
            'name' => $request->category
        ];
        Category::create($category);
        Alert::success('Create success', 'Your category has been saved');
        return back();
    }

    //update category list to table
    public function show($id){
        $data = Category::find($id);
        return view('admin.category.categoryupdate' , compact('data'));
    }
    public function update(Request $request){
        $data = Category::find($request->id);
        $data->update([
            'name' => $request->category
        ]);
        Alert::info('Update success', 'Your category has been updated');
        return to_route('category#list');
    }

    //deletr category from table
    public function delete($id){
        Category::findOrFail($id)->delete();
        Alert::warning('Category Delete', 'Your category has been deleted');
        return back();
    }

    //validation for category
    private function validateCategory($request){
        $request->validate([
            'category' => 'required'
        ]);
    }

}
