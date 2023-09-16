<?php

namespace App\Http\Controllers\Backened;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PermissionExport;
use App\Imports\PermissionImport;
use App\Models\User;
use DB;

class RoleController extends Controller
{
    public function AllPermission(){
        $permission=permission::all();
        return view('backend.pages.permission.all_permission',compact('permission'));
    }//end method
    public function AddPermission(){
        return view('backend.pages.permission.add_permission');
    }//end method
    public function StorePermission(Request $request){
        $permission = Permission::create([
            'name' => $request->name,
            'group_name'=>$request->group_name,
        ]);
        $notification=array(
            'message'=>'permission created Succesfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.permission')->with($notification);
    }//end method
    public function EditPermission($id){
        $permission=permission::findOrFail($id);
        return view('backend.pages.permission.edit_permission',compact('permission'));
    }//end method
    public function UpdatePermission(Request $request){
        $per_id = $request->id;

        Permission::findOrFail($per_id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

          $notification = array(
            'message' => 'Permission Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.permission')->with($notification);
    }//end method
    public function DeletePermission($id){
        Permission::findOrFail($id)->delete();

        $notification = array(
          'message' => 'Permission Deleted Successfully',
          'alert-type' => 'success'
      );

      return redirect()->back()->with($notification);

    }//end method
    public function ImportPermission(){
        return view('backend.pages.permission.import_permission');
    }//end method
    public function Export(){
        return Excel::download(new PermissionExport, 'permission.xlsx');
    }//end method
    public function Import(Request $request){
        Excel::import(new PermissionImport, $request->file('import_file'));
        $notification = array(
            'message' => 'Permission Imported Successfully',
            'alert-type' => 'success'
        );
  
        return redirect()->back()->with($notification);
    }//end method
    //all role methodes//
    public function AllRoles(){
      $roles=Role::all();
      return view('backend.pages.roles.all_roles',compact('roles'));
    }//end method
    public function AddRoles(){
        return view('backend.pages.roles.add_roles');
    }//emd method
    public function StoreRoles(Request $request){
        Role::create([
            'name' => $request->name, 
        ]);

          $notification = array(
            'message' => 'Role Create Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles')->with($notification);
    }//end  method
    public function EditRoles($id){
        $roles=Role::findOrFail($id);
        return view('backend.pages.roles.edit_roles',compact('roles'));
    }//end method
    public function UpdateRoles(Request $request){
        $r_id=$request->id;
        Role::findOrFail($r_id)->update([
            'name'=>$request->name,
        ]);
        $notification = array(
            'message' => 'Role updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.roles')->with($notification);
    }//end method
    public function DeleteRoles($id){
    Role::findOrFail($id)->delete();

    $notification = array(
      'message' => 'Roles Deleted Successfully',
      'alert-type' => 'success'
  );
  return redirect()->back()->with($notification);
}//end method

/////add role in permission 
public function AddRolesPermission(){
    $roles=Role::all();
    $permission=Permission::all();
    $permission_groups=User::getpermissionGroup();
    return view('backend.pages.rolesetup.add_roles_permission',compact('roles','permission','permission_groups'));
}//end method
public function RolePermissionStore(Request $request){

    $data = array();
    $permissions = $request->permission;

    foreach($permissions as $key => $item){
        $data['role_id'] = $request->role_id;
        $data['permission_id'] = $item;

        DB::table('role_has_permissions')->insert($data);

    } // end foreach 

    $notification = array(
        'message' => 'Role Permission Added Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('add.roles.permission')->with($notification);

}// End Method 
public function AllRolePermission(){

    $roles = Role::all();
    return view('backend.pages.rolesetup.all_roles_permission',compact('roles'));

}// End Method 

}
