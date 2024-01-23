<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employee;
use App\Models\Branche;

class EmployeeController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::All();
        return view("employee.employee",['employee'=>$employee]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches=Branche::all();
        return view("employee.add-employee",['branches'=>$branches]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate( [ 
            'status' => 'required',
            'name' => 'required',
            'birth_date' => 'bail|required|date',
            'profession' => 'required',
            'phone_number' => 'bail|required|numeric',
            'employment_start' => 'bail|required|date',
            'bank_account_number' =>'bail|required|numeric',
            
            'passport_number' => 'required',
            'passport_end_date' => 'bail|required|date',
            'residency_number' => 'required',
            'residency_end_date' => 'bail|required|date'
            
        ]);

        $data=$request->all();
        unset($data["branche_name"]);
        if($request->file('medical_insurance')){
            $license = $request->file('medical_insurance')->store('\medical_insurance\upload',['disk' => 'my_files']);
            $data["medical_insurance"]=$license;
        }
        
       if($request->file('driving_license')){
        $inspection_certificate = $request->file('driving_license')->store('\driving_license\upload',['disk' => 'my_files']);
        $data["driving_license"]=$inspection_certificate;
    }

        $branch_name = $request->branche_name;
        $branche = Branche::where('name',$branch_name)->first();
 
        $employee = Employee::create($data);
        if($branche){
        $employee->branche()->associate($branche)->save();

        $branche = $branche->employees()->save($employee);
    }
        
  
        return redirect("/employee")->with('msg','added successfully !');
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Employee::find($id);
        return response(['success'=> true,'data'=> $data]);
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
        $branches=Branche::all();
        
        return view("employee.edit-employee",['emp'=>$employee,'branches'=>$branches]);
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
        $request->validate( [ 
            'status' => 'required',
            'name' => 'required',
            'birth_date' => 'bail|required|date',
            'profession' => 'required',
            'phone_number' => 'bail|required|numeric',
            'employment_start' => 'bail|required|date',
            'bank_account_number' =>'bail|required|numeric',
            
            'passport_number' => 'required',
            'passport_end_date' => 'bail|required|date',
            'residency_number' => 'required',
            'residency_end_date' => 'bail|required|date',
            
        ]);

        $old_emp = Employee::find($id);

        $new_emp = $request->all();

       

        if($request->file('medical_insurance')){
            $license = $request->file('medical_insurance')->store('\medical_insurance\upload',['disk' => 'my_files']);
            $new_emp["medical_insurance"]=$license;
        }
        
       if($request->file('driving_license')){
        $inspection_certificate = $request->file('driving_license')->store('\driving_license\upload',['disk' => 'my_files']);
        $new_emp["driving_license"]=$inspection_certificate;
    }
    $old_emp->update($new_emp);
        return redirect('/employee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        Employee::destroy($id);
        return response(['success' => true]);
    }
    public function medical_pdf(Request $request){
        $path = public_path().$request->path ;
        return response()->file($path);
    }

    public function driving_pdf(Request $request){
        $path = public_path().$request->path ;
        return response()->file($path);
    }
}
