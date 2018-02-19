<?php

namespace Vadiasov\RolesAdmin\Http;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active = 'roles';
        $user   = Auth::user();
        $roles  = Role::all();
        
        return view('roles-admin::admin.roles.index', compact(
            'roles',
            'active',
            'user'
        ));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = 'roles';
        $user   = Auth::user();
        
        return view('roles-admin::admin.roles.create', compact(
            'active',
            'user'
        ));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param \Vadiasov\RolesAdmin\Http\RoleRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $role = new Role([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);
        
        $role->save();
        
        return redirect(route('admin/roles'))->with('status', 'New Role has been created!');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $active = 'roles';
        $user   = Auth::user();
        $role   = Role::whereId($id)->first();
        
        return view('roles-admin::admin.roles.edit', compact(
            'active',
            'user',
            'role'
        ));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param \Vadiasov\RolesAdmin\Http\RoleRequest $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id)
    {
        $role = Role::whereId($id)->first();
        
        $role->name = $request->name;
        $role->slug = $request->slug;
    
        $role->save();
    
        return redirect(route('admin/roles'))->with('status', 'The Role has been edited!');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::whereId($id);
    
        $role->delete();
    
        return redirect(route('admin/roles'))->with('status', 'The Role has been deleted!');
    }
    
    public function showUser()
    {
        return 'User from controller';
    }
}
