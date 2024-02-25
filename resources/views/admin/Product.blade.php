@extends('layouts.admin')
@section('content')

              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add Products</h4>
                  <p class="card-category">Products</p>
                </div>
                <div class="card-body">
                <form action="{{route('Product.save')}}" method="post" enctype="multipart/form-data" class="form p-4 bg-dark">
                @csrf
                    <div class="row p-5">
                      <div class="col-sm-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Product Name</label>
                          <input type="text" class="form-control" name="name">
                          @error('name') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Product Price</label>
                          <input type="text" class="form-control" name="price">
                          @error('price') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Product Description</label>
                          <input type="textarea" class="form-control" name="description">
                          @error('description') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                        </div>
                      </div>
                      <div class="col-sm-6 ">
                        <div class="form-group bmd-form-group">
                      <label for="exampleInputFile">Product Image <i class="material-icons">images</i></label>
                    <div class="input-group bg-light">
                    <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image" id="exampleInputFile">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>

                    </div>
                    @error('image') <span class="text-danger">{{ucwords($message)}}</span> @enderror

                        </div>
                    </div>
                      </div>
                    </div>
                  
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    
                  </form>
                </div>
              </div>
 
@endsection