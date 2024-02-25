<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
   
      <div class="logo"><a href="#" class="simple-text logo-normal">
          {{ Auth::user()->name }}
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="#">
              <i class="material-icons">dashboard</i>
              <p>Admin Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{route('add.category')}}">
              <i class="material-icons">category</i>
              <p>Product Category</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{route('manage.category')}}">
              <i class="material-icons">category</i>
              <p>Category Manage</p>
            </a>
          </li>
           
          <li class="nav-item ">
            <a class="nav-link" href="{{route('add.product')}}">
              <i class="material-icons">Product</i>
              <p>Products</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{route('manage.product')}}">
              <i class="material-icons">edit</i>
              <p>products Manage</p>
            </a>
          </li>

        </ul>
        
      </div>
    </div>
