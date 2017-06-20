<?php
$str = null;
if (!empty($_POST['str'])){
$str=$_POST['str'];
$str =  preg_replace("/\s{2,},\f{2,},\n{2,},\r{2,},\t{2,},\v{2,}/",' ',$str);
echo $str;
} else {
    if (empty($_POST['']))
        echo 'string not transferred'. PHP_EOL;
}
?>

<form method="POST">
    <div> <input type="text" name="str" value="<?php echo $str ?>"></div>
    <div><input type="submit" value="OK"></div>
</form>