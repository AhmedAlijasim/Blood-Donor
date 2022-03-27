function createRequest() {
    "use strict";
    var myRequest;
    if (window.XMLHttpRequest) {
        myRequest = new XMLHttpRequest();
    } else {
        //code for IE5 and IE6
        myRequest = new window.ActiveXObject("Microsoft.XMLHTTP");
    }
    return myRequest;
}
////////////// Start insert Donate Form/////////////////////
function insert_form() {
    "use strict";
    var myRequest = createRequest(),
    text    = document.getElementsByTagName('textarea')[0].value,
    sickAge     = document.getElementsByTagName('input')[0].value,
    sickGblood  = document.getElementById('sickGblood').value,
    donateBlood = document.getElementById('donate-type').value,
    sickCountry = document.getElementsByTagName('input')[1].value,
    sickCity = document.getElementsByTagName('input')[2].value,
    sickPhone   = document.getElementsByTagName('input')[3].value;

    myRequest.onreadystatechange = function () {
        if (myRequest.status === 200 && myRequest.readyState === 4) {
            document.getElementsByTagName('textarea')[0].value="";
            document.getElementsByTagName('input')[0].value="";
            document.getElementById('sickGblood').value="";
            document.getElementById('donate-type').value="";
            document.getElementsByTagName('input')[1].value="";
            document.getElementsByTagName('input')[2].value="";
            document.getElementsByTagName('input')[3].value="";
            document.getElementById("error_msg").innerHTML = myRequest.responseText;
        }
    };
    //with POST method.
    myRequest.open("POST", "insert_form.php", true);
    myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    myRequest.send(
        "text=" + text + 
        "&sickAge=" + sickAge +
        "&sickGblood=" + sickGblood +
        "&donateBlood=" + donateBlood +
        "&sickCountry=" + sickCountry +
        "&sickCity=" + sickCity +
        "&sickPhone=" + sickPhone 
        );
    return false;//prefent the button from send
}
//////////////End insert Donate Form/////////////////////
//********* Change Language Show_donate page list To Arabic **********
$(function () {
    "use strict";
    //********* Change Language Donate Page To Arabic **********
    if ($("#cookie_lang").text()==='rtl'){
        $("head title").text("تبرع بالدم");
        $(".my_Donate_Form").css("direction","rtl");
        $(".my_Donate_Form h2").text("تبرع بالدم");
        $(".my_Donate_Form #give_blood").text("هل تريد التبرع بدمك ؟");
        $(".my_Donate_Form #need_blood").text("هل انت بحاجة الى شخص ما يتبرع لك ؟");
        $(".my_Donate_Form textarea").attr("placeholder","أكتب النص هنا ....");
        $(".my_Donate_Form form input").eq(0).attr("placeholder","العمر");
        $(".my_Donate_Form form input").eq(1).attr("placeholder","البلد");
        $(".my_Donate_Form form input").eq(2).attr("placeholder","المدينة");
        $(".my_Donate_Form form input").eq(3).attr("placeholder","رقم الهاتف");
        $(".my_Donate_Form form button").text("نشر");
        $(".my_Donate_Form form a").text("رجوع للصفحة الرئيسية");
        $("#sickGblood").attr("title","أختر فصيلة الدم");
        $("#donate-type").attr("title","أختر نوع التبرع");
        $("#donate-type option").eq(0).text("انا أريد التبرع بدمي");
        $("#donate-type option").eq(1).text("أحتاج لشخص ما يتبرع لي");
    }
});