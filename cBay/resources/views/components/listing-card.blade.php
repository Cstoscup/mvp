@props(['listing'])

<div class="main-listing">
  @if (count($listing->photo) > 0)
    <a href="/listings/{{$listing['id']}}">
      <img class="main-listing-photo" src="{{$listing->photo[0]->photo_url}}" alt="">
    </a>
  @else
    <p>There are no photos</p>
  @endif

  <div class="main-listing-info">
    <a class="main-listing-title" href="/listings/{{$listing['id']}}" >{{$listing['title']}}</a>
    <div class="main-listing-location-price">
      <div class="main-listing-location">{{$listing['city']}}, {{$listing['state']}}</div>
      <div class="main-listing-price">${{$listing['price']}}</div>
    </div>
  </div>

</div>