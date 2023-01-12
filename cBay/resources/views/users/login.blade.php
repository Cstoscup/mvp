<x-layout>
  <form enctype="multipart/form-data" class="new-listing-form" action="/users/verify" method="POST">
    <h2>Log into Your Account</h2>
    @csrf

    <label for="email">
      Email:
      <input type="text" name="email" id="email" placeholder="Example: name@gmail.com" value="{{old('email')}}">
      @error('email')
        <p class="error">{{$message}}</p>
      @enderror
    </label>

    <label for="password">
      Password:
      <input type="password" name="password" id="password" value="{{old('password')}}">
      @error('password')
        <p class="error">{{$message}}</p>
      @enderror
    </label>

    <input type="submit" value="Log In">

    <div>
      Need an account?
      <a href="/register">Register</a>
    </div>
  </form>
</x-layout>