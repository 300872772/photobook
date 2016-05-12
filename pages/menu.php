<?php
$page = $_GET['p'];

switch($page)
{
    case "home":
        $pages = "pages/home.php";
    break;

    case "registration":
        $pages = "pages/userreg.php";
        
    break;
    
    case "gallery":
        $pages = "pages/gallery.php";
    break;
    
    case "photoupload":
        $pages = "pages/photoupload.php";
    break;

    default:
    if($page>0)
    {
    	$pages = "pages/gallery.php";
    }else{
        $pages = "pages/home.php";
        }
    break;
}
?>

<div id="nav">

   
    <ul>
        <li class="nav active"><a href="?p=home">HOME</a></li>
        <li><a href="?p=registration">REGISTRATION</a></li>
        <li><a href="?p=gallery">GALLERY</a></li>
        <li><a href="?p=photoupload">PHOTO UPLOAD</a></li>
    </ul>
</div>