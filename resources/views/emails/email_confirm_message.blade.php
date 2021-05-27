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
  <p>click on the  link to confirm the sending of the message</p>
  <a href="{{route('main_confirm',['purl' => $purl_code])}}">confirm message</a>
</body>
</html>
