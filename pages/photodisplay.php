<?php
$files = glob("thumb/*.*");
$page1 = $_GET['p'];

echo "<br>";
$linkcounter=1;
$pagecount=array();
$imagePerPage=array();
$imageCounterPerPage=0;
$accumulatedWidth=0;
$boll=false;
$counterrow=0;


for ($i=0; $i<count($files); $i++) {
    $image = $files[$i];
    $boll=false;
    

    // image vertical and horizontal segrigation
  list($width, $height, $type, $attr) = getimagesize( $image );

  
  if ($width>$height){
  	$accumulatedWidth=$accumulatedWidth+197;
  }else
  {
  	$accumulatedWidth=$accumulatedWidth+(133*($width/$height));
  }
 

		
	
		$imageCounterPerPage=$imageCounterPerPage+1;

	
	
  if ($i+1!=count($files)){
  		
  		if($accumulatedWidth>(3*197) && $accumulatedWidth>(3*197)){
  		$counterrow=$counterrow+1;
  		
  		$accumulatedWidth=0;}
  		
  		//if($accumulatedWidth>(12*197)){$imageCounterPerPage=$imageCounterPerPage-1;}
  		if ($counterrow>2){
			$pagecount[$linkcounter-1]=$linkcounter;	
			$imagePerPage[$linkcounter-1]=$imageCounterPerPage;
			$linkcounter=$linkcounter+1;
			
			$counterrow=0;
		
		}
				
		}else{
		$pagecount[$linkcounter-1]=$linkcounter;	
		$imagePerPage[$linkcounter-1]=$imageCounterPerPage;
		$linkcounter=$linkcounter+1;
		}

} 


if($page1=="gallery"){
	displayimage(1,$files,$imagePerPage);
}else{
	displayimage($page1,$files,$imagePerPage);
}

//Display functions
 function displayimage($linknumber,$files,$imagePerPage)
{

	$marginl=5;
	if ($linknumber==1 && $imagePerPage[0]==0){
		$endi=count($files);
		$starti=0;
	
	}else if ($linknumber==1 && $imagePerPage[0]!=0){
		$endi=$imagePerPage[0];
		$starti=0;
	}else{
		$endi=$imagePerPage[$linknumber-1];
		$starti=$imagePerPage[$linknumber-2];
	}

	for ($i=$starti; $i<$endi; $i++) 
	{
	
    	$image = $files[$i];
   	
   		list($width1, $height1, $type, $attr) = getimagesize( $image );
	
    		if ($width1>$height1){
    			echo "<div style=\"float:left; margin-left:" .$marginl. "px;\"><img src=\"".$image."\" id=\"galleryContainer\" height=133px; width=197px;></div>";
    			
    		}else{
    			echo "<div style=\"float:left;  margin-left:" .$marginl. "px;\"><img src=\"".$image."\" id=\"galleryContainer\" height=133px; width=".(133*($width1/$height1)) ."px;></div>";
    		
    		}
	
	}
	
}

//image page link
echo"<div style=\"padding-right:25px;padding-left:25px;padding-top:450px;\"><div ><lu id=\"nav_numbering\">";

for ($ii=1; $ii<count($imagePerPage)+1; $ii++) 
{
	echo "&nbsp;&nbsp;<li><a href=\"?p=".$ii."\" >".$ii."</a></li>&nbsp;&nbsp;";
}
echo"</lu></div>&nbsp;<br></div>";




?>


<style>
#galleryContainer {
		
   		//width:197px;
   		//height:133px;
   		
     	border-left: 1px solid white;
		border-right: 1px solid white;
		border-top: 1px solid white;
		border-bottom: 1px solid white;
 		border-radius: 0px 20px 0px 20px;
    		
    	box-shadow: 5px  0px 10px #939393;
		}
#galleryContainer:hover {
		border-left: 1px solid red;
		border-right: 1px solid red;
		border-top: 1px solid red;
		border-bottom: 1px solid red;
		border-radius: 0px 20px 0px 20px red;
		box-shadow: 5px  0px 10px #e39393;
		opacity: 0.6;
     	filter: alpha(opacity=60);
		}
#galleryContainer:active {
				    opacity: 0.2;
     		filter: alpha(opacity=20);
     		}
     		
#nav_numbering
{
    display: block;
    list-style: none;
    text-align: center;
    width: 100%;    
    background: -webkit-gradient(linear, right top, left top, color-stop(0%,#80d4ff), color-stop(100%,     #006666));
    background: linear-gradient(to top, #80d4ff,  #006666);
    color:#2aa925;
    		-moz-boarder-radius: 20px;
    		-webkit-boarder-radius: 20px;
    		border-radius: 20px;
    		overflow: hidden;
	
}

#nav_numbering ul
{
    display: none;
    list-style: none;

        
}



#nav_numbering a:link , #nav_numbering a:visited , #nav_numbering a:active
{
    display: block;
    color: white;
    text-decoration: none;


}

#nav_numbering a:hover
{
    color: #ff00ff;
}   
 



#nav_numbering li 
{
    color: red;
    float: left;
    font-family: Arial;
    font-size: 15px;
    text-align: center;
    display: block;
    margin-top: 01px;
    text-transform: uppercase;
    padding: 0px 15px 0px 15px;
    border-left: 1px solid #ffffff;
	
}
</style>