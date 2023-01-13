<x-layout>
  <form enctype="multipart/form-data" class="new-listing-form" action="/listings" method="POST">
    <h2>Create New Listing</h2>
    @csrf

    <label for="title">
      Title:
      <input type="text" name="title" id="title" placeholder="Example: Desk" value="{{old('title')}}">
      @error('title')
        <p class="error">{{$message}}</p>
      @enderror
    </label>

    <label for="description">
      Description:
      <textarea type="text" name="description" id="description" placeholder="Include: features, color, dimensions, etc.">{{old('description')}}</textarea>
      @error('description')
        <p class="error">{{$message}}</p>
      @enderror
    </label>

    <label for="price">
      Price:
      <input type="text" name="price" id="price" placeholder="Example: $125" value="{{old('price')}}">
      @error('price')
        <p class="error">{{$message}}</p>
      @enderror
    </label>

    <label for="tags">
      Tags (Comma Separated):
      <input type="text" name="tags" id="tags" placeholder="Example: furniture, wood, stained, desk" value="{{old('tags')}}">
    </label>

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

    <div class="form-location">

      <label for="city">
        City:
        <input type="text" name="city" id="city" placeholder="Example: Detroit" value="{{old('city')}}">
        @error('city')
          <p class="error">{{$message}}</p>
        @enderror
      </label>

      <label for="state">
        State:
        <input type="text" name="state" id="state" placeholder="Example: Michigan" value="{{old('state')}}">
        @error('state')
          <p class="error">{{$message}}</p>
        @enderror
      </label>
    </div>

    <div class="form-contact">

      <label for="email">
        Email:
        <input type="text" name="email" id="email" placeholder="Example: name@gmail.com" value="{{old('email', $email)}}">
        @error('email')
          <p class="error">{{$message}}</p>
        @enderror
      </label>

      <label for="phone">
        Phone Number:
        <input type="text" name="phone" id="phone" placeholder="Example: 555-555-5555" value="{{old('phone')}}">
        @error('phone')
          <p class="error">{{$message}}</p>
        @enderror
      </label>

    </div>
    <input type="submit" value="Add Listing">
  </form>
</x-layout>