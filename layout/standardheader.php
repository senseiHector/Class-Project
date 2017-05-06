<?php
$root = "http:/classproject2017";
echo "<nav class=\"green\">
        <div class=\"nav-wrapper\">
          <a href=\"#\" class=\"brand-logo center\">CPTerminal</a>
          <a href=\"#\" data-activates=\"slide-out\" class=\"button-collapse show-on-large left\">
            <i class=\"material-icons\">menu</i>
          </a>
          <ul id=\"slide-out\" class=\"side-nav green left\">
            <li><a class=\"white-text\" href=\"$root/pages/dashboard.php\">Home</a></li>
            <li><a class=\"white-text\" href=\"$root/pages/courses.php\">Courses</a></li>
            <li><a class=\"white-text\" href=\"$root/pages/register_course.php\">Course Registry</a></li>
            <li><a class=\"white-text\" href=\"$root/login/logout.php\">Logout</a></li>
          </ul>
        </div>
        </nav>
        </br>";
if($_SESSION['gender']=="F")
  echo "<div><span class=\"white-text right\" style =\"font-size:100%;padding-right:1%\">".
          "Welcome <div class=\"chip white\"><img src=\"../image/female.png\" alt=\"Contact Person\">".
          $_SESSION['firstname']." ".$_SESSION['lastname']."</div></span>
          </div>";
else
  echo "<div><span class=\"white-text right\" style =\"font-size:100%;padding-right:1%\">".
          "Welcome <div class=\"chip white\"><img src=\"../image/male.png\" alt=\"Contact Person\">".
          $_SESSION['firstname']." ".$_SESSION['lastname']."</div></span>
          </div>";
 ?>
