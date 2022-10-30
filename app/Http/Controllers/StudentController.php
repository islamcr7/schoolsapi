<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Resources\StudentResource as StudentResource;
use App\Http\Controllers\BaseController as BaseController;

class StudentController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    {
        if ($request->has('search')){
            // Get the search value from the request
            $search = $request->input('search');

            $Students = Student::query()
            ->where('firstName', 'LIKE', "%{$search}%")
            ->orWhere('lastName', 'LIKE', "%{$search}%")
            ->get();

        }else{

            $Students = Student::latest()->withCount()->paginate(10);
            $studentsnumber=$Students->count();

        }




        return $this->sendResponse(StudentResource::collection($Students), 'Students retrieved successfully.',$studentsnumber);

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
        
        $Student = Student::create($request->all());
   
        return $this->sendResponse(new StudentResource($Student), 'Student created successfully.',1);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $Student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $Student)
    {
        
        return $this->sendResponse(new StudentResource($Student), 'Student retrieved successfully.',1);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $Student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $Student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $Student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $Student)
    {

        $Student->update($request->all());   
 
        return $this->sendResponse(new StudentResource($Student), 'Student updated successfully.',1);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $Student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $Student)
    {

        $Student->delete();

        return $this->sendResponse([], 'Student deleted successfully.',1);

    }
}
