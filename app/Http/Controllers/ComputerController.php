<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;
use App\Models\Employee;
use App\Models\Branche;


class ComputerController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $computer = Computer::All();
        $employee = Employee::All();
        return view("computer.computer",['computers' => $computer,'employees'=>$employee]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $employees= Employee::all();
        $branches= Branche::all();
        return view("computer.add-computer",['employees'=>$employees , 'branches'=>$branches]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required',
            'serial_number' => 'required',
            
        ]);
        $data=$request->all();
        unset($data["employee_name"]);
        $emp_name=$request->employee_name;

        $emp = Employee::where('name',$emp_name)->first();

        $computer=Computer::create($data);
        $computer->employee()->associate($emp)->save();

        return redirect('/computer');
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
        $computer = Computer::find($id);
        $employee = Employee::all();
        $branches = Branche::all();
        
        return view("computer.edit-computer",['computer'=>$computer,'employees'=>$employee,'branches'=>$branches]);
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
        $request->validate([
            'status' => 'required',
            'serial_number' => 'required'
        ]);
        $old_computer = Computer::find($id);

        $data=$request->all();
        
        unset($data["employee_name"]);
        $emp_name=$request->employee_name;

        $emp = Employee::where('name',$emp_name)->first();
        $old_computer->update($data);
;
        $old_computer->employee()->associate($emp)->save();

        return redirect('/computer');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Computer::destroy($id);
        return response(['success' => true]);
    }
}
