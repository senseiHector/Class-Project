<!DOCTYPE html>
<html>
  <!--Head-->
  <head>
    <title>CPTerminal || Majors</title>

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
  <body onload="viewMajors()">
    <?php include("../settings/core_ini.php");isLoggedIn();?>
		<div class = "container">
      <div class="row">
				<div class="col s12" style = "margin-top:10%">
          <div class="card white">
            <div class="card-content center">
              <span class="card-title">All Majors</span>
              <table>
                <thead>
                  <tr>
                    <th>Major ID</th>
                    <th colspan="3">Major Name</th>
                  </tr>
                </thead>
                <tbody id="tbod">
                </tbody>
              </table>
						</div>
            <div class="card-action">
                Insert New Major:
                <div class="input-field inline">
                  <input id="newMajor" type="text" class="validate">
                  <label for="newMajor">New Major</label>
                  <span id = "err_span" style="color:red"></span>
                </div>
                <button class="waves-effect waves-light btn" onclick="insertMajor()">Insert</button>
            </div>
					</div>
				</div>
			</div>
      <div class="row" id="edit" hidden>
        <div class="col s12" style = "margin-top:10%">
          <div class="card white">
            <div class="card-content">
							<span class="card-title center" id ="editMajor">EDIT MAJOR</span>
              </br>
              New Major Name:
              <div class="input-field inline">
                <input id="changeMajor" type="text" class="validate">
                <label for="changeMajor">New Name</label>
                <span id = "err_span_2" style="color:red"></span>
              </div>
              <button class="waves-effect waves-light btn" onclick="editMajor()">Edit</button>
              <input id="editID" type="text" class="validate" hidden>
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
