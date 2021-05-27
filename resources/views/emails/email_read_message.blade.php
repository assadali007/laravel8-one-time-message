<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}}</title>
</head>
<body>
  <h4>{{env('APP_NAME')}}</h4>
  <p>do you have a message to read on {{env('APP_NAME')}}</p>
  <p>IMPORTANT: you will only be able to read the message once</p>
  <a href="{{route('main_read',['purl' => $purl_code])}}">read  message</a>
</body>
</html>
