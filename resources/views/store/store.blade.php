@extends('layouts.app' ,['activePage' => 'store'])
@section("content")
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <div class="row">
              <div class="col-4">
                <h6>{{__('Store List')}}</h6>
              </div>
              <div class="input-group mb-3 col-4">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default"><i class="fas fa-search" aria-hidden="true"></i></span>
                </div>
                <input type="text" class="form-control search-input" data-table="list" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="{{__('search_here')}}">
              </div>
              <div class="col-4 d-flex justify-content-end">
                <a href="/store/add-store">
                  <button class="btn btn-success"> {{ __('+ Add Store') }} </button>
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
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{__('adresse')}}</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{__('Municipal license')}}</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{__('Civil defense license')}}</th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($stores as $store)
                  <tr>
                    <td>
                   
                      <p class="text-xs font-weight-bold mb-0">{{$store->name}}</p>

                    </td>

                    <td>
                   
                        <p class="text-xs font-weight-bold mb-0">{{$store->adresse}}</p>
  
                      </td>

                      <td>
                        @if($store->municipal_license)
                        <form action="{{url("/store/municipal-license-pdf")}}" method="POST">
                          <input type="text" value="{{$store->municipal_license}}" name="path" id="" hidden>
                        <button type="submit" class="btn btn-primary" >{{__('see municipal license')}}</button>
                      </form>
                      @else
                      
                      <p class="text-xs font-weight-bold mb-0">{{__('not found')}}</p>
                      @endif
                      </td>

                      <td>
                        @if($store->civil_defense_license)
                        <form action="{{url("/store/municipal-license-pdf")}}" method="POST">
                          <input type="text" value="{{$store->civil_defense_license}}" name="path" id="" hidden>
                        <button type="submit" class="btn btn-primary" >{{__('see civil defense license')}}</button>
                      </form>
                      @else
                      <p class="text-xs font-weight-bold mb-0">{{__('not found')}}</p>
                        @endif
                      </td>

                    <td class="align-middle">
                      <a href="/store/edit-store/{{$store->id}}" class="btn btn-success ml-1" data-toggle="tooltip" data-original-title="Edit user">
                        {{__('Edit')}}
                      </a>
                        <a href="" class="btn btn-danger" onclick="confirmation('/store/delete/',{{$store->id}})" data-toggle="tooltip" data-original-title="Edit user">
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