<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function UserRegister(UserRequest $request)
    {
        $data = $request->except('photo','_token','password');

        $img = $request->file ('photo');
            $fileName = hexdec(uniqid()).'.'.$img->getClientOriginalName();
            $img->move(public_path('upload/user'),$fileName);
            $data['photo']=$fileName;

        $data['password'] = Hash::make($request['password']);

        User::insert($data);

        return redirect()->route('user.index');
    }

    public function loginForm()
    {
        return view('login');
    }

    public function loginn(Request $request)
    {   
        $input = $request->all();
   
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]); 

        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->is_admin == 0) 
            {
                return redirect()->route('index');
            }
            else
            {
                return redirect()->route('user.index');
            }
        }
        elseif (is_numeric($request->get('email')))    
        {
            if(auth()->attempt(array('phone' => $input['email'], 'password' => $input['password'])))
            {
                if (auth()->user()->is_admin == 1) 
                {
                    return redirect()->route('index');
                }
                else
                {
                    return redirect()->route('user.index');
                }
            }
        }   
        else
        {
            session()->flash('message','Email-Address And Password Are Wrong.');
            return redirect()->back();
        }
    }
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $notification = array(
            'message' => 'User Loged out Successfully',
            'alert-type' => 'success',
         );
        return redirect()->route('login.form')->with($notification); 
    }
}
