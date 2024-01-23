<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;

class StoreController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::all();
        return view('store.store',['stores'=>$stores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('store.add-store');
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
           
        ]);
        $data = $request->all();
        if($request->file('municipal_license')){
            $municipal_license = $request->file('municipal_license')->store('\municipal_license\upload',['disk' => 'my_files']);
            $data["municipal_license"]=$municipal_license;
        }
        
        if($request->file('civil_defense_license')){
            $civil_defense_license = $request->file('civil_defense_license')->store('\civil_defence_license\upload',['disk' => 'my_files']);
            $data["civil_defense_license"]=$civil_defense_license;
        }

        Store::create($data);

        return redirect('/store');
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
        $store = Store::find($id);  
     
        return view("store.edit-store",['store'=>$store]);
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
        ]);

        $old_ins=Store::find($id);
        $data = $request->all();

        if($request->file('municipal_license')){
            $municipal_license = $request->file('municipal_license')->store('\municipal_license\upload',['disk' => 'my_files']);
            $data["municipal_license"]=$municipal_license;
        }
        
       if($request->file('civil_defense_license')){
        $civil_defense_license = $request->file('civil_defense_license')->store('\civil_defense_license\upload',['disk' => 'my_files']);
        $data["civil_defense_license"]=$civil_defense_license;
    }
        $old_ins->update($data);

        return redirect('/store');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Store::destroy($id);
        return response(['success' => true]);
    }

    public function license_pdf(Request $request){
        $path = public_path().$request->path ;
        return response()->file($path);
    }

    public function civil_pdf(Request $request){
        $path = public_path().$request->path ;
        return response()->file($path);
    }
}
