@extends('layouts.app')
@section('title',"Medigreen Herbal Products(PVT)")
@section('content')

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    @foreach($sliders as $key => $sliderItem)
    <div class="carousel-item {{$key == 0 ? 'active':''}}">
      @if($sliderItem->image)
      <img src="{{ asset('uploads/slider/'.$sliderItem->image)}}" class="d-block w-100" width="400px" height="500px" alt="Slider_img">
      @endif

      <div class="carousel-caption d-none d-md-block">
                    <div class="custom-carousel-content">
                        <h1>  {{$sliderItem->title}} </h1>
                            <div class="card-body ">
                            {!!$sliderItem->description!!}
                            </div>
                        <div>
                       <h4> Order Now</h4>
                        @foreach($all_categories as $all_cate_item)
                            <a href="{{url('product/'.$all_cate_item->slug)}}" > 

                            <h6 class="badge rounded-pill bg-success text-white">{{$all_cate_item->name}}</h6>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
    </div>
   @endforeach
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
 
    <h2>Our Categories</h2>
            <div class="bg-success py-4"> <!--if you want to increase the green color background just change py-6 -->
              <div class="container">
                <div class="row">
                  <div class="col-md-12">
                  <div class="owl-carousel category-carousel owl-theme">
                    @foreach($all_categories as $all_cate_item)
                    <div class="item">
                       <a href="{{url('product/'.$all_cate_item->slug)}}" class="text-decoration-none"> <!--if you want to remove underline just add class="text-decoration-none" -->
                        <div class="card">
                        <img src="{{asset('uploads/category/'.$all_cate_item->image)}}" class="rounded mx-auto " width="200px" height="200px" alt="Image">
                        <div class="card-body text-center ">
                          <h6 class="text-dark">{{$all_cate_item->name}}</h6>
                        </div>
                        </div>
                         </a>
                      </div>
                      @endforeach
                   
                  </div>
                  </div>
                </div>
              </div>
             </div>

             <div class="intro-2">
                 <div class="row-2">
			           	<div class="intro-col-img"> <img src="{{ asset('assets/images/intro1.webp')}}" class="rounded mx-auto "></div>	
				      <div class="intro-col">
                       <h4>Welcome To Medigreen Herbal Products</h4>
                            
                            <p>Medigreen is committed to provide safe and effective natural 
						                  products for our consumers. Healthcare is on of the biggest 
					                    investment in our lives, Let's take care of health with herbal 
						                  health without side effects. No need to worry about taking medicines, 
					                   	all our products are herbal remedies that have been proven to be potent 
					                  	and certified.Experience the Medigreen promise of health, naturally.
                              Say goodbye to worries about harmful medications and embrace a healthier,
                              more natural you. Welcome to Medigreen Herbal Products –
                              where your health is our passion.</p>
                            
               
               </div>
             </div>
             </div>

       


@endsection