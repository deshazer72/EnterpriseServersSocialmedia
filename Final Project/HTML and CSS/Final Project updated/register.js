function Validate (){
    var strFirstName = $('#FirstName').val(); 
    var strLastName = $('#LastName').val(); 
    var strEmail = $('#Email').val(); 
    var strPassword = $('#Password').val(); 
    var intPrivate = $('input[name="btnPrivate"]:checked').val(); 
    var strAfterForm = $('#afterForm');
    
    var emailRegEx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
     if (strEmail.search(emailRegEx)== -1){
          strAfterForm.html("Please enter a valid email address.");
          return false; 
     } 


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
    else if (strPassword == "" || strPassword == null){
        strAfterForm.html('<p style="color:black;"> Password is Required </p>'); 
        $('#Password').focus(); 
    }
    else {
        var data = {"FirstName": strFirstName, "LastName": strLastName, "Email": strEmail, "Password": strPassword, "Private": intPrivate }
        $.ajax({
            url: 'register.php',
            data: data, 
            type: 'post',
            dataType: 'html',  
            success: function(ouput){
                var strOutput = ouput
                if(strOutput == "false"){
                    strAfterForm.html('<p style="color:black;">ciuld not insert</p>'); 
                    console.log("could not insert"); 
                }
                localStorage.setItem("email", strEmail); 
                window.location.href = "Login.html?Email=" + strEmail; 
                
                //console.log(ouput); 
            },
            error: function(error){
                console.log("error")
            }
        }); 
    }
}
