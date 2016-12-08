
function Validate() {
    var strEmail = $('#Email').val(); 
    var strPassword = $('#Password').val(); 
    var strAfterForm = $('#afterForm'); 

    if (strEmail == null || strEmail == ""){
       strAfterForm.innerHTML = '<p style="color:black;"> Email is Required </p>'
       $('#Email').focus(); 
       return false; 
    }
    else if (strPassword == null || strPassword == ""){
     strAfterForm.innerHTML = '<p style="color:black;"> Password is Required </p>'
      $('#Password').focus();
      return false;  
    }
    else {
       return true;  
    }
}