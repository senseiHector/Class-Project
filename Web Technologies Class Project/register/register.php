<?php
  //Require Processing File
  require_once("../unsecure/processunsecure.php");
?>
<!DOCTYPE html>
<html>
  <!--Head-->
  <head>
    <meta charset="UTF-8">
  	<title>CPTerminal || Register</title>

    <!--Import google fonts-->
    <link type="text/css" href="../fonts/materialicons.css" rel="stylesheet">

    <!--Materialize CSS-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>

    <!--Personal CSS-->
    <link type="text/css" rel="stylesheet" href="../css/myStyle.css"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>

  <!--Body-->
  <body onload = "getMajors()">
    <!--Nav and Header-->
    <nav class ="green">
      <div class="nav-wrapper">
        <a href="../" class="brand-logo center">CPTerminal</a>
      </div>
    </nav>
    <!--Main Content Container-->
    <div class = "container">
      <div class="row">
        <div class="col s8 offset-s2" style = "margin-top:10%">
          <div class="card white">
            <div class="card-content">
              <span class="card-title center">REGISTER</span>
              <span>*All Fields Are Required</span>
              <!--Registration Form-->
              <form method = "post" action = "" onsubmit="return validRegistry(this)">
                <div class="row">
                  <div class="input-field col s6">
                    <input id="firstname" name="firstname" type="text" class="validate" value="<?php echo $firstname; ?>">
                    <label for="firstname">First Name <span style="color:red"><?php echo $firstname_err;?></span></label>
                  </div>
                  <div class="input-field col s6">
                    <input id="lastname" name="lastname" type="text" class="validate" value="<?php echo $lastname; ?>">
                    <label for="lastname">Last Name <span style="color:red"><?php echo $lastname_err;?></span></label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="username" name="username" type="text" class="validate" onchange="checkUsername()" value="<?php echo $username; ?>">
                    <label for="username">Username <span style="color:red"><?php echo $username_err;?></span></label>
                    <span id = "checkUsername"></span>
                    <input type="text" name="userStat" hidden id="userStat">
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="password" name="password" type="password" class="validate" value="<?php echo $password; ?>">
                    <label for="password">Password <span style="color:red"><?php echo $password_err;?></span></label>
                    <span style="color:red"><?php echo $password_error;?></span>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="email" name="email" type="email" class="validate" onchange="checkEmail()" value="<?php echo $email; ?>">
                    <label for="email">E-Mail <span style="color:red"><?php echo $email_err;?></span></label>
                    <span id = "checkEmail"></span><span id = "emailerror" style="color:red"><?php echo $email_error;?></span>
                    <input type="text" name="emailStat" hidden id="emailStat">
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <h6>Gender <span style="color:red"><?php echo $gender_err;?></span></h6>
                    <p>
                      <input name="gender" type="radio" class="with-gap" id="female"
                        <?php if (isset($gender) && $gender=="F") echo "checked";?> value="F"/>
                      <label for="female">Female</label>
                      <input name="gender" type="radio" class="with-gap" id="male"
                      <?php if (isset($gender) && $gender=="M") echo "checked";?> value="M"/>
                      <label for="male">Male</label>
                    </p>
                  </div>
                </div>

                <div class="row">
                  <div class="input-field col s12">
                    <h6>Major<span style="color:red"><?php echo $major_err;?></span></h6>
                    <select class="browser-default" onchange="getCourses()" id="majorSelect" name="majorSelect"></select>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12" id="courses"></div>
                </div>
                <span id="notices" style="color:red"></span>
                <div class="row">
                  <div class="input-field col s4 offset-s4">
                    <button class="waves-effect waves-light btn" type="submit" name="register">REGISTER</button>
                  </div>
                </div>
                <div class="row">
									<div class="input-field col s12">
										<p class = "center">Already Have an Account? <a href="../login/index.php">Login</a></p>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <script type="text/javascript" src="../js/registerscript.js"></script>
  </body>
</html>
