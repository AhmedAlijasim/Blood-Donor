<?php 
	echo"<span id='cookie_color' style='display:none'>".@$theme."</span>";  
	echo"<span id='cookie_lang' style='display:none'>".@$language."</span>";
?>
<!-- Start Div Tool Box  -->
<div class="tool_box">
	<i class="glyphicon glyphicon-cog gear-check"></i>
	<!-- Start Change Theme Of Site  -->
	<div class="switch_colors">
		<h5 class="text-center"> Site Color</h5>
		<ul class="list-unstyled text-center">
		    <li id="color1" onclick="return change_theme2('rgba(139, 0, 0, 0.55)');"></li>
		    <li id="color2" onclick="return change_theme2('rgba(0, 0, 139, 0.55)');"></li>
		    <li id="color3" onclick="return change_theme2('rgba(128, 0, 128, 0.55)');"></li>
		    <li id="color4" onclick="return change_theme2('rgba(53, 50, 50, 0.55)');"></li>
		</ul>
	</div>
	<!-- End Change Theme Of Site  -->
	<!-- Start Change The Language Of Site -->
	<div class="switch_languages">
		<h5 class="text-center"> Site Language</h5>
		    <ul class="list-unstyled text-center">
		        <li id="arabic"  onclick="return change_languages2('rtl');">Arabic</li>
		        <li id="english" onclick="return change_languages2('ltr');">English</li>
		    </ul>
	</div> 
	<!-- End Change The Language Of Site -->
</div>
<!-- End Div Tool Box -->