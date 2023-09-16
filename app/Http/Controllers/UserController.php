<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function Index(){
        return view('frontend.index');
    }
    //end method
    public function UserProfile(){
        $id=Auth::user()->id;
        $UserData=User::find($id);
        return view('frontend.dashboard.edit_profile',compact('UserData'));
    }//end method
    public function UserProfileStore(Request $request){
        $id=Auth::user()->id;
        $data=User::find($id);
        $data->username=$request->username;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->address=$request->address;
        if ($request->file('photo')) {
            $file=$request->file('photo');
            @unlink(Public_path('upload/user_images'.$data->photo));
            $filename=date('ymdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $data['photo']=$filename;
        }
        $data->save();
        $notification=array(
            'message'=>'User profile updated succesfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
        

    }//end method
    public function UserLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        $notification=array(
            'message'=>'User Logout succesfully',
            'alert-type'=>'success'
        );

        return redirect('/login')->with($notification);
    }//end method
    public function UserChangePassword(){
        $id=Auth::user()->id;
        $UserData=User::find($id);
        return view('frontend.dashboard.change_password',compact('UserData'));
    }//end method
    public function UserPasswordUpdate(Request $request){
        //validate
        $request->validate([
            'new_password'=>'required',
            'old_password'=>'required'
        ]);
        ///match the old password
        if(!Hash::check($request->old_password, auth::user()->password)){
            $notification=array(
                'message'=>'Old Password does not match!',
                'alert-type'=>'error'
            );
            return back()->with($notification);
    }
    ///update the new password
    User::whereId(auth()->user()->id)->update([
        'password'=>Hash::make($request->new_password)
    ]);
    $notification=array(
        'message'=>'password changed Succesfully',
        'alert-type'=>'success'
    );
    return back()->with($notification);
}//end method
}
