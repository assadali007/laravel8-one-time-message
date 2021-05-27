<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}}</title>
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
</head>
<body>
  <div class="container">
      <div class="row">
          <div class="column">
              <h1 class="text-center my-5">{{config('app.name')}}</h1>
              @yield('content')
              <div class="text-center my-5">
                  <small>Created by Asad Ali &copy; {{date('Y')}}</small>
              </div>
          </div>
      </div>
  </div>
</body>
</html>
