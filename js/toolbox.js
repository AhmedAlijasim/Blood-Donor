/*global $, jQuery, alert, console*/
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
        url: "include/cookies.php",
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
        url: "include/cookies.php",
        method: "get",
        data:{lang:lang},
        success: function () {
            window.location.reload();   
        }
    });
}
function change_theme2(color) {
    $.ajax({
        url: "../client_Register/cookies.php",
        method: "get",
        data:{color:color},
        success: function () {
            window.location.reload();   
        }
    });
}
/* Start Change The Language Of Site */
function change_languages2(lang) {
    $.ajax({
        url: "../client_Register/cookies.php",
        method: "get",
        data:{lang:lang},
        success: function () {
            window.location.reload();   
        }
    });
}
$(function () {
    //Change Language
    if ($("#cookie_lang").text()==='rtl') {
        //NavBar Edit HTML
        $(".navbar-header .home").text("الرئيسية");
        $(".navbar-header .personal").text("الملف الشخصي");
        $(".navbar-header .notifications").text("الاشعارات");
        $(".navbar-header li a").eq(0).attr("title","الرئيسية");
        $(".navbar-header li a").eq(1).attr("title","الملف الشخصي");
        $(".navbar-header li a").eq(2).attr("title","الرسائل");
        $(".navbar-header li a").eq(3).attr("title","الأشعارات");
        $(".navbar-nav .donate").text("تبرع");
        $(".navbar-nav #logout a").text("تسجيل الخروج");
        //NavBar Edit CSS
        $(".navbar-header .nav").css({"right":"-40px","position":"absolute"});
        $(".navbar-nav li").css("float","right");
        $("#mymenu .navbar-nav").addClass("navbar-left").removeClass("navbar-right");
        //personal_file Edit CSS And Html
        $(".head .image i").attr("title","تعديل الصورة الشخصية");
        $(".info a").eq(0).text("رجوع للصفحة الرئيسية");
        $(".info a").eq(1).text("تعديل بياناتك الشخصية");
        $(".info div span").eq(0).text("الاسم : ");
        $(".info div span").eq(1).text("الايميل : ");
        $(".info div span").eq(2).text("فصيلة الدم : ");
        $(".info div span").eq(3).text("تاريخ الميلاد  : ");
        $(".info div span").eq(4).text("الجنس : ");
        $(".info div span").eq(5).text("كلمة السر : ");
        $(".info div span").eq(6).text("رقم الهاتف : ");
        $(".info div span").eq(7).text("البلد : ");
        $(".info div span").eq(8).text("المدينة : ");
        $(".info #showpass").css("float","left");
        //Tool Box Edit Html
        $(".switch_colors h5").text("لون الموقع");
        $(".switch_languages h5").text("لغة الموقع");
        $(".switch_languages #arabic").text("عربي");
        $(".switch_languages #english").text("انكليزي");
        //Donate Edit Html
        $("#new_donation").text("أظهار المنشورات الجديدة");
        //Donate Test Blood Edit Html
        $(".test_agree .donClick b").text("أختبار تطابق الدم");
        $(".test_agree .donation-show p").text("للتحقق من تطابق الدم");
        $(".test_agree .donation-show label").eq(0).text("زمرة الدم المطلوبة");
        $(".test_agree .donation-show label").eq(1).text("زمرة دم المتبرع");
        $(".test_agree .donation-show #testBlood").text("أختبار");

        $(".test_agree .donation-show #Group_label_re").addClass("col-xs-push-6");
        $(".test_agree .donation-show #Group_select_re").addClass("col-xs-pull-6");
        $(".test_agree .donation-show #Group_label_do").addClass("col-xs-push-6");
        $(".test_agree .donation-show #Group_select_do").addClass("col-xs-pull-6");
        //Footer Edit Html
        $(".footer a").eq(0).text("من نحن");
        $(".footer a").eq(1).text("سياسة الاستخدام");
        $(".footer a").eq(2).text("شروط الإستخدام");
        $(".footer a").eq(3).text("اتصل بنا");

        if ($("body").width() < 798) {
            $(".navbar-header").css("float","unset");
            $(".navbar-header .nav").css("right","-20px");
        }
    }
});
/* End Change The Language Of Site */