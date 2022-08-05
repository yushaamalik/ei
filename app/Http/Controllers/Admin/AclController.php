<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Admin;


use Illuminate\Support\Facades\Auth;

class AclController extends Controller
{
    //

    public function addRole()
    {
        # code...
        try{
            $data['permissions'] = Permission::where('guard_name', 'admin')->get();
            return view('admin.acl.addRole')->with($data);
        }catch(\Exception $e){
            return redirect()->back()->with('error','Error.Please Contact Support');
        }

    }

    public function saveRole(Request $request)
    {
        # code...

        $validation = Validator::make( $request->all(), [
            'roleName' => 'required',
            'permissionsIds' => 'required'
        ]);
        try{
            DB::beginTransaction();
            $roleName = $request->input('roleName');
            $role = new Role;
            $role->name = $request->input('roleName');
            $role->guard_name = 'admin';
            $role->save();

            $roleId = $role->id;

            $role = Role::find($roleId);
            $permissions = $request->input('permissionIds');

            for($i = 0; $i<=count($permissions) - 1; $i++)
            {
                $permissions[$i] = (int)$permissions[$i];
            }
            $role->syncPermissions($permissions);
            DB::commit();
            return redirect()->back()->with('success', 'Role Added');
        }catch(\Exception $e){
          DB::rollBack();
          return redirect()->back()->with('error','Error.Please Contact Support');
        }

    }

    public function rolesListing()
    {
        # code...
        try{
            $data['roles'] = Role::all()->where('is_deleted', '=', 0);
            return view('admin.acl.rolesListing')->with($data);
        }catch(\Exception $e){
            return redirect()->back()->with('error','Error.Please Contact PITB Support');
        }

    }

    public function viewRole($id)
    {
        # code...
        try{
            $data['role'] = Role::find($id);
            $data['permissions'] = Permission::all();
            $data['rolePermissions'] = $data['role']->permissions()->get();
            return view('admin.acl.viewRole')->with($data);
        }catch(\Exception $e){
            return redirect()->back()->with('error','Error.Please COntact PITB Support');
        }

    }

    public function editRole($id)
    {
        # code...
        try{
            $data['role'] = Role::find($id);
            $data['permissions'] = Permission::all();
            $data['rolePermissions'] = $data['role']->permissions()->get();
           return view('admin.acl.editRole')->with($data);
        }catch(\Exception $e){
            return redirect()->back()->with('error','Error.Please Contact PITB Support');
        }
    }

    public function updateRole(Request $request, $id)
    {
        # code...
        try{
        DB::beginTransaction();
        $roleId = $request->input('roleId');
        $roleId = (int)$roleId;

        $role = Role::find($roleId);
        $permissions = $request->input('permissionIds');

        for($i = 0; $i<=count($permissions) - 1; $i++)
        {
            $permissions[$i] = (int)$permissions[$i];
        }

        $role->syncPermissions($permissions);
        DB::commit();
        return redirect('/admin/acl/role-edit/' . $roleId)->with('success', 'Permissions Synced');

        }catch(\Exception $e){
            DB::rollBack();
            return redirect('/admin/acl/role-edit/' . $roleId)->with('error', 'Error.Please Contact PITB Support');
        }
    }



    public function deleteRole(Request $request, $id)
    {
        try{
            $role = Role::where('id', $id)->update([
                'is_deleted' => 1
            ]);
        return redirect()->route('admin.acl.rolesListing')->with('success', 'Role Deleted');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->route('admin.acl.rolesListing')->with('error', 'Error.Please COntact PITB support');
        }
    }

    public function addPermission()
    {
        # code...
        try{
            return view('admin.acl.addPermission');
            // return Inertia::render('addPermission');
        }catch(\Exception $e){
            return redirect()->back()->with('error','Error.Please Contact Support');
        }

    }

    public function savePermission(Request $request)
    {
        # code...
        try{
        DB::beginTransaction();
        $permissionName = $request->input('permissionName');
        $permission = new Permission;
        $permission->name = $request->input('permissionName');
        // $permission->guard_name = 'admin';
        $permission->description = $request->input('permissionDescription');
        $permission->save();
        DB::commit();
        return redirect()->route('admin.acl.addPermission')->with('success', config('constants._ADD_SUCCESSFULLY_MESSAGE'));
        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->route('admin.acl.addPermission')->with('error','Error.Please Contact Support');
        }
    }

    public function permissionsListing()
    {
        # code...
        try{
            $data['permissions'] = Permission::with('roles')->where('is_deleted', '=', 0)->get();
            return view('admin.acl.permissionsListing')->with($data);

        }catch(\Exception $e){
            return redirect()->back()->with('error','Error.Please Contact PITB Support');
        }
    }

    public function viewPermission($id){
        try{
            $data['permission'] = Permission::with('roles')->find($id);
            return view('admin.acl.viewPermission')->with($data);
        }catch(\Exception $e){
            return redirect()->back()->with('error','Error.Please Contact PITB Support');
        }
    }


    public function deletePermission($id){
        try{
            $permission = Permission::where('id', $id)->update([
                'is_deleted' => 1
            ]);
            return redirect()->route('admin.acl.permissionsListing')->with('success', 'Permission Deleted');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->route('admin.acl.permissionsListing')->with('error', 'Error.Please Contact PITB Support');
        }
    }

     public function editPermission($id){
        try{
            $data['permission'] = Permission::with('roles')->find($id);
            return view('admin.acl.editPermission')->with($data);
        }catch(\Exception $e){
            return redirect()->back()->with('error','Error.Please Contact PITB Support');
        }
    }

     public function updatePermission(Request $request){

         $validation = Validator::make( $request->all(), [
            'permissionName' => 'required|max:30',
            'permissionDescription' => 'required|max:200']);
        $validation->validate();
            try{
                DB::beginTransaction();
                $id =  $request->input('id');
                $region = Permission::where('id', $id)->update([
                'name' => $request->input('permissionName'),
                'description' => $request->input('permissionDescription')
                ]);
                DB::commit();
                return redirect('admin/acl/permission-edit/' . $id)->with('success', 'Permission Updated');
            }catch(Exception $e){
                DB::rollBack();
                return redirect('admin/acl/permission-edit/' . $id)->with('error', 'Error.Please Contact PITB Support');
            }


    }


    public function assignRole()
    {
        # code...

        $data['users'] = Admin::all();
        $data['roles'] = Role::all();


        return view('admin.acl.assignRole')->with($data);
    }

    public function assignRoleSave(Request $request)
    {
        # code...

        $userId = $request->input('userId');
        $roleId = $request->input('roleId');

        $userId = (int)$userId;
        $roleId = (int)$roleId;
        
        

        $user = Admin::find($userId);


        $user->assignRole($roleId);

        return redirect()->back()->with('success', 'Role Assigned');
    }


    public function addUser()
    {
        # code...

            try{
                DB::beginTransaction();
                $user = Auth::guard('admin')->user();
				
                if($user->can('user.create'))
                {
                    $data['roles'] = Role::where('name', '!=' ,  'Super Admin')->where('deleted', 0)->where('guard_name', 'admin')->get();
                   
                    return view('admin.acl.addUser')->with($data);
                }
                else{

                    return redirect()->route('admin.dashboard')->with('error', 'Access Denied');
                }
                DB::commit();
            }catch(\Exception $e){
                DB::rollBack();
                return redirect()->route('admin.dashboard')->with('error', 'Error.Please Contact Support');
            }


    }

    public function saveUser(Request $request)
    {
        # code...
        $request->validate([
            'name' => 'required',
            'cnic' => 'required',
            'password' => 'required|min:8|max:15|required_with:confirmpassword|same:confirmpassword',
            'confirmpassword' => 'min:8',
            'user_picture' => 'sometimes|required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try{
            DB::beginTransaction();
            $user = new Admin();
            if($request->hasFile('user_picture'))
            {
            $image=$request->file('user_picture');
            $uniqueid=uniqid();
            $image_name= $uniqueid.'.'.$image->getClientOriginalExtension();
            $image_name_server='uploads/admins/'.$uniqueid.'.'.$image->getClientOriginalExtension();
            $user->userImage = $image_name_server;
            Storage::disk('public')->put('/uploads/admins/'.$image_name, file_get_contents($request->file('user_picture')));
            }
            $user->name             = $request->input('name');
            $user->email            = $request->input('email');
            $user->password         = Hash::make($request->input('password'));
            $user->mobile           = $request->input('mobile');
            $user->cnic             = $request->input('cnic');
            $user->status           = 1;


        

        $user->save();

        $userId =  $user->id;
        $roleId = $request->input('roleId');

        $user = Admin::find($userId);

        $user->syncRoles($roleId);
        DB::commit();
        return redirect()->route('admin.acl.addUser')->with('success', 'User Added');
        }
        catch(\Exception $e){
            DB::rollBack();
            return redirect()->route('admin.acl.addUser')->with('error', $e->getMessage());
        }



    }

    public function changeStatusUser($id){
        try{

            $user = User::where('id',$id)->first();
            if($user){
                if($user->status == 0){
                    $status = 1;
                    $statusnotice = "Active";

                }elseif($user->status == 1){
                    $status = 0;
                    $statusnotice = "In-Active";
                }else{;}
                $user->status =  $status;
                $user->save();
                return redirect()->back()->with('success','User Status '.$statusnotice.' Successfully');
            }else{
                return redirect()->back()->with('error','User Not Found');
            }
        }catch(\Exception $e){
            return redirect()->back()->with('error','Error.Please Contact PITB Support');
        }
    
    
    }


}
