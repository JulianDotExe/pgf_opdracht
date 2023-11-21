<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\DeletedAccountEmail;
use App\Mail\RoleAssignedEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $usersQuery = User::query();

        // Zoekfunctionaliteit op e-mail
        if ($request->filled('search')) {
            $searchTerm = $request->input('search');
            $usersQuery->where(function ($query) use ($searchTerm) {
                $query->where('email', 'like', "%$searchTerm%")
                    ->orWhere('name', 'like', "%$searchTerm%");
            });
        }

        $users = $usersQuery->paginate(1);

        return view('admin.users.index', compact('users'));
    }
    public function show(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.users.role', compact('user', 'roles', 'permissions'));
    }

    public function assignRole(Request $request, User $user)
    {
        $user->roles()->detach();
        $user->assignRole($request->role);
        $role = $request->role;
        $email = $user->email;
        
        if ($role) {
            Mail::to($email)->send(new RoleAssignedEmail($user, $role));
            return back()->with('message', 'Rol toegewezen en email verstuurd');
        } else {
            Log::warning("There has been an error, most likely there is no email available");
            return back()->with('message', 'Er was iets fout gegaan');
        }
        
    }

    public function removeRole(User $user, Role $role)
    {
        if ($user->hasRole($role)) {
            $user->removeRole($role);
            return back()->with('message', 'Role removed.');
        }

        return back()->with('message', 'Role not exists.');
    }

    public function givePermission(Request $request, User $user)
    {
        if ($user->hasPermissionTo($request->permission)) {
            return back()->with('message', 'Permission exists.');
        }
        $user->givePermissionTo($request->permission);
        return back()->with('message', 'Permission added.');
    }

    public function revokePermission(User $user, Permission $permission)
    {
        if ($user->hasPermissionTo($permission)) {
            $user->revokePermissionTo($permission);
            return back()->with('message', 'Permission revoked.');
        }
        return back()->with('message', 'Permission does not exists.');
    }

    public function destroy(User $user)
    {
        if ($user->hasRole('admin')) {
            return back()->with('message', 'They are admin.');
        }

        $user->delete();

        $userName = $user->name;
        $email = $user->email;
        
        if ($userName) {
            Mail::to($email)->send(new DeletedAccountEmail($userName));
            return back()->with('message', 'User deleted. An email has been sent');
        } else {
            Log::warning("There has been an error, most likely there is no email available");
            return back()->with('message', 'Er was iets fout gegaan');
        }

    }
}