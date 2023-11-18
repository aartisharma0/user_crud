<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd("ddd");
        $users = User::all();
        $data = compact('users');
        return view('manageUser')->with(($data));
    }
    public function del()
    {
        $users = User::onlyTrashed()->get();
        $data = compact('users');
        return view('trash')->with(($data));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Registration Form";
        $button = "Register";
        $url = route('users.store');
        $data = compact('url', 'title','button');
        return view('createUser')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'first_name'=> 'required',
            'last_name'=> 'required',
            'email'=>'required|email',
            'password' =>'required',
            // 'image' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048'

            
        ]);
        $user = new User;
        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->email = $request['email'];
        $user->contact = $request['contact'];
        $user->dob = $request['dob'];
        $user->gender = $request['gender'];
        // dd($request->hasFile('image'));
        // dd(
        //     "fghjkl"
        // );
        if($request->hasFile('image')) {

            $fileName = time().'_'.$request->image->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('uploads', $fileName, 'public');
            // dd(time().'_'.$request->image->getClientOriginalName());
            $user->image_name = time().'_'.$request->image->getClientOriginalName();
            $user->file_path = '/storage/' . $filePath;
        }
        $user->address = $request['address'];
        $user->password = md5($request['password']);
        $user->save();

        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            // not found
            return redirect(route('users.index'));
        } else {
            $title = "Updation";
            $button = "Update";
            // $url = route('users.update') . "/" . $user;
            $data = compact('user', 'title','button');

            return view('updateUser')->with($data);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $user = User::find($id);
        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->email = $request['email'];
        $user->contact = $request['contact'];
        $user->dob = $request['dob'];
        $user->gender = $request['gender'];
        $user->address = $request['address'];
        $user->password = md5($request['password']);
        $user->save();

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // $user = User::find($user);
        // if (!is_null($user)) {
            $user->delete();
        // }   
        return redirect(route('users.index'));
    }

    public function restore( $id)
    {
        $user = User::withTrashed()->find($id);
        if (!is_null($user)) {
            $user->restore();
        }   
        return redirect(route('users.index'));
    }
    public function delete( $id)
    {
        $user = User::withTrashed()->find($id);
        if (!is_null($user)) {
            $user->forceDelete();
        }   
        return redirect(route('users.index'));
    }
}
