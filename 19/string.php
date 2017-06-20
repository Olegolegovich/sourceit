<?php
$string = null;
if (!empty($_POST['string'])) {
    $string = $_POST['string'];
    if (preg_match('/^[A-z0-9\s]+$/', $string)) {
        $str = str_word_count($string, 1);
        foreach ($str as &$value) {
            $value = strlen($value);
        }
        $text = array_count_values($str);
        foreach ($str as $key => $value) {
            echo 'Number of words containing ' . $key . ' Characters: ' . $value . '<br>';
        }
    } else {
        $str = str_word_count($string, 1, "АаБбВвГгДдЕеЁёЖжЗзИиЙйКкЛлМмНнОоПпРрСсТтУуФфХхЦцЧчШшЩщЪъЫыЬьЭэЮюЯя");
        foreach ($str as &$value) {
            $value = strlen($value);
        }
        $str = array_count_values($str);
        foreach ($str as $key => $value) {
            echo 'Number of words containing ' . $key / 2 . ' Characters: ' . $value . '<br>';
        }
    }
}

   else {
    if (empty($_POST['string']))
        echo 'string not transferred'. PHP_EOL;
    }
?>
<form method="POST">
    <div> <input type="text" name="string" value="<?php echo $string ?>"></div>
    <div><input type="submit" value="OK"></div>
</form>