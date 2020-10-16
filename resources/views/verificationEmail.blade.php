<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verify your Ecommerce email</title>
</head>
<body>
  <h1>Please click the following link to verify you account</h1>

  <a href="{{ url("account/verify/email", ['token'=>$token]) }}"></a>

</body>
</html>
