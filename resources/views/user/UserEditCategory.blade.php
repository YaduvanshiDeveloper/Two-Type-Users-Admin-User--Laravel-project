@extends('user.user')

@section('content')
<div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Category</h4>
                  <p class="card-category">Product Category</p>
                </div>
                <div class="card-body">

        
      <form action="{{route('update.Category')}}" method="post" enctype="multipart/form-data">
      <input type="hidden" value="{{crypt::encrypt($data->id)}}" name="token">
      @csrf
    <div class="mb-3">
         <div class="form-group bmd-form-group">
         <label class="bmd-label-floating">Category Name</label>
           <input type="text" class="form-control" value="{{$data->name}}" name="name">
           @error('name') <span class="text-danger">{{ucwords($message)}}</span> @enderror

    </div>
                <div class="mb-3 ">
                        <div class="form-group bmd-form-group">
                      <label for="exampleInputFile">Category Icon <i class="material-icons">images</i></label>
                    <div class="input-group bg-light">
                    <div class="custom-file">
                    <input type="file" class="custom-file-input" value="{{$data->image}}" name="image" id="exampleInputFile">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>

                    </div>
                    @error('image') <span class="text-danger">{{ucwords($message)}}</span> @enderror 

                        </div>
         <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-warning" name="submit">Save changes</button>
        </div>
      </form>
      </div>
              </div>
@endsection