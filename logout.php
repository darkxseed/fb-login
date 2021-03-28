<?php

if(isset($_GET['logout'])){
session_destroy();

include "redirect.php";
}
?>
