<?php
$title = 'add product';
?>
<!-- templates for individual product type metadata -->
<!-- DVD -->
<div id="template_dvd" class="form-group my-2 d-none">
    <label for="DVD">DVD size:</label>
    <input class="form-control" type="number" name="size">
    <div class="alert alert-danger d-none my-1" role="alert"></div>
    <small class="form-text text-muted">please specify DVD's size</small>
</div>

<!-- Furniture -->
<div id="template_furniture" class="form-group my-2 d-none">
    <div class="form-group">
        <label for="height">furniture height:</label>
        <input class="form-control" type="number" name="height">
        <div class="alert alert-danger d-none my-1" role="alert"></div>
    </div>

    <div class="form-group">
        <label for="width">furniture width:</label>
        <input class="form-control" type="number" name="width">
        <div class="alert alert-danger d-none my-1" role="alert"></div>
    </div>

    <div class="form-group">
        <label for="length">furniture length:</label>
        <input class="form-control" type="number" name="length">
        <div class="alert alert-danger d-none my-1" role="alert"></div>
    </div>

    <small class="form-text text-muted">please specify furniture's dimensions</small>
</div>

<!-- Book -->
<div id="template_book" class="form-group my-2 d-none">
    <label for="weight">Book weight</label>
    <input class="form-control" type="number" name="weight">
    <div class="alert alert-danger d-none my-1" role="alert"></div>
    <small class="form-text text-muted">please specify book's weight</small>
</div>

<div class="container">
    <form id="product_form" action="" method="post" class="my-4">
        <div class="form-group my-2">
            <label for="sku">SKU</label>
            <input class="form-control" type="text" id="sku" name="sku">
            <div class="alert alert-danger d-none my-1" role="alert"></div>
            <small class="form-text text-muted">Unique identifier for the product.</small>
        </div>

        <div class="form-group my-2">
            <label for="name">Name</label>
            <input class="form-control" type="text" id="name" name="name">
            <div class="alert alert-danger d-none my-1" role="alert"></div>
            <small class="form-text text-muted">Product name.</small>
        </div>

        <div class="form-group my-2">
            <label for="price">Price</label>
            <input class="form-control" type="number" step="0.01" id="price" name="price">
            <div class="alert alert-danger d-none my-1" role="alert"></div>
            <small class="form-text text-muted">product's price</small>
        </div>

        <div class="form-group">
            <label for="productType">Type Switcher</label>
            <select class="form-control" name="product_type" id="productType">
                <option value="DVD" id="DVD">DVD</option>
                <option value="Furniture" id="Furniture">Furniture</option>
                <option value="Book" id="Book">Book</option>
            </select>
        </div>

        <!-- product metadata input container -->
        <div id="meta"></div>

        <button class="btn btn-success my-3">Save</button>
        <a href="/" class="btn btn-danger my-3">Cancel</a>
    </form>
</div>
<script src="/js/add-product.js"></script>
