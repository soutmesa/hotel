<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Role;
use App\Repositories\RoleRepository;

class RoleController extends Controller
{
    /**
     * @var $role
     */
    private $role;

    /**
     * TaskController constructor.
     *
     * @param App\Repositories\RoleRepository $role
     */
    public function __construct(RoleRepository $role) 
    {
        $this->role = $role;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $roles = Role::get();
        // return view('roles.index', ['roles' => $roles]);
        return view('roles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        // $datas = $request->all();
        // Role::create($datas);
        // return redirect('roles')->withMessage('Role has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    // methods implements from interface

    public function getAllRoles()
    {
        $roles = $this->role->getAll();
        return json_encode($roles);
    }

    public function getOneRole($id)
    {
        $role = $this->role->getById($id);
        return json_encode($role);
    }

    /**
     * Store a role
     *
     * @var array $attributes
     *
     * @return mixed
     */
    public function postStoreRole(Request $request)
    {
        $datas = $request->all();
        $getId = $this->role->create($datas)->id;
        $role = $this->role->getById($getId);
        return json_encode($role);
    }

    /**
     * Update a role
     *
     * @var integer $id
     * @var array   $attributes
     *
     * @return mixed
     */
    public function updateRole($id, RoleUpdateRequest $request)
    {
        $datas = $request->all();
        $this->role->update($id, $datas);

        $role = $this->role->getById($id);
        return json_encode($role);
    }

    /**
     * Delete a role
     *
     * @var integer $id
     *
     * @return mixed
     */
    public function deleteRole($id)
    {
        if( $this->role->delete($id) )
        {
            return 'success';
        }else{
            return 'fail';
        }
    }
}
