<?php

$db = new mysqli("localhost", "root", "", "techskill");

if ($db->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
