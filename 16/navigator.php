<?php
$conect = mysqli_connect('localhost', 'suppliers_u', '111', 'suppliers');
mysqli_set_charset($conect,'utf8');
if (!$conect) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
$num = 5;
$page = $_GET['page'];
$result00 = mysqli_query("SELECT COUNT(*) FROM items");
$temp = mysqli_fetch_array($result00);
$posts = $temp[0];
$total = (($posts - 1) / $num) + 1;
$total =  intval($total);
$page = intval($page);
if(empty($page) or $page < 0) $page = 1;
if($page > $total) $page = $total;
$start = $page * $num - $num;   
    
$query = mysqli_query("SELECT * FROM items ORDER BY id DESC LIMIT $start, $num");
$row = mysqli_fetch_array($query);
do
{
  echo $row["TITLE"];
  echo "<br/>";
  echo $row["description"];
  echo "<br/>";
  echo $row["price"];
  }
while ( $row = mysqli_fetch_array($query)) 
if ($page != 1) $pervpage = '<a href=navigator.php?page=1>Первая</a> | <a href=navigator.php?page='. ($page - 1) .'>Предыдущая</a> | ';
// Проверяем нужны ли стрелки вперед
if ($page != $total) $nextpage = ' | <a href=navigator.php?page='. ($page + 1) .'>Следующая</a> | <a href=navigator.php?page=' .$total. '>Последняя</a>';

// Находим две ближайшие станицы с обоих краев, если они есть
if($page - 5 > 0) $page5left = ' <a href=navigator.php?page='. ($page - 5) .'>'. ($page - 5) .'</a> | ';
if($page - 4 > 0) $page4left = ' <a href=navigator.php?page='. ($page - 4) .'>'. ($page - 4) .'</a> | ';
if($page - 3 > 0) $page3left = ' <a href=navigator.php?page='. ($page - 3) .'>'. ($page - 3) .'</a> | ';
if($page - 2 > 0) $page2left = ' <a href=navigator.php?page='. ($page - 2) .'>'. ($page - 2) .'</a> | ';
if($page - 1 > 0) $page1left = '<a href=navigator.php?page='. ($page - 1) .'>'. ($page - 1) .'</a> | ';

if($page + 5 <= $total) $page5right = ' | <a href=navigator.php?page='. ($page + 5) .'>'. ($page + 5) .'</a>';
if($page + 4 <= $total) $page4right = ' | <a href=navigator.php?page='. ($page + 4) .'>'. ($page + 4) .'</a>';
if($page + 3 <= $total) $page3right = ' | <a href=navigator.php?page='. ($page + 3) .'>'. ($page + 3) .'</a>';
if($page + 2 <= $total) $page2right = ' | <a href=navigator.php?page='. ($page + 2) .'>'. ($page + 2) .'</a>';
if($page + 1 <= $total) $page1right = ' | <a href=navigator.php?page='. ($page + 1) .'>'. ($page + 1) .'</a>';


if ($total > 1)
{
Error_Reporting(E_ALL & ~E_NOTICE);
echo "<div class=\"pstrnav\">";
echo $pervpage.$page5left.$page4left.$page3left.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$page3right.$page4right.$page5right.$nextpage;
echo "</div>";
}