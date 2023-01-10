@props(['listing'])

<div class="main-listing">
  <a href="/listings/{{$listing['id']}}">
    <img class="main-listing-photo" src="{{$listing->photo[0]->photo_url}}" alt="">
  </a>
  <a class="main-listing-title" href="/listings/{{$listing['id']}}" >{{$listing['title']}}</a>
  <div class="main-listing-location-price">
    <div class="main-listing-location">{{$listing['city']}}, {{$listing['state']}}</div>
    <div class="main-listing-price">${{$listing['price']}}</div>
  </div>
</div>