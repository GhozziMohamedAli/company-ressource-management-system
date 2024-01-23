@extends('layouts.app',['activePage' => 'employee'])
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="card mb4">
            <div class="card-header d-flex justify-content-center pb-0">
                <h6>{{ __('Edit Employee') }}</h6>
            </div>
            <form action="{{url("/employee/edit-employee/$emp->id")}}" method="POST">
            
                <div class="form-group">
                    <label class="form-control-label">{{__('status')}}</label>
                    <select name="status" class="form-select" aria-label="Default select example">
                        <option value="1" @if($emp->status==1) selected @endif>{{__('working')}}</option>
                        <option value="2" @if($emp->status==0) selected @endif >{{__('vacation')}}</option>
                      </select>
                </div>

                <div class="form-group">
                    <label class="form-control-label">{{__('name')}}</label>
                    <input type="string" value="{{$emp->name}}" class="form-control" name="name" placeholder={{__('Enter_name')}}>
                </div>
                @error('name')
                <span class="custom_error" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <div class="form-group">

                    <label class="form-control-label">{{__('Birth date')}}</label>
                    <input type="date" value="{{$emp->birth_date}}" class="form-control" name="birth_date" id="">

                </div>
                @error('birth_date')
                <span class="custom_error" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                
                <div class="form-group">
                    <label class="form-control-label">{{__('Profession')}}</label>
                    <input type="string" value="{{$emp->profession}}" class="form-control" name="profession" placeholder={{__('Enter_profession')}}>
                </div>
                @error('profession')
                <span class="custom_error" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <div class="form-group">
                    <label class="form-control-label">{{__('Phone number')}}</label>
                    <input type="number" value="{{$emp->phone_number}}" class="form-control" name="phone_number" placeholder={{__('Enter_phone_number')}}>
                </div>
                @error('phone_number')
                <span class="custom_error" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <div class="form-group">

                    <label class="form-control-label">{{__('Start of employment')}}</label>
                    <input type="date" value="{{$emp->employment_start}}" class="form-control" name="employment_start" >

                </div>
                @error('employment_start')
                <span class="custom_error" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <div class="form-group">
                    <label class="form-control-label">{{__('Start of employment in Hijri')}}</label>
                    <input type="text" value="{{$emp->hijri_employment_start}}" class="form-control hijri-date-input " name="hijri_employment_start" >
                </div>


                <div class="form-group">

                    <label class="form-control-label">{{__('Bank account number')}}</label>
                    <input type="number" value="{{$emp->bank_account_number}}" class="form-control " name="bank_account_number" >

                </div>
                @error('bank_account_number')
                <span class="custom_error" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            <div class="form-group">

                <label class="form-control-label">{{__('Medical insurance')}}</label>
                <input type="text" value="{{$emp->medical_insurance}}" class="form-control " name="medical_insurance" >

            </div>
            @error('medical_insurance')
                <span class="custom_error" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        
        <div class="form-group">

            <label class="form-control-label">{{__('Driving license')}}</label>
            <input type="text" value="{{$emp->medical_insurance}}" class="form-control " name="driving_license" >

        </div>
        @error('driving_license')
            <span class="custom_error" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

                <div class="form-group">
                    <label class="form-control-label">{{__('Passport Number')}}</label>
                    <input type="string" value="{{$emp->passport_number}}" class="form-control" name="passport_number" placeholder={{__('Enter_Passport_Number')}}>
                </div>
                @error('passport_number')
                <span class="custom_error" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <div class="form-group">
            
                    <label class="form-control-label">{{__('Passport End Date')}}</label>
                    <input type="date" value="{{$emp->passport_end_date}}" class="form-control" name="passport_end_date" >

                </div>
                @error('passport_end_date')
                <span class="custom_error" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <div class="form-group">

                    <label class="form-control-label">{{__('Residency Number')}}</label>
                    <input type="number" value="{{$emp->residency_number}}" class="form-control" name="residency_number" placeholder={{__('Enter_Residency_Number')}}>
                
                </div>
                @error('residency_number')
                <span class="custom_error" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <div class="form-group">

                    <label class="form-control-label">{{__('Residency End Date')}}</label>
                    <input type="date" value="{{$emp->residency_end_date}}" class="form-control" name="residency_end_date" >
                    
                </div>
                @error('residency_end_date')
                <span class="custom_error" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              
                    <div class="form-group">
                        <label class="form-control-label">{{__('on Branche')}}</label>
                        @if($branches->count()!=0)
                        
                        <select name="branche_name" id="" class="form-select">
                            @if($emp->branche)
                            <option value="{{$emp->branche->name}}" selected>{{$emp->branche->name}}</option>
                            @endif
                            @foreach($branches as $branche)
                                <option value="{{$branche->name}}">{{$branche->name}}</option>
                            @endforeach
                        </select>
                        @else
                            <input type="text" value="{{__('not found')}}" class="form-control" name="" id="" disabled>
                        @endif
                        
                    </div>

                <button class="btn btn-primary w-100" type="submit">
                    {{__('Edit')}}
                </button>
                
        
            </form>
        </div>

        <script>
          $(".hijri-date-input").hijriDatePicker({
            
            hijri: true,
            isRTL:true
          })
        </script>

@endsection