<?php
include "./include/config.php";
include "./include/db.php";

$query = "SELECT * FROM categories";
$categories = $db->query($query);


?>
<!DOCTYPE html>
<html dir="rtl" lang="fa">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>php tutorial || blog project || webprog.io</title>

    <link rel="stylesheet" href="./assets/css/bootstrap-icons.css" />
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />

    <link rel="stylesheet" href="./assets/css/style.css" />
</head>

<body>
    <div class="container py-3">
        <header class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
            <a href="index.html" class="fs-4 fw-medium link-body-emphasis text-decoration-none">
                webprog.io
            </a>

            <nav class="d-inline-flex mt-2 mt-md-0 me-md-auto">
                <?php if ($categories->rowCount() > 0): ?>
                    <?php foreach ($categories as $category): ?>
                        <a class="fw-bold me-3 py-2 link-body-emphasis text-decoration-none" href="#">
                            <?= $category['title'] ?>
                        </a>
                    <?php endforeach ?>

                <?php endif ?>

            </nav>
        </header>
