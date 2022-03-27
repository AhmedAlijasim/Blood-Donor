$(document).ready(function () {
	"use strict";

//show color option div when click on the gear
    $(".gear-check").on("click",function(){
        $(".switch_colors").fadeToggle();
        $(".switch_languages").fadeToggle();
    });
    //Change Color And Language At Css By Variable.
    $(":root").css("--maincolor",$("#cookie_color").text());
    $(":root").css("--mainlang",$("#cookie_lang").text());
});
//Start change theme color for the site.
function change_theme(color) {
    $.ajax({
        url: "inc/cookies.php",
        method: "get",
        data:{color:color},
        success: function () {
            window.location.reload();   
        }
    });
}
/* Start Change The Language Of Site */
function change_languages(lang) {
    $.ajax({
        url: "inc/cookies.php",
        method: "get",
        data:{lang:lang},
        success: function () {
            window.location.reload();   
        }
    });
}
// Show Admin In DataBase
function admin () {
	$.ajax({
		url:"../control_panel/admin/admin.php",
		method:"post",
		success:function (data) {
			$(".control_show").html(data).fadeIn();
			$(".show_details").fadeOut();
		}
	});
	return false;
}
// Show Admin Details In DataBase
function admins_details (id) {
	$.ajax({
		url:"../control_panel/admin/admins_details.php",
		method:"post",
		data:{id:id},
		success:function (data) {
			$(".show_details").html(data).fadeIn();
		}
	});
	return false;
}
// Delete Admin From DataBase
function admins_delete (id) {
	$.ajax({
		url:"../control_panel/admin/admins_delete.php",
		method:"post",
		data:{id:id},
		success:function (data) {
			$(".show_details").html(data).fadeIn().delay(5000);
			admin ();
		}
	});
	return false;
}
// Show Users In DataBase
function users () {
	$.ajax({
		url:"../control_panel/users/users.php",
		method:"get",
		success:function (data) {
			$(".control_show").html(data).fadeIn();
			$(".show_details").fadeOut();
		}
	});
	return false;
}
// Show User Details In DataBase
function users_details (id) {
	$.ajax({
		url:"../control_panel/users/users_details.php",
		method:"get",
		data:{id:id},
		success:function (data) {
			$(".show_details").html(data).fadeIn();
		}
	});
	return false;
}
// Delete User From DataBase
function users_delete (id) {
	$.ajax({
		url:"../control_panel/users/users_delete.php",
		method:"get",
		data:{id:id},
		success:function (data) {
			$(".show_details").html(data).fadeIn().delay(5000);
			users ();
		}
	});
	return false;
}
// Truncate User Table From DataBase
function users_truncate () {
	$.ajax({
		url:"../control_panel/users/users_truncate.php",
		success:function (data) {
			$(".show_details").html(data).fadeIn().delay(5000);
			users ();
		}
	});
	return false;
}
// Show Posts In DataBase
function posts () {
	$.ajax({
		url:"../control_panel/posts/posts.php",
		method:"get",
		success:function (data) {
			$(".control_show").html(data).fadeIn();
			$(".show_details").fadeOut();
		}
	});
	return false;
}
// Show Post Details In DataBase
function posts_details (id) {
	$.ajax({
		url:"../control_panel/posts/posts_details.php",
		method:"get",
		data:{id:id},
		success:function (data) {
			$(".show_details").html(data).fadeIn();
		}
	});
	return false;
}
// Delete Post From DataBase
function posts_delete (id) {
	$.ajax({
		url:"../control_panel/posts/posts_delete.php",
		method:"get",
		data:{id:id},
		success:function (data) {
			$(".show_details").html(data).fadeIn().delay(5000).fadeOut();
			posts ();
		}
	});
	return false;
}
function posts_all_delete (id) {
	$.ajax({
		url:"../control_panel/posts/posts_delete.php",
		method:"get",
		data:{id_all:id},
		success:function (data) {
			$(".show_details").html(data).fadeIn().delay(5000);
			posts ();
		}
	});
	return false;
}
// Truncate Post Table From DataBase
function posts_truncate () {
	$.ajax({
		url:"../control_panel/posts/posts_truncate.php",
		success:function (data) {
			$(".show_details").html(data).fadeIn().delay(5000).fadeOut();
			posts ();
		}
	});
	return false;
}
// Show messages In DataBase
function messages () {
	$.ajax({
		url:"../control_panel/messages/messages.php",
		method:"get",
		success:function (data) {
			$(".control_show").html(data).fadeIn();
			$(".show_details").fadeOut();
		}
	});
	return false;
} 
// Show messages Details In DataBase
function messages_details (id, from, to) {
	$.ajax({
		url:"../control_panel/messages/messages_details.php",
		method:"get",
		data:{id:id, from:from, to:to},
		success:function (data) {
			$(".show_details").html(data).fadeIn();
		}
	});
	return false;
}
// Delete messages From DataBase
function messages_delete (id) {
	$.ajax({
		url:"../control_panel/messages/messages_delete.php",
		method:"get",
		data:{id:id},
		success:function (data) {
			$(".show_details").html(data).fadeIn().delay(5000);
			messages ();
		}
	});
	return false;
}
function messages_all_delete (id) {
	$.ajax({
		url:"../control_panel/messages/messages_delete.php",
		method:"get",
		data:{id_all:id},
		success:function (data) {
			$(".show_details").html(data).fadeIn().delay(5000);
			messages ();
		}
	});
	return false;
}
// Truncate messages Table From DataBase
function messages_truncate () {
	$.ajax({
		url:"../control_panel/messages/messages_truncate.php",
		success:function (data) {
			$(".show_details").html(data).fadeIn().delay(5000);
			messages ();
		}
	});
	return false;
}