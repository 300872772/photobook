<?php


 function displayimage($linkcounter,$files)
{
	$marginl=5;

	for ($i=$linkcounter*12; $i<($linkcounter*12)+12; $i++) 
	{
	
    $image = $files[$i];
   
    if($i<($linkcounter*12)+12)
    {
    echo "<div style=\"float:left; margin-left:" .$marginl. "px;\"><img src=\"".$image."\" id=\"galleryContainer\" ></div>";
    }

	
	}
	
}

?>

