<!DOCTYPE html>
<html>
<body>
<link rel="stylesheet" href="imgg.css">
<form action="upload.php" method="post" enctype="multipart/form-data">
  <h2>Select image to upload:</h2>
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

<h2>Kuvat jotka on ladattu!</h2>
<div class="fumo">
<?php
$dirname = "uploads/";
$images = glob($dirname."*.*");
foreach($images as $image) {
    echo '<img style= max-width:300px; max-height:300px; src="'.$image.'" /><br />';
}?>
</div>
</body>
</html>