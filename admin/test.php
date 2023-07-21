<?php

include_once "../libs/load.php";

if(Database::getConnection()){
    echo "Connected";
} else{
    echo "Not Connected";
}