@extends('layouts.app' ,['activePage'=>'car'])
@section("content")
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <div class="row">
              <div class="col-4">
                <h6>{{__('Car List')}}</h6>
              </div>

              <div class="input-group mb-3 col-4">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default"><i class="fas fa-search" aria-hidden="true"></i></span>
                </div>
                <input type="text" class="form-control search-input" data-table="list" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="{{__('search_here')}}">
              </div>
              <div class="col-4 d-flex justify-content-end">
                <a href="/car/add-car">
                  <button class="btn btn-success"> {{ __('+ Add Car') }} </button>
                </a>
                  
              </div>


            </div>
           
         
            
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0 list">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{__('plate number')}}</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{__('type')}}</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{__('car meter')}}</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{__('fuel type')}}</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{__('sum fuel')}}</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{__('sum oil')}}</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{__('license')}}</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{__('inspection certificate')}}</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{__('images')}}</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{__('atonements')}}</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{__('battery')}}</th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($cars as $car)
                  <tr>
                    <td>
                      <p class="text-xs font-weight-bold mb-0">{{$car->plate_number}}</p>
                    </td>

                    <td>
                        <p class="text-xs font-weight-bold mb-0">{{$car->type}}</p>
                    </td>

                    <td>
                        <p class="text-xs font-weight-bold mb-0">{{__($car->car_meter)}}</p>
                    </td>

                    <td>
                        <p class="text-xs font-weight-bold mb-0">{{__($car->fuel_type)}}</p>
                    </td>

                    <td>
                        <p class="text-xs font-weight-bold mb-0">{{$car->sum_fuel}}</p>
                    </td>

                    <td>
                        <p class="text-xs font-weight-bold mb-0">{{$car->sum_oil}}</p>
                    </td>

                    
                        <td>
                          @if($car->path_license)
                          <form action="{{url("/car/license-pdf")}}" method="POST">
                            <input type="text" value="{{$car->path_license}}" name="path" id="" hidden>
                          <a href=""><button type="submit" class="btn btn-primary" >{{__('see license')}}</button></a> 
                        </form>
                        @else
                        <span class="text-secondary text-xs font-weight-bold">{{__('not found')}}</span>
                        @endif
                        </td>

                
                   
                    <td>
                      @if($car->path_inspection)
                      <form action="{{url("/car/inspection-pdf")}}" method="POST">
                        <input type="text" value="{{$car->path_inspection}}" name="path" id="" hidden>
                      <a href=""><button type="submit" class="btn btn-primary" >{{__('see inspection certificate')}}</button></a> 
                    </form>
                    @else
                    <span class="text-secondary text-xs font-weight-bold">{{__('not found')}}</span>
                        @endif
                  </td>

                    <td>
                        <button class="btn btn-primary" onclick="show_images({{$car->id}})" data-toggle="modal" data-target="#carImagesModal">{{__('see car images')}}</button>
                    </td>

                    <td>
                        <p class="text-xs font-weight-bold mb-0">{{$car->atonements}}</p>
                    </td> 

                    <td>
                        <p class="text-xs font-weight-bold mb-0">{{$car->battery}}</p>
                    </td>

                    <td class="align-middle">
                      <a href="" data-toggle="modal" onclick="car_detail({{$car->id}})" data-target="#exampleModal" class="btn btn-secondary" data-toggle="tooltip" data-original-title="Edit user">
                        {{__('More details')}}
                        
                      </a>

                      <a href="/car/edit-car/{{$car->id}}" class="btn btn-success ml-1" data-toggle="tooltip" data-original-title="Edit user">
                        {{__('Edit')}}
                      </a>
                      
                        <a href="" class="btn btn-danger" onclick="confirmation('/car/delete/',{{$car->id}})" data-toggle="tooltip" data-original-title="Edit user">
                          {{__('Delete')}}
                        </a>
                      
                    </td>

                   
                  </tr>  


                  <!-- Car Images Modal -->
      <div class="modal fade" id="carImagesModal" tabindex="-1" role="dialog" aria-labelledby="carImagesModalLabel" aria-hidden="true">
        <div class="modal-dialog m-w-750" role="document">
          <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="carImagesModalLabel">{{__('Car Images')}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body carousel-container" id="remove-item">
      
          
          </div>
      </div>
          <div class="modal-footer">
            <button type="button"  class="btn btn-warning " data-dismiss="modal">Close</button>
           
          </div>
        </div>
      </div>
    </div>


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
                <span class="font-weight-bold">{{__('plate number')}} </span> 
              </div>
              <div class="col-8">
               
                <p id="modal_plate"></p>
              </div>
              
            </div>
            <hr>
            <div class="row">
              <div class="col-4">
                <span class="font-weight-bold">{{__('type')}} </span> 
              </div>
              <div class="col-8">
                <p id="modal_type"></p>
              </div>
              
            </div>
            <hr>
            <div class="row">
              <div class="col-4">
                <span class="font-weight-bold">{{__('car meter')}} </span> 
              </div>
              <div class="col-8">
                <p id="modal_car_meter">{{__('')}}</p>
              </div>
              
            </div>
            <hr>
            <div class="row">
              <div class="col-4">
                <span class="font-weight-bold">{{__('fuel type')}} </span> 
              </div>
              <div class="col-8">
                <p id="modal_fuel_type"></p>
              </div>
              
            </div>
            <hr>
            <div class="row">
              <div class="col-4">
                <span class="font-weight-bold">{{__('fuel amount')}} </span> 
              </div>
              <div class="col-8">
                <p id="modal_fuel_amount"></p>
              </div>
              
            </div>
            <hr>
            <div class="row">
              <div class="col-4">
                <span class="font-weight-bold">{{__('fuel cost')}} </span> 
              </div>
              <div class="col-8">
                <p id="modal_fuel_cost"></p>
              </div>
              
            </div>
            <hr>
            <div class="row">
              <div class="col-4">
                <span class="font-weight-bold">{{__('sum fuel')}} </span> 
              </div>
              <div class="col-8">
                <p id="modal_sum_fuel"></p>
              </div>
              
            </div>
          

          </div>
          <div class="col-6">
            <div class="row">
              <div class="col-4">
                <span class="font-weight-bold">{{__('oil amount')}} </span> 
              </div>
              <div class="col-8">
                <p id="modal_oil_amount"></p>
              </div>
              
            </div>
            <hr>
            <div class="row">
              <div class="col-4">
                <span class="font-weight-bold">{{__('oil cost')}} </span> 
              </div>
              <div class="col-8">
                <p id="modal_oil_cost"></p>
              </div>
              
            </div>
            <hr>
            <div class="row">
              <div class="col-4">
                <span class="font-weight-bold">{{__('sum oil')}} </span> 
              </div>
              <div class="col-8">
                <p id="modal_sum_oil"></p>
              </div>
              
            </div>
            <hr>
            <div class="row">
              <div class="col-4">
                <span class="font-weight-bold">{{__('atonements')}} </span> 
              </div>
              <div class="col-8">
                <p id="modal_atonements"></p>
              </div>
              
            </div>
            <hr>
            <div class="row">
              <div class="col-4">
                <span class="font-weight-bold">{{__('battery')}} </span> 
              </div>
              <div class="col-8">
                <p id="modal_battery"></p>
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