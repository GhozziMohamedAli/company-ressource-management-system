@extends('layouts.app' ,['activePage' => 'safety'])
@section("content")
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <div class="row">
              <div class="col-4">
                <h6>{{__('Extinguisher List')}}</h6>
              </div>
              <div class="input-group mb-3 col-4">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default"><i class="fas fa-search" aria-hidden="true"></i></span>
                </div>
                <input type="text" class="form-control search-input" data-table="list" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="{{__('search_here')}}">
              </div>
              <div class="col-4 d-flex justify-content-end">
                <a href="/extinguisher/add-extinguisher">
                  <button class="btn btn-success"> {{ __('+ Add Extinguisher') }} </button>
                </a>
                  
              </div>
            </div>
           
         
            
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0 list">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{__('number')}}</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{__('branche')}}</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{__('storehouse')}}</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{__('End date')}}</th>
                    
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($extinguishers as $extinguisher)
                  <tr>
                    <td>
                      <p class="text-xs font-weight-bold mb-0">{{$extinguisher->number}}</p>
                    </td>

                      <td><p class="text-xs font-weight-bold mb-0">{{$extinguisher->branche}}</p></td>
                      <td><p class="text-xs font-weight-bold mb-0">{{$extinguisher->storehouse}}</p></td>
                      <td><p class="text-xs font-weight-bold mb-0">{{$extinguisher->end_date}}</p></td>

                    <td class="align-middle">
                      <a href="extinguisher/edit-extinguisher/{{$extinguisher->id}}" class="btn btn-success ml-1" data-toggle="tooltip" data-original-title="Edit user">
                        {{__('Edit')}}
                      </a>
                        <a href="" class="btn btn-danger" onclick="confirmation('/extinguisher/delete/',{{$extinguisher->id}})" data-toggle="tooltip" data-original-title="Edit user">
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