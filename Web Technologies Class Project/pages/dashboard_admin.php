<!DOCTYPE html>
<html>
  <!--Head-->
  <head>
    <title>CPTerminal || Admin Dashboard</title>

    <!--Import google fonts-->
    <link type="text/css" href="../fonts/materialicons.css" rel="stylesheet">

    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>

    <!--Personal CSS-->
    <link type="text/css" rel="stylesheet" href="../css/myStyle.css"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>
  <!--Body-->
  <body>
    <?php include("../settings/core_ini.php");isLoggedIn();?>
    <br>
		<div class = "container">
      <div class="row">
				<div class="col s12">
          <div class="card white">
            <div class="card-content center">
							<span class="card-title">Administrator Dashboard</span>
						</div>
					</div>
				</div>
			</div>
      <div class="row">
				<div class="col s4">
          <div class="card white">
            <div class="card-content center">
							<span class="card-title">Manage Majors</span>
              <a href="majors_admin.php"><i class="large material-icons green-text text-darken-2">class</i></a>
						</div>
					</div>
				</div>
        <div class="col s4">
          <div class="card white">
            <div class="card-content center">
							<span class="card-title">Manage Courses</span>
              <a href="courses_admin.php"><i class="large material-icons green-text text-darken-2">assignment</i></a>
						</div>
					</div>
				</div>
        <div class="col s4">
          <div class="card white">
            <div class="card-content center">
							<span class="card-title">Manage Users</span>
              <a href="users.php"><i class="large material-icons green-text text-darken-2">recent_actors</i></a>
						</div>
					</div>
				</div>
			</div>
		</div>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>
  </body>
</html>
