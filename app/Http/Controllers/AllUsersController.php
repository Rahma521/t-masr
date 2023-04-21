<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AllUsersController extends Controller
{
    public function profile()
    {
        $adminId = Auth::user()->id;
        $adminData = User::find($adminId);
        if (auth()->user()->is_admin == 1) 
        {
            return view ('admin.adminProfile',compact('adminData'));
        }
        else
        {
            return view ('user.userProfile',compact('adminData'));
        }
       
    }
    public function editProfile()
    {
        $adminId = Auth::user()->id;
        $editData = User::find($adminId);
        if (auth()->user()->is_admin == 1) 
        {
            return view ('admin.adminEditProfile',compact('editData'));
        }
        else
        {
            return view ('user.userEditProfile',compact('editData'));
        }
    }

    public function updateProfile(Request $request)
    {
 
        $adminId = Auth::user()->id;
        $updatetData = User::find($adminId);
        $data  = $request->except('photo');

        //dd($data);
        $updatetData ->update($data);
        if (auth()->user()->is_admin == 1) {
            if ($request->file('photo')) {
                $file = $request->file('photo');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/admin'),$filename);
                $updatetData['photo'] = $filename;
             }
        }
        else
        {
            if ($request->file('photo')) {
                $file = $request->file('photo');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/user'),$filename);
                $updatetData['photo'] = $filename;
             }
        }
       
         $updatetData->save();
         $notification = array(
            'message' => 'Profile Updated Succesfully',
            'alert-type' => 'success',
         );

        return redirect()->route('admin.profile')->with($notification);
    }

    public function ChangePassword()
    {
        if (auth()->user()->is_admin == 1) 
        {
            return view('admin.adminChangePassword');
        }
        else
        {
            return view('user.userChangePassword');
        }
     
    }

    public function UpdatePassword(Request $request)
    {
        $validateData = $request-> validate([
            'oldpassword' =>'required',
            'newpassword' =>'required',
            'confirm_password' => 'required|same:newpassword'
        ]);
        $hashedpassword = Auth::user()->password;
        if(Hash::check($request->oldpassword, $hashedpassword))
            {
                $users = User::find(Auth::id());
                $users->password = bcrypt($request->newpassword);
                $users->save();
                session()->flash('message','Password Updated Successfully');
                return redirect()->route('admin.profile');
            } 
            else 
            {
                session()->flash('message','Old Password is not correct');
                return redirect()->back();
            }
        
    }
}
