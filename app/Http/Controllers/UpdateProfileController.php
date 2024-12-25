<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UpdateProfileController extends Controller implements HasMiddleware
{
    /**
     * Get the middleware that should be assigned to the controller.
     */
    public static function middleware(): array
    {
        return [
            'auth',
        ];
    }

    public function editProfile(User $user)
    {
        $user = Auth::user();
        return view('auth.editprofile', compact('user'));
    }

    public function updateProfile(User $user)
    {
        if (Auth::user()->email == request('email')) {
            $validator = Validator::make(request()->toArray(), [
                'name' => 'required',
                //  'email' => 'required|email|unique:users',
            ]);
            if ($validator->fails()) {
                return redirect('/update-profile/' . $user->id)
                    ->withInput()
                    ->withErrors($validator);
            }
            $user->name = request('name');
            // $user->email = request('email');
            $user->save();
            return back()->withSuccess('Password change successfully.');
        } else {
            $validator = Validator::make(request()->toArray(), [
                'name' => 'required|min:3',
                'email' => 'required|email|unique:users',
                //'password' => 'required|min:6|confirmed'
            ]);

            $user->name = request('name');
            $user->email = request('email');
            //$user->password = bcrypt(request('password'));

            $user->save();
            return back()->withSuccess('Password change successfully.');
        }
    }
}
