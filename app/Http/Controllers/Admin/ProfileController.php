<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    //route for password change page
    public function change()
    {
        return view('admin.profile.passwordChange');
    }

    //update password
    public function update(Request $request)
    {
        //check password validation
        $this->checkPasswordValidation($request);

        //user stay login password (hash value)

        $loginPassword = Auth::user()->password;
        //hash value == $request->oldPassword

        if (Hash::check($request->oldPassword, $loginPassword)) {

            //update password
            User::find(Auth::user()->id)->update([
                'password' => $request->newPassword
            ]);

            Alert::success('Password Updated', 'Your password has been updated');

            //logout process
            Auth::guard('web')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/');
        } else {
            Alert::error('Error Message', 'Yor Old password does not match!');
            return back();
        }
    }

    //direct route for profile page
    public function profilePage()
    {
        return view('admin.profile.accountProfile');
    }

    //direct route for edit profile page
    public function profileEdit()
    {
        return view('admin.profile.edit');
    }

    //edit profile (update data to users table)
    public function edit(Request $request)
    {
        //validation
        $this->editProfileValidation($request);

        //update data
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ];
        //check image upload or not
        if ($request->hasFile('image')) {
            //delete old image
            if (Auth::user()->profile) {
                if (file_exists(public_path() . '/profile_img/' . Auth::user()->profile)) {
                    unlink(public_path() . '/profile_img/' . Auth::user()->profile);
                }
            }

            // get img name
            $profile = uniqid() . $request->file('image')->getClientOriginalName();
            //store img in public
            $request->file('image')->move(public_path() . '/profile_img/', $profile);
            //update profile data to users table
            $data['profile'] = $profile;
        } else {
            $data['profile'] = Auth::user()->profile;
        }

        //update datas to users table
        User::find(Auth::user()->id)->update($data);
        //show alert
        Alert::success('Success Updated', 'Your profile has been updated');

        return to_route('profile#page');
    }


    // direct route for add adminAccount Page
    public function adminAccount()
    {
        return view('admin.adminAccount.create');
    }

    //create adminAccount
    public function createAdmin(Request $request)
    {
        $this->addAdminAccountValidation($request);

        //create adminAccount to users table
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'admin'
        ];
        User::create($data);

        Alert::success('Create Admin Account', 'Admin Account is successfully updated');

        return to_route('add#adminAccount');
    }

    //view admin list Page
    public function adminListPage()
    {
        $admin_data = User::whereIn('role', ['admin', 'superadmin'])
            //searchKey form search Box
            ->when(request('searchKey'), function ($query) {
                $query->whereAny(['name', 'email', 'address'], 'Like', '%' . request('searchKey') . '%');
            })
            ->get();
        return view('admin.adminAccount.adminListPage', compact('admin_data'));
    }

    //delete adminAccount
    public function deleteAdmin($id)
    {

        User::findOrFail($id)->delete();

        Alert::warning('Delete admin account', 'Deleted successfully');

        return back();
    }

    //view user list page
    public function userListPage()
    {
        $user_data = User::where('role', 'user')
            ->when(request('searchKey'), function ($query) {
                $query->whereAny(['name', 'email', 'address'], 'Like', '%' . request('searchKey') . '%');
            })
            ->get();
        return view('admin.adminAccount.userListPage', compact('user_data'));
    }


    //check password change validation
    private function checkPasswordValidation($request)
    {
        $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required|min:6|max:15',
            'confirmPassword' => 'required|same:newPassword'
        ]);
    }

    //editProfile validation
    private function editProfileValidation($request)
    {
        $request->validate([
            'name' =>   'required',
            'email' =>  'required|unique:users,email,' . Auth::user()->id,
            'phone' => 'required|unique:users,phone,' . Auth::user()->id,
            'image' => 'mimes:jpg,jpeg,png,'
        ]);
    }

    //addAdmin Page Validation
    private function addAdminAccountValidation($request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
        ]);
    }
}
