<?php

namespace App\Http\Controllers;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyprofileController extends Controller
{
    
    public function update(UpdateProfileRequest $request)
    {
        auth()->user()->update($request->only('name', 'email'));

        if ($request->input('password')) {
            auth()->user()->update([
                'password' => bcrypt($request->input('password'))
            ]);
        }

        if(Auth::user()->hasRole('user')){
            return redirect()->route('dashboard.myprofile')->with('message', 'Profile saved successfully');
       }elseif(Auth::user()->hasRole('administrator')){
            return redirect()->route('dashboard.adminprofile')->with('message', 'Profile saved successfully');
        }

    }
}
