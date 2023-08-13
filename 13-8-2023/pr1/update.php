<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        <?php require_once './includes/navStyle.php' ?>
    </style>
    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this product?");
        }
    </script>
</head>

<body>
    <?php
    require_once './includes/nav.php';
    require_once './db/conn.php';
    $singlePr = [];
    if (isset($_GET['update']) && is_numeric($_GET['update'])) {
        $indexToUpdate = $_GET['update'];
        $result = $crudObj->getSingleProduct($indexToUpdate);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $singlePr = $row;
            }
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitUpdate'])) {
        $name = $_POST['name'];
        $brief = $_POST['brief'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        if ($_FILES['picture']['error'] === UPLOAD_ERR_OK) {
            $picture = $_FILES['picture']['name'];
            $uploadDir = 'uploads/';
            $uploadFile = $uploadDir . basename($picture);
            move_uploaded_file($_FILES['picture']['tmp_name'], $uploadFile);
        }else {
            $uploadFile = $singlePr['product_image'];
        }


        $crudObj->updateProduct($singlePr['id'],$name, $brief, $description, $price, $uploadFile);


        header("Location: index.php");
        exit();
    }
    ?>


    


    <div class="container">
        <h2>Update Product</h2><br>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3 form">
                <label for="name" class="form-label">Product Name:</label>
                <input class="form-control" value="<?php echo $singlePr['product_name'] ?>" type="text" name="name" placeholder="Name" aria-label="default input example">
            </div>

            <div class="mb-3 form">
                <label for="brief" class="form-label">Brief specifications</label>
                <input class="form-control" value="<?php echo $singlePr['product_brief_description'] ?>" type="text" id="brief" name="brief">
                <p style="color: grey;">ie: mention the storage, processor, ram..</p>
            </div>

            <div class="mb-3 form">
                <label for="description" class="form-label">Product Description:</label>
                <textarea class="form-control" id="description" name="description" rows="3">
                <?php echo $singlePr['product_description']?></textarea>
            </div>

            <div class="mb-3 form">
                <label for="price" class="form-label">Product price</label>
                <input class="form-control" value="<?php echo $singlePr['product_price']?>" type="text" id="price" name="price">
            </div>

            <div class="mb-3 form">
                <label for="picture" class="form-label">Product picture</label>
                <input class="form-control" value="<?php echo $singlePr['product_image']?>" type="file" id="picture" name="picture">
                <img src="<?php echo $singlePr['product_image'] ?>" alt="" width="100">
            </div>

            <button type="submit" class="btn btn-outline-primary" name="submitUpdate" value="Add Product">Update product</button>
        </form>

        

    </div><br><br>








    <br><br><br><br>

    <?php
    require_once './includes/footer.php';
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>