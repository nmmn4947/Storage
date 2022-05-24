<?php
session_start();

if($_SESSION['Bill'] == null){
	header("Location: plslog.php");
}
?>