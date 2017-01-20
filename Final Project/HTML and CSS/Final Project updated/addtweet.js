$(document).ready(function() {
    $('#textarea').focus(); 
    var text_max = 140;
     var strUserID = sessionStorage.getItem('userID');
     if(strUserID == "" || strUserID == null){
         window.location.href = "error.html"; 
     }
    $('#textarea_feedback').html(text_max + ' characters remaining');

    $('#textarea').keyup(function() {
        var text_length = $('#textarea').val().length;
        var text_remaining = text_max - text_length;

        $('#textarea_feedback').html(text_remaining + ' characters remaining');
    });
}); 

function Validate() {
    var textArea = $('#textarea').val();
    var strAfterForm = $('#afterForm'); 
    var strUserID = sessionStorage.getItem('userID');  

    if(textArea == "" || textArea == null){
        strAfterForm.html('<p style="color:red;"> you must enter a tweet!. </p>'); 
        $('#textarea').focus(); 
         

    }
    else {
        var data = {"userID": strUserID, "tweet": textArea}
        $.ajax({
            url: 'addtweet.php',
            data: data, 
            type: 'post',
            dataType: 'html', 
            success: function(ouput){ 
                  sessionStorage.setItem("userID", strUserID);
                  window.location.href = "Profiles.php?userID=" + strUserID; 
            },
            error: function(error){
               strAfterForm.html('<p style="color:red;"> something went wrong please use the contact page to contact admin. </p>'); 
            }
        }); 
    }
}