<x-layout>
  <form enctype="multipart/form-data" class="new-listing-form" action="/users" method="POST">
    <h2>Create Account</h2>
    @csrf

    <label for="name">
      Name:
      <input type="text" name="name" id="name" placeholder="Example: Callie Stoscup" value="{{old('name')}}">
      @error('name')
        <p class="error">{{$message}}</p>
      @enderror
    </label>

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

    <label for="password_confirmation">
      Confirm Password:
      <input type="password" name="password_confirmation" id="password_confirmation" value="{{old('password')}}">
      @error('password_confirmation')
        <p class="error">{{$message}}</p>
      @enderror
    </label>

    <input type="submit" value="Sign Up">
    <div>
      Already have an account?
      <a href="/login">Log In</a>
    </div>
  </form>
</x-layout>