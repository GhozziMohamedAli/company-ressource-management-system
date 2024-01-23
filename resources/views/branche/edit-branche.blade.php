@extends('layouts.app',['activePage' => 'branche'])
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="card mb4">
            <div class="card-header d-flex justify-content-center pb-0">
                <h6> {{__('Edit Branche')}} </h6>
            </div>
            <form action="{{url("/branche/edit-branche/$branche->id")}}" method="POST">

                <div class="form-group">

                    <label>{{__('Branche Name')}}</label>
                    <input type="text" value="{{$branche->name}}" class="form-control" name="name" placeholder="{{__('Enter_branche_name')}}">
              
                </div>
        
                <div class="form-group">
                    
                    <label>{{__('Branche Adresse')}}</label>
                    <input type="text" value="{{$branche->adresse}}" class="form-control" name="adresse" placeholder="{{__('Enter_branche_name')}}">
              
                </div>
                
                <div class="form-group">
                    
                    <label>{{__('Phone number')}}</label>
                    <input type="number" value="{{$branche->phone_number}}" class="form-control" name="phone_number" placeholder="{{__('Enter_branche_name')}}">
              
                </div>

                <button class="btn btn-primary w-100" type="submit">
                    {{__('Edit Branche')}}
                </button>
            </form>
        </div>



@endsection