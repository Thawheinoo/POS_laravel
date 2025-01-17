<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use App\Models\User;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    // direct userHome page
    public function userHome()
    {
        //data from categories table
        $category = Category::all();

        //data from products table
        $product = Product::select('products.*', 'categories.name as category_name')
            //left join with categories table
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            //sorting search
            ->when(request('sorting'), function ($query) {
                $sorting = explode(',',  request('sorting'));
                $sortingName = 'products.' . $sorting[0];  //products.name , products.price , products.created_at
                $sortingBy = $sorting[1];                  //desc , asc
                $query->orderBy($sortingName, $sortingBy);
            })
            ->when(request('searchKey'), function ($query) {
                $query = $query->where('products.name', 'like', '%' . request('searchKey') . '%');
            })
            //search by category name
            ->when(request('category_id'), function ($query) {
                $query->where('products.category_id', request('category_id'));
            })
            //when min_price and max_price is set
            ->when(request('max_price') && request('min_price'), function ($query) {
                $query->wherebetween('products.price', [request('min_price'), request('max_price')]);
            })
            //when min_price is set
            ->when(request('min_price'), function ($query) {
                $query->where('products.price', '>=', request('min_price'));
            })
            //when max_price is set
            ->when(request('max_price'), function ($query) {
                $query->where('products.price', '<=', request('max_price'));
            })

            ->paginate(8);

        //cart count
        $cart_count = Cart::where('user_id', Auth::user()->id)->count('id');

        Session::put('cart_count', $cart_count);

        return view('user.home.list', compact('product', 'category', 'cart_count'));
    }


    //user profile page view
    public function profilePage()
    {
        return view('user.profile.page');
    }

    //user eidt page view
    public function editpage()
    {
        return view('user.profile.editpage');
    }

    //user edit (update)
    public function edit(Request $request, $id)
    {

        $this->editProfilecheckValidation($request);

        $upload_data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ];

        //if user upload photo
        if ($request->hasFile('image')) {
            // -> 1) delete old photo
            if (Auth::user()->profile) {
                $delete = public_path() . '/profile_img/' . $request->oldImage;
                unlink($delete);
            }
            // ->save new photo
            if ($request->file('image') != null) {
                $imgName = uniqid() . $request->file('image')->getClientOriginalName();
                $request->file('image')->move(public_path() . '/profile_img/', $imgName);
                $upload_data['profile'] = $imgName;
            }
        }

        //update data
        User::findOrFail($id)->update($upload_data);

        Alert::success('Successfully updated', 'Your Profile Information Updated');

        return to_route('user#profilepage');
    }


    //changePassword page
    public function changepasswordPage()
    {
        return view('user.profile.changePasswordPage');
    }

    //change Password update
    public function change(Request $request)
    {

        $this->changePasswordValidation($request);

        if (Hash::check($request->oldPassword,  Auth::user()->password)) {

            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->newPassword)
            ]);

            Alert::success('Successfully updated', 'Your account Password Updated');

            Auth::guard('web')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/');
        }
    }


    //contact page
    public function contactPage()
    {
        $contact = Contact::where('title', '=' , 'reply from admin')->where('user_id', Auth::user()->id)->get();

        return view('user.home.contact', compact('contact'));
    }

    //contact page
    public function contact(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'message' => 'required',
        ]);
        Contact::create([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'message' => $request->message,
        ]);

        Alert::success('Message Delivered', 'We will reply you soon');

        return back();
    }



    //checkValidation

    //edit profile check validation
    private function editProfilecheckValidation($request)
    {
        $validation = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        $request->validate($validation);
    }

    //change Password Validation
    private function changePasswordValidation($request)
    {
        $validation = [
            'oldPassword' => 'required',
            'newPassword' => 'required|min:6|max:15',
            'confirmPassword' => 'same:newPassword'
        ];

        $request->validate($validation);
    }
}
