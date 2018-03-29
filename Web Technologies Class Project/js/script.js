function viewMajors(){
  var x = new XMLHttpRequest();
  x.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
        document.getElementById("tbod").innerHTML = this.responseText;
    }
    else if(this.status == 403){
      document.write("Error 403. Forbidden!");
    }
    else if(this.status == 404){
      document.write("Error 404. Not Found!");
    }
  }
  x.open("GET","../controller/major_controller.php?load=1", true);
  x.send();
}

function insertMajor(){
  var err_span = document.getElementById("err_span");
  var newMajor = document.getElementById("newMajor");
  if(newMajor.value!=""){
    var x = new XMLHttpRequest();
    x.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
        location.reload();
      }
      else if(this.status == 403){
        document.write("Error 403. Forbidden!");
      }
      else if(this.status == 404){
        document.write("Error 404. Not Found!");
      }
    }
    x.open("GET","../controller/major_controller.php?insert="+newMajor.value, true);
    x.send();
  }
  else{
    err_span.innerHTML="Field Cannot Be Blank";
  }
}

function deleteMajor(major_id){
  var del = confirm("Are You Sure You Want To Delete This Major Permanently?");
  if(del){
    var x = new XMLHttpRequest();
    x.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
        if(this.responseText == "success")
          location.reload();
        else
          alert(this.responseText);
      }
      else if(this.status == 403){
        document.write("Error 403. Forbidden!");
      }
      else if(this.status == 404){
        document.write("Error 404. Not Found!");
      }
    }
    x.open("GET","../controller/major_controller.php?delete="+major_id, true);
    x.send();
  }
}

function startEdit(major_id){
  var editDiv = document.getElementById("edit");
  var editID = document.getElementById("editID");
  var editMajor = document.getElementById("editMajor");
  editDiv.hidden = false;
  editID.value = major_id;

  var x = new XMLHttpRequest();
  x.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      editMajor.innerHTML = "EDIT MAJOR: "+this.responseText;
    }
    else if(this.status == 403){
      document.write("Error 403. Forbidden!");
    }
    else if(this.status == 404){
      document.write("Error 404. Not Found!");
    }
  }
  x.open("GET","../controller/major_controller.php?getedit="+major_id, true);
  x.send();
  window.location.hash = "edit";

}

function startEditCourse(course_id){
  var editCard = document.getElementById("edit_card");
  var insertCard = document.getElementById("insert_card");
  var editID = document.getElementById("editID");
  var edit_title = document.getElementById("edit_title");
  editID.value = course_id;

  var x = new XMLHttpRequest();
  x.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      edit_title.innerHTML = "Edit Course: "+this.responseText;
    }
    else if(this.status == 403){
      document.write("Error 403. Forbidden!");
    }
    else if(this.status == 404){
      document.write("Error 404. Not Found!");
    }
  }
  x.open("GET","../controller/course_controller.php?getedit="+course_id, true);
  x.send();
  editCard.hidden = false;
  insertCard.hidden = true;
  window.location.hash = "edit_card";

}

function editMajor(){
  var err_span_2 = document.getElementById("err_span_2");
  var editMajor = document.getElementById("changeMajor");
  var editID = document.getElementById("editID");
  if(editMajor.value!=""){
    var x = new XMLHttpRequest();
    x.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
        window.open("majors_admin.php","_self");
      }
      else if(this.status == 403){
        document.write("Error 403. Forbidden!");
      }
      else if(this.status == 404){
        document.write("Error 404. Not Found!");
      }
    }
    var request = "../controller/major_controller.php?edit="+editID.value+
    "&new="+editMajor.value;
    x.open("GET",request, true);
    x.send();
  }
  else
    err_span_2.innerHTML = "Field Cannot Be Blank";
}

function viewCourses(){
  var x = new XMLHttpRequest();
  x.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
        document.getElementById("tbod").innerHTML = this.responseText;
    }
    else if(this.status == 403){
      document.write("Error 403. Forbidden!");
    }
    else if(this.status == 404){
      document.write("Error 404. Not Found!");
    }
  }
  x.open("GET","../controller/course_controller.php?load=1", true);
  x.send();
}

function dropCourse(course_id){
  var grade_id = "grade"+course_id;
  var grade = document.getElementById(grade_id).innerHTML;
  var drop = confirm("Are You Sure You Want To Drop This Course?");
  if(drop){
    var x = new XMLHttpRequest();
    x.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
        if(this.responseText == "")
          location.reload();
        else
          alert(this.responseText);
      }
      else if(this.status == 403){
        document.write("Error 403. Forbidden!");
      }
      else if(this.status == 404){
        document.write("Error 404. Not Found!");
      }
    }
    x.open("GET","../controller/course_controller.php?drop="+course_id+"&grade="
    +grade, true);
    x.send();
  }
}

function registerCourse(course_id){
  var reg = confirm("Are You Sure You Want To Register For This Course?");
  if(reg){
    var x = new XMLHttpRequest();
    x.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
        location.reload();
      }
      else if(this.status == 403){
        document.write("Error 403. Forbidden!");
      }
      else if(this.status == 404){
        document.write("Error 404. Not Found!");
      }
    }
    x.open("GET","../controller/course_controller.php?register="+course_id, true);
    x.send();
  }
}

function getMajorCourses(){
    var x = new XMLHttpRequest();
    x.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
        document.getElementById("tbod").innerHTML = this.responseText;
      }
      else if(this.status == 403){
        document.write("Error 403. Forbidden!");
      }
      else if(this.status == 404){
        document.write("Error 404. Not Found!");
      }
    }
    x.open("GET","../controller/course_controller.php?majorcourse=1", true);
    x.send();
}

function viewAllCourses(){
  var x = new XMLHttpRequest();
  x.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
        document.getElementById("tbod").innerHTML = this.responseText;
    }
    else if(this.status == 403){
      document.write("Error 403. Forbidden!");
    }
    else if(this.status == 404){
      document.write("Error 404. Not Found!");
    }
  }
  x.open("GET","../controller/course_controller.php?adminload=1", true);
  x.send();
}

function showInsert(){
  var insert_card = document.getElementById("insert_card");
  var editCard = document.getElementById("edit_card");
  insert_card.hidden = false;
  editCard.hidden = true;
  window.location.hash = "insert_card";
}

function insertCourse(){
  //alert("Working");
  var err_span = document.getElementById("err_span");
  var err_span_m = document.getElementById("err_span_m");
  var err_span_d = document.getElementById("err_span_y");
  var err_span_y = document.getElementById("err_span_d");
  var newCourse = document.getElementById("newCourse").value;
  var newCode = document.getElementById("coursecode").value;
  var newYear = document.getElementById("courseyear").value;
  var newMajors = document.getElementsByClassName("majorsOffering");
  var newMajor = [];
  var all_ok = true;

  if(newMajors.length == 0){
    err_span_m.innerHTML="Please Select At Lease One";
    all_ok = false;
  }
  else {
    for(var i=0; i<newMajors.length; i++) {
      if(newMajors[i].checked==true)
        newMajor[i] = newMajors[i].value;
    }
    newMajor = JSON.stringify(newMajor);
  }

  if(newCourse=""){
    err_span.innerHTML="Field Cannot Be Blank";
    all_ok = false;
  }
  if(newCode=""){
    err_span_d.innerHTML="Field Cannot Be Blank";
    all_ok = false;
  }
  if(newYear=""){
    err_span_y.innerHTML="Field Cannot Be Blank";
    all_ok = false;
  }
  // if(all_ok){
  //   var x = new XMLHttpRequest();
  //   x.onreadystatechange = function(){
  //     if(this.readyState == 4 && this.status == 200){
  //       //location.reload();
  //     }
  //     else if(this.status == 403){
  //       document.write("Error 403. Forbidden!");
  //     }
  //     else if(this.status == 404){
  //       document.write("Error 404. Not Found!");
  //     }
  //   }
  //   var request = "../controller/course_controller.php?insert="+newCourse+
  //   "&code="+newCode+"&year="+newYear+"&n_major="+newMajor;
  //   x.open("GET",request, true);
  //   x.send();
  // }
}

function getMajorsOffering(){
  var x = new XMLHttpRequest();
  x.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
        var myResult = this.responseText;
        var result = "<h6>Majors Offering New Course</h6><span style=\"color:red\" id=\"err_span\"></span>";
        result += myResult;
        document.getElementById("majorsOffering").innerHTML = result;
    }
    else if(this.status == 403){
      document.write("Error 403. Forbidden!");
    }
    else if(this.status == 404){
      document.write("Error 404. Not Found!");
    }
  }
  x.open("GET","../controller/course_controller.php?offer=1", true);
  x.send();
}

function viewUsers(){
  var x = new XMLHttpRequest();
  x.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
        document.getElementById("tbod").innerHTML = this.responseText;
    }
    else if(this.status == 403){
      document.write("Error 403. Forbidden!");
    }
    else if(this.status == 404){
      document.write("Error 404. Not Found!");
    }
  }
  x.open("GET","../controller/user_controller.php?load=1", true);
  x.send();
}

function adminStatus(user_id){
  var admin = confirm("Are You Sure You Want To Change This User's Permissions?");
  if(admin){
    var x = new XMLHttpRequest();
    x.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
        location.reload();
      }
      else if(this.status == 403){
        document.write("Error 403. Forbidden!");
      }
      else if(this.status == 404){
        document.write("Error 404. Not Found!");
      }
    }
    x.open("GET","../controller/user_controller.php?admin="+user_id, true);
    x.send();
  }
}

function deleteUser(user_id){
  var rem = confirm("Are You Sure You Want To Delete This User?");
  if(rem){
    var x = new XMLHttpRequest();
    x.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
        location.reload();
      }
      else if(this.status == 403){
        document.write("Error 403. Forbidden!");
      }
      else if(this.status == 404){
        document.write("Error 404. Not Found!");
      }
    }
    x.open("GET","../controller/user_controller.php?remove="+user_id, true);
    x.send();
  }
}
