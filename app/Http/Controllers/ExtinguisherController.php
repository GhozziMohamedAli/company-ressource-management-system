<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Extinguisher;

class ExtinguisherController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $extinguisher = Extinguisher::All();
       
        return view("safety.extinguisher.extinguisher",['extinguishers' => $extinguisher]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
        return view("safety.extinguisher.add-extinguisher");
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
            'number' => 'required',
            'branche' => 'required',
            'storehouse' => 'required',
            'end_date' => 'bail|required|date',
        ]);
        $data=$request->all();
        
        $extinguisher=Extinguisher::create($data);
       

        return redirect('/extinguisher');
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
        $extinguisher = Extinguisher::find($id);

        return view("safety.extinguisher.edit-extinguisher",['extinguisher'=>$extinguisher]);
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
            'number' => 'required',
            'branche' => 'required',
            'storehouse' => 'required',
            'end_date' => 'bail|required|date',
        ]);

        $old_extinguisher = Extinguisher::find($id);

        $new_extinguisher = $request->all();

        $old_extinguisher->update($new_extinguisher);

        return redirect('/extinguisher');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Extinguisher::destroy($id);
        return response(['success' => true]);
    }
}
