@extends('layouts.app' ,['activePage' => 'computer'])
@section("content")
<div class="container-fluid py-4">
    <a href="/computer/add-computer">
      <button class="btn btn-success"> {{ __('+ Add Computer') }} </button>
    </a>
      
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <div class="row">
              <div class="col-4">
                <h6>{{__('Computer List')}}</h6>
              </div>

              <div class="input-group mb-3 col-8">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default"><i class="fas fa-search" aria-hidden="true"></i></span>
                </div>
                <input type="text" class="form-control search-input" data-table="list" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="{{__('search_here')}}">
              </div>
             
            </div>
           
         
            
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0 list">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{__('status')}}</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">{{__('Computer serial number')}}</th>
                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{__('Computer description')}}</th>
                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{__('Employee name')}}</th>
                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{__('Branche Name')}}</th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($computers as $computer)
                  <tr>
                    <td>
                      @if($computer->status==1)
                      <p class="text-xs font-weight-bold mb-0">{{__("working")}}</p>
                      @else
                      <p class="text-xs font-weight-bold mb-0">{{__("not working")}}</p>
                      @endif
                    </td>

                    <td>
                      <p class="text-xs font-weight-bold mb-0">{{$computer->serial_number}}</p>
                    </td>

                    <td>
                      <p class="text-xs font-weight-bold mb-0">{{$computer->description}}</p>                    
                    </td>

                    <!-- employee -->
                    @if($computer->employee)
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold">{{$computer->employee->name}}</span>
                    </td>
                    @else
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold">{{__('not found')}}</span>
                    </td>
                    @endif

                     <!-- branche -->
                     @if($computer->branche_name)
                     <td class="align-middle text-center">
                       <span class="text-secondary text-xs font-weight-bold">{{$computer->branche_name}}</span>
                     </td>
                     @else
                     <td class="align-middle text-center">
                       <span class="text-secondary text-xs font-weight-bold">{{__('not found')}}</span>
                     </td>
                     @endif


                    <td class="align-middle">
                      <a href="/computer/edit-computer/{{$computer->id}}" class="btn btn-success ml-1" data-toggle="tooltip" data-original-title="Edit user">
                        {{__('Edit')}}

                      </a>
                      <a href="" class="btn btn-danger" onclick="confirmation('/computer/delete/',{{$computer->id}})" data-toggle="tooltip" data-original-title="Edit user">
                        {{__('Delete')}}
                      </a>
                    </td>

                   
                  </tr>  
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