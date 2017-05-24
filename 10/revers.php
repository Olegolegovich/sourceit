<?php 
//$s = "I am is terminator";
function Revers($s = "I am is terminator")
{
	$rev = implode(" ", array_reverse(explode(" " , $s)));

return $rev;
}
  print_r(Revers());
 /*$words = explode(" ", $s );
 $word = array_reverse($words);
 $str = implode(" ", $word);
 echo "$str";*/