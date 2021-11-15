<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    //
    public function index()
    {
        return view('admin.permissions.index', [
            'permissions' => Permission::all()
        ]);
    }

    public function store()
    {

        request()->validate([
            'name' => ['required']
        ]);

        Permission::create([
            'name' => Str::ucfirst(request('name')),
            'slug' => Str::of(Str::lower(request('name')))->slug('-')
        ]);

        return back();
    }

    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit', ['permission' => $permission]);
    }

    public function update(Permission $permission)
    {
        $permission->name = Str::ucfirst(request('name'));
        $permission->slug = Str::of(request('name'))->slug('-');

        if ($permission->isDirty('name')) {
            session()->flash('permission-updated', 'Permission Updated: ' . request('name'));
            $permission->save();
        } else {
            session()->flash('permission-updated', 'Nothing has been update');
        }

        return back();
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return back();
    }
}
