/* 
   ################################################################################## 
   ||||||||||||||||||||||||||||| Start Personal.js |||||||||||||||||||||||||||||||||| 
   ################################################################################## 
*/
$(document).ready(function (){
    "use strict";
    // ******** End Edit Personal File ************** //
    $("#showpass").on("click", function(){
        var pass = $("#password").attr('type');
        if(pass === 'password'){
            $("#password").attr('type', 'text');
            $(this).html('<i class="glyphicon glyphicon-eye-open" ></i>');
        } else {
            $("#password").attr('type', 'password');
            $(this).html('<i class="glyphicon glyphicon-eye-close" ></i>');
        }
    });

    // Start Animate At Personal File .
    $(".image").animate({
        top:"0"
    },1000);
    $(".info").animate({
        left:"0"
    },1000);
    $(".image").on("click", function () {
        $(".image").animate({
        		
        },5000);
    });
});	
function edit_personal_image(id) {
    $("#edit_personal_image").fadeToggle(2000);
    "use strict";
    $.ajax({
        url: "personal_image_edit.php",
        method: "get",
        data: {id: id},
        success: function (data) {
            $('#edit_personal_image').html(data);
        }
    });
    return false;
}
function edit_personal_info(id) {
    $("#show_person_edit").fadeIn();
    $(".info").fadeOut();
    "use strict";
    $.ajax({
        url: "edit_personal_info.php",
        method: "get",
        data: {id: id},
        success: function (data) {
            $('#show_person_edit').html(data);
        }
    });
    return false;
}