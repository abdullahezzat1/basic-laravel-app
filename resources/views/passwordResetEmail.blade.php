<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Password Reset</title>
</head>
<body>
  <h1>Please click the following link to reset your password</h1>

  <a href="{{ url("account/reset-password", ['token'=>$token]) }}"></a>

</body>
</html>
