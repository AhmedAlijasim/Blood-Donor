<?php
session_start();
if (@$_SESSION['lang']=='rtl') {
	$Back_button ="رجوع للصفحة الرئيسية";
	$Serch_title ="البحث عن تبرع";
	$group_label ="فصيلة الدم";
	$group_blood_title ="أختر فصيلة الدم";
	$donate_type_label ="نوع التبرع";
	$donate_type_title ="أختر نوع التبرع";
	$city_search = "اسم المدينة";
	$search_button ="بحث";
	$donate_type_ready="انا أريد التبرع بدمي";
	$donate_type_need="انا أحتاج لشخص ما يتبرع لي";
} else {
	$Back_button = "Back To Main Page";
	$Serch_title ="Search Donar";
	$group_label ="Group Blood";
	$group_blood_title ="Choose Blood Type";
	$donate_type_label ="Type Donate";
	$donate_type_title ="Choose Donate Type";
	$city_search = " City Name";
	$search_button ="Search";
	$donate_type_ready="Ready To Donate";
	$donate_type_need="Need To Donate";
} 

?>
<div class="row">
			<div class="col-xs-12">
				<div id="search_page">
					<a href="" class="btn btn-danger"><?php echo $Back_button; ?></a>
					<h4 class="text-center"><?php echo $Serch_title; ?></h4>
					<form action="" method="get">
						<label><?php echo $group_label; ?></label>
						<select id="sickGblood" required="" title="<?php echo $group_blood_title; ?>">
							<option value="A+">A+</option>
							<option value="A-">A-</option>
							<option value="B+">B+</option>
							<option value="B-">B-</option>
							<option value="AB+">AB+</option>
							<option value="AB-">AB-</option>
							<option value="O+">O+</option>
							<option value="O-">O-</option>
						</select><br>
						<label><?php echo $donate_type_label; ?></label>
						<select id="donate_type" required="" title="<?php echo $donate_type_title; ?>">
							<option value="readydonate"><?php echo $donate_type_ready; ?></option>
							<option value="needdonate"><?php echo $donate_type_need; ?></option>
						</select><br>
						<label><?php echo $city_search; ?></label>
						<input type="search" id="city_search"><br>
						<button class="btn btn-primary" onclick="return search_result();"><?php echo $search_button; ?></button><br>
					</form>
					<div class="search_result"><!-- Here Show Search Result --></div>
				</div>
			</div>
</div>
<script>
$(document).ready(function () {
    "use strict";
	$("#search_page a").on("click", function (e) {
        e.preventDefault();
        $('.donation .sub-search').fadeOut(2000);
        $('.donation .sub_donation').fadeIn();
        var sc = $("html").width();
        if (sc < 767) { $("#mymenu .navbar-nav,.test_agree,.tool_box").fadeIn();}

    });
});
	function search_result() {
		var blood_type = $("#search_page #sickGblood").val(),
			donate_type = $("#search_page #donate_type").val();
			city_search = $("#search_page #city_search").val();
	    $.ajax({
	        url: "search/search_result.php",
	        method: "get",
	        data: {blood_type:blood_type,donate_type:donate_type,city_search:city_search},
	        success: function (data) {
	            $('.search_result').html(data);
	        }
	    });
        return false;
    }
</script>