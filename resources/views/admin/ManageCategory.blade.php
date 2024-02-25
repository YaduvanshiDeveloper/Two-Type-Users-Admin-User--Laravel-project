@extends('layouts.admin')
@section('content')
  
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Category List</h4>
                 
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                      <thead class=" text-primary">
                        <tr>
                          <th> ID</th>
                          <th>Name</th>
                          <th>Icon</th>
                          <th>Action</th>
                      </tr>
                     </thead>
                      <tbody>
                      @foreach($Category as $Category)

                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$Category->name??'NA'}}</td>
                          <td><img src="{{asset('Category_image')}}/{{$Category->image}}" width="70px" hight="80px"></td>
                          <td>
                         <a href="{{route('Category.edit',[Crypt::encrypt($Category->id)])}}" type="button" class="btn btn-success" ><i class="fa fa-edit"></i></a>
                          <a onclick="deleteCategory('{{Crypt::encrypt($Category->id)}}')"   class="btn text-danger"><i class="fa fa-trash"></i></a>
                          </td>
                        </tr>
                    @endforeach

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

<script>
              function deleteCategory(id){
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
    url:"{{route('delete.Category')}}",
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