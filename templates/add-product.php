<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>add product</title>
</head>
<body>
<!-- templates for individual product type metadata -->
<!-- DVD -->
<div>
    <label for="DVD">DVD size:</label>
    <input type="number" name="size">
</div>

<!-- Furniture -->
<div>
    <label for="height">furniture height:</label>
    <input type="number" id="height" name="height">

    <label for="width">furniture width:</label>
    <input type="number" id="width" name="width">

    <label for="length">furniture length:</label>
    <input type="number" id="length" name="length">
</div>

<!-- Book -->
<div>
    <label for="weight">Book weight</label>
    <input type="number" id="weight" name="weight">
</div>

<div class="container">
    <form action="" method="post" class="my-4">
        <div class="form-group">
            <label for="sku">SKU</label>
            <input class="form-control" type="text" id="sku" name="sku">
            <small class="form-text text-muted">Unique identifier for the product.</small>
        </div>

        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" type="text" id="name" name="name">
            <small class="form-text text-muted">Product name.</small>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input class="form-control" type="text" id="price" name="price">
            <small class="form-text text-muted">product's price</small>
        </div>

        <label for="productType">Type Switcher</label>
        <select class="form-control" name="product_type" id="productType">
            <option value="DVD" id="DVD">DVD</option>
            <option value="Furniture" id="Furniture">Furniture</option>
            <option value="Book" id="Book">Book</option>
        </select>

        <button class="btn btn-success my-3">Add product</button>
    </form>
</div>
</body>
</html>
