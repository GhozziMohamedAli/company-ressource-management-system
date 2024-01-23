@extends('layouts.app',['activePage' => 'institution'])
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="card mb4">
            <div class="card-header d-flex justify-content-center pb-0">
                <h6> {{__('Add Institution')}} </h6>
            </div>

            <form action="{{url("/institution/add-institution")}}" method="POST">

              
        
                <div class="form-group">
                    
                    <label>{{__('Institution name')}}</label>
                    <input type="text" class="form-control" value="{{ old('name') }}" name="name" placeholder="{{__('Enter_institution_name')}}">
              
                </div>
                @error('name')
                    <span class="custom_error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                
                
                <button class="btn btn-primary w-100" type="submit">
                    {{__('Add Institution')}}
                </button>
            </form>
        </div>



@endsection