<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PermissionsController extends Controller
{

    /**
     * Displaying all the permission.
     * @return View
     */
    public function index(): View
    {
        $data['title'] = 'Permissions';
        $data['permissions'] = Permission::all()->groupBy('model');

        return view('roles.permission', $data);
    }

    /**
     * Storing permission in the table
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'model' => 'required|max:191',
            'description' => 'required|max:191',
        ]);

        if($validator->fails()){

            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);

        }else{

            Permission::create([
                'model' => $request->model,
                'description' => $request->description,
            ]);

            return response()->json([
                'status' => 200,
                'message' => 'Successfully added',
            ]);
        }
    }


    // TODO editing permission
    /**
     * Editing permissions
     *
     * @param Request $request
     * @return void
     */
    public function edit(Request $request)
    {
        # code...
    }

    // TODO deleting permission
    /**
     * Deleting permissions
     *
     * @param Request $request
     * @param Permission $permission
     * @return void
     */
    public function destroy(Request $request, Permission $permission)
    {
        # code...
    }


}
