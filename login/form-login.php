<!DOCTYPE html>
<html>
<head>
  <title>LogIn Form</title>
      <link rel="stylesheet" href="css/style.css">
       <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
        <script src="validasi.js"></script>
</head>
<body>
<div id="container">
  <form action="login.php" method="post">
        <div class="container">
                <div class="top-login">
                  <div class="title">Login Siuniv </div>
                <div class="line-1"></div>
                <div class="line-2"></div>
                <div class="line-3"></div>
                <div class="line-11"></div>
                <div class="line-22"></div>
                <div class="line-33"></div>
                <div class="line-111"></div>
                <div class="line-222"></div>
                <div class="line-333"></div>
            </div>
            </span>
            <div> <img src="gambar/journalist.png" class="ikon" style="margin-top:50px; margin-left:135px">  </div>
            <div class="character-bacground"></div>
            <div class="character-bacground2"></div>
            <div class="character-bacground3"></div>
            <div class="character-circle1"></div>
            <div class="character-circle2"></div>

            <div class="login-box">
              <div class="morab31"></div>
              <div class="morab32"></div>
              <div class="morab33"></div>
              <div class="morab34"></div>
              <div class="wrap-input100 ">
                <input class="input100" type="text" name="Username" id="Username" placeholder="Username">
                	<span class="focus-input100" data-placeholder="&#xf207;" ></span>
              </div>
              <div class="wrap-input100">
                <input  class="input100" type="password" name="password" id="password" placeholder="Password">
                	<span class="focus-input100" data-placeholder="&#xf191;" ></span>
                    </div>
                <button type="submit" class="button" name="submit" onclick="return validasiLogin()">Login</button>
            </div>
            <div class="down-login">
            </div>
        </div>
    </div>
  </form>
</div>
</body>

</html>
