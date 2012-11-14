<?php
if(!BLOG_VER)
{
	echo '<script>window.location.href="/";</script>';
	exit;
}

function blog_opendb($dbpath = DB_PATH)
{
	$db= new PDO('sqlite:'.DB_PATH);
	return $db;
	
}

function blog_db_query($db,$querystring)
{
	$sth = $db->prepare($querystring);
    $sth->execute();

    $result = $sth->fetchAll();
    
       
    return $result;
	
}








