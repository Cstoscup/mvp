<x-layout>
  <div class="listing-container">
    <div class="listing-heading">
      <h2 class="listing-title">{{$listing['title']}}</h2>
      <h2 class="listing-price">${{$listing->price}}</h2>
    </div>

    <div class="listing-tags">
      @forelse ($listing->tag as $tag)
        <a class="listing-tag" href="/?tag={{$tag->tag}}">{{$tag->tag}}</a>
      @empty
        <p>No tags found</p>
      @endforelse
    </div>

    <div class="listing-photos">
      @forelse ($listing->photo as $photo)
        <img class="listing-photo" src={{$photo->photo_url}} alt="">
      @empty
        <p>No images found</p>
      @endforelse
    </div>

    <div class="listing-description">
      <h3>Description</h3>
      <p>{{$listing['description']}}</p>
    </div>

    <div class="listing-contact-section">
      <h3>Contact Information</h3>
      <div class="listing-contact-information">
        <div>
          <i class="fa-solid fa-location-dot"></i> {{$listing->city}}, {{$listing->state}}
        </div>
        <div>
          <i class="fa-solid fa-phone"></i> {{$listing->phone}}
        </div>
        <div>
          <i class="fa-solid fa-inbox"></i> {{$listing->email}}
        </div>
      </div>
    </div>

    <a href="/" class="listing-back-button">Return Home</a>
  </div>
</x-layout>