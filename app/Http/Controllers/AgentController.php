<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AgentController extends Controller
{
    public function AgentDashboard(){
        return view('agent.index');  
    }
    public function AgentLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect('/login');
}//end method
public function AgentProfile(){
    $id=Auth::user()->id;
    $profileData=User::find($id);
    return view('agent.agent_profile_page',compact('profileData'));
}//end method
public function AgentProfileStore(Request $request){
    $id=Auth::user()->id;
    $data=User::find($id);
    $data->username=$request->username;
    $data->name=$request->name;
    $data->email=$request->email;
    $data->phone=$request->phone;
    $data->address=$request->address;
    if ($request->file('photo')) {
        $file=$request->file('photo');
        @unlink(Public_path('upload/admin_images'.$data->photo));
        $filename=date('ymdHi').$file->getClientOriginalName();
        $file->move(public_path('upload/admin_images'),$filename);
        $data['photo']=$filename;
    }
    $data->save();
    $notification=array(
        'message'=>'Agent profile updated succesfully',
        'alert-type'=>'success'
    );
    return redirect()->back()->with($notification);
    

}//end method
public function AgentChangePassword(){
    $id=Auth::user()->id;
    $profileData=User::find($id);
    return view('agent.agent_change_password',compact('profileData'));

}//end method
public function AgentUpdatePassword(Request $request){
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
}
}
