<?php // adm/pages.php

// $variable = (isset($_GET[''])) ? (int) $_GET[''] : 0;

error_reporting(E_ALL);
$title = 'Administer pages'; // To be used for headline tags
include ('./index.php');
echo '<h3>Pages</h3>';

		// the $prefix need {} around it to be read together with pages as it should
        $sql = "SELECT * FROM {$prefix}pages";
        $result = mysql_query($sql);
        while($row=mysql_fetch_object($result))
		{
          echo '<li>' . $row->pID . ' ';
          echo $row->pagename. '</li> ' ;
        }
        mysql_free_result($result);
?>
<form method="get" action="pages.php">
<table>
<tr>
	<td>Please insert the name for the new page.
	<td><input type="text" name="pagename">
<tr>
	<td>Title (used in meta and mouseover)
	<td><input type="text" name="headline">
<tr>
	<td>Description.
	<td><input type="text" name="desk">
<tr>
	<td><input type="submit" name="send">
	<td><input type="reset">
</table>
<?php
$pagename = (isset($_GET['pagename'])) ? $_GET['pagename'] : '';
$pagename = strip_tags($pagename);
$pagename = ucfirst($pagename);

$headline = (isset($_GET['headline'])) ? $_GET['headline'] : '';


$desk = strip_tags((isset($_GET['desk'])) ? $_GET['desk'] : '');

if ($pagename != '')
{
	$sql = "SELECT prio FROM {$prefix}pages ORDER BY prio DESC LIMIT 1";
        $result = mysql_query($sql);
        $row=mysql_fetch_object($result);
			$prio = $row->prio+1;
	// desc was not available in mysql, therefor desk for description.
	$sql = "INSERT INTO {$prefix}pages (pagename, headline, desk, prio)
                        VALUES ('$pagename', '$headline', '$desk', $prio)";
	mysql_query($sql);
}


mysql_close($connection);

include ('./style/footer.html');
?>