<?php
if(isset($_POST['submit'])){
include 'pages/upload.php';
}
?>



<div id="banner">
<h1 id="sname">PHOTO UPLOAD</h1>
</div>
<div>
<br><br><br><br><br>
<form action="" method="POST" enctype="multipart/form-data">
  
    <input type="file" name="photoUpload" id="photoUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
</div>
<?php
//include 'pages/upload.php'
?>

</div>



