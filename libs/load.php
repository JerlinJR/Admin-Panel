<?php

include_once "includes/Database.class.php";


function load_template($name) {

    include $_SERVER['DOCUMENT_ROOT']."/templates/$name.php";
}

function signupAgent($username,$password,$admin_id){

    $conn = Database::getConnection();
    $sql = "INSERT INTO `agent` (`username`,`password`,`admin_id`)
    VALUES ('$username','$password',$admin_id);";

    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        return false;
    }

}

function getAllData(){

    $conn = Database::getConnection();

    $sql = "SELECT * FROM `admin`";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function deleteData($id){

    $conn = Database::getConnection();
    $sql = "DELETE FROM `admin` WHERE `id` = $id";

    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        return false;
    }

}

function editData($newName,$newUsername,$newEmail,$newPhone,$newPassword,$id){

    $conn = Database::getConnection();

    $sql = "UPDATE `admin` SET `name` = '$newName', `username` = '$newUsername', `email` = '$newEmail', `phone` = '$newPhone', `password` = '$newPassword' WHERE `id` = '$id';";

    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        // echo "Error updating : " . mysqli_error($conn);
        return false;
    }
}

function getOneData($id){

    $conn = Database::getConnection();
    $query = "SELECT * FROM `admin` WHERE `id` = $id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    } else {
        return null; // Return null or an empty array, depending on your preference
    }

}

function agentCount($id){

    $conn = Database::getConnection();
    $sql = "SELECT COUNT(*) AS `agent_count` FROM `agent` WHERE `admin_id` = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['agent_count'];

}


// Agent Functions

function getAllDataAgent(){

    $conn = Database::getConnection();

    $sql = "SELECT * FROM `agent`";
    $result = mysqli_query($conn, $sql);
    return $result;
}


function signup($name,$username,$password,$email,$phone){

    $conn = Database::getConnection();
    $sql = "INSERT INTO `admin` (`name`, `username`, `email`, `phone`, `password`)
    VALUES ('$name', '$username', '$email', '$phone', '$password');";

    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        return false;
    }

}

function getGroupOfAgent($id){

    $conn = Database::getConnection();

    $sql = "SELECT * FROM `agent` WHERE `admin_id` = $id;";
    $result = mysqli_query($conn, $sql);
    
    $rows = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    if (count($rows) > 0) {
        foreach ($rows as $row) {
            foreach ($row as $key => $value) {
                 $key . ": " . $value . "<br>";
            }
        }
    }
    return $rows;
}

function deleteDataAgent($id){

    $conn = Database::getConnection();
    $sql = "DELETE FROM `agent` WHERE `id` = $id";

    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        return false;
    }

}

function editDataAgent($newUsername,$newPassword,$id){

    $conn = Database::getConnection();

    $sql = "UPDATE `agent` SET `username` = '$newUsername', `password` = '$newPassword' WHERE `id` = '$id';";

    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        // echo "Error updating : " . mysqli_error($conn);
        return false;
    }
}

function getOneDataAgent($id){

    $conn = Database::getConnection();
    $query = "SELECT * FROM `agent` WHERE `id` = $id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    } else {
        return null; // Return null or an empty array, depending on your preference
    }

}


function checkAgentOverflow($id){

    $conn = Database::getConnection();
    $sql = "SELECT COUNT(*) AS `agent_count` FROM `agent` WHERE `admin_id` = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row['agent_count'] >= 5) {
        return true;
    } else {
        return false;
    }

}