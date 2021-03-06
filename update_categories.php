<?php
//Source: https://phpdelusions.net/pdo_examples/select

require  "database.php";

$id = $_GET['uniqid'];
$stmt = $pdo->prepare("SELECT * FROM categories WHERE uniqid=:id");
$stmt->execute(['id' => $id]);
$category = $stmt->fetch();
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>
<form method="POST" >
    <div class="form-group">
        <label for="exampleFormControlInput1">Name</label>
        <input  class="form-control" name="c_name" value="<?= $category["c_name"] ?>">
    </div>


    <button type="submit">Kaydet</button>
</form>


<?php
if($_POST) {
    $c_name = $_POST["c_name"];


    $guncelle = $pdo->prepare("UPDATE categories SET c_name=:adi WHERE uniqid=:id ");
    $guncelle->execute([":adi" => $c_name , ":id" => $id]);


    if($guncelle){
        echo " işlem basarılı";
        header("Refresh:1; url=categories.php");
    } else {
        echo "bu sefer olmadı";
    }

}
?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>


</body>
</html>

