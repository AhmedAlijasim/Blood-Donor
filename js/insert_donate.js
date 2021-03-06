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
        $("head title").text("???????? ??????????");
        $(".my_Donate_Form").css("direction","rtl");
        $(".my_Donate_Form h2").text("???????? ??????????");
        $(".my_Donate_Form #give_blood").text("???? ???????? ???????????? ???????? ??");
        $(".my_Donate_Form #need_blood").text("???? ?????? ?????????? ?????? ?????? ???? ?????????? ???? ??");
        $(".my_Donate_Form textarea").attr("placeholder","???????? ???????? ?????? ....");
        $(".my_Donate_Form form input").eq(0).attr("placeholder","??????????");
        $(".my_Donate_Form form input").eq(1).attr("placeholder","??????????");
        $(".my_Donate_Form form input").eq(2).attr("placeholder","??????????????");
        $(".my_Donate_Form form input").eq(3).attr("placeholder","?????? ????????????");
        $(".my_Donate_Form form button").text("??????");
        $(".my_Donate_Form form a").text("???????? ???????????? ????????????????");
        $("#sickGblood").attr("title","???????? ?????????? ????????");
        $("#donate-type").attr("title","???????? ?????? ????????????");
        $("#donate-type option").eq(0).text("?????? ???????? ???????????? ????????");
        $("#donate-type option").eq(1).text("?????????? ???????? ???? ?????????? ????");
    }
});