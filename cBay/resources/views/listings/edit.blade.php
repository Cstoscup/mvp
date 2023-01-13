<x-layout>
  <form enctype="multipart/form-data" class="new-listing-form" action="/listings/{{$listing->id}}" method="POST">
    <h2>Edit Information</h2>
    @csrf
    @method('PUT')

    <label for="title">
      Title:
      <input type="text" name="title" id="title" placeholder="Example: Desk" value="{{$listing->title}}">
      @error('title')
        <p class="error">{{$message}}</p>
      @enderror
    </label>

    <label for="description">
      Description:
      <textarea type="text" name="description" id="description" placeholder="Include: features, color, dimensions, etc.">{{$listing->description}}</textarea>
      @error('description')
        <p class="error">{{$message}}</p>
      @enderror
    </label>

    <label for="price">
      Price:
      <input type="text" name="price" id="price" placeholder="Example: $125" value="{{$listing->price}}">
      @error('price')
        <p class="error">{{$message}}</p>
      @enderror
    </label>

    <label for="tags">
      Tags (Comma Separated):
      <input type="text" name="tags" id="tags" placeholder="Example: furniture, wood, stained, desk" value="{{$listing->tags}}">
    </label>

    <div class="form-location">

      <label for="city">
        City:
        <input type="text" name="city" id="city" placeholder="Example: Detroit" value="{{$listing->city}}">
        @error('city')
          <p class="error">{{$message}}</p>
        @enderror
      </label>

      <label for="state">
        State:
        <input type="text" name="state" id="state" placeholder="Example: Michigan" value="{{$listing->state}}">
        @error('state')
          <p class="error">{{$message}}</p>
        @enderror
      </label>
    </div>

    <div class="form-contact">

      <label for="email">
        Email:
        <input type="text" name="email" id="email" placeholder="Example: name@gmail.com" value="{{$listing->email}}">
        @error('email')
          <p class="error">{{$message}}</p>
        @enderror
      </label>

      <label for="phone">
        Phone Number:
        <input type="text" name="phone" id="phone" placeholder="Example: 555-555-5555" value="{{$listing->phone}}">
        @error('phone')
          <p class="error">{{$message}}</p>
        @enderror
      </label>

    </div>
    <input type="submit" value="Update Listing">
  </form>
  <a href="/listings/manage" class="listing-back-button">Return to Manage Listings</a>
</x-layout>