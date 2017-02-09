<?php
	include_once('db_connect.php');
?>


<!DOCTYPE html>
<html>

	<head>
		<title>Редактирование базы данных</title>
		<link rel="stylesheet" href="style.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script src="js.js"></script>
	</head>
	<body>
		<table>
			<tr>
				<td>ID</td>
				<td>Наименование товара</td>
				<td>Категория товара</td>
				<td>Стоимость</td>
			</tr>
			<?php
				if($CONNECT){
					$result = mysqli_query($CONNECT, "SELECT * FROM products");
					$row = mysqli_fetch_array($result);
					if($row > 0){
						do {
							echo '
								<tr>
									<td>'.$row['id'].'</td>
									<td>'.$row['name'].'</td>
									<td>'.$row['category'].'</td>
									<td>'.$row['cost'].'</td>
									<td>
										<form class="deleteForm" action="allQuery.php" method="POST">
											<input type="text" name="helpId" value="'.$row['id'].'" style="display:none"/>
											<input type="submit" name="deleteProduct" value="Удалить продукт"/>
										</form>
									</td>
									<td><button class="redButton"><a href="index.php?id='.$row['id'].'" onclick="showRedForm();">Редактировать</a></button></td>
								</tr>
							';
						} while($row = mysqli_fetch_array($result));
					}
				}
			?>
		</table>
		<form action="" method="POST" id="redForm">
			<?php
				$id = $_GET['id'];
				if($id){
					$redProduct = mysqli_query($CONNECT, "SELECT * FROM products WHERE id = $id");
					$row = mysqli_fetch_array($redProduct);
				}
			?>
			<p>Редактирование товара</p>
			<input type="text" name="idNameProduct" id="idNameProduct" value="<?php echo $row['id'] ?>" style="display:none"/>
			<input type="text" name="redNameProduct" id="redNameProduct" value="<?php echo $row['name'] ?>" required/>
			<select name="redCategoryProduct" id="redCategoryProduct">
				<option <?php if($row['category'] == 'Ноутбуки') echo 'selected'; ?> >Ноутбуки</option>
				<option <?php if($row['category'] == 'Мобильные телефоны') echo 'selected'; ?> >Мобильные телефоны</option>
			</select>
			<input type="text" name="redCostProduct" id="redCostProduct" value="<?php echo $row['cost'] ?>"/>
			<input type="submit" name="redProduct" id="redProduct" value="Редактировать товар"/>
		</form>
		<form action="allQuery.php" method="POST" id="addForm">
			<p>Добавление нового товара</p>
			<input type="text" name="nameProduct" placeholder="Наименование товара" required/>
			<select name="categoryProduct">
				<option selected>Ноутбуки</option>
				<option>Мобильные телефоны</option>
			</select>
			<input type="text" name="costProduct" placeholder="Стоимость товара"/>
			<input type="submit" name="addProduct" value="Добавить товар"/>
		</form>
	</body>
	
</html>