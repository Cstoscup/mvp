<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{asset('change.css?v=').time()}}">
  <script src="//unpkg.com/alpinejs" defer></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/c681528e6a.js" crossorigin="anonymous"></script>
  <title>cBay</title>
</head>
<body>

  <div class="header">
    <div class="logo-div">
      <a href="/">
        <img class="logo" src="{{asset('images/logo.png')}}" alt="">
      </a>
    </div>
    @auth
      <div class="welcome-message">Welcome, {{Auth::user()->name}}!</div>
      <a class="heading-buttons" href="/listings/manage">Manage Listings</a>
      <form action="/logout" method="POST" class="heading-buttons">
        @csrf
        <button class="not-a-button">Logout</button>
      </form>
    @endauth
    @guest
      <a class="heading-buttons" href="/register">Register</a>
      <a class="heading-buttons" href="/login">Login</a>
    @endguest

  </div>
  <x-flash-message />
  <div class="content">
    {{$slot}}
  </div>
  <div class="footer">
    <a class="sell-button" href="/listings/create">List an item</a>
  </div>
</body>
</html>