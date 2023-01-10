@extends('layout')

@section('content')

<div class="listing-container">
  <h2>{{$listing['title']}}</h2>
  <div class="listing-photos">
    @forelse ($listing->photo as $photo)
      <img class="listing-photo" src={{$photo->photo_url}} alt="">
    @empty
      <p>No images found</p>
    @endforelse
  </div>
  <p>{{$listing['description']}}</p>
</div>

@endsection