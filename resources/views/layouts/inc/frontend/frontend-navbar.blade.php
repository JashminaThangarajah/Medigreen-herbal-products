<div class="main-navbar shadow-sm sticky-top">
        <div class="top-navbar">
            <div class="container-fluid">
                <div class="row">
                    <!-- <div class="col-md-2 my-auto d-none d-sm-none d-md-block d-lg-block">
                        <h5 class="brand-name" style="margin-top: 25px;">Medigreen Herbals</h5>
                    </div> -->
                    <div class="col-md-2 my-auto d-block">
                    <h5 class="brand-name" style="margin-top: 25px;">Medigreen Herbals</h5>
                    </div>
                   
                    <div class="col-md-5 my-auto">
                        <form  action="{{url('/searching')}}" method="GET" role="search">
                          @csrf
                            <div class="input-group">
                                <input type="search" name="search" value="{{Request::get('search')}}" id="search_text" placeholder="Search your product" class="form-control" />
                                <button class="btn bg-white" type="submit" name="searchbtn">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form>
                        
                    </div> 

                <!--    <div class="col-md-5 my-auto">
                      
                           <div class="input-group" style="margin-top: 25px;">
                                <input type="search"  class="form-control" id="search_product" placeholder="Search your product" aria-label="Search your product" aria-describedby="basic-addon1"  >
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fa fa-search"></i>
                               </span>
                            </div>
                           
                        </div> -->

                        
                    <div class="col-md-5 my-auto">
                        <ul class="nav justify-content-end">
                            
                       <!--   <li class="nav-item">
                                <a class="nav-link waves-effect" href="{{url('cart')}}" >
                                <i class="fa fa-shopping-cart"></i>
                                <span class="clearfix">
                                  Cart
                                <span class="basket-item-count">
                                  <span class="badge bg-secondary"> 0 </span>
                                </span>
                                 </span>
                                </a>
                            </li> 

                             <li class="nav-item">
                                <a class="nav-link" href="{{url('wishlist')}}">
                                    <i class="fa fa-heart"></i> Wishlist (0)
                                </a>
                            </li>
 -->
                            
                            <li class="nav-item">
                                <a class="nav-link " href="{{url('cart')}}" >
                                <i class="fa fa-shopping-cart"></i>
                                Cart
                                  <span class="badge badge-pill bg-secondary cart-count"> 0 </span>
                                </a>
                            </li> 

                            <li class="nav-item">
                                <a class="nav-link " href="{{url('wishlist')}}" >
                                <i class="fa fa-heart"></i>
                                Wishlist 
                                  <span class="badge badge-pill bg-secondary wishlist-count"> 0 </span>
                                </a>
                            </li> 

                            <li class="nav-item">
                           
                             <a class="nav-link " href="https://wa.me/+94711460043?text=I'm%20interested%20in%20your%20products" target="_blank">
                                <img src ="{{ asset('assets/images/whatsup.png')}}" height="30px" width="30px" class="rounded-circle">	 
                             </a>
                           
                            </li> 
                             <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/64e35bb594cf5d49dc6b9f9a/1h8c1sge6';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
                            @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}" >{{ __('Sign In') }}</a>
                                </li>
                            @endif

                          
                          @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('uploads/profile/'.Auth::user()->image)}}" alt="Profile" class="rounded-circle" width="30px" height="30px">
                                <!-- <img src="{{ asset('uploads/profile/'.Auth::user()->image)}}" alt="{{ asset('assets/images/profileuser.png')}}" class="rounded-circle" width="30px" height="30px">   -->
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{url('my_profile')}}"><i class="fa fa-user"></i> Profile</a></li>
                                <li><a class="dropdown-item" href="{{url('my_order')}}"><i class="fa fa-list"></i> My Orders</a></li>
                                <li><a class="dropdown-item" href="{{url('wishlist')}}"><i class="fa fa-heart"></i> My Wishlist</a></li>
                                <li><a class="dropdown-item" href="{{url('cart')}}"><i class="fa fa-shopping-cart"></i> My Cart</a></li>
                                
                                <li>
                                <a class="dropdown-item"  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <i class="fa fa-sign-out"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                             
                               </li>
                               
                              </ul>
                            </li>
                            @endguest
                        </ul>

                    </div>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-dark bg-green">
            <div class="container-fluid">
           
 
        <img src="{{asset('assets/images/medigreenlogo.png')}}" alt="logo" style="width:40px;">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link " href="{{url('/')}}">Home</a>
                        </li>

                        <li class="nav-item">
                     <a class="nav-link" href="{{url('aboutus')}}">About Us</a>
                      </li>

                        <li class="nav-item">
                           
                            <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Categories
          </a>
          @php 
          $categories = App\Models\Category::where('navbar_status','0')->where('status','0')->get();
          @endphp
          @foreach( $categories as $cateitem)
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
         
          
            <li><a class="dropdown-item" href="{{ url('product/'.$cateitem->slug) }}">{{$cateitem->name}}</a></li>
            
          </ul>
        </li>
        @endforeach
                        </li>
                      <li class="nav-item">
                      <a class="nav-link" href="{{url('contactus')}}">Contact Us</a>
                      </li>
                        
                     
                       
                    </ul>
                   
                           
                           
                </div>
            </div>
        </nav>
    </div>

    <!-- Cart function pop login modal   -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel" style="color:#198754">SignIn</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      
      <form method= "post" action="{{ route('login') }}" style="margin-left:10px ; margin-right:10px; ">  
    @csrf
    <div class="mb-3 row">
    <label for="inputemail" class="col-sm-2 col-form-label" style="--bs-success-bg-subtle">Email:</label>
    <div class="col-sm-10">
    <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="Username or email">
    </div>
  </div>

<div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label" style="--bs-success-bg-subtle">Password:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
    </div>
  </div>

  <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="success-outlined">
  <label class="form-check-label" for="flexCheckDefault">
  Remember me.
  </label>
</div>
   
   
  <div class="col-auto">
  <center>  <button type="submit" text-align="center" class="btn btn-success mb-3" >Login</button></center>
  </div>

                     
                           <span>  Don't have an account?
                            @if (Route::has('register'))
                                    <a class="btn btn-link" href="{{ route('register') }}">{{ __('Sign Up') }}</a>   
                            @endif</span>  
<br>
                              @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}" >
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif 
                            </div>
                        </div>
                    </form>
      
      </div>
 
    </div>
  </div>
</div>