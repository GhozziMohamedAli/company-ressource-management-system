@extends('layouts.app' , ['activePage' => 'employee'])
@section("content")

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <div class="row">
              <div class="col-4">
                <h6>{{__('Employee List')}}</h6>
              </div>
              <div class="input-group mb-3 col-4">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default"><i class="fas fa-search" aria-hidden="true"></i></span>
                </div>
                <input type="text" class="form-control search-input" data-table="list" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="{{__('search_here')}}">
              </div>
              <div class="col-4 d-flex justify-content-end">
                <a href="/employee/add-employee">
                  <button class="btn btn-success"> {{ __('+ Add Employee') }} </button>
                </a>
                  
              </div>
            </div>
           
         
            
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0 list">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{__('status')}}</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">{{__('name')}}</th>

                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{__('Profession')}}</th>
                    
                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{__('Phone number')}}</th>
                    
                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{__('Start of employment')}}</th>
             
                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{__('Medical insurance')}}</th>
                    
                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{__('Driving license')}}</th>

                    
                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{__('on Branche')}}</th>

                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($employee as $emp)
                  <tr>
                    <!-- Status  -->
                    
                    <td class="align-middle text-center text-sm">
                      @if($emp["status"]==1)
                      <span class="badge badge-sm bg-gradient-success">{{__('working')}}</span>
                      @else
                      <span class="badge badge-sm bg-gradient-secondary">{{__('vacation')}}</span>
                      @endif
                    </td>

                    <!-- Name  -->

                    <td>
                      <p class="text-xs font-weight-bold mb-0">{{$emp->name}}</p>
                      
                    </td>

                     

                     <!-- Profession  -->

                    <td>
                      <p class="text-xs font-weight-bold mb-0">{{$emp->profession}}</p>
                      
                    </td>

                     <!-- Phone number  -->

                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$emp->phone_number}}</span>
                      </td>

                      <!-- Start of employment  -->
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$emp->employment_start}}</span>
                      </td>
                     
                      
                      <!-- Medical insurance  -->
                      <td class="align-middle text-center">
                        @if($emp->medical_insurance)
                        <form action="{{url("/employee/medical-pdf")}}" method="POST">
                          <input type="text" value="{{$emp->medical_insurance}}" name="path" id="" hidden>
                        <a href=""><button type="submit" class="btn btn-primary" >{{__('see medical insurance')}}</button></a> 
                      </form>
                        @else
                        <span class="text-secondary text-xs font-weight-bold">{{__('not found')}}</span>
                        @endif
                      </td>
                        <!-- Driving License  -->
                        <td class="align-middle text-center">
                          @if($emp->driving_license)
                          <form action="{{url("/employee/driving-pdf")}}" method="POST">
                            <input type="text" value="{{$emp->driving_license}}" name="path" id="" hidden>
                          <a href=""><button type="submit" class="btn btn-primary" >{{__('see driving license')}}</button></a> 
                        </form>
                        @else
                        <span class="text-secondary text-xs font-weight-bold">{{__('not found')}}</span>
                        @endif
                          
                          
                        </td>
                    
                      <!-- Branche -->
                      @if($emp->branche)
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$emp->branche->name}}</span>
                      </td>
                      @else
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{__('not found')}}</span>
                      </td>
                      @endif
                      <td>
                      
                      <div class="d-flex px-2 py-1">

                    <td class="align-middle">
                      <a href="" data-toggle="modal" onclick="employee_detail({{$emp->id}})" data-target="#exampleModal" class="btn btn-secondary" data-toggle="tooltip" data-original-title="Edit user">
                        {{__('More details')}}
                        
                      </a>
                      <a href="/employee/edit-employee/{{$emp->id}}" class="btn btn-success" data-toggle="tooltip" data-original-title="Edit user">
                        {{__('Edit')}}
                      </a>
                    </td>

                    <td class="align-middle">
                      <a href="" class="btn btn-danger" onclick="confirmation('/employee/delete/',{{$emp->id}})" data-toggle="tooltip" data-original-title="Edit user">
                        {{__('Delete')}}
                      </a>
                    </td>
                  </tr>

                  <!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{__('details')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          
          <div class="row">
          <div class="col-6">
            
            <div class="row">
              <div class="col-4">
                <span class="font-weight-bold">{{__('status')}} </span> 
              </div>
              <div class="col-8">
               
                <p id="modal_status"></p>
              </div>
              
            </div>
            <hr>
            <div class="row">
              <div class="col-4">
                <span class="font-weight-bold">{{__('name')}} </span> 
              </div>
              <div class="col-8">
                <p id="modal_name"></p>
              </div>
              
            </div>
            <hr>
            <div class="row">
              <div class="col-4">
                <span class="font-weight-bold">{{__('Birth date')}} </span> 
              </div>
              <div class="col-8">
                <p id="modal_birth_date"></p>
              </div>
              
            </div>
            <hr>
            <div class="row">
              <div class="col-4">
                <span class="font-weight-bold">{{__('Profession')}} </span> 
              </div>
              <div class="col-8">
                <p id="modal_profession"></p>
              </div>
              
            </div>
            <hr>
            <div class="row">
              <div class="col-4">
                <span class="font-weight-bold">{{__('Phone number')}} </span> 
              </div>
              <div class="col-8">
                <p id="modal_phone_number"></p>
              </div>
              
            </div>
            <hr>
            <div class="row">
              <div class="col-4">
                <span class="font-weight-bold">{{__('Start of employment')}} </span> 
              </div>
              <div class="col-8">
                <p id="modal_employment_start"></p>
              </div>
              
            </div>
            <hr>
            <div class="row">
              <div class="col-4">
                <span class="font-weight-bold">{{__('Start of employment in Hijri')}} </span> 
              </div>
              <div class="col-8">
                <p id="modal_hijri_employment_start"></p>
              </div>
              
            </div>
          

          </div>
          <div class="col-6">
            <div class="row">
              <div class="col-4">
                <span class="font-weight-bold">{{__('Bank account number')}} </span> 
              </div>
              <div class="col-8">
                <p id="modal_bank_account_number"></p>
              </div>
              
            </div>
            <hr>
            
            <hr>
            <div class="row">
              <div class="col-4">
                <span class="font-weight-bold">{{__('Passport Number')}} </span> 
              </div>
              <div class="col-8">
                <p id="modal_passport_number"></p>
              </div>
              
            </div>
            <hr>
            <div class="row">
              <div class="col-4">
                <span class="font-weight-bold">{{__('Passport End Date')}} </span> 
              </div>
              <div class="col-8">
                <p id="modal_passport_end_date"></p>
              </div>
              <hr>
            </div>
 
            <div class="row">
              <div class="col-4">
                <span class="font-weight-bold">{{__('Residency Number')}} </span> 
              </div>
              <div class="col-8">
                <p id="modal_residency_number"></p>
              </div>
              
            </div>
            <hr>
            <div class="row">
              <div class="col-4">
                <span class="font-weight-bold">{{__('Residency End Date')}} </span> 
              </div>
              <div class="col-8">
                <p id="modal_residency_end_date"></p>
              </div>
              
            </div>
          
          </div>
            
          </div>
          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('close')}}</button>
        
      </div>
    </div>
  </div>
</div>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</div> 

@endsection