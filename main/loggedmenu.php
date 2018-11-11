<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link REL="SHORTCUT ICON" HREF="../css/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script src="../tools/jquery/jquery.js" type="text/javascript"></script>

<?php
	session_start();
	$_SESSION['title'] = "test test ppfinder.gr";

	echo "<title>$_SESSION[title]</title>";
?>

</head>
<body>

<?php
	require_once ("chklog.php");

	if ($logged) {
        echo "COOL";

        ?>

<script type="application/javascript">
        $(document).ready(function(){
            alert('a')

            $.ajax({
                type: "GET",
                url: "http://dblp.org/search/publ/api",
                dataType: "xml",
                success: function(xml){
                    alert('succ')

            },
            error: function() {
                alert("An error occurred while processing XML file.");
            }
        });


        });
</script>
<?php
    }
?>

</body>
</html>
