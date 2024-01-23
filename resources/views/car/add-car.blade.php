@extends('layouts.app',['activePage' => 'car'])
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="card mb4">
            <div class="card-header d-flex justify-content-center pb-0">
                <h6> {{__('Add Car')}} </h6>
            </div>

            <form action="{{url("/car/add-car")}}" method="POST" enctype="multipart/form-data">
                @if ($errors->any())
                <div class="alert alert-primary alert-dismissible show fade">
                    <div class="alert-body">
                        @foreach ($errors->all() as $item)
                        {{ $item }}
                        @endforeach
                    </div>
                </div>
                @endif

                <div class="form-group">
                    
                    <label>{{__('Car plate number')}}</label>
                    <input type="text" class="form-control" name="plate_number" value="{{ old('plate_number') }}" placeholder="{{__('Enter_car_plate_number')}}">
              
                </div>
                @error('plate_number')
                    <span class="custom_error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="form-group">
                    
                    <label>{{__('Car type')}}</label>
                    <input type="text" class="form-control" value="{{ old('type') }}" name="type" placeholder="{{__('Enter_car_type')}}">
              
                </div>
                @error('type')
                    <span class="custom_error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="form-group">
                    
                    <label>{{__('Car meter')}}</label>
                    <select name="car_meter"  id="" class="form-select">
                        <option value="working">{{__('working')}}</option>
                        <option value="disabled">{{__('disabled')}}</option>
                    </select>
                   
              
                </div>
                @error('car_meter')
                    <span class="custom_error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="form-group">
                    
                    <label>{{__('Fuel type')}}</label>
                    <select name="fuel_type" id="" class="form-select">
                        <option value="gasoline">{{__('gasoline')}}</option>
                        <option value="diesel">{{__('diesel')}}</option>
                    </select>
                   
              
                </div>
                @error('fuel_type')
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
                            <label>{{__('Fuel amount in L')}}</label>
                            <input type="number"  class="form-control" value="{{ old('fuel_amount') }}" id="fuel_amount" step="0.01" name="fuel_amount" placeholder="{{__('Enter_fuel_amount')}}">
                        </div>

                        @error('fuel_amount')
                            <span class="col-sm custom_error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="col-sm">
                            <label>{{__('Fuel cost in SR')}}</label>
                            <input type="number" class="form-control" value="{{ old('fuel_cost') }}" step="0.01" id="fuel_cost" name="fuel_cost" placeholder="{{__('Enter_fuel_cost')}}">
                        </div>
                        @error('fuel_cost')
                            <span class="col-sm custom_error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="col-sm">
                            <label>{{__('sum fuel')}}</label>
                            <input type="number" class="form-control" value="{{ old('sum_fuel') }}" step="0.01" id="sum_fuel" name="sum_fuel" >
                        </div>
                    </div>
                </div>

                <div class="form-group container">
                    <div class="row">
                        <div class="col-sm">
                            <label>{{__('Oil expenses')}} :</label>
                        </div>
                        <div class="col-sm">
                            <label>{{__('Oil amount in L')}}</label>
                            <input type="number" class="form-control" value="{{ old('oil_amount') }}" step="0.01" id="oil_amount" name="oil_amount" placeholder="{{__('Enter_oil_amount')}}">
                        </div>
                        @error('oil_amount')
                            <span class="col-sm custom_error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="col-sm">
                            <label>{{__('Oil cost in SR')}}</label>
                            <input type="number" class="form-control" value="{{ old('oil_cost') }}"  step="0.01" id="oil_cost" name="oil_cost" placeholder="{{__('Enter_oil_cost')}}">
                        </div>
                        @error('oil_cost')
                            <span class="col-sm custom_error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="col-sm">
                            <label>{{__('sum oil')}}</label>
                            <input type="number" class="form-control" value="{{ old('sum_oil') }}" step="0.01" id="sum_oil" name="sum_oil" >
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    
                    <label>{{__('Car license')}}</label>
                    <input type="file" class="form-control" name="license" placeholder="{{__('Enter_car_license')}}">
              
                </div>
                @error('license')
                    <span class="custom_error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="form-group">
                    
                    <label>{{__('Car inspection certificate')}}</label>
                    <input type="file" class="form-control" name="inspection_certificate" placeholder="{{__('Enter_car_inspection_certificate')}}">
              
                </div>
                @error('inspection_certificate')
                    <span class="custom_error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                

                <div class="form-group">
                    
                    <label>{{__('Car images')}}</label>
                    <input type="file" class="form-control" name="images[]" placeholder="{{__('Enter_car_images')}}" multiple>
              
                </div>
                @error('images')
                    <span class="custom_error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="form-group">
                    
                    <label>{{__('atonements installation date')}}</label>
                    <input type="date" class="form-control" value="{{ old('atonements') }}" name="atonements" placeholder="{{__('Enter_car_atonements')}}">
              
                </div>
                @error('atonements')
                    <span class="custom_error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                
                <div class="form-group">
                    
                    <label>{{__('battery installation date')}}</label>
                    <input type="date" class="form-control" value="{{ old('battery') }}" name="battery" placeholder="{{__('Enter_car_battery')}}">
              
                </div>
                @error('battery')
                    <span class="custom_error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <button class="btn btn-primary w-100" type="submit">
                    {{__('Add Car')}}
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
        if(num1!=0){
            // Calculate the sum
            var sum = num1 / num2;

            // Set the result in the result input field
            document.getElementById("sum_fuel").value = sum.toFixed(2);
        }else{
            document.getElementById("sum_fuel").value = 0;
        }
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
        if(num1!=0){
            // Calculate the sum
            var sum = num1 / num2;

            // Set the result in the result input field
            document.getElementById("sum_oil").value = sum.toFixed(2);
        }else{
            document.getElementById("sum_oil").value = 0;
        }
        
      } 
    }

    // Attach the calculateSumFuel function to the input change events
    document.getElementById("oil_amount").addEventListener("input", calculateSumOil);
    document.getElementById("oil_cost").addEventListener("input", calculateSumOil);
  </script>
@endsection