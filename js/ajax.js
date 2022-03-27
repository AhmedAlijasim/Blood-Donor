/*global $, jQuery, alert, console*/
/* 
   ################################################################################## 
   |||||||||||||||||||||||||||||||| Start Chat.js ||||||||||||||||||||||||||||||||||| 
   ################################################################################## 
*/
$(document).ready(function () {
    "use strict";
    //On click On chat_box link At Navbar appear chatbox
    $(".navbar .chat_box").on("click", function () {
        var sc = $("html").width();
        if (sc < 767) {
            $(".donation,.test_agree,.footer").fadeOut();
            $("#open_chat").fadeOut();
            $("#chat_box").fadeIn();
        }
    });
    //On click On Search link At Navbar appear Search Page
    $("#mymenu #search").on("click", function (e) {
        e.preventDefault();
        $(".id_from_notification").fadeOut(1000);
        var sc = $("html").width();
        if (sc < 767) { 
            $("#mymenu .navbar-nav,.test_agree,.tool_box").fadeOut();
            $(".sub-search").css("marginTop","-140px");
        }
        $.ajax({
            url: "search/search.php",
            method: "get",
            success: function (data) {
                $('.donation .show_user_profile').fadeOut();
                $('.donation .sub_donation').fadeOut();
                $('.donation .sub-search').fadeIn(2000).html(data);
            }
        });
    });
    $("#search_page a").on("click", function (e) {
        e.preventDefault();
        $(".test_agree,.tool_box").fadeIn();
    });
    // fetch active users
    function fetch_user() {
        $.ajax({
            url: "messenger/fetch_user.php",
            method: "POST",
            success: function (data) {
                $('#client_details').html(data);
            }
        });
    }
    // update last activity users
    function update_last_activity() {
        $.ajax({
            url: "messenger/update_last_activity.php",
            success: function () {
            }
        });
    }
    fetch_user();
    setInterval(function () {
        update_last_activity();
        fetch_user();
    }, 3000);
});
//************open box of chat*********
var wid = $(window).width();
function open_chat(client_id) {
    "use strict";
    if (wid < 768) {
        $(".donation .sub_donation").fadeOut(1000);
        $(".test_agree").fadeOut(1000);
        $('#open_chat').css("top","25px");
    }
    $.ajax({
        url: "messenger/open_chat.php",
        method: "POST",
        data: {client_id: client_id, openState: 'open'},
        success: function (data) {
            $('#open_chat').html(data);
        }
    });
    return false;
} 
//************ Show Profile Of User *********
function user_profile(user_id) {
    "use strict";
    if (wid < 768) {
        $(".test_agree").fadeOut(1000);
        $('.show_user_profile').css("marginTop","-126px");
    }
    $.ajax({
        url: "personal_file/user_profile.php",
        method: "POST",
        data: {user_id: user_id},
        success: function (data) {
            $(".donation .sub_donation").fadeOut(1000); 
            $('.show_user_profile').fadeIn(1000).html(data);
        }
    });
    return false;
}

function hide_user_protofile(){
    "use strict";
    if (wid < 768) {
        $(".test_agree").fadeIn(1000);
        $('.show_user_profile').css("marginTop","0");
    }
    $("#protofile").fadeOut(1000); 
    $(".donation .sub_donation").fadeIn(1000); 
    return false; 
}
//*********show messages**********
function select_message() {
    "use strict";
    $.ajax({
        url: "messenger/select_message.php",
        method: "POST",
        success: function (data) {
            $('.user_chat_box').html(data);
        }
    });
}
select_message();
setInterval(function () {
    select_message();
}, 1000);
////////////// Start Write message/////////////////////
function start_write_message(from, to) {
    "use strict";
    $.ajax({
        url: "messenger/seen_messages.php",
        method: "POST",
        data: {from: from, to: to},
        success: function (data) {
        }
    });
    return false;
}
///////////////////////////////////////////////////////
function insert_message() {
    "use strict";
    var mess = $("#message").val();
    $.ajax({
        url: "messenger/insert_chat.php",
        method: "POST",
        data: {message: mess},
        success: function (data) {
            $("#message").val("");
            $('#error_msg').html(data);
        }
    });
    return false;
}
//****Count Of The Total Messages ****//
function messages_count() {
    $.ajax({
        url: "messenger/messages_count.php",
        method: "POST",
        success: function (data) {
            $('.messages_count').html(data);
        }
    });
}
messages_count();
setInterval(function () {
    messages_count();
}, 1000); 
//////////////delete message For All/////////////////////
function delete_all_message(chat_message_id) {
    "use strict";
    $.ajax({
        url: "messenger/delete_message.php",
        method: "POST",
        data: {message_id: chat_message_id},
        success: function (data) {
            
        }
    });
    return false;
}
//////////////delete message For Me Only/////////////////////
function delete_me_message(chat_message_id) {
    "use strict";
    $.ajax({
        url: "messenger/delete_message.php",
        method: "POST",
        data: {me_message_id: chat_message_id},
        success: function (data) {
            
        }
    });
    return false;
}
//////////////delete message the sender For Me Only/////////////////////
function delete_sender_message(chat_message_id) {
    "use strict";
    $.ajax({
        url: "messenger/delete_message.php",
        method: "POST",
        data: {sender_message_id: chat_message_id},
        success: function (data) {
            
        }
    });
    return false;
}
/* 
   ##################################################################################
   |||||||||||||||||||||||||||||| Start donate.js ||||||||||||||||||||||||||||||||||| 
   ################################################################################## 
*/
// Start the test operation  if blood Group is accept or not!
function test_blood() {
    "use strict";
    var receiveBlG = document.getElementById("receiveBlG").value,
        givenBlG   = document.getElementById("givenBlG").value;
    $.ajax({
        url: "donate/testblood.php",
        method: "get",
        data:{receiveBlG: receiveBlG, givenBlG: givenBlG},
        success: function (data) {
            $('#showTest').html(data);
        }
    });
}
// End the test operation  if blood Group is accept or not!

//////////////Start Notification Donate /////////////////////
$(document).ready(function () {
    "use strict";
    var timerId = 0;
    /* When the user click on button donClick show donation box */
    $(".donClick").on("click", function (event) {
        event.preventDefault();
        if (event.isDefaultPrevented()) {
            $(".donation-show").slideToggle(1000);
            $("#showTest").fadeOut();
        }
    });
    $("#testBlood").on("click", function (event) {
        event.preventDefault();
        $("#showTest").fadeIn();
    });
    // When You Click On Notification Element Will Show Notifications Box ****************
    $("#notification").on("click", function (event) {
        event.preventDefault();
        show_notification();
        $("#notification_box").fadeToggle();
        $('.donation .sub-search').fadeOut(2000);
        $('.donation .show_user_profile').fadeOut(2000);
        $('.donation .sub_donation').fadeIn(2000);
    });
    //When You Click On Notification Link You Will Go To Donate Post
    $("#notification_box").on("click", function () {
        $("#notification_box").fadeOut();
        $(".test_agree").fadeIn(1000);
    });
    //******** Start fetch donate form ****************
    function update_fetch_donate() {
        $.ajax({
            url: "donate/show_donate.php",
            method: "post",
            success: function (data) {
                $('.sub_donation').fadeIn(2000).html(data);
            }
        });
    }
    update_fetch_donate();
    ////////// show notification  At index.php Page ////////////////
    function show_notification() {
        $.ajax({
            url: "donate/notification.php",
            method: "post",
            success: function (data) {
                $('#notification_box').html(data);
            }
        });
    }
    //Start show new notification every one second 
    function unseen_notification() {
        $.ajax({
            url: "donate/unseen_notification.php",
            method: "post",
            success: function (data) {
                $('.notification_count').html(data);
            }
        });
    }
    unseen_notification();
    setInterval(function () {
        unseen_notification();
    }, 1000);
});
//send notification id key to page update_status.php  This Mean That Notificatin Is Seen Or Clicked On It
function update_status(id, from, to) {
    "use strict";
    $.ajax({
        url: "donate/update_status.php",
        method: "post",
        data: {id: id, from: from, to: to},
        success: function (data) {
            $('.notification_count').html(data);
        }
    });
    $.ajax({
        url: "donate/include_donate_show.php",
        method: "get",
        data: {id: id},
        success: function (data) {
            $(".id_from_notification").html(data);
        }
    });
}
//////////////End Notification Donate /////////////////////

// ******** show Donate options ************** //
// Edit Donate Form //
function donate_edit_option(id) {
    "use strict";
    $.ajax({
        url: "donate/donate_edit_option.php",
        method: "post",
        data: {id: id},
        success: function (data) {
            $('#edit_donate').html(data);
        }
    });
    return false;
}
function update_donate(){
    var textDonate  = $("#textDonate").val(),
        sickAge     = $("#sickAge").val(),
        sickGblood  = $("#sickGblood").val(),
        sickCountry = $("#sickCountry").val(),
        sickCity    = $("#sickCity").val(),
        sickPhone   = $("#sickPhone").val(),
        donate_type   = $("#donate_type").val(),
        id_donate   = $("#id_donate").val();
    $.ajax({
        url: "donate/update_donate.php",
        method: "post",
        data: {
            textDonate: textDonate,
            sickAge: sickAge,
            sickGblood: sickGblood,
            sickCountry: sickCountry,
            sickCity: sickCity,
            sickPhone: sickPhone,
            donate_type: donate_type,
            id_donate: id_donate
        },
        success: function (data) {
            $(".sub_donation").load("donate/show_donate.php");
        }
    });
}
// Delete Donate Form //
function donate_delete_option(id) {
    "use strict";
    var delete_conf;
    if ($("#cookie_lang").text()==='rtl'){delete_conf = confirm("هل انت متأكد من حذف هذا المنشور ؟");}
    else{delete_conf = confirm("Do You Sure From Remove This Post ?");}
    if (delete_conf === true) {
        $.ajax({
            url: "donate/donate_delete_option.php",
            method: "post",
            data: {id: id},
            success: function (data) {
                $(".sub_donation").load("donate/show_donate.php");
            }
        });
    }
    return false;
}

$(function(){
    //Footer Slide
    $(".footer i").on("click", function(){
        $(".slide-down-footer").slideToggle();
        if($(".footer i").hasClass("glyphicon-chevron-up")){
            $(this).removeClass("glyphicon-chevron-up").addClass("glyphicon-chevron-down");
        } else {
            $(this).addClass("glyphicon-chevron-up").removeClass("glyphicon-chevron-down");
        }
    });
   //Scroll To Top
    $(window).on("scroll", function () {
        var sc = $(window).scrollTop();
        sc>=100 ? $(".up").fadeIn() : $(".up").fadeOut();
    });
    //Click On Button To Scroll Top
    $(".up").on("click", function () {
        $("html,body").animate({scrollTop:0},600);
    });
});