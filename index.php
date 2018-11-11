<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
	session_start();
	$_SESSION['title'] = "ppfinder.gr";
?>

<head>
<link REL="SHORTCUT ICON" HREF="css/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php echo "<title>$_SESSION[title]</title>"; ?>
<link href="css/index.css" rel="stylesheet" type="text/css" />
<link href='skins/default/dropmenu/dropmenu.css' media='screen' rel='stylesheet' type='text/css'>
</head>

<!-- 	STANDARDS END HERE     -->
<!-- TODO   Check if logged and redirect appropriately   -->

<body class="background">

<img src="css/logo2.jpg" />

<?php
	$act = '';
	$attempt= 0;
	if (isset($_REQUEST['action']))
		$act = $_REQUEST['action'];
	
	if (isset($_REQUEST['attempt']))
		$attempt = $_REQUEST['attempt'];

	$lang = "gr";
	if (isset($_REQUEST['lang']))
		$lang = $_REQUEST['lang'];
		
	switch ($lang)
	{
		case 'gr':
			require_once ("lang/gr_index.php");
		break;
		case 'eng':
			require_once ("lang/eng_index.php");
		break;
	}

	switch ($act)
	{
		case 'login':
			require ("main/login.php");
		break;
	}

	$attempt++;
	
	$actstr = "index.php?lang=$lang&action=login&attempt=$attempt";
?>

<div class="wrapperMENU">
<ul id="menu">
    <li class="logo">
        <?php echo "<img style='float:left;' alt='' src='skins/default/dropmenu/bannermenu.jpg'>"; ?>
        <ul id="main" style="position:relative; top:0px;">
            <li><?php echo $glL['ppfinder'] ?></li>
            <li class="last">
                <?php echo "<img class='corner_left' alt='' src='skins/default/dropmenu/corner_blue_left.png'/>"; ?>
                <?php echo "<img class='middle' alt='' src='skins/default/dropmenu/dot_blue.png'/>"; ?>
                <?php echo "<img class='corner_right' alt='' src='skins/default/dropmenu/corner_blue_right.png'/>"; ?>
            </li>
        </ul>
        
    </li>
    <li><a href="#"><?php echo $glL['mnu_what'] ?></a></li>
    <li><a href="#"><?php echo $glL['mnu_who'] ?></a></li>
    <li><a href="#"><?php echo $glL['mnu_contact'] ?></a></li>    
</ul>
<?php echo "<img style='float:left;' alt='' src='skins/default/dropmenu/menu_right.png'/>"; ?>
</div>
    
<div class="TEXTBOX">
<h3>
Welcome to ppfinder.gr!
</h3>
</div>
    
<div class="LOGINBOX">


<?php
	echo "<form action='$actstr' method='post'>";
?>
<h4 class="headline"><?php echo $glL['entry'] ?></h4>
<h5 class="headline"><?php echo $glL['uid'] ?></h5>
<input type="text" name="login" size="30" />
<h5 class="headline"><?php echo $glL['pass'] ?></h5>
<input type="password" name="password" size="25"/>
<br /><br />
<input type="submit" style="height: 25px; width: 120px" value="<?php echo $glL['entry'] ?>" />

</form>

<a href="index.php?lang=gr"><img src="css/flag_gr.png" alt="Ελληνικά" style="position:absolute;left:5%;top:428px;border:none"></a>
<a href="index.php?lang=eng"><img src="css/flag_eng.png" alt="English" style="position:absolute;left:31%;top:428px;border:none"></a>
</div>

</body>
</html>
