<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;
use Illuminate\Http\Request;

use App\Models\Car;
use App\Models\CarImages;
use Storage;

class CarController extends Controller
{
          /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $car = Car::All();
        return view("car.car",['cars' => $car]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("car.add-car");
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
            'plate_number' => 'required',
            'type' => 'required',
            'fuel_type' => 'required',
            'fuel_amount' => 'bail|required|numeric',
            'fuel_cost' => 'bail|required|numeric',
            'sum_fuel' => 'bail|required|numeric',
            'oil_amount' => 'bail|required|numeric',
            'oil_cost' => 'bail|required|numeric',
            'sum_oil' => 'bail|required|numeric',
            'atonements' => 'required|date',
            'battery' => 'required|date',
            'images' => 'required'
            
        ]);
        $data = $request->all();
        if($request->file('license')){
            $license = $request->file('license')->store('\license\upload',['disk' => 'my_files']);
            $data["path_license"]=$license;
        }
        
       if($request->file('inspection_certificate')){
        $inspection_certificate = $request->file('inspection_certificate')->store('\inspection_certificate\upload',['disk' => 'my_files']);
        $data["path_inspection"]=$inspection_certificate;
    }

        $car = Car::create($data);

         
         if($request->file('images') ){
            foreach ($request->file('images') as $imagefile) {

                $image = new CarImages;
               
                $path_image = $imagefile->store('/images/upload', ['disk' =>   'my_files']);
                
                $image->url = $path_image;
    
                $image->car()->associate($car)->save();
                $image->save();
                $car->carImage()->save($image);
              }
    
         }

        return redirect('/car');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Car::find($id);
        $car["locale"]=session()->get('locale');
        return response(['success' => true , 'data' => $car]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::find($id);
        return view("car.edit-car",['car'=>$car]);
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


        $old_car = Car::find($id);
        $old_car->car_meter=$request->car_meter;

        if($request->fuel_amount and $request->fuel_cost){
            
        $request->validate([
            
            'fuel_amount' => 'numeric',
            'fuel_cost' => 'numeric',
        ]);
            $fuel_amount = $request->fuel_amount;
            $fuel_cost = $request->fuel_cost;
    
            $sum_fuel = $request->sum_fuel;
    
            
           $old_car->fuel_amount = $old_car->fuel_amount + $fuel_amount;
       
            $old_car->fuel_cost = $old_car->fuel_cost + $fuel_cost ;
            
            $old_car->sum_fuel = $old_car->sum_fuel + $sum_fuel ;
        }
       
       
         if($request->oil_amount and $request->oil_cost){
            
        $request->validate([
            
            
            'oil_amount' => 'numeric',
            'oil_cost' => 'numeric',
            
        ]);
            $oil_amount = $request->oil_amount;
            $oil_cost = $request->oil_cost;
    
            $sum_oil = $request->sum_oil;
            
            $old_car->oil_amount = $old_car->oil_amount + $oil_amount ;
            
            $old_car->oil_cost = $old_car->oil_cost + $oil_cost ;
            
            $old_car->sum_oil = $old_car->sum_oil + $sum_oil ;
   
           
         }
        
        
        
         if($request->file('license')){
            $old_car->path_license =$request->file('license')->store('\license\upload',['disk' => 'my_files']);
         }
         if($request->file('inspection_certificate')){
            $old_car->path_inspection =$request->file('inspection_certificate')->store('\inspection_certificate\upload',['disk' => 'my_files']);
         }
         
         

        $old_car->save();

        return redirect('/car');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Car::destroy($id);
        return response(['success' => true]);
    }

    public function license_pdf(Request $request){
        $path = public_path().$request->path ;
        return response()->file($path);
    }

    public function inspection_pdf(Request $request){
        $path = public_path().$request->path ;
        return response()->file($path);
    }

    public function show_image($id){

        $car = Car::find($id);
        
        $data = $car->carImage;
        
        return response(['success' => true , 'data' => $data]);
    }
}
