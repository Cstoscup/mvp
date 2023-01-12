<x-layout>
  @include('partials._hero')
  @include('partials._search')

  @if(count($listings) === 0)
    <p>No listings found!</p>
  @endif
  <div class="main-listings">
    @foreach($listings as $listing)
      <x-listing-card :listing="$listing" />
    @endforeach
  </div>
  <div class="next-page">
    {{$listings->links('pagination::bootstrap-5')}}
  </div>
</x-layout>