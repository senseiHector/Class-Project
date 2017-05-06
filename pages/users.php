<!DOCTYPE html>
<html>
  <!--Head-->
  <head>
    <title>CPTerminal || Users</title>

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
  <body onload = "viewUsers()">
    <?php include("../settings/core_ini.php");isLoggedIn();?>
    <br>
		<div class = "container">
      <div class="row">
				<div class="col s12" style = "margin-top:10%">
          <div class="card white">
            <div class="card-content center">
							<span class="card-title">All Users</span>
              <table>
                <thead>
                  <tr>
                    <th>User ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th colspan = "3">Role</th>
                  </tr>
                </thead>
                <tbody id="tbod">
                </tbody>
              </table>
						</div>
					</div>
				</div>
			</div>
		</div>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>
  </body>
</html>
