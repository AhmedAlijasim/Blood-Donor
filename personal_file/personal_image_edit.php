<div class="edit_image">
	<form action="upload_person_image.php" method="POST" enctype="multipart/form-data">
		<input type="file" name="upload">
		<button type="submit" name="update" class="btn btn-success">Upload An Image</button> 
	</form>
</div>
<script>
$(function () {
    if ($("#cookie_lang").text()==='rtl') {
    	$(".edit_image button").text("رفع الصورة");
    }
});
</script>