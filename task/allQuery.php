<?php

	include_once('db_connect.php');

	if($_POST['addProduct']){
		$name = strip_tags($_POST['nameProduct']);
		$category = strip_tags($_POST['categoryProduct']);
		$cost = strip_tags($_POST['costProduct']);
		
		mysqli_query($CONNECT, "INSERT INTO products VALUES (NULL, '$name', '$category', '$cost')");
		
		header('Location: index.php');
	}
	
	if($_POST['deleteProduct']){
		$id = strip_tags($_POST['helpId']);
		mysqli_query($CONNECT, "DELETE FROM products WHERE id=$id");
		
		header('Location: index.php');
	}
	
	if($_POST['id']){
		$id = strip_tags($_POST['id']);
		$name = strip_tags($_POST['name']);
		$category = strip_tags($_POST['category']);
		$cost = strip_tags($_POST['cost']);
		mysqli_query($CONNECT, "UPDATE products SET name = '$name', category = '$category', cost = '$cost' WHERE id = $id");
	}
?>