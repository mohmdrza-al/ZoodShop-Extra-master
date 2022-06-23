<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Categories extends Controller
{
    function readCategories()
    {
        $data = Categories::all();
        return api_res($data,200,'success',true);
    }

    function createCategories(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'parent_id' => 'required'
        ]);

        $data = Categories::create($request->all());
        return api_res($data,200,'success',true);
    }

    function updateCategories(Request $request, $id)
    {
        $data = Categories::find($id);
        $data->update($request->all());
        return api_res($data,200,'success',true);
    }

    function deleteCategories($id)
    {
        $data = Categories::destroy($id);
        return api_res($data,200,'success',true);
    }
}
