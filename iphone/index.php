<?php
	require 'su.php';
	$m = new su();
	$url = $_GET['url'];
	if(count($url)){
		$m->index($url);
		
		preg_match_all("/(.*)(\_)([0-9]*).shtml/",$url,$matches);
		$page = $matches[3][0] + 1;
		$page = "http://it.sohu.com/tag/0002/000039002_".$page.".shtml";
		echo '<script>window.location.href="http://ips.iuc.me?url='.$page.'";</script>';
		
	}else{
		$m->index('http://it.sohu.com/tag/0002/000039002_180.shtml');
		$page = "http://it.sohu.com/tag/0002/000039002_180.shtml";
		echo '<script>window.location.href="http://ips.iuc.me?url='.$page.'";</script>';
	}
	
