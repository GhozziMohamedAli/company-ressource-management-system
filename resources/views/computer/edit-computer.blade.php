@extends('layouts.app',['activePage' => 'computer'])
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="card mb4">
            <div class="card-header d-flex justify-content-center pb-0">
                <h6> {{__('Edit Computer')}} </h6>
            </div>
            <form action="{{url("/computer/edit-computer/$computer->id")}}" method="POST">

                <div class="form-group">

                    <label>{{__('Computer status')}}</label>
                   
                    <select class="form-select" name="status" id="">
                        
                        <option value="1" @if($computer->status==1) selected @endif>{{__('working')}}</option>
                
                        <option value="2" @if($computer->status==2)selected @endif>{{__('not working')}}</option>
                      
                       
                    </select>
                </div>
        
                <div class="form-group">
                    
                    <label>{{__('Computer serial number')}}</label>
                    <input type="text" value="{{$computer->serial_number}}" class="form-control" name="serial_number">
              
                </div>
                
                <div class="form-group">
                    
                    <label>{{__('Computer description')}}</label>
                    <textarea type="text" value="" class="form-control" name="description">
                        {{$computer->description}}
                    </textarea>
              
                </div>

                
                <div class="form-group">
                    <label for="">{{__('employee')}}</label>
                    @if($employees->count()!=0)
                    
                    <select name="employee_name" id="" class="form-select">
                       <option value="not found">{{__('not found')}}</option>
                        @foreach($employees as $employee)
                       
                            <option value="{{$employee->name}}"  @if($computer->employee == $employee) selected @endif>{{$employee->name}}</option>
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
                       
                            <option value="{{$branche->name}}" @if($computer->branche == $branche) selected @endif>{{$branche->name}}</option>
                          @endforeach
                    </select>
                    @else
                    <input type="text" value="{{__('not found')}}" class="form-control" name="" id="" disabled>
                  @endif
                   
                    
                </div>

                <button class="btn btn-primary w-100" type="submit">
                    {{__('Edit Computer')}}
                </button>
            </form>
        </div>



@endsection