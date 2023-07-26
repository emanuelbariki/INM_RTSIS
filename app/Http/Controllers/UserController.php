<?php

namespace App\Http\Controllers;

use App\Events\UserPassword;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Support\Str;
use App\Exports\UsersExport;
use App\Models\UserPassword as ModelUserPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        // $this->authorize('Can view users');

        $button = [
            'link' => route('users.create'),
            'name' => 'Add User'
        ];

        $data['title'] = 'Users';
        $data['subTitle'] = 'List';
        $data['button'] = json_decode(json_encode($button));
        $data['users'] = User::with('role')->get();

        return view('users.index', $data);
    }

    public function users()
    {
        $data = DB::table('users')->select('id','firstname', 'middlename', 'lastname', 'email', 'active')->get();

        return response()->json($data);
    }


    public function create()
    {
        $data['title'] = 'User Registration';
        $data['subTitle'] = 'Create';
        $data['roles'] = Role::select('id', 'name')->orderBy('name')->get();

        return view('users.add', $data);
    }

    public function edit(Request $request, User $id)
    {
        dd($id);
    }


    /**
     * Send mail todo
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'firstname' => ['required', 'string', 'max:255'],
            'middlename' => ['string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'role' => ['required'],
            // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $password = Str::random(8, 'mixed');

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);

        }else{

            $user = User::create([
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'role_id' => $request->role,
                'password' => Hash::make($password),
                'password_reset' => true,
                'active' => true,
            ]);

            ModelUserPassword::create([
                'user_id' => $user->id,
                'password' => $user->password
            ]);

            $data['password'] = $password;
            $data['email'] = $request->email;
            $data['firstname'] = $request->firstname;
            $data['lastname'] = $request->lastname;

            event(new UserPassword($data));

            return response()->json([
                'status' => 200,
                'message' => 'Successfully added',
            ]);
        }
    }
}
