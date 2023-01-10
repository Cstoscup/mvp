<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{asset('style.css')}}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/c681528e6a.js" crossorigin="anonymous"></script>
  <title>cBay</title>
</head>
<body>

  <div class="header">
    <div class="logo-div">
      <img class="logo" src="{{asset('images/logo.png')}}" alt="">
    </div>
    <div class="heading-buttons"><i class="fa-solid fa-user-plus register"></i> Register</div>
    <div class="heading-buttons"><i class="fa-solid fa-right-to-bracket login"></i> Login</div>
  </div>
  <div class="content">
    @yield('content')
  </div>
  <div class="footer">
    This project was coded by <a class="linkedin" href="https://www.linkedin.com/in/cstoscup/">Callie</a>
  </div>

</body>
</html>