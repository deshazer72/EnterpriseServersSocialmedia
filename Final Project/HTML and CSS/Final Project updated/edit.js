$(document).ready(function() {
   var strUserID = sessionStorage.getItem('userID');
     if(strUserID == "" || strUserID == null){
         window.location.href = "error.html"; 
     }
}); 
function Validate (){
    var strFirstName = $('#FirstName').val(); 
    var strLastName = $('#LastName').val(); 
    var strEmail = $('#Email').val();  
    var strAfterForm = $('#afterForm');
    var intPrivate = $('input[name="btnPrivate"]:checked').val(); 
     var emailRegEx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
     var intUserID = sessionStorage.getItem('userID')

    if (strFirstName == "" || strFirstName == null){
        strAfterForm.html('<p style="color:black;"> First Name is Required </p>'); 
        $('#FirstName').focus(); 
    }
    else if (strLastName == "" || strLastName == null){
        strAfterForm.html('<p style="color:black;"> Last Name is Required </p>'); 
        $('#LastName').focus(); 
    }
   
    else if (strEmail == "" || strEmail == null){
        strAfterForm.html('<p style="color:black;"> Email is Required </p>'); 
        $('#Email').focus(); 
     
    }
    else if (strEmail.search(emailRegEx)== -1){
          strAfterForm.html("Please enter a valid email address.");
          return false;  
    }
    else {
        var data = {"FirstName": strFirstName, "LastName": strLastName, "Email": strEmail, "userID": intUserID, "Private": intPrivate}
        $.ajax({
            url: 'edit.php',
            data: data, 
            type: 'post',
            dataType: 'html',  
            success: function(ouput){
                var strOutput = ouput
                if(strOutput == "false"){
                    strAfterForm.html('<p style="color:black;">could not update</p>'); 
                    console.log("could not insert"); 
                }
               strAfterForm.html('<p style="color:black;">Profile updated</p>'); 
                
                //console.log(ouput); 
            },
            error: function(error){
                console.log("error")
            }
        }); 
    }
}
