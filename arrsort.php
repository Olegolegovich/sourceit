<?php 
$data = array(
    array('name'=>'Vasia', 'surname'=>'Pistalet', 'year'=>1983),
    array('name'=>'Tolia', 'surname'=>'Drun', 'year'=>1986),
    array('name'=>'Kolia', 'surname'=>'Shulo', 'year'=>1974),
    array('name'=>'Sasha', 'surname'=>'Bybur`', 'year'=>1995),
  
    );
$data_author = array();
foreach($data as $key=>$arr){
    $data_author[$key]=$arr['surname'];
}
 
$data_year=array();
foreach($data as $key=>$arr){
    $data_year[$key]=$arr['year'];
}
 
array_multisort($data_year, SORT_DESC, $data_author, $data);
var_export($data);
//array_multisort($data_year, SORT_ASC, $data_author, $data);
//var_export($data);