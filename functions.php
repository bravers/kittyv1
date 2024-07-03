<?php
include "config.php";
$link = new mysqli($host, $user, $pass, $db);
if (!$link) {
    die('Could not connect: ' . $link->connect_error);
}
//$result = $link->query("SELECT * FROM list");
//echo 'Connected successfully';





    /*
     *   $conn = new mysqli("localhost", "name", "pass", "db");

      if ($conn->connect_error) {
        die("Ошибка: невозможно подключиться: " . $conn->connect_error);
      }

      echo 'Подключились к базе.<br>';

      $result = $conn->query("SELECT id FROM goroda");

      echo "Количество строк: $result->num_rows";

      $result->close();

      $conn->close();
     */
//}

//db_connect($host, $user, $pass, $db);
//
//$result = db_connect->$link
////db_connect->$link->query("SELECT * FROM list");
//var_dump($result);


function list_item($host, $user, $pass, $db){

}
function add_item($host, $user, $pass, $db){

}
function edit_item($host, $user, $pass, $db){

}
function delete_item($host, $user, $pass, $db){

}

//list_item($host, $user, $pass, $db);

//create
if(isset($_POST["add"])) {
    //var_dump($_POST);
    $kitty_name = $_POST["name"];
    $kitty_age = $_POST["age"];
    if($link) {
        $query = $link->query("INSERT INTO list (name, age, flag) VALUES ('$kitty_name', $kitty_age, 1)");
        if($query) {
            header("Location: ". $_SERVER['HTTP_REFERER']);
        }
    }
}

//Read
if($link) {
    $query = $link->query("SELECT * FROM list WHERE flag = 1");
}

//Filter
if(isset($_POST["filter"])) {
    //var_dump($_POST);
    $min_age = $_POST["min_age"];
    $max_age = $_POST["max_age"];
    if($link) {
        $query = $link->query("SELECT * FROM list WHERE flag = 1 AND BETWEEN $min_age AND $max_age");
        if($query) {
            header("Location: ". $_SERVER['HTTP_REFERER']);
        }
    }
}

//Edit

if(isset($_POST["edit"])) {
    //var_dump($_POST);
    $get_id = $_GET["id"];
    $kitty_name = $_POST["name"];
    $kitty_age = $_POST["age"];
    if($link) {
        $query = $link->query("UPDATE list SET name = '$kitty_name', age = '$kitty_age' WHERE id = '$get_id'");
        if($query) {
            header("Location: ". $_SERVER['HTTP_REFERER']);
        }
    }
}

//Delete

if(isset($_POST["delete"])) {
    //var_dump($_POST);
    $get_id = $_GET["id"];
    $kitty_name = $_POST["name"];
    $kitty_age = $_POST["age"];
    if($link) {
        $query = $link->query("UPDATE list SET flag = 0 WHERE id = '$get_id'");
        if($query) {
            header("Location: ". $_SERVER['HTTP_REFERER']);
        }
    }
}




mysqli_close($link);