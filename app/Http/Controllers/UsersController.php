<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('event.index')->with('error','You are not logged in! Log in first!');;
        }

        $data = array(
            'id' => Auth::user()->id,
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'accType' => Auth::user()->accType,
            'contactNumber' => Auth::user()->contactNumber,
            'profilePic' => Auth::user()->profilePic,
        );
        return view('profile.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($id != Auth::user()->id)
        {
            return redirect()->route('user.index',Auth::user()->id)->with('error','Access denied!');
        }

        $user = User::find($id);

        return view('profile.edit')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
            'contactNum' => 'required',
            'email' => 'required',
        ]);

        $pass = $request->input('password');

        $user = User::find($id);
        $user->name = $request->input('username');
        $user->password = Hash::make($pass);
        // $user->password = $pass;
        $user->contactNumber = $request->input('contactNum');
        $user->email = $request->input('email');
        $user->save();
        // dd($user);
        return redirect('/user')->with('success','Profile updated!');

    }

    public function updateImg(Request $request, $id)
    {
        $this->validate($request, [
        'uploadfile' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $user = User::find($id);

    if ($request->hasFile('uploadfile')) {
        $image = $request->file('uploadfile');
        $name = time().'-'.$user->id.'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/storage/userProfilePic');
        $image->move($destinationPath, $name);

        // Delete the old profile picture if it exists and is not the default one
        if ($user->profilePic && $user->profilePic != 'noProfilePic.png') {
            $oldImagePath = public_path('/storage/userProfilePic/'.$user->profilePic);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        $user->profilePic = $name;
        $user->save();
    }

    return redirect()->route('user.edit', $id)->with('success', 'Profile picture updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function destroyImg($id)
    {
        //
    }
}
