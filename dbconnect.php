<?php
const DBHOST = "localhost";
const USER = "root";
const PWF = '';
const BDNAME = "myshop";

$conn = new mysqli(DBHOST, USER, PWF, BDNAME);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
