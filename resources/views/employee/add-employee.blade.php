@extends('layouts.app',['activePage' => 'employee'])
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="card mb4">
            <div class="card-header d-flex justify-content-center pb-0">
                <h6>{{ __('Add Employee') }}</h6>
            </div>
            <form action="{{url("/employee/add-employee")}}" method="POST" enctype="multipart/form-data">
            
                <div class="form-group">
                    <label class="form-control-label">{{__('status')}}</label>
                    <select name="status" class="form-select" aria-label="Default select example">
                        <option value="1" selected>{{__('working')}}</option>
                        <option value="2">{{__('vacation')}}</option>
                      </select>
                      
                </div>

                <div class="form-group">
                    <label class="form-control-label">{{__('name')}}</label>
                    <input type="string" class="form-control" name="name" value="{{ old('name') }}"  class="@error('name') is-invalid @enderror" placeholder={{__('Enter_name')}}>
                    @error('name')
                    <span class="custom_error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">

                    <label class="form-control-label">{{__('Birth date')}}</label>
                    <input type="date" max="" class="form-control" class="@error('birth_date') is-invalid @enderror"  name="birth_date" value="{{ old('birth_date') }}" id="">

                </div>
                @error('birth_date')
                    <span class="custom_error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                
                <div class="form-group">
                    <label class="form-control-label">{{__('Profession')}}</label>
                    <input type="string" class="form-control" class="@error('profession') is-invalid @enderror" name="profession" value="{{ old('profession') }}" placeholder={{__('Enter_profession')}}>
                </div>
                    @error('profession')
                        <span class="custom_error" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror               
                <div class="form-group">
                    <label class="form-control-label">{{__('Phone number')}}</label>
                    <input type="number" class="form-control" class="@error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" placeholder={{__('Enter_phone_number')}}>
                </div>
                    @error('phone_number')
                        <span class="custom_error" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                <div class="form-group">

                    <label class="form-control-label">{{__('Start of employment')}}</label>
                    <input type="date"  class="form-control  w-100 @error('employment_start') is-invalid @enderror" name="employment_start" value="{{ old('employment_start') }}" >
                </div>
                @error('employment_start')
                <span class="custom_error" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="form-group">
                    <label class="form-control-label">{{__('Start of employment in Hijri')}}</label>
                    <input type="date" class="form-control hijri-date-input " name="hijri_employment_start" value="{{ old('hijri_employment_start') }}" >

                    
                </div>

                <div class="form-group">

                    <label class="form-control-label">{{__('Bank account number')}}</label>
                    <input type="number" class="form-control " name="bank_account_number" value="{{ old('bank_account_number') }}" >

                </div>
                @error('bank_account_number')
                <span class="custom_error" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="form-group">

                <label class="form-control-label">{{__('Medical insurance')}}</label>
                <input type="file" class="form-control " name="medical_insurance" value="{{ old('medical_insurance') }}" >

            </div>
            @error('medical_insurance')
            <span class="custom_error" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <div class="form-group">

            <label class="form-control-label">{{__('Driving license')}}</label>
            <input type="file" class="form-control " name="driving_license" value="{{ old('driving_license') }}" >

        </div>
        @error('driving_license')
        <span class="custom_error" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
                    

                <div class="form-group">
                    <label class="form-control-label">{{__('Passport Number')}}</label>
                    <input type="string" class="form-control" class="@error('passport_number') is-invalid @enderror" name="passport_number" value="{{ old('passport_number') }}" placeholder={{__('Enter_Passport_Number')}}>
                </div>
                    @error('passport_number')
                    <span class="custom_error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                <div class="form-group">
            
                    <label class="form-control-label">{{__('Passport End Date')}}</label>
                    <input type="date" class="form-control" class="@error('passport_end_date') is-invalid @enderror" name="passport_end_date" value="{{ old('passport_end_date') }}" >

                </div>
@error('passport_end_date')
                    <span class="custom_error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                <div class="form-group">

                    <label class="form-control-label">{{__('Residency Number')}}</label>
                    <input type="number" class="form-control" class="@error('residency_number') is-invalid @enderror" name="residency_number" value="{{ old('residency_number') }}" placeholder={{__('Enter_Residency_Number')}}>
                
                </div>
@error('residency_number')
                    <span class="custom_error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                <div class="form-group">

                    <label class="form-control-label">{{__('Residency End Date')}}</label>
                    <input type="date" class="form-control" class="@error('residency_end_date') is-invalid @enderror" name="residency_end_date" value="{{ old('residency_end_date') }}" >
                    
                </div>
@error('residency_end_date')
                    <span class="custom_error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    
                <div class="form-group">
                    <label for="">{{__('Branche Name')}}</label>
                    @if($branches->count()!=0)
                    <select name="branche_name" id="" class="form-select">
                        @foreach($branches as $branche)
                            <option value="{{$branche->name}}">{{$branche->name}}</option>
                        @endforeach
                    </select>
                    
                </div>
              
                @else
                    <input type="text" value="{{__('not found')}}" class="form-control" name="" id="" disabled>
                  @endif

                <button class="btn btn-primary w-100" type="submit">
                    {{__('Add Employee')}}
                </button>
                
        
            </form>
        </div>

        <script>

         
            $(".hijri-date-input").hijriDatePicker();
        </script>

@endsection