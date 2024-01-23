@extends('layouts.app',['activePage' => 'car'])
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="card mb4">
            <div class="card-header d-flex justify-content-center pb-0">
                <h6> {{__('Add Car')}} </h6>
            </div>

            <form action="{{url("/car/edit-car/$car->id")}}" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    
                    <label>{{__('Car meter')}}</label>
                    <select name="car_meter"  id="" class="form-select">
                        <option value="working" @if($car->car_meter=="working") selected @endif>{{__('working')}}</option>
                        <option value="disbaled" @if($car->car_meter=="disabled") selected @endif>{{__('disabled')}}</option>
                    </select>
                   
              
                </div>
                @error('car_meter')
                    <span class="custom_error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="form-group container">
                    <div class="row">
                        <div class="col-sm">
                            <label>{{__('Fuel expenses')}} :</label>
                        </div>
                        <div class="col-sm">
                            <label>{{__('Add Fuel amount in L')}}</label>
                            <input type="number" class="form-control" id="fuel_amount" step="0.01" name="fuel_amount" placeholder="{{__('Enter_fuel_amount')}}">
                        </div>
                        @error('fuel_amount')
                            <span class="col-sm custom_error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="col-sm">
                            <label>{{__('Add Fuel cost in SR')}}</label>
                            <input type="number" class="form-control" id="fuel_cost" step="0.01" name="fuel_cost" placeholder="{{__('Enter_fuel_cost')}}">
                        </div>
                        @error('fuel_cost')
                            <span class="col-sm custom_error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="col-sm">
                            <label>{{__('sum fuel in L/SR')}}</label>
                            <input type="number" class="form-control"  id="sum_fuel" step="0.01" name="sum_fuel" placeholder="{{__('Enter_fuel_cost')}}" >
                        </div>
                    </div>
                </div>

                <div class="form-group container">
                    <div class="row">
                        <div class="col-sm">
                            <label>{{__('Oil expenses')}} :</label>
                        </div>
                        <div class="col-sm">
                            <label>{{__('Add Oil amount in L')}}</label>
                            <input type="number" class="form-control" id="oil_amount" step="0.01" name="oil_amount" placeholder="{{__('Enter_oil_amount')}}">
                        </div>
                        @error('oil_amount')
                            <span class="col-sm custom_error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="col-sm">
                            <label>{{__('Add Oil cost in SR')}}</label>
                            <input type="number" class="form-control" id="oil_cost" step="0.01" name="oil_cost" placeholder="{{__('Enter_oil_cost')}}">
                        </div>
                        @error('oil_cost')
                            <span class="col-sm custom_error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="col-sm">
                            <label>{{__('sum oil in L/SR')}}</label>
                            <input type="number" class="form-control" id="sum_oil" step="0.01"  name="sum_oil" placeholder="{{__('Enter_fuel_cost')}}" >
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    
                    <label>{{__('change car license')}}</label>
                    <input type="file" class="form-control" value="{{$car->license}}" name="license" placeholder="{{__('Enter_car_license')}}">
                    
                </div>
                @error('license')
                    <span class="custom_error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="form-group">
                    
                    <label>{{__('change car inspection certificate')}}</label>
                    <input type="file" class="form-control" name="inspection_certificate" placeholder="{{__('Enter_car_inspection_certificate')}}">
                </div>
                @error('inspection_certificate')
                    <span class="custom_error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                
                <div class="form-group">
                    
                    <label>{{__('atonements installation date')}}</label>
                    <input type="date" class="form-control" name="atonements" value="{{$car->atonements}}" placeholder="{{__('Enter_car_atonements')}}">
              
                </div>
                @error('atonements')
                    <span class="custom_error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                
                <div class="form-group">
                    
                    <label>{{__('battery installation date')}}</label>
                    <input type="date" class="form-control" name="battery" value="{{$car->battery}}" placeholder="{{__('Enter_car_battery')}}">
              
                </div>
                @error('battery')
                    <span class="custom_error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

               

                <button class="btn btn-primary w-100" type="submit">
                    {{__('Edit Car')}}
                </button>
            </form>
        </div>
        <script>
            function calculateSumFuel() {
                 // Get the values from the input fields
                 var fuel_amount = document.getElementById("fuel_amount").value;
                 var fuel_cost = document.getElementById("fuel_cost").value;
           
                 // Convert the input values to numbers
                 var num1 = parseFloat(fuel_amount);
                 var num2 = parseFloat(fuel_cost);
           
                 // Check if the conversion is successful
                 if (!isNaN(num1) && !isNaN(num2)) {
                   // Calculate the sum
                   var sum = num1 / num2;
           
                   // Set the result in the result input field
                   document.getElementById("sum_fuel").value = sum.toFixed(2);
                 } 
               }
           
               // Attach the calculateSumFuel function to the input change events
               document.getElementById("fuel_amount").addEventListener("input", calculateSumFuel);
               document.getElementById("fuel_cost").addEventListener("input", calculateSumFuel);
           
           
               function calculateSumOil() {
                 // Get the values from the input fields
                 var oil_amount = document.getElementById("oil_amount").value;
                 var oil_cost = document.getElementById("oil_cost").value;
           
                 // Convert the input values to numbers
                 var num1 = parseFloat(oil_amount);
                 var num2 = parseFloat(oil_cost);
           
                 // Check if the conversion is successful
                 if (!isNaN(num1) && !isNaN(num2)) {
                   // Calculate the sum
                   var sum = num1 / num2;
           
                   // Set the result in the result input field
                   document.getElementById("sum_oil").value = sum.toFixed(2);
                 } 
               }
           
               // Attach the calculateSumFuel function to the input change events
               document.getElementById("oil_amount").addEventListener("input", calculateSumOil);
               document.getElementById("oil_cost").addEventListener("input", calculateSumOil);
             </script>


@endsection