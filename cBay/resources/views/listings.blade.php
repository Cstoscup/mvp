@extends('layout')

@section('content')

@if(count($listings) === 0)
  <p>No listings found!</p>
@endif
<div class="main-listings">
  @foreach($listings as $listing)
    <div class="main-listing">
      <img class="main-listing-photo" src="{{$listing->photo[0]->photo_url}}" alt="">
      <a class="main-listing-title" href="/listings/{{$listing['id']}}" >{{$listing['title']}}</a>
      <div class="main-listing-location-price">
        <div class="main-listing-location">{{$listing['city']}}, {{$listing['state']}}</div>
        <div class="main-listing-price">${{$listing['price']}}</div>
      </div>
    </div>
  @endforeach
</div>

@endsection