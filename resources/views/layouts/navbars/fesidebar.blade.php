 <!-- Sidebar -->
 <ul class="sidebar navbar-nav">
            <li class="nav-item ">
               <a class="nav-link {{ request()->is('/home*') ? 'active' : ''}}" href="{{url('/home')}}">
               <i class="fas fa-fw fa-home "></i>
               <span>Home</span>
               </a>
            </li>
           
            <li class="nav-item">
               <a class="nav-link {{ request()->is('/my-account*') ? 'active' : ''}}" href="{{url('/my-account')}}">
               <i class="fas fa-fw fa-video"></i>
               <span>My Account</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link {{ request()->is('/uploadvideo*') ? 'active' : ''}}" href="{{url('/uploadvideo')}}">
               <i class="fas fa-fw fa-cloud-upload-alt"></i>
               <span>Upload Video</span>
               </a>
            </li>
           
          
            <!-- <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="categories.html" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-fw fa-list-alt"></i>
               <span>Categories</span>
               </a>
               <div class="dropdown-menu">
                  <a class="dropdown-item" href="categories.html">Movie</a>
                  <a class="dropdown-item" href="categories.html">Music</a>
                  <a class="dropdown-item" href="categories.html">Television</a>
               </div>
            </li> -->
            
         </ul>