$(document).ready(function() {
    $('#textarea').focus(); 
    var text_max = 140;
    $('#textarea_feedback').html(text_max + ' characters remaining');

    $('#textarea').keyup(function() {
        var text_length = $('#textarea').val().length;
        var text_remaining = text_max - text_length;

        $('#textarea_feedback').html(text_remaining + ' characters remaining');
    });
});

function updateFunction(id){
    var textArea = $('#'+id).val(); 
    var strAfterForm = $('#afterForm'); 
    var strUserID = sessionStorage.getItem('userID');   

     if(textArea == "" || textArea == null){
        strAfterForm.html('<p style="color:red;"> you must enter a tweet!. </p>'); 
        $('#textarea').focus(); 
         

    }
    else {
        var data = {"tweetID": id, "tweet": textArea, "update": "update", "delete": ""}
        $.ajax({
            url: 'px.php',
            data: data, 
            type: 'post',
            dataType: 'html', 
            success: function(ouput){ 
                  window.location.href = "tweets.php"; 
            },
            error: function(error){
               strAfterForm.html('<p style="color:red;"> something went wrong please use the contact page to contact admin. </p>'); 
            }
        }); 
    }
}

function deleteFunction(id){
    var textArea = $('#'+id).val(); 
     var strUserID = sessionStorage.getItem('userID'); 
     var data = {"update": "", "delete": "delete", "tweetID": id, "tweet": textArea}
      $.ajax({
            url: 'px.php',
            data: data, 
            type: 'post',
            dataType: 'html', 
            success: function(ouput){ 
                  window.location.href = "tweets.php"; 
            },
            error: function(error){
               strAfterForm.html('<p style="color:red;"> something went wrong please use the contact page to contact admin. </p>'); 
            }
        }); 


}