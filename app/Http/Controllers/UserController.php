<?php

    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\User;
    use App\Role;
    use App\Permission;
    class UserController extends Controller
    {
        /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function __construct()
        {
            $this->middleware(['auth','is_admin'],['except' => 'profile']);
        }
        
        /**
         * Show the application dashboard.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $users = User::latest()->paginate(100);
            return view('users.index', compact('users'));
        }
        public function create()
        {
            $roles = Role::get();        
            return view('users.create', compact('roles'));
        }
        public function store(Request $request)
        {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6|confirmed',
                'regNo' => 'required|regex:/^[a-zA-Z]{1,2}+\d{2,3}+[\/]+\d{5}+[\/]+[0-1]+[0-7]$/|unique:users',
                'phone' => 'required|regex:/(07)[0-9]{8}/',
                'yos' => 'integer',
                'yoa' => 'integer',
                'gender' => 'string',
                'et'=>'required|string|max:255',
                'ministry'=>'required|string|max:255',
                'in_session'=>'required|string|max:5',
                'roles' => 'required'
            ]);
            $user = User::create($request->except('roles'));
            
            if($request->roles <> ''){
                $user->roles()->attach($request->roles);
            }
            return redirect()->route('users.index')->with('success','User has been created');            
            
        }
        public function edit($id) {
            $user = User::findOrFail($id);
            $roles = Role::get(); 
            return view('users.edit', compact('user', 'roles')); 
        }
        public function update(Request $request, $id) {
            $user = User::findOrFail($id);   
            $this->validate($request, [
                'name'=>'required|max:120',
                'email'=>'required|email|unique:users,email,'.$id,
                'password'=>'required|min:6|confirmed',
                'regNo' => 'required|regex:/^[a-zA-Z]{1,2}+\d{2,3}+[\/]+\d{5}+[\/]+[0-1]+[0-7]$/',
                'phone' => 'required|regex:/(07)[0-9]{8}/',
                'yos' => 'integer',
                'yoa' => 'integer',
                'gender' => 'string',
                'et'=>'required|string|max:255',
                'in_session'=>'required|string|max:5',
            ]);
            $input = $request->except('roles');
            $user->fill($input)->save();
            if ($request->roles <> '') {
                $user->roles()->sync($request->roles);        
            }        
            else {
                $user->roles()->detach(); 
            }
            return redirect()->route('users.index')->with('success',
                 'User successfully updated.');
        }
        public function destroy($id) {
            $user = User::findOrFail($id); 
            $user->delete();
            return redirect()->route('users.index')->with('success',
                 'User successfully deleted.');
        }

       public function profile() {
        $user = User::latest();
        return view('users.profile', compact('user'));
        }
       
       public function editProfile($id) {
            $users = User::find($id);
            return view('user.editProfile', compact('users')); 
        }
    }