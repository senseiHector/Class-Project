function getMajors(){
  var x = new XMLHttpRequest();
  x.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
        var myResult = this.responseText;
        var result = "<option value=\"\" disabled selected>Please Choose a Major...</option>";
        result += myResult;
        document.getElementById("majorSelect").innerHTML = result;

    }
    else if(this.status == 403){
      document.write("Error 403. Forbidden!");
    }
    else if(this.status == 404){
      document.write("Error 404. Not Found!");
    }
  }
  x.open("GET","../unsecure/processunsecure.php?drop=1", true);
  x.send();
}

function validRegistry(registerForm){
  //Store the values the user enters
  var firstname = registerForm.firstname.value;
  var lastname = registerForm.lastname.value;
  var username = registerForm.username.value;
  var password = registerForm.password.value;
  var email = registerForm.email.value;
  var female = registerForm.female.checked;
  var male = registerForm.male.checked;
  var major = registerForm.majorSelect.value;
  var valid = true;
  var textOnly = /^[a-zA-Z]+$/;
  var emailPattern = /\S+@+\S+\.+\S/;
  var passPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_])[a-zA-Z0-9!@#$%^&*_]{6,20}$/;
  var error = "";
  var notices = document.getElementById("notices");

  if(firstname.length == 0)
    valid = false;
  if(lastname.length == 0)
    valid = false;
  if(username.length == 0)
    valid = false;
  if(password.length == 0)
    valid = false;
  if(email.length == 0)
    valid = false;
  if(!female && !male)
    valid = false;
  if(major.length == 0)
    valid = false;

  if(valid){
    if(!textOnly.test(firstname))
      error += "First Name Cannot Include Numbers or Special Characters";
    if(!textOnly.test(lastname))
      error += "<br>Last Name Cannot Include Numbers or Special Characters";
    if(!textOnly.test(username))
      error += "<br>Username Cannot Include Numbers or Special Characters";
    if(!passPattern.test(password))
      error += "<br>Password Must Include An UpperCase Letter, A LowerCase"+
       "Letter,<br> A Number, A Special Character And At Least 6 Characters";
		if(!emailPattern.test(email))
		  error += "<br>Email must be valid";
  }

  if(!valid){
    alert("Registration Failed, Please Fill All Required Fields");
    return true;
  }
  else{
    if (error == "")
      return true;
    else {
      notices.innerHTML= error;
      return false;
    }
  }
}

function checkUsername(){
  var checkUsername = document.getElementById('checkUsername');
  var checkU = document.getElementById('username').value;
  var userStat = document.getElementById('userStat');

  if(checkU != ""){
    var x = new XMLHttpRequest();
    x.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
          var myResult = this.responseText;
          if(myResult== 1){
            checkUsername.style.color="red";
            checkUsername.innerHTML = "Username Unavailabe";
            userStat.value = "n";
          }
          else{
            checkUsername.style.color="green";
            checkUsername.innerHTML = "Username Availabe";
            userStat.value = "y";
          }
      }
      else if(this.status == 403){
        document.write("Error 403. Forbidden!");
      }
      else if(this.status == 404){
        document.write("Error 404. Not Found!");
      }
    }
    x.open("GET","../unsecure/processunsecure.php?checkU="+ checkU, true);
    x.send();
  }
  else
    checkUsername.innerHTML = "";
}

function checkEmail(){
  var checkEmail = document.getElementById('checkEmail');
  var checkE = document.getElementById('email').value;
  var emailStat = document.getElementById('emailStat');
  var emailerror = document.getElementById('emailerror');

  if(checkE != ""){
    var x = new XMLHttpRequest();
    x.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
          var myResult = this.responseText;
          if(myResult== 1){
            checkEmail.style.color="red";
            checkEmail.innerHTML = "Email Aleady Used";
            emailStat.value = "n";
          }
          else{
            checkEmail.style.color="green";
            checkEmail.innerHTML = "Email Availabe";
            emailerror.hidden = true;
            emailStat.value = "y";
          }
      }
      else if(this.status == 403){
        document.write("Error 403. Forbidden!");
      }
      else if(this.status == 404){
        document.write("Error 404. Not Found!");
      }
    }
    x.open("GET","../unsecure/processunsecure.php?checkE="+ checkE, true);
    x.send();
  }
  else
    checkEmail.innerHTML = "";
}

function getCourses(){
  var major = document.getElementById("majorSelect").value;
  var x = new XMLHttpRequest();
  x.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
        var myResult = this.responseText;
        var result = "<h6>Courses</h6>";
        result += myResult;
        document.getElementById("courses").innerHTML = result;
    }
    else if(this.status == 403){
      document.write("Error 403. Forbidden!");
    }
    else if(this.status == 404){
      document.write("Error 404. Not Found!");
    }
  }
  x.open("GET","../unsecure/processunsecure.php?major="+major, true);
  x.send();
}
