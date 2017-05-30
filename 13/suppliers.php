<?php
$name = null;
$surname = null;
$company = null;
$city = null;
$country = null;
$tel = null;
if (!empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['company']) && !empty($_POST['city']) && !empty($_POST['country']) && !empty($_POST['tel'])) {
mysqli_report(MYSQLI_REPORT_ALL);
$mysqli = mysqli_connect('localhost', 'suppliers_u', '111', 'suppliers');
if (!$mysqli) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
$name = $_POST['name'];
$surname = $_POST['surname'];
$company = $_POST['company'];
$city = $_POST['city'];
$country = $_POST['country'];
$tel = $_POST['tel'];
$created = date('Y-m-d H:i:s');
$stmt = mysqli_prepare($mysqli, "INSERT INTO `suppliers` (first_name, last_name, company, city, country, tel,  created) VALUES (?, ?, ?, ?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, 'sssssss', $first_name, $last_name, $company, $city, $country, $tel, $created);
mysqli_stmt_execute($stmt);
printf("%d затронуто строк\n", mysqli_stmt_affected_rows($stmt));
mysqli_stmt_close($stmt);
mysqli_close($mysqli);
} else {
    if (empty($_POST['name']))        
        echo 'name not transferred<br>';
    }
    if (empty($_POST['surname'])) {
        echo 'surname not transferred<br>';
    }
    if (empty($_POST['company'])) {
        echo 'company not transferred<br>';
    if (empty($_POST['city']))        
        echo 'city not transferred<br>';
    }
    if (empty($_POST['country'])) {
        echo 'country not transferred<br>';
    }
    if (empty($_POST['tel'])) {
        echo 'tel not transferred';
}
?>
<form method="POST">
    <div>name: <input type="text" name="name" value="<?php echo $name ?>"></div>
    <div>surname: <input type="text" name="surname" value="<?php echo $surname ?>"></div>
    <div>company: <input type="text" name="company" value="<?php echo $company ?>"></div>
     <div>city: <input type="text" name="city" value="<?php echo $city ?>"></div>
    <div>country: <input type="text" name="country" value="<?php echo $country ?>"></div>
    <div>tel: <input type="text" name="tel" value="<?php echo $tel ?>"></div>
    <div><input type="submit" value="OK"></div>
</form>