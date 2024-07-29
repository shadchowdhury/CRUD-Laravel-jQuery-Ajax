<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ("backend.manageEmployee");
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
        $employee = new Employee;

        $employee->fName = $request->fName;
        $employee->lName = $request->lName;
        $employee->address = $request->address;
        $employee->phone = $request->phone;
        $employee->email = $request->email;
        $employee->status = $request->status;

        $employee->save();

        if($employee){
            return response()->json([
                "msg" => "success"
            ]);
        }
        else{
            return response()->json([
                "msg" => "404"
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $allData = Employee::all();
        if($allData){
            return response()->json([
                "status" => "success",
                "alldata" => $allData
            ]);
        }
        else{
            return response()->json([
                "status" => "405"
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);

        if($employee){
            return response()->json([
                "status" => "success",
                "employee" => $employee
            ]);
        }
        else{
            return response()->json([
                "status" => "407"
            ]);
        }
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
        $employee = Employee::find($id);

        $employee->fName = $request->fName;
        $employee->lName = $request->lName;
        $employee->address = $request->address;
        $employee->phone = $request->phone;
        $employee->email = $request->email;
        $employee->status = $request->status;

        $employee->update();

        if($employee){
            return response()->json([
                "status" => "success"
            ]);
        }
        else{
            return response()->json([
                "status" => "408"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        if($employee){
            return response()->json([
                "status" => "success"
            ]);
        }
        else{
            return response()->json([
                "status" => "406"
            ]);
        }
    }

    //change status value
    public function statusChng($id){
        $employee = Employee::find($id);

        if ($employee->status == 1) {
            $employee->status = 2;
        } else {
            $employee->status = 1;
        }

        $employee->update();

        if($employee){
            return response()->json([
                "status" => "success"
            ]);
        }
    }
}
