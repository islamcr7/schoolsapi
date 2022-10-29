<?php

namespace App\Http\Controllers;

use App\Models\Slot;
use Illuminate\Http\Request;
use App\Http\Resources\StudentResource as SlotResource;
use App\Http\Controllers\BaseController as BaseController;

class SlotController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Slots = Slot::latest()->paginate(10);

        return $this->sendResponse(SlotResource::collection($Slots), 'Slots retrieved successfully.');

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
        
        $Slot = Slot::create($request->all());
   
        return $this->sendResponse(new SlotResource($Slot), 'Slot created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slot  $Slot
     * @return \Illuminate\Http\Response
     */
    public function show(Slot $Slot)
    {
        
        return $this->sendResponse(new SlotResource($Slot), 'Slot retrieved successfully.');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slot  $Slot
     * @return \Illuminate\Http\Response
     */
    public function edit(Slot $Slot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slot  $Slot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slot $Slot)
    {

        $Slot->update($request->all());   
 
        return $this->sendResponse(new SlotResource($Slot), 'Slot updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slot  $Slot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slot $Slot)
    {

        $Slot->delete();

        return $this->sendResponse([], 'Slot deleted successfully.');

    }
}
