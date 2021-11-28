<?php

function con(){
  return mysqli_connect("localhost","root","","blog");
}

$info = array(
  "name" => "Sample Blog",
  "short" => "SB",
  "description" => "my first pure PHP blog project",
);

$role = ["Admin","Editor","User"];

$url = "http://{$_SERVER['HTTP_HOST']}";