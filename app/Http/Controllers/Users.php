<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Users extends Controller
{
    function readUsers()
    {
        $data = Categories::all();
        return api_res($data,200,'success',true);
    }

    function createUsers(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'birthday' => 'required',
            'gender' => 'required'
        ]);

        $data = Categories::create($request->all());
        return api_res($data,200,'success',true);
    }

    function updateUsers(Request $request, $id)
    {
        $data = Categories::find($id);
        $data->update($request->all());
        return api_res($data,200,'success',true);
    }

    function deleteUsers($id)
    {
        $data = Categories::destroy($id);
        return api_res($data,200,'success',true);
    }
}
