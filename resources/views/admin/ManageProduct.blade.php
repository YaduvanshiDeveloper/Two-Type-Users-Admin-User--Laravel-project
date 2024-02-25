@extends('layouts.admin')
@section('content')
  
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Products List</h4>
                 
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                      <thead class=" text-primary">
                        <tr>
                          <th> #</th>
                          <th>Name</th>
                          <th>Price</th>
                          <th>Description</th>
                          <th>Image</th>
                          <th>Action</th>
                      </tr>
                     </thead>
                      <tbody>
                      @foreach($Product as $Product)

                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$Product->name??'NA'}}</td>
                          <td><b> {{$Product->price??'NA'}}</b></td>
                          <td>{{$Product->description??'NA'}}</td>
                          <td><img src="{{asset('Product_image')}}/{{$Product->image}}" width="100px" hight="1500px"></td>
                          <td>
                         <a href="{{route('Product.edit',[Crypt::encrypt($Product->id)])}}" type="button" class="btn btn-success" ><i class="fa fa-edit"></i></a>
                          <a onclick="deleteProduct('{{Crypt::encrypt($Product->id)}}')"   class="btn text-danger"><i class="fa fa-trash"></i></a>
                          </td>
                        </tr>
                    @endforeach

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

<script>
              function deleteProduct(id){
                Swal.fire({
  title: 'Do you want to save the changes?',
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: 'YES',
  denyButtonText: `Don't Delete`,
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
   $.ajax({
    type:'post',
    url:"{{route('delete.Product')}}",
    data:{id:id,_token:"{{csrf_token()}}"},
    success:function (data) {
        if(data=="false"){
            Swal.fire('something went wrong');
        }else{
            Swal.fire('Operation Executed Seccessfully');
            location.reload()  ;
        }
    }
    
   });
  }
});
}
</script>
@endsection