<?php



?>

<!DOCTYPE html>
<html lang="en">
<head>
<title> PHOTOBOOK </title>

<meta charset="UTF-8">
<link rel="stylesheet" href="css/style.css">

</head>
<body>
<div id="wripper">
<div id="banner1">
<h1 id="sname1">PHOTOBOOK</h1>
</div>
<div id="space"></div>
<div id="leftside">
<?php

include 'pages/menu.php';

?>
</div>
<div id="rightside">
<?php

include $pages;

?>
</div>


<footer>
&copy Md Mamunur Rahman, 2016 
</footer>
</div>
</body>
</html>

