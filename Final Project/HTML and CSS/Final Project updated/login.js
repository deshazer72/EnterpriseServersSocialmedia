$(document).ready(function(){
    var params = getUrlParams(); 
    if(params.Email != undefined){
    document.getElementById('Email').value = params.Email; 
    }
}); 
function Validate() {
    var strEmail = $('#Email').val(); 
    var strPassword = $('#Password').val(); 
    var strAfterForm = $('#afterForm'); 

    var emailRegEx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
     if (strEmail.search(emailRegEx)== -1){
          strAfterForm.html("Please enter a valid email address.");
          return false; 
     }

    if (strEmail == null || strEmail == ""){
       strAfterForm.html('<p style="color:black;"> Email is Required </p>')
       $('#Email').focus(); 
    }
    else if (strPassword == null || strPassword == ""){
     strAfterForm.html('<p style="color:black;"> Password is Required </p>'); 
      $('#Password').focus();
    }
    else {
       var data = {"Email": strEmail, "Password": strPassword}
        $.ajax({
            url: 'login.php',
            data: data, 
            type: 'post',
            dataType: 'html', 
            success: function(ouput){
                var strOutput = ouput
                console.log(strOutput); 
                if(strOutput != ""){
                  localStorage.setItem("userID", strOutput); 
                  sessionStorage.setItem("userID", strOutput); 
                 // window.location.href = "Profiles.php?userID=" + strOutput; 
                     window.location.href = "Profiles.php";  
                }
                else {
                    window.location.href = "error.html"; 
                  // strAfterForm.html('<p style="color:black; font-weight:bold;"> no user exist with this email and password please register or put in a valid email and password </p>');
                }
                
                
                //console.log(ouput); 
            },
            error: function(error){
                console.log("error")
            }
        }); 
    }
}

function getUrlParams() {

  var paramMap = {};
  if (location.search.length == 0) {
    return paramMap;
  }
  var parts = location.search.substring(1).split("&");

  for (var i = 0; i < parts.length; i ++) {
    var component = parts[i].split("=");
    paramMap [decodeURIComponent(component[0])] = decodeURIComponent(component[1]);
  }
  return paramMap;
}