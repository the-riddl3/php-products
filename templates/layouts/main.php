<?php
/* @var $content string */
/* @var $title string */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/main.css">
    <title><?= $title ?></title>
</head>
<body>
<!-- navbar -->
<nav class="p-4 border-3 border-bottom d-flex justify-content-between mb-4">
    <a href="/"><h3 class="text-dark">Product list</h3></a>

    <!-- actions -->
    <div>
        <a href="/add-product">
            <button class="btn btn-success">
                ADD
            </button>
        </a>
        <form class="d-inline" id="mass-delete" action="/mass-delete" method="post">
            <button class="btn btn-danger" id="delete-product-btn">
                MASS DELETE
            </button>
        </form>
    </div>
</nav>

<!-- page content -->
<div class="mx-4">
    <?= $content ?>
</div>

<script src="/js/main.js"></script>
</body>
</html>