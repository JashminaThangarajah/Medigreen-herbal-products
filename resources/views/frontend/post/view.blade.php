@extends('layouts.app')
@section('title',"$post->meta_title")
@section('content')

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
       
       <form action="{{url('/add_rating')}}" method="POST">
              @csrf
              <input type="hidden" name="product_id" value="{{$post->id}}">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rate {{$post->name}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
           <div class="modal-body">
                            <div class="rating-css">
                                 <div class="star-icon">
                                   @if($user_rating)

                                      @for($i=1;$i<=$user_rating->stars_rated;$i++)
                                        <input type="radio" value="{{$i}}" name="product_rating" checked id="rating{{$i}}">
                                         <label for="rating{{$i}}" class="fa fa-star "></label>
                                       @endfor
                                       @for($j=$user_rating->stars_rated+1 ;$j<=5;$j++)
                                       <input type="radio" value="{{$j}}" name="product_rating"  id="rating{{$j}}">
                                         <label for="rating{{$j}}" class="fa fa-star "></label>
                                       @endfor

                                   @else
                                         <input type="radio" value="1" name="product_rating" checked id="rating1">
                                         <label for="rating1" class="fa fa-star"></label>
                                         <input type="radio" value="2" name="product_rating" id="rating2">
                                          <label for="rating2" class="fa fa-star"></label>
                                          <input type="radio" value="3" name="product_rating" id="rating3">
                                         <label for="rating3" class="fa fa-star"></label>
                                        <input type="radio" value="4" name="product_rating" id="rating4">
                                        <label for="rating4" class="fa fa-star"></label>
                                        <input type="radio" value="5" name="product_rating" id="rating5">
                                      <label for="rating5" class="fa fa-star"></label>
                                 @endif
                              </div>
                          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>

    </div>
  </div>
</div>


                        @if(session('message'))
                         <div class="alert alert-success">{{session('message')}}</div>
                        @endif
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
<div class="container">
       <h6 class="mb-0" >Products/{{$post->category->name}}/{{$post->name}}</h6>
</div>
</div>

  <div class="py-5 ">
   <div class="container">
   <div class="row product-data">
        <div class="col-md-8"> 
  
                <div class="view">
                       <h3 class="fw-bold">{!!$post->name!!}</h3> 
                       <img src="{{ asset('uploads/post/'.$post->image)}}" class="rounded mx-auto " width="300px" height="300px" alt="img">
                
                       @php $ratenum = number_format($rating_value) @endphp
                       <div class="rating"> 
                       @for($i=1;$i<=$ratenum;$i++)
                         <i class="fa fa-star checked "></i>
                      @endfor
                      @for($j= $ratenum+1;$j<=5;$j++)
                      <i class="fa fa-star"></i> 
                      @endfor
                  <span>
                    {{ $ratings->count()}} Ratings
                  </span>
                  </div>
                     

                     <h5>  <label class="me-3"><s> Original Price:  Rs {{number_format($post->original_price)}}</s></label></h5>
                     <h4>    <label class=""> Offer Price: Rs {{number_format($post->selling_price)}}</label></h4>
                      
                       <hr>
                       
                       @if($post->qty>0)
                       <label class="badge bg-success">In Stock</label>
                       @else
                          <label class="badge bg-secondary">Out of Stock</label>
                          @endif
                          
                          <div class="row mt-2">
                              <div class="col-md-2">
                                
                               <!--      <label >Quantity</label>
                                   <div class=" input-group text-center mb-3">
                                   <input type="hidden" value="{{$post->id }}" class="product_id">
                                   <input type="number" value="1" min ="1" max="100" class="qty-input form-control ">-->
                                   <input type="hidden" value="{{$post->id }}" class="product_id">
                                   <div class="input-group mb-3"  style="width:130px">       
                                   <button class="input-group-text decrement-btn">-</button>
                                          <input type="text"  value="1"  class="form-control text-center input-qty bg-white" disabled>
                                          <button class="input-group-text increment-btn">+</button>
                                   </div>   
                              </div>
                              </div> 

              <div class="row">
                  <div class="col-md-3"> 
                   @guest
                   <input type="hidden" class="product_id" value="{!!$post->id!!}" >
                   <button type="button" data-bs-toggle="modal" data-bs-target="#loginModal" class=" btn btn-success me-3m checkout-btn ">Add To Wishlist 
                     <i class="fa fa-heart"></i>
                   </button>
                   @else
                     <div class="">
                     <button type="button" class="btn btn-success me-3m addToWishlist float-start " >Add to Wishlist <i class="fa fa-heart"></i></button>
                     </div>
                     @endguest
                    </div> 

                     <div class="col-md-3">  
                     @if($post->qty>0)
                            @if (Auth::user())
                            <button type="button" class="add-to-cart-btn btn btn-warning m-0 py-2 px-3  " value="{!!$post->id!!}">Add To Cart <i class="fa fa-shopping-cart"></i></button>
                            @else
                            <button type="button" data-bs-toggle="modal" data-bs-target="#loginModal" class=" btn btn-warning m-0 py-2 px-3 checkout-btn ">Add To Cart <i class="fa fa-shopping-cart"></i></button>
                            @endif
                      @endif 
                      </div>             
                            
                     </div>

                            <hr>
                            <h4>Description</h4>
                            <div class="card-body ">
                       {!!$post->description!!}
                       </div>
                             
                              <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                  Rate this product
                                </button>

                                <a href="{{url('add-review/'.$post->slug.'/userreview')}}" class="btn btn-link float-end" >
                                  Write Review
                                </a>
                       <hr>
                          <div class="row post_id">
                              <div class="col-md-8 ">
                              @if ($reviews->isEmpty())
                                 <p>No reviews available.</p>
                              @else
                              @foreach ($reviews as $review)
                              <div class="post_id">
                              <label for="">{{$review->user->fname.' '.$review->user->lname}}</label>
                              @if($review->user_id == Auth::id())
                              <a href="{{url('edit-review/'.$post->slug.'/userreview')}}">Edit</a>
                              @endif
                             <br>
                             @php $ratenum = number_format($rating_value) @endphp
                                     <div class="rating"> 
                             @for($i=1;$i<=$ratenum;$i++)
                                 <i class="fa fa-star checked "></i>
                             @endfor
                             @for($j= $ratenum+1;$j<=5;$j++)
                                 <i class="fa fa-star"></i> 
                             @endfor

                             <small>Reviewed On {{$review->created_at->format('d M Y')}}</small>
                              <p>{{$review->user_review}}</p>
                              </div>
       
                              @endforeach
                              @endif

                          
                            
                              </div>
                          </div> 

                               

                    </div>
               </div>      
         </div> 
         
             

         <div class="card-md-2">
            <div class="card mt-1">
             <div class="card-header">
             <h4>Latest Products</h4>
             </div>
                    <div class="card-body">
                          @foreach($latest_posts as $latest_post_item)
                            <a href="{{url('product/'.$latest_post_item->category->slug.'/'.$latest_post_item->slug)}}" class="text-decoration-none">
                                   <h6>>{{$latest_post_item->name}}</h6>
                          </a>
                          @endforeach
                    </div>
            </div>
        </div>
       
    </div> 
  </div>
  
</div>
</div>


@endsection


<!--Quantity
@section('scripts')
<script>
 $(document).ready(function () {

       $('.increment-btn').click(function(e){
              e.preventDefault();
              var inc_value=$('.qty-input').val();
              var value = parseInt(inc_value,10);
              value = isNaN(value) ? 0 : value;
              if(value<10){
                     value++;
                     $('.qty-input').val(value);
              }
              
        });

        $('.decrement-btn').click(function(e){
              e.preventDefault();
              var dec_value=$('.qty-input').val();
              var value = parseInt(dec_value,10);
              value = isNaN(value) ? 0 : value;
              if(value>1){
                     value--;
                     $('.qty-input').val(value);
              }
              
        });
 });
</script>
@endsection  -->