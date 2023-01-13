<x-layout>
  <div class="user-listings">
    <h2>Your Listings</h2>
    @if(count($listings) === 0)
      <p>No listings found!</p>
    @endif
    @foreach($listings as $listing)
      <div class="user-listing">
        <a class="user-listing-title" href="/listings/{{$listing->id}}">
          {{$listing->title}}
        </a>
        <a href="/listings/{{$listing->id}}/edit" class="user-button">
          Edit Information
        </a>
        <a href="/listings/{{$listing->id}}/photos/edit" class="user-button">
          Edit Photos
        </a>

        <form method="POST" action="/listings/{{$listing->id}}">
          @csrf
          @method('DELETE')
          <button class="user-button">Delete</button>
        </form>
      </div>
    @endforeach
  </div>
  <a href="/" class="listing-back-button">Return Home</a>
</x-layout>