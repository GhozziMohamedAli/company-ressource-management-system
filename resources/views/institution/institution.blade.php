@extends('layouts.app' ,['activePage' => 'institution'])
@section("content")
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <div class="row">
              <div class="col-4">
                <h6 class="float-right" >{{__('Institution List')}}</h6>
              </div>
              <div class="input-group mb-3 col-4">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default"><i class="fas fa-search" aria-hidden="true"></i></span>
                </div>
                <input type="text" class="form-control search-input" data-table="list" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="{{__('search_here')}}">
              </div>
              <div class="col-4 d-flex justify-content-end">
                <a href="/institution/add-institution">
                  <button class="btn btn-success"> {{ __('+ Add Institution') }} </button>
                </a>
                  
              </div>
            </div>
           
         
            
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0 list">
                
                <thead>
                  <tr>
                    
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{__('name')}}</th>
                    
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($institutions as $institution)
                  <tr>
                    <td>
                   
                      <p class="text-xs font-weight-bold mb-0">{{$institution->name}}</p>

                    </td>

                    <td class="align-middle">
                      <a href="/institution/edit-institution/{{$institution->id}}" class="btn btn-success ml-1" data-toggle="tooltip" data-original-title="Edit user">
                        {{__('Edit')}}
                      </a>
                      <a href="" class="btn btn-danger" onclick="confirmation('/institution/delete/',{{$institution->id}})" data-toggle="tooltip" data-original-title="Edit user">
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