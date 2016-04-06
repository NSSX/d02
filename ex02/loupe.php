#!/usr/bin/php
<?php

if($argc > 1)
{
$myfile = fopen("$argv[1]", "r+");
$chaine = "";
while($ligne = fgets($myfile))
{
$chaine= $chaine.$ligne;
}
$nu = strlen("$chaine");
$i = 0;
/*while($i < $nu)
{
	
	if($chaine[$i] == '<' && $chaine[$i] == '<')




	$i++;
}*/

$cont = "";
$new = preg_replace_callback("#<a(.*?)>(.*?)</a>#",     function ($matches) {
           	
           	 return (preg_replace_callback("#>(.*?)<#",     function ($a) {
           	 	return strtoupper($a[0]);
           	 }, $matches[0]));
           	
        },
        $chaine
    );
$new = preg_replace_callback("#title=\"(.*?)\"#",     function ($matches) {
 	 			return (preg_replace_callback("#\"(.*?)\"#",     function ($a) {
           	 		return strtoupper($a[0]);
           	 }, $matches[0]));
 	 			}, 
           	 $new
           	 );

echo "$new";
//echo"$chaine";
fclose($myfile);
}
?>