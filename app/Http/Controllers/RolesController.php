<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RolesController extends Controller
{
    public function index()
    {
        $button = [
            'link' => route('role.create'),
            'name' => 'Add Role'
        ];

        $data['title'] = 'Roles';
        $data['button'] = json_decode(json_encode($button));
        $data['roles'] = Role::all();

        // dd($data['roles']);

        return view('roles.roles', $data);
    }


    public function create()
    {
        $data['title'] = 'Roles Create';
        $data['permissions'] = Permission::all()->groupBy('model');

        return view('roles.inc.addRoles', $data);
    }


    public function store(Request $request)
    {
        // dd($request->all());

        // the role name has to be unique
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191',
        ]);

        DB::transaction(function() use($request){
            $role = Role::create([
                'name' => $request->name
            ]);

            $role->permissions()->attach($request->permission_id);
        });

        // $role->permissions()->updateExistingPivot(2, $permissions);

        // $role->permissions()->sync($permissions);

        // foreach ($permissions as $item) {
        //     $role->permissions()->updateExistingPivot($role_id, $permissions);
        // }


        // return redirect(route('role.index'));

        return redirect()->route('role.index')->with('success', 'Role saved!');

    }


    public function update()
    {
        // updating role
        $role = Role::find(1);
        $permissions = [7, 9, 14, 16];

        // detach any existing permissions not in the new set
        $role->permissions()->whereNotIn('id', $permissions)->detach();

        // attach any new permissions not already associated with the role
        $role->permissions()->syncWithoutDetaching($permissions);
    }
}
