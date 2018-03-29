if(document.getElementById('hid')!=null){
  if(document.getElementById('hid').value==1){
    document.getElementById('notice').innerHTML = "Session Expired. Login to Continue";
  }
}

function validLogin(loginForm){
  //Store the values the user enters

  var username = loginForm.username.value;
  var password = loginForm.password.value;
  var valid = true;

  if(username.length == 0)
    valid = false;
  if(password.length == 0)
    valid = false;

  if(!valid){
    alert("Login Failed, Please Fill All Required Fields");
    return true;
  }
  else
      return true;
}
