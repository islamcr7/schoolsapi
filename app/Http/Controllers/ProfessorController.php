<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;
use App\Http\Resources\StudentResource as ProfessorResource;
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
        $Professors = Professor::latest()->paginate(10);

        return $this->sendResponse(ProfessorResource::collection($Professors), 'Professors retrieved successfully.');

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
        
        $Professor = Professor::create($request->all());
   
        return $this->sendResponse(new ProfessorResource($Professor), 'Professor created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Professor  $Professor
     * @return \Illuminate\Http\Response
     */
    public function show(Professor $Professor)
    {
        
        return $this->sendResponse(new ProfessorResource($Professor), 'Professor retrieved successfully.');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Professor  $Professor
     * @return \Illuminate\Http\Response
     */
    public function edit(Professor $Professor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Professor  $Professor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Professor $Professor)
    {

        $Professor->update($request->all());   
 
        return $this->sendResponse(new ProfessorResource($Professor), 'Professor updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Professor  $Professor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Professor $Professor)
    {

        $Professor->delete();

        return $this->sendResponse([], 'Professor deleted successfully.');

    }
}
