@extends('layouts.app',['activePage' => 'extinguisher'])
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="card mb4">
            <div class="card-header d-flex justify-content-center pb-0">
                <h6> {{__('Add Extinguisher')}} </h6>
            </div>

            <form action="{{url("/extinguisher/edit-extinguisher/$extinguisher->id")}}" method="POST">

              
        
                <div class="form-group">
                    
                    <label>{{__('Extinguisher number')}}</label>
                    <input type="text" class="form-control" value="{{$extinguisher->number}}" name="number" placeholder="{{__('Enter_extinguisher_number')}}">
              
                </div>
                @error('number')
                    <span class="custom_error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="form-group">
                    
                    <label>{{__('branche')}}</label>
                    <input type="text" class="form-control" value="{{$extinguisher->branche}}" name="branche" placeholder="{{__('Enter_extinguisher_branche')}}">
              
                </div>
                @error('branche')
                    <span class="custom_error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="form-group">
                    
                    <label>{{__('storehouse')}}</label>
                    <input type="text" class="form-control" value="{{$extinguisher->storehouse}}" name="storehouse" placeholder="{{__('Enter_extinguisher_storehouse')}}">
              
                </div>
                @error('storehouse')
                    <span class="custom_error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror



                <div class="form-group">
                    
                    <label>{{__('Extinguisher end date')}}</label>
                    <input type="date" class="form-control" value="{{$extinguisher->end_date}}" name="end_date" placeholder="{{__('Enter_extinguisher_end_date')}}">
              
                </div>
                @error('end date')
                    <span class="custom_error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                
                
                <button class="btn btn-primary w-100" type="submit">
                    {{__('Edit Extinguisher')}}
                </button>
            </form>
        </div>



@endsection