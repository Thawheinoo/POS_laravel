<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    //---direct route for product create page----//
    public function createPage()
    {
        $category_data = Category::all();
        return view('admin.product.create', compact('category_data'));
    }
    //---direct route for product create page----//

    //====create product to products table====///
    public function create(Request $request)
    {
        $this->createProductValidation($request, 'create');

        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'stock' => $request->stock,
        ];

        if ($request->hasFile('image')) {
            //get image name
            $image = uniqid() . $request->file('image')->getClientOriginalName();
            //store in public->product_img
            $request->file('image')->move(public_path() . '/product_img/', $image);
            $data['image'] = $image;
        }

        //create data to products table
        Product::create($data);

        Alert::success('Successfully created', 'Your Product has been saved');

        return back();
    }
    //===create product to products table====///



    //====direct route for product list page===////
    public function listpage($amt = '')
    {
        //fetch data form products table ->left join-> categories table
        $productList = Product::select('categories.name as category_name', 'products.id', 'products.name', 'products.price', 'products.stock', 'products.image', 'products.created_at')
            ->leftJoin('categories', 'products.category_id', 'categories.id')
            ->when(request('searchKey'), function ($query) {
                $query->whereAny(['products.name', 'products.price', 'categories.name'],'Like','%'.request('searchKey'). '%');
            });
        //for low amount button
        if ($amt == 'lowamt') {
            $productList = $productList->where('stock', '<=', 3);
        }

        $productList = $productList->orderBy('created_at', 'desc')->paginate(5);

        return view('admin.product.list', compact('productList'));
    }
    //===direct route for product list page===////



    //===direct route for product detail page===///
    public function detail($id)
    {
        $product_detail = Product::select('categories.name as category_name', 'products.*')
            ->leftJoin('categories', 'categories.id', 'products.category_id')
            ->where('products.id', $id)
            ->first();

        return view('admin.product.detail', compact('product_detail'));
    }
    //===direct route for product detail page===///



    //===direct route for edit page===///
    public function editpage($id)
    {
        //fetch data form categories table
        $category_data = Category::all();
        //fetch data from products table
        $product_data = Product::where('id', $id)->first();

        return view('admin.product.edit', compact('product_data', 'category_data'));
    }
    //===direct route for edit page===///


    //----update process routes----//
    public function edit(Request $request)
    {

        $this->createProductValidation($request, 'edit');

        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'stock' => $request->stock,
        ];

        if ($request->hasFile('image')) {
            //delete  old product image
            if (file_exists(public_path() . '/product_img/' . $request->product_oldimage)) {
                unlink(public_path() . '/product_img/' . $request->product_oldimage);
            }

            //get new image name
            $image = uniqid() . $request->file('image')->getClientOriginalName();
            //store new image in public -> product_img
            $request->file('image')->move(public_path() . '/product_img/', $image);

            $data['image'] = $image;
        }else {
            $data['image'] = $request->product_oldimage;
        }

        Product::findOrFail($request->product_id)->update($data);


        Alert::success('Successfully updated', 'Your Product has been updated');

        return to_route('product#listpage');
    }
    //----update process routes----//



    //====delete process routes====//

    public function delete($id){
        $data = Product::where('products.id', $id)->first();

        //delete old image
        $old_image = $data->image;

        if(file_exists(public_path().'/product_img/'.$old_image)){
            unlink(public_path().'/product_img/'.$old_image);
        }

        $data->delete();

        Alert::success('Successfully deleted', 'Your Product has been deleted');

        return to_route('product#listpage');

    }

    //====delete process routes====//





    //-----product create Validation------//
    private function createProductValidation($request, $action)
    {
        $rule = [
            'name' => 'required|unique:products,name,' . $request->product_id,
            'category_id' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric|max:9999',
            'description' => 'required|max:2000'
        ];
        $rule['image'] = $action == 'create' ? 'required|mimes:jpg,jpeg,svg,png,webp|file' : "mimes:jpg,jpeg,svg,png,webp|file";

        $request->validate($rule);
    }
    //-----product create Validation------//
}
