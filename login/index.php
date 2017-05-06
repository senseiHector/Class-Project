<?php
  require_once("../unsecure/processunsecure.php");
?>
<!DOCTYPE html>
<html>
  <!--Head-->
  <head>
    <title>CPTerminal || Login</title>

    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>

    <!--Personal CSS-->
    <link type="text/css" rel="stylesheet" href="../css/myStyle.css"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>
  <!--Body-->
  <body>
    <nav class ="green">
      <div class="nav-wrapper">
        <a href="#" class="brand-logo center">CPTerminal</a>
      </div>
    </nav>
    <br>
    <div class = "container">
      <div class="row">
				<div class="col s8 offset-s2" style = "margin-top:10%">
          <div class="card white">
            <div class="card-content">
              <input id="hid" hidden type="text" value ="<?php echo $notice;?>">
              <span class="card-title center">LOGIN</span>
              <span class="card-title center" style="color:red" id="notice"></span>
              <span class="card-title center" style="color:red"><?php echo $login_notice;?></span>
			        <form method = "post" action = "" onsubmit="return validLogin(this)">
			          <div class="row">
			            <div class="input-field col s12">
			              <input id="username" name="username" type="text" class="validate" value="<?php echo $username; ?>">
			              <label for="username">Username <span style="color:red"><?php echo $username_err;?></span></label>
			            </div>
			          </div>
			          <div class="row">
			            <div class="input-field col s12">
			              <input id="password" name="password" type="password" class="validate" value="<?php echo $password; ?>">
			              <label for="password">Password <span style="color:red"><?php echo $password_err;?></span></label>
			            </div>
			          </div>
								<div class="row">
                  <div class="input-field col s12 center">
                    <button class="waves-effect waves-light btn" type="submit" name="login">LOGIN</button>
                  </div>
								</div>
								<div class="row">
									<div class="input-field col s12">
										<p class = "center">Don't Have an Account? <a href="../register/register.php">Register</a></p>
                  </div>
                </div>
			        </form>
						</div>
					</div>
				</div>
      </div>
    </div>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <script type="text/javascript" src="../js/loginscript.js"></script>
  </body>
</html>
