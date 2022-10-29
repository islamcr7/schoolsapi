<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use App\Http\Resources\StudentResource as ModuleResource;
use App\Http\Controllers\BaseController as BaseController;

class Controller extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Modules = Module::latest()->paginate(10);

        return $this->sendResponse(ModuleResource::collection($Modules), 'Modules retrieved successfully.');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $Module = Module::create($request->all());
   
        return $this->sendResponse(new ModuleResource($Module), 'Module created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Module  $Module
     * @return \Illuminate\Http\Response
     */
    public function show(Module $Module)
    {
        
        return $this->sendResponse(new ModuleResource($Module), 'Module retrieved successfully.');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Module  $Module
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $Module)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Module  $Module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $Module)
    {

        $Module->update($request->all());   
 
        return $this->sendResponse(new ModuleResource($Module), 'Module updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Module  $Module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $Module)
    {

        $Module->delete();

        return $this->sendResponse([], 'Module deleted successfully.');

    }
}
