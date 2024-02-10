@extends('layouts.app' ,['activePage' => 'document'])
@section("content")
@if (Session::has('msg'))
 <script>
        var msg = "<?php $msg = Session::get('msg') ; echo $msg ?>"
        
          const oasts = Swal.mixin(
          {
              oasts: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 2000,
              timerProgressBar: true,
          })

              oasts.fire({
              icon: 'error',
              title: msg
          })
      </script>
@endif
@if($errors->any())
  @foreach($errors->all() as $msg)
      <script>
        var msg = "<?php  echo $msg ?>"
        
          const oasts = Swal.mixin(
          {
              oasts: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 2000,
              timerProgressBar: true,
          })

              oasts.fire({
              icon: 'error',
              title: msg
          })
      </script>
  @endforeach
@endif

<div class="container-fluid py-4">
  
                
    <button data-toggle="modal" data-target="#exampleModal" class="btn btn-success"> {{ __('+ Add Document') }} </button>  
  
 
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <div class="row">
              <div class="col-4">
                <h6>{{__('Document List')}}</h6>
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

                      <th class="text-secondary opacity-7"></th>

                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{__('document name')}}</th>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{__('document release date')}}</th>
                     
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($documents as $document)
                    <tr>
                      <td>
                        <form action="{{url("/documents/see-document")}}" method="POST">
                          <input type="text" value="{{$document->file_path}}" name="path" id="" hidden>
                        <a href=""><button type="submit" class="btn btn-primary" >{{__('see document')}}</button></a> 
                      </form>
                      </td>
                      <td>
                     
                        <p class="text-xs font-weight-bold mb-0">{{$document->name}}</p>
  
                      </td>
                      <td>
                     
                        <p class="text-xs font-weight-bold mb-0">{{$document->release_date}}</p>
  
                      </td>
                      <td class="align-middle">

                        <a href="" class="btn btn-danger" onclick="confirmation('/documents/delete/',{{$document->id}})" data-toggle="tooltip" data-original-title="Edit user">
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{__('Add Document')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="/documents/add-document" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                    
              <label>{{__('Document name')}}</label>
              <input type="text" class="form-control" value="{{ old('name') }}" name="name" placeholder="{{__('Enter_document_name')}}">
        
          </div>
          @error('name')
              <span class="custom_error" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror

          <div class="form-group">
                    
            <label>{{__('Document release date')}}</label>
            <input type="date" class="form-control" value="{{ old('release_date') }}" name="release_date" placeholder="{{__('Enter_document_release_date')}}">
      
        </div>
        @error('name')
            <span class="custom_error" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <div class="form-group">
                    
          <label>{{__('Document file')}}</label>
          <input type="file" class="form-control" name="file" placeholder="{{__('Enter_document_file')}}">
    
      </div>
      @error('file')
          <span class="custom_error" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
          <button class="btn btn-primary w-100" type="submit">{{__('Add Document')}}</button>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

@endsection