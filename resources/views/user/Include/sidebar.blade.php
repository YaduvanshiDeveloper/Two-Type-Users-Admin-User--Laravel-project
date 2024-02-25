<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="#" class="simple-text logo-normal">
      
                                    {{ Auth::user()->name }}

        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="./dashboard.html">
              <i class="material-icons">dashboard</i>
              <p>Dashboard(User)</p>
            </a>
          </li>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{route('add.usercategory')}}">
              <i class="material-icons">category</i>
              <p>Product Category</p>
            </a>
          </li>
           <li class="nav-item ">
            <a class="nav-link" href="{{route('manage.usercategory')}}">
              <i class="material-icons">category</i>
              <p>Category Manage</p>
            </a>
          </li>
           
          <li class="nav-item ">
            <a class="nav-link" href="{{route('add.userproduct')}}">
              <i class="material-icons">Product</i>
              <p>Products</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{route('manage.userproduct')}}">
              <i class="material-icons">edit</i>
              <p>products Manage</p>
            </a>
          </li>

        </ul>
       

        </ul>
      </div>
    </div>
  
    