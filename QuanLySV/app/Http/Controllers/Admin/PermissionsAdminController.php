<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Roles;
use Illuminate\Http\Request;

class PermissionsAdminController extends Controller
{
    public function formPermissions()
    {
        $admins = Admin::with('roles')
        //->orderBy('admin_id', 'DESC')
        ->paginate(5);
        return view('Admin.Permissions.listPermissions', compact('admins'));
    }

    public function assignRoles(Request $request)
    {
        $admin = Admin::where('admin_id', $request->admin_id)->first();
        $admin->roles()->detach(); //xóa all bản ghi  trong bảng trung gian liên quan đến tk này
        if ($request->adminChecked) {
            $role = Roles::where('role_name', 'Admin')->first();
            $admin->roles()->attach($role->role_id);
        }
        if ($request->addChecked) {
            $role = Roles::where('role_name', 'Add')->first();
            $admin->roles()->attach($role->role_id);
        }
        if ($request->editorChecked) {
            $role = Roles::where('role_name', 'Editor')->first();
            $admin->roles()->attach($role->role_id);
        }
        if ($request->deleteChecked) {
            $role = Roles::where('role_name', 'Delete')->first();
            $admin->roles()->attach($role->role_id);
        }
        if ($request->writeChecked) {
            $role = Roles::where('role_name', 'Write')->first();
            $admin->roles()->attach($role->role_id);
        }
        return redirect()->back()->with('success', 'Successful role assignment');
    }

    public function formAddAdmin()
    {
        return view('Admin.Permissions.addAdminAccount');
    }

    public function addAdmin(Request $request)
    {
        $request->validate([
            'admin_email' => 'required|email|unique:tbl_admin,admin_email',
            'admin_password' => 'required',
            'admin_name' => 'required',
            'admin_phone' => 'required|numeric|unique:tbl_admin,admin_phone',
            'admin_avatar' => 'required'
        ]);
        Admin::create([
            'admin_email' => $request->admin_email,
            'admin_password' => bcrypt($request->admin_password),
            'admin_name' => $request->admin_name,
            'admin_phone' => $request->admin_phone,
            'admin_avatar' => $request->admin_avatar
        ]);
        return redirect()->back()->with('success', 'Data has been processed successfully.');
    }

    public function deleteAdmin(Request $request)
    {
        if ($request->has('selected_items')) {
            $selectedItems = $request->selected_items;
            $deleteAdmin = Admin::whereIn('admin_id', $selectedItems)->delete();
            if ($deleteAdmin) {
                return response()->json(['success' => 'Student deleted successfully'], 200);
            } else {
                return response()->json(['error' => 'Failed to delete students'], 500);
            }
        }
    }

    public function searchAdmin(Request $request)
    {
        $keyword = $request->keyword;
        if ($keyword) {
            $admins = Admin::Where('admin_email', 'like', '%' . $keyword . '%')->paginate(5); // trả về 1 mảng
            if ($admins->isNotEmpty()) {
                return view('Admin.Permissions.searchAdmin', compact('admins', 'keyword'));
            }
            $error = 'No matching data found';
            return view('Admin.Permissions.searchAdmin', compact('error', 'keyword'));
        }
    }
}
