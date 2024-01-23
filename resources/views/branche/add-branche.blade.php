@extends('layouts.app',['activePage' => 'branche'])
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="card mb4">
            <div class="card-header d-flex justify-content-center pb-0">
                <h6> {{__('Add Branche')}} </h6>
            </div>
           
            <form action="{{url("/branche/add-branche")}}" method="POST">

                <div class="form-group">

                    <label>{{__('Branche Name')}}</label>
                    <input type="text" class="form-control" value="{{ old('name') }}" name="name" placeholder="{{__('Enter_branche_name')}}">
              
                </div>
                @error('name')
                    <span class="custom_error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                
                <div class="form-group">
                    
                    <label>{{__('Branche Adresse')}}</label>
                    <input type="text" class="form-control" name="adresse" value="{{ old('adresse') }}" placeholder="{{__('Enter_branche_adresse')}}">
              
                </div>
                @error('adresse')
                    <span class="custom_error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                
                <div class="form-group">
                    
                    <label>{{__('Phone number')}}</label>
                    <input type="number" class="form-control" name="phone_number" value="{{ old('adresse') }}" placeholder="{{__('Enter_phone_number')}}">
              
                </div>
                @error('phone_number')
                    <span class="custom_error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                
                <button class="btn btn-primary w-100" type="submit">
                    {{__('Add Branche')}}
                </button>
            </form>
        </div>



@endsection