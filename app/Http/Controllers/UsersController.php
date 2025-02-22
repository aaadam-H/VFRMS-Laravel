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

    public function showAllUser(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('event.index')->with('error','You are not logged in! Log in first!');
        }
        else
        {
            Auth::user()->accType == 'superAdmin' ? '' : abort(404);
        };
        $sort_by = $request->get('sort_by', 'id');
        $sort_order = $request->get('sort_order', 'asc');
        
        $users = User::orderBy($sort_by, $sort_order)->paginate(100); // Adjust the number of items per page as needed
        if(Auth::check())
        {
            Auth::user()->accType != 'superAdmin' ? abort(403): 'superAdmin only';
        }
        return view('superAdmin.show', compact('users', 'sort_by', 'sort_order'));
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
        $user->contactNumber = $request->input('contactNum');
        $user->email = $request->input('email');
        $user->updated_at = date('Y-m-d-H:i:s',time());
        $user->save();
        return redirect('/user')->with('success','Profile updated!');

    }

    public function updateImg(Request $request, $id)
    {
        $this->validate($request,
        [
        'uploadfile' => 'required|image|mimes:jpeg,png,jpg,gif',
        ],
        [
        'uploadfile.required' => 'Please select an image file to upload',
        'uploadfile.image' => 'The file you selected is not an image file',
        'uploadfile.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif',
        ]);


    $user = User::find($id);

    if ($request->hasFile('uploadfile')) {
        $image = $request->file('uploadfile');
        $name = date('Y-m-d-H-i',time()).'_'.$user->id.'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/storage/userProfilePic');
        $image->move($destinationPath, $name);

        // Delete the old profile picture if it exists and is not the default one
        if ($user->profilePic && $user->profilePic != 'noProfilePic.png') {
            $oldImagePath = public_path('/storage/userProfilePic/'.$user->profilePic);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        $user->updated_at = date('Y-m-d-H:i:s',time());
        $user->profilePic = $name;
        $user->save();
    }

    return redirect()->route('user.index', $id)->with('success', 'Profile picture updated successfully!');
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
        $user = User::find($id);
        if($user->profilePic == 'noProfilePic.png')
        {
            return redirect()->route('user.index', $id)->with('error', 'Profile picture is a default profile picture!');
        }

        $oldImagePath = public_path('/storage/userProfilePic/' . $user->profilePic);
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }

        $user->updated_at = date('Y-m-d-H:i:s',time());
        $user->profilePic = 'noProfilePic.png';
        $user->save();

        return redirect()->route('user.index', $id)->with('success', 'Profile picture removed successfully!');
    }
}
