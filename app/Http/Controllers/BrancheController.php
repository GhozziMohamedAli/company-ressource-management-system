<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branche;

class BrancheController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branche = Branche::All();
        return view("branche.branche",['branches' => $branche]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("branche.add-branche");
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
                        'name' => 'required',
                        'adresse' => 'required',
                        'phone_number' => 'bail|required|numeric'
                    ]);

  
        $data = $request->all();
        Branche::create($data);

        return redirect('/branche');
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
        $branche = Branche::find($id);
        
        return view("branche.edit-branche",['branche'=>$branche]);
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
            'name' => 'required',
            'adresse' => 'required',
            'phone_number' => 'bail|required|numeric'
        ]);
        
        $old_branche = Branche::find($id);

        $new_branche = $request->all();

        $old_branche->update($new_branche);

        return redirect('/branche');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Branche::destroy($id);
        return response(['success' => true]);
    }
}
