<?php

require_once "core/auth.php";
require_once "core/base.php";
require_once "core/function.php";


if(categoryRemovePin()){
    linkTo('category_add.php');
}