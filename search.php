<!DOCTYPE html>

<html dir="rtl" lang="fa">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>php tutorial || blog project || webprog.io</title>

    <!-- <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
        /> -->
    <link rel="stylesheet" href="./assets/css/bootstrap-icons.css" />
    <!-- <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
            crossorigin="anonymous"
        /> -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="./assets/css/style.css" />
</head>

<body>
    <div class="container py-3">

        <?php include "./include/layout/header.php";

        if (isset($_GET['search'])) {
            $keyword = $_GET['search'];

            $posts = $db->prepare("SELECT * FROM posts WHERE title LIKE :keyword");
            $posts->execute(['keyword' => "%$keyword%"]);
        }


        ?>


        <main>
            <!-- Content Section -->
            <section class="mt-4">
                <div class="row">
                    <!-- Posts Content -->
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col">
                                <div class="alert alert-secondary">
                                    پست های مرتبط با کلمه [
                                    <?= $_GET['search'] ?>]
                                </div>

                                <?php if ($posts->rowCount() == 0): ?>

                                    <div class="alert alert-danger">
                                        مقاله مورد نظر پیدا نشد !!!!
                                    </div>
                                <?php else: ?>

                                    <div class="row g-3">

                                        <?php foreach ($posts as $post): ?>
                                            <?php
                                            $categoryId = $post['category_id'];
                                            $postCategory = $db->query("SELECT * FROM categories WHERE id = $categoryId")->fetch()
                                            ?>

                                            <div class="col-sm-6">
                                                <div class="card">
                                                    <img src="./uploads/posts/<?= $post['image'] ?>" class="card-img-top"
                                                        alt="post-image" />
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between">
                                                            <h5 class="card-title fw-bold">
                                                                <?= $post["title"] ?>
                                                            </h5>
                                                            <div>
                                                                <span class="badge text-bg-secondary">
                                                                    <?= $postCategory['title'] ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <p class="card-text text-secondary pt-3">
                                                            <?= substr($post["body"], 0, 500) ?>
                                                        </p>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <a href="single.html" class="btn btn-sm btn-dark">مشاهده</a>

                                                            <p class="fs-7 mb-0">
                                                                نویسنده :
                                                                <?= $post['author'] ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php endforeach ?>

                                    </div>
                                <?php endif ?>
                            </div>

                        </div>
                    </div>
                    <?php include "./include/layout/sidebar.php" ?>
                </div>
            </section>
        </main>
        <?php include "./include/layout/footer.php" ?>
    </div>

</body>

</html>
