@extends('layouts.app',['activePage' => 'computer'])
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="card mb4">
            <div class="card-header d-flex justify-content-center pb-0">
                <h6> {{__('Add Computer')}} </h6>
            </div>

            <form action="{{url("/computer/add-computer")}}" method="POST">

                
                <div class="form-group">

                    <label>{{__('Computer status')}}</label>
                    <select class="form-select" name="status" id="">
                        <option value="1">{{__('working')}}</option>
                        <option value="2">{{__('not working')}}</option>
                       
                    </select>
                    
                </div>
        
                <div class="form-group">
                    
                    <label>{{__('Computer serial number')}}</label>
                    <input type="text" class="form-control" name="serial_number" value="{{ old('serial_number') }}" placeholder="{{__('Enter_computer_serial_number')}}">
              
                </div>
                @error('serial_number')
        <span class="custom_error" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
                
                <div class="form-group">
                    
                    <label>{{__('Computer description')}}</label>
                    <textarea type="text" class="form-control" name="description" value="{{ old('description') }}" placeholder="{{__('Enter_computer_description')}}">
                    </textarea>
                </div>

                <div class="form-group">
                    <label for="">{{__('employee')}}</label>
                    @if($employees->count()!=0)
                    
                    <select name="employee_name" id="" class="form-select">
                        <option value="not found">{{__('not found')}}</option>
                        @foreach($employees as $employee)
                       
                            <option value="{{$employee->name}}">{{$employee->name}}</option>
                          @endforeach
                    </select>
                    @else
                    <input type="text" value="{{__('not found')}}" class="form-control" name="" id="" disabled>
                  @endif
                    
                </div>
                <div class="form-group">
                    <label for="">{{__('branche')}}</label>
                    @if($branches->count()!=0)
                    
                    <select name="branche_name" id="" class="form-select">
                        @foreach($branches as $branche)
                       
                            <option value="{{$branche->name}}">{{$branche->name}}</option>
                          @endforeach
                    </select>
                    @else
                    <input type="text" value="{{__('not found')}}" class="form-control" name="" id="" disabled>
                  @endif
                    
                </div>
                <button class="btn btn-primary w-100" type="submit">
                    {{__('Add Computer')}}
                </button>
            </form>
        </div>



@endsection