<!DOCTYPE html>
<html>
  <!--Head-->
  <head>
    <title>CPTerminal || Courses</title>

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
  <body onload="viewAllCourses();getMajorsOffering();">
      <?php include("../settings/core_ini.php");isLoggedIn();?>
    <br>
		<div class = "container">
      <div class="row">
				<div class="col s12" style = "margin-top:10%">
          <div class="card white">
            <div class="card-content center">
							<span class="card-title">All Courses</span>
              <table>
                <thead>
                  <tr>
                    <th>Course Code</th>
                    <th colspan="3">Course Name</th>
                  </tr>
                </thead>
                <tbody id="tbod">
                </tbody>
              </table>
						</div>
            <!-- <div class="card-action center">
              <button class="waves-effect waves-light btn" onclick="showInsert()">Insert Course</button>
              <input id="editID" type="text" class="validate" hidden>
            </div> -->
					</div>
				</div>
			</div>
      <div class="row" id = "insert_card" hidden>
				<div class="col s12">
          <div class="card white">
            <div class="card-content">
              <h1 class="card-title center">Insert New Course</h1>
              <div class = "container">
                <div class="row">
                  <div class="input-field col s12">
                    <input id="newCourse" type="text" class="validate">
                    <label for="newCourse">New Course Name</label>
                    <span style="color:red" id="err_span"></span>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s6">
                    <input id="coursecode" name="coursecode" type="text" class="validate">
                    <label for="coursecode">Course Code</label>
                    <span style="color:red" id="err_span_d"></span>
                  </div>
                  <span style="color:red" id="err_span_d"></span>
                  <div class="input-field col s6">
                    <h6>Course Year</h6>
                    <select class="browser-default" id="courseyear" name="courseyear">
                      <option value="" disabled selected>Please Choose a Year...</option>
                      <option value="1">First Year</option>
                      <option value="2">Second Year</option>
                      <option value="3">Third Year</option>
                      <option value="4">Fourth Year</option>
                    </select>
                    <span style="color:red" id="err_span_y"></span>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12" id="majorsOffering"></div>
                </div>
                <button class="waves-effect waves-light btn" onclick="insertCourse()">Insert</button>
              </div>
            </div>
					</div>
				</div>
			</div>
      <div class="row" id = "edit_card" hidden>
				<div class="col s12">
          <div class="card white">
            <div class="card-content">
              <span class="card-title center" id="edit_title"></span>
              <div class = "container">
                <div class="row">
                  <div class="input-field col s12">
                    <input id="newCourse" type="text" class="validate">
                    <label for="newCourse">New Course Name</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s6">
                    <input id="coursecode" name="coursecode" type="text" class="validate">
                    <label for="coursecode">Course Code</label>
                  </div>
                  <div class="input-field col s6">
                    <h6>Course Year</h6>
                    <select class="browser-default" id="courseyear" name="courseyear">
                      <option value="" disabled selected>Please Choose a Year...</option>
                      <option value="1">First Year</option>
                      <option value="2">Second Year</option>
                      <option value="3">Third Year</option>
                      <option value="4">Fourth Year</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12" id="majorsOffering"></div>
                </div>
                <button class="waves-effect waves-light btn" onclick="insertCourse()">Insert</button>
              </div>
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
