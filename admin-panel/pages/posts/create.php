<?php include "../../include/layout/header.php";

$categories = $db->query("SELECT * FROM categories ");

$invalidInputTitle = "";
$invalidInputAuthor = "";
$invalidInputImage = "";
$invalidInputBody = "";


if (isset($_POST['addPost'])) {


    if (empty(trim($_POST['title']))) {
        $invalidInputTitle = "فیلد عنوان مقاله الزامیست";
    }
    if (empty(trim($_POST['author']))) {
        $invalidInputAuthor = "فیلد نویسنده مقاله الزامیست";
    }
    if (empty(trim($_FILES['image']['name']))) {
        $invalidInputImage = "فیلد تصویر مقاله الزامیست";
    }
    if (empty(trim($_POST['body']))) {
        $invalidInputBody = "فیلد متن مقاله الزامیست";
    }
}

?>

<div class="container-fluid">
    <div class="row">

        <!-- Sidebar Section -->
        <?php include "../../include/layout/sidebar.php"; ?>

        <!-- Main Section -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="fs-3 fw-bold">ایجاد مقاله</h1>
            </div>

            <!-- Create Posts -->
            <div class="mt-4">
                <form method="POST" class="row g-4" enctype="multipart/form-data">
                    <div class="col-12 col-sm-6 col-md-4">
                        <label class="form-label">عنوان مقاله</label>
                        <input name="title" type="text" class="form-control" />
                        <div class="form-text text-danger">
                            <?= $invalidInputTitle ?>
                        </div>

                    </div>

                    <div class="col-12 col-sm-6 col-md-4">
                        <label class="form-label">نویسنده مقاله</label>
                        <input name="author" type="text" class="form-control" />
                        <div class="form-text text-danger">
                            <?= $invalidInputAuthor ?>
                        </div>


                    </div>

                    <div class="col-12 col-sm-6 col-md-4">
                        <label class="form-label">دسته بندی مقاله</label>
                        <select name="categoryId" class="form-select">
                            <?php if ($categories->rowCount() > 0): ?>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?= $category['id'] ?>">
                                        <?= $category['title'] ?>
                                    </option>

                                <?php endforeach ?>
                            <?php endif ?>
                        </select>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4">
                        <label for="formFile" class="form-label">تصویر مقاله</label>
                        <input name="image" class="form-control" type="file" />
                        <div class="form-text text-danger">
                            <?= $invalidInputImage ?>
                        </div>


                    </div>

                    <div class="col-12">
                        <label for="formFile" class="form-label">متن مقاله</label>
                        <textarea name="body" class="form-control" rows="6"></textarea>
                        <div class="form-text text-danger">
                            <?= $invalidInputBody ?>

                        </div>



                    </div>

                    <div class="col-12">
                        <button name="addPost" type="submit" class="btn btn-dark">
                            ایجاد
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>

<!-- <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
            crossorigin="anonymous"
        ></script> -->

<?php include "../../include/layout/footer.php"; ?>
