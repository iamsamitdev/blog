<?php
	include("../config/connect_mysql.php");
	header("Content-Type: application/vnd.ms-excel");
	header('Content-Disposition: attachment; filename="dataproduct.xls"'); #ชื่อไฟล์

	$sql = "SELECT * FROM product";
	$result = $connect->query($sql);
?>

<html xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">


<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Product</title>
    </head>
    <body>
        <table x:str border="1">
        		<tr>
        			<th>ID</th>
			<th>Category</th>
			<th>Product Name</th>
			<th>Price</th>
			<th>Menufacturer</th>
			<th>Status</th>

        		</tr>
        	
        			<?php
        				$count = 1;
        				while ($data = $result->fetch(PDO::FETCH_ASSOC))
				{
        			?>
        			<tr>
        				<td><?=$count;?></td>
        				<td><?=$data['categoryname'];?></td>
        				<td><?=$data['prdname'];?></td>
        				<td><?=$data['price'];?></td>
        				<td><?=$data['menufac_id'];?></td>
        				<td><?=$data['status'];?></td>
        			</tr>
        			<?php
        				$count++;
        				}
        			?>
        </table>
    </body>
</html>