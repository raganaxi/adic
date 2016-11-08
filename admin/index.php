<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>Login</title>
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700">
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="../css/helpers.css">
</head>
<body>
  <div id="login" class="z-container">
    <div class="z-row">
      <div class="z-col-lg-4 z-col-md-4 z-col-sm-6 z-col-xs-12 z-col-lg-offset-4 z-col-md-offset-4 z-col-sm-offset-3 z-col-xs-offset-0">
        <form name='form-login'>
          <span class="fontawesome-user"></span>
          <input type="text" id="user" placeholder="Username">
          <span class="fontawesome-lock"></span>
          <input type="password" id"pass" placeholder="Password">
          <input id="loginAdmin" type="button" value="Login" class="z-btn bgGreen cWhite">
        </form>
      </div>
    </div>
  </div>
  <script src="js/jquery.min.js" type="text/javascript"></script>
  <script src="js/scripts.js" type="text/javascript"></script>
</body>
</html>
