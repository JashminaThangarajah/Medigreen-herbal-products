@extends('layouts.app')
@section('title',"Edit Review")
@section('content')

<div class="content">
<div class="container py-5">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                            @if(session('message'))
                                <div class="alert alert-success">{{session('message')}}</div>
                            @endif

                      
                        <h5>You are editing the review for {{$review->post->name}}</h5>
                        <form action="{{url('/update_reviews')}}" method="POST">
                         @csrf
                         @method('PUT')
                        <input type="hidden" name="review_id" value="{{$review->id}}" >
                        <textarea type="text" name="user_review" id="mySummernote" class="form-control" placeholder="Write a review" rows="5">{{$review->user_review}}</textarea>
                       <button type="submit" class="btn btn-success mt-3 float-end">Update Review</button>
                       </form>
                       

            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection

