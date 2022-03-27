var fullname      = document.getElementById("fullname"),
    email         = document.getElementById("email"),
    password      = document.getElementById("password"),
    mobileNo      = document.getElementById("mobileNo"),
    country       = document.getElementById("country"),
    city          = document.getElementById("city"),
    fnamestatus   = document.getElementById("fnamestatus"),
    emailstatus   = document.getElementById("emailstatus"),
    pastatus      = document.getElementById("pastatus"),
    mostatus      = document.getElementById("mostatus"),
    costatus      = document.getElementById("costatus"),
    cistatus      = document.getElementById("cistatus"),
    name_label;
//Convert To Arabic
    if ($("#cookie_lang").text()==='rtl') {
        //Replace classes
        $(".signup .col-xs-4").addClass("col-xs-push-8");
        $(".signup .col-xs-8").addClass("col-xs-pull-4");
        $(".signup #showpass").css({"float":"left","margin-left":"0"});
        //Translate Text
        name_label ="الاسم يجب ان يحتوي على حروف فقط";
        email_label ="البريد الالكتروني يجب ان يبدء  بحرف";
        password_label ="كلمة السر  يجب ان تبدء  بحرف";
        password_len ="يجب ان لا تقل كلمة السر عن 8 رموز";
        phone_label="رقم الهاتف يجب ان يكون ارقام فقط";
        phone_len="رقم الهاتف  يجب ان يكون 11 رقم";
        country_label="اسم البلد يجب ان يحتوي على حروف فقط";
        city_label="اسم المدينة يجب ان يحتوي على حروف فقط";
    } else {
        name_label ="Name Must Be Content Only letters";
        email_label ="Email Must Be Start With A letter";
        password_label ="Password Must Be Start With A letter";
        password_len ="Password Mustn't Be Less Than 8 Characters";
        phone_label="MobileNo. Must Be Content At A number";
        phone_len="MobileNo. Must Be 11 Number";
        country_label="Country Must Be Content Only letters";
        city_label="City Must Be Content Only letters";
    }
//Start Validate FullName Field
fullname.onkeyup = function () {
    "use strict";
    var substring = fullname.value.substring(0, 1), //cut first character
        pattern = /^[\u0621-\u064A]*$/; // Write Arabic Characters Only
    fullname.dir = pattern.test(substring) ? 'rtl' : 'ltr'; //Test is the Character Arabic Or English
	//Write With Arabic
	if ((fullname.dir === 'rtl') || (fullname.dir === 'ltr')) {
		if (!isNaN(substring)) {
            fullname.value = fullname.value.replace(/[^a-z \u0621-\u064A '']*$/igm, '');
            fnamestatus.innerHTML = '<strong style="color:#ebf1f1;">' + name_label +'</strong>';
        } else {
			fullname.value = fullname.value.replace(/[^a-z \u0621-\u064A '']*$/igm, '');
			fnamestatus.innerHTML = "";
        }
	} 
};

//Start Validate email Field
email.onkeyup = function () {
    "use strict";
    var substring = email.value.substring(0, 1),
        pattern = /^[\u0600-\u06FF]*$/; // Write Arabic Characters
    email.dir = pattern.test(substring) ? 'rtl' : 'ltr'; //Test is the Field Arabic Or English
    //Write With English Or Arabic
    if (email.dir === 'rtl' || email.dir === 'ltr') {
        if (!isNaN(substring)) {
            email.value = email.value.replace(/[^\a-z '']/igm, '');
            emailstatus.innerHTML = '<strong style="color:#ebf1f1;">'+ email_label +'</strong>';
        } else {
            email.value = email.value.replace(/[^\a-z 0-9 _ . @]/igm, '');
            emailstatus.innerHTML = "";
        }
    }
};

//Start Validate Password Field
password.onkeyup = function () {
    "use strict";
    var substring = password.value.substring(0, 1),
        pattern   = /^[\u0600-\u06FF]*$/; // Write Arabic Characters
    password.dir  = pattern.test(substring) ? 'rtl' : 'ltr'; //Test is the Field Arabic Or English
	//Write With English Or Arabic
	if (password.dir === 'rtl' || password.dir === 'ltr') {
		if (!isNaN(substring)) {
            password.value = password.value.replace(/[^\a-z]*$/igm, '');
            pastatus.innerHTML = '<strong style="color:#ebf1f1;">'+ password_label +'</strong>';
        } else if (password.value.length < 8) {
            password.value = password.value.replace(/[^\a-z 0-9 '']*$/igm, '');
            pastatus.innerHTML = '<strong style="color:#ebf1f1;">'+ password_len +'</strong>';
        } else {
			password.value = password.value.replace(/[^\a-z 0-9 '']*$/igm, '');
			pastatus.innerHTML = "";
        }
    }
};

//Start Validate MobileNo. Field
mobileNo.onkeyup = function () {
    "use strict";
    var substring = mobileNo.value.substring(0, 1),
        pattern = /^[\u0600-\u06FF]*$/; // Write Arabic Characters
    mobileNo.dir = pattern.test(substring) ? 'rtl' : 'ltr'; //Test is the Field Arabic Or English
    //Write With English Or Arabic
    if (mobileNo.dir === 'rtl' || mobileNo.dir === 'ltr') {
        if (isNaN(substring)) {
            mobileNo.value = mobileNo.value.replace(/[^0-9]*$/igm, '');
            mostatus.innerHTML = '<strong style="color:#ebf1f1;">'+ phone_label +'</strong>';
        } else if (mobileNo.value.length < 11) {
            mobileNo.value = mobileNo.value.replace(/[^0-9]*$/igm, '');
            mostatus.innerHTML = '<strong style="color:#ebf1f1;">'+ phone_len +'</strong>';
        }
         else {
            mobileNo.value = mobileNo.value.replace(/[^0-9]*$/igm, '');
            mostatus.innerHTML = "";
        }
    }
};

//Start Validate country Field
country.onkeyup = function () {
    "use strict";
    var substring = country.value.substring(0, 1),
        pattern = /^[\u0621-\u064A]*$/; // Write Arabic Characters
    country.dir = pattern.test(substring) ? 'rtl' : 'ltr'; //Test is the Field Arabic Or English
	//Write With Arabic
	if ((country.dir === 'rtl')||(country.dir === 'ltr')) {
		if (!isNaN(substring)) {
            country.value = country.value.replace(/[^a-z \u0621-\u064A '']*$/igm, '');
            costatus.innerHTML = '<strong style="color:#ebf1f1;">'+ country_label +'</strong>';
        } else {
			country.value = country.value.replace(/[^a-z \u0621-\u064A '']*$/igm, '');
			costatus.innerHTML = "";
        }
	}
};

//Start Validate city Field
city.onkeyup = function () {
    "use strict";
    var substring = city.value.substring(0, 1),
        pattern = /^[\u0621-\u064A]*$/; // Write Arabic Characters
    city.dir = pattern.test(substring) ? 'rtl' : 'ltr'; //Test is the Field Arabic Or English
	//Write With Arabic
	if ((city.dir === 'rtl')||(city.dir === 'ltr')) {
		if (!isNaN(substring)) {
            city.value = city.value.replace(/[^a-z \u0621-\u064A '']*$/igm, '');
            cistatus.innerHTML = '<strong style="color:#ebf1f1;">'+ city_label +'</strong>';
        } else {
			city.value = city.value.replace(/[^a-z \u0621-\u064A '']*$/igm, '');
			cistatus.innerHTML = "";
        }
	}
};

/*global $, jQuery, alert, console*/
$(function () {
    "use strict"; // For Js Lint Errors
    //Start slideToggle register Donar
    $(".register").delay().fadeIn(3000);   
});