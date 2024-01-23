@extends('layouts.app',['activePage' => 'store'])
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="card mb4">
            <div class="card-header d-flex justify-content-center pb-0">
                <h6> {{__('Edit Store')}} </h6>
            </div>

            <form action="{{url("/store/edit-store/$store->id")}}" method="POST" enctype="multipart/form-data" >

              
        
                <div class="form-group">
                    
                    <label>{{__('Store name')}}</label>
                    <input type="text" class="form-control" value="{{$store->name}}" name="name" placeholder="{{__('Enter_store_name')}}">
              
                </div>
                @error('store')
                    <span class="custom_error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="form-group">
                    
                    <label>{{__('Store adresse')}}</label>
                    <input type="text" class="form-control" value="{{$store->adresse}}"  name="adresse" placeholder="{{__('Enter_store_adresse')}}">
              
                </div>
                @error('adresse')
                    <span class="custom_error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                    
                <div class="form-group">
                    
                    <label>{{__('Municipal license')}}</label>
                    <input type="file" class="form-control" name="municipal_license" placeholder="{{__('Enter_municipal_license')}}">
              
                </div>
                @error('municipal_license')
                    <span class="custom_error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                
                <div class="form-group">
                    
                    <label>{{__('Civil defense license')}}</label>
                    <input type="file" class="form-control" name="civil_defense_license" placeholder="{{__('Enter_civil_defense_license')}}">
              
                </div>
                @error('civil_defense_license')
                    <span class="custom_error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                
                <button class="btn btn-primary w-100" type="submit">
                    {{__('Edit Store')}}
                </button>
            </form>
        </div>



@endsection