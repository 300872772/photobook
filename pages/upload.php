<?php
error_reporting(0);
ini_set('display_errors', 0);
$errors= array();

if (isset($_FILES['photoUpload'])){

if ($_FILES['photoUpload'] ['name']==''){	
	echo "<script>alert('Please Select an Image')</script>";

	}else{

	
	$file_name = $_FILES['photoUpload'] ['name'];
	$file_size = $_FILES['photoUpload'] ['size'];
	$file_tmp = $_FILES['photoUpload'] ['tmp_name'];
	$file_type = $_FILES['photoUpload'] ['type'];
	$file_ext = strtolower (end(explode('.',$_FILES['photoUpload'] ['name'])));
	
	$expensions = array("jpeg","jpg","png","gif","tif","bmp");
	
	if(in_array($file_ext,$expensions)===false)
	{
		echo "<script>alert('this file extension is not allowed')</script>";
		$errors[]='error';
	}
	
	if($file_size>20971520 )
	{
		echo "<script>alert('File size has tobe within 20 MB')</script>";
		$errors[]='error';
	}


	
	if (file_exists("/Applications/XAMPP/xamppfiles/htdocs/photobook/photo/" . basename($_FILES['photoUpload'] ['name']))) {
	echo "<script>alert('this file already exists')</script>";
	$errors[]='error';
	}
		
	$upload_dir = "/Applications/XAMPP/xamppfiles/htdocs/photobook/photo/";
	@chmod($upload_dir. basename($_FILES['photoUpload'] ['name']),0777);
	
    if (empty($errors)==true)
	{
		//Photo upload to Photo folder with original size
		move_uploaded_file($file_tmp,$upload_dir. basename($_FILES['photoUpload'] ['name']));
		
		//Photo upload to Thumb folder with minimised size size
		if($file_ext =="jpg"){
		$img = @imagecreatefromjpeg($upload_dir . basename($_FILES['photoUpload'] ['name']));
		}
		else if($file_ext =="png")
		{
			$img = @imagecreatefrompng($upload_dir . basename($_FILES['photoUpload'] ['name']));
		}
				else if($file_ext =="gif")
		{
			$img = @imagecreatefromgif($upload_dir . basename($_FILES['photoUpload'] ['name']));
		}
		
		//echo $img;
		$width = imagesx( $img );
        $height = imagesy( $img );
		$v=220;
        $new_width = $v;
        $new_height = floor($height * ( $v / $width ));

        $tmp_img = imagecreatetruecolor($new_width, $new_height);
        imagealphablending( $tmp_img, false );
        imagesavealpha($tmp_img, true);
        imagecopyresized($tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
        $upload_dir1 = "/Applications/XAMPP/xamppfiles/htdocs/photobook/thumb/";

		$img1 =$upload_dir1 . basename($_FILES['photoUpload'] ['name']);
		//echo "<br>".$file_ext;
		
		
	
		if($file_ext =="jpg"){
		imagejpeg($tmp_img,$img1);
		}
		else if($file_ext =="png")
		{
		imagepng($tmp_img,$img1);
		}
		else if($file_ext =="gif")
		{
		imagegif($tmp_img,$img1);
		}

		echo "<script>alert('Success')</script>";
	}

	
	
}




}

?>



