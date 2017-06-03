<?php
$title = null;
$description = null;
$price = null;
if (!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['price'])) {
mysqli_report(MYSQLI_REPORT_ALL);
$mysqli = mysqli_connect('localhost', 'suppliers_u', '111', 'items');
if (!$mysqli) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
$title = $_POST['title'];
$description = $_POST['description'];
$price = $_POST['price'];
$created = date('Y-m-d H:i:s');
$stmt = mysqli_prepare($mysqli, "INSERT INTO `items` (TITLE, description, price, created) VALUES (?, ?, ?,?)");
mysqli_stmt_bind_param($stmt, 'ssss', $title, $description, $price, $created);
mysqli_stmt_execute($stmt);
//printf("%d затронуто строк\n", mysqli_stmt_affected_rows($stmt));
mysqli_stmt_close($stmt);
mysqli_close($mysqli);
} else {
    if (empty($_POST['title']))        
        echo 'title not transferred<br>';
    }
    if (empty($_POST['description'])) {
        echo 'description not transferred<br>';
    }
    if (empty($_POST['price'])) {
        echo 'price not transferred<br>';
    
}
?>
<form method="POST">
    <div>title: <input type="text" name="title" value="<?php echo $title ?>"></div>
    <div>description: <input type="text" name="description" value="<?php echo $description ?>"></div>
    <div>price: <input type="text" name="price" value="<?php echo $price ?>"></div>
    <div><input type="submit" value="OK"></div>
</form>