<?php

namespace App\Http\Controllers;

use App\Models\tblUser;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;


class UserController extends Controller implements HasMiddleware
{
    //new code
    /**
     * Get the middleware that should be assigned to the controller.
     */
    public static function middleware(): array
    {
        return [
            'auth',
            new Middleware('log', only: ['index']),
            new Middleware('subscribed', except: ['store']),
        ];
    }

    public function index()
    {
        $users = DB::table('tbl_users')->get();
        return view('user.index')->with('users', $users);
    }
    public function edit(string $id)
    {
        $users = DB::table('tbl_users')->where('id', $id)->first();
        if (!$users) {
            abort(404);
        }
        return view('user.edit')->with('users', $users);
    }
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:20|min:3',
            'phone' => 'required|max:20|min:3',
            'address' => 'required|max:1000|min:10',
        ]);

        if ($validator->fails()) {
            return redirect('user/' . $id . '/edit')
                ->withInput()
                ->withErrors($validator);
        }
        $users = tblUser::find($id);
        // Create The Post


        $users->name = $request->Input('name');
        $users->phone = $request->Input('phone');

        $users->address = $request->Input('address');
        $users->save();
        Session::flash('users_update', 'Data is updated');
        return redirect('user/' . $users->id . '/edit');
    }
    public function create()
    {
        return view('user.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:20|min:3',
            'phone' => 'required|max:20|min:3',
            'address' => 'required|max:1000|min:10',
        ]);

        if ($validator->fails()) {
            return redirect('user/create')
                ->withInput()
                ->withErrors($validator);
        }

        // Handle the file upload

        // Create the product
        $users = new tblUser();
        $users->name = $request->name;
        $users->phone = $request->phone;
        $users->address = $request->address;
        $users->save();

        Session::flash('users_create', 'New product created successfully.');
        return redirect('user/create');
    }
    public function destroy(string $id)
    {
        $users = tblUser::find($id);
        $users->delete();
        Session::flash('users_delete', 'Data is deleted.');
        return redirect('user');
    }
    public function show(string $id)
    {
        $user = tblUser::findOrFail($id);
        return view('user.show')->with('users', $user);
    }
}
