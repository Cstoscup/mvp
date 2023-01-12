<x-layout>
    <form enctype="multipart/form-data" class="new-listing-form" action="/photos/{{$id}}" method="POST">
      <h2>Edit Photos</h2>
      @csrf
      <label for="photos">
        Photos:
        <div class="upload-photos" id="photos">
          <input type="file" name="photo-1" id="photo-1" value="{{old('photo-1')}}">
          <input type="file" name="photo-2" id="photo-2" value="{{old('photo-2')}}">
          <input type="file" name="photo-3" id="photo-3" value="{{old('photo-3')}}">
          <input type="file" name="photo-4" id="photo-4" value="{{old('photo-4')}}">
          <input type="file" name="photo-5" id="photo-5" value="{{old('photo-5')}}">
        </div>
      </label>
      <input type="submit" value="Add Photos">
    </form>

  <div class="form-container edit-listing-photos">
    @forelse ($photos as $photo)
      <form class="edit-photo-form" method="POST" action="/photos/{{$photo->id}}">
        @csrf
        @method('DELETE')
        <img class="listing-photo" src={{$photo->photo_url}} alt="">
        <button type="submit" class="delete-photo-button"><i class="fa-solid fa-trash-can"></i></button>
      </form>
    @empty
      <p>No images found</p>
    @endforelse
  </div>
</x-layout>