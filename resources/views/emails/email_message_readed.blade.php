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
  <p>the message recipient (<strong>{{$recipent_email}}) read your message </strong></p>
   <p>A message read in : <strong>{{$datetime_readed}}</strong></p>
</body>
</html>
