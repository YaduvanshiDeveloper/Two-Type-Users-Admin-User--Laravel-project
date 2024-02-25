@extends('user.user')
@section('content')
<div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Products</h4>
                  
                </div>
                <div class="card-body">

        
      <form action="{{route('update.Product')}}" method="post" enctype="multipart/form-data">
      <input type="hidden" value="{{crypt::encrypt($data->id)}}" name="token">
      @csrf
                        <div class="row p-5">
                      <div class="col-sm-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Product Name</label>
                          <input type="text" class="form-control" name="name" value="{{$data->name}}">
                          @error('name') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Product Price</label>
                          <input type="text" class="form-control" name="price" value="{{$data->price}}">
                          @error('price') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Product Description</label>
                          <input type="textarea" class="form-control" name="description" value="{{$data->description}}">
                          @error('description') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                        </div>
                      </div>
                      <div class="col-sm-6 ">
                        <div class="form-group bmd-form-group">
                      <label for="exampleInputFile">Product Image <i class="material-icons">images</i></label>
                    <div class="input-group bg-light">
                    <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image" value="{{$data->image}}" id="exampleInputFile">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>

                    </div>
                    @error('image') <span class="text-danger">{{ucwords($message)}}</span> @enderror

                        </div>
                    </div>
                      </div>
                    </div>
                  
         <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-warning" name="submit">Save changes</button>
        </div>
      </form>
      </div>
              </div>
@endsection