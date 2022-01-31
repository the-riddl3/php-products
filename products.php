<?php
/* @var $products array */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>products</title>
</head>
<body>
<h1>Products</h1>
<table>
    <?php foreach($products as $key => $value): ?>
        <tr>
            <td><?= $value ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>