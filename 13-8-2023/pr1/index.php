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
        #action {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
        }
        

    </style>
    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this product?");
        }
    </script>
</head>

<body>
    <?php
    require_once './db/conn.php';

    $allProducts = $crudObj->getAllProducts();

    if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
        $indexToDelete = $_GET['delete'];
        $crudObj->deleteProduct($indexToDelete);
        header("Location: index.php");
    }




    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        $name = $_POST['name'];
        $brief = $_POST['brief'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $picture = $_FILES['picture']['name'];

        $uploadDir = 'uploads/';
        $uploadFile = $uploadDir . basename($picture);
        move_uploaded_file($_FILES['picture']['tmp_name'], $uploadFile);

        $crudObj->addProduct($name, $brief, $description, $price, $uploadFile);


        header("Location: index.php");
        exit();
    }
    ?>

    <?php
    require_once './includes/nav.php';

    ?>



    <div class="container">
        <h2>Add Product</h2><br>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3 form">
                <label for="name" class="form-label">Product Name:</label>
                <input class="form-control" type="text" name="name" placeholder="Name" aria-label="default input example">
            </div>

            <div class="mb-3 form">
                <label for="brief" class="form-label">Brief specifications</label>
                <input class="form-control" type="text" id="brief" name="brief">
                <p style="color: grey;">ie: mention the storage, processor, ram..</p>
            </div>

            <div class="mb-3 form">
                <label for="description" class="form-label">Product Description:</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>

            <div class="mb-3 form">
                <label for="price" class="form-label">Product price</label>
                <input class="form-control" type="text" id="price" name="price">
            </div>

            <div class="mb-3 form">
                <label for="picture" class="form-label">Product picture</label>
                <input class="form-control" type="file" id="picture" name="picture">
            </div>

            <button type="submit" class="btn btn-outline-success" name="submit" value="Add Product">Add product</button>
        </form>

    </div><br><br>


    <div class="container">
        <h2>Added Products</h2>
        <?php if($allProducts->num_rows>0) {?>
        <div class="table-responsive">
            <table class="table table-hover table-bordered border-secondary-subtle table-responsive table-info">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Picture</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while ($product = $allProducts->fetch_assoc()) { ?>
                        <tr class="align-middle">
                            <td><?php echo $product['product_name']; ?></td>
                            <td class="desc"><?php echo $product['product_description']; ?></td>
                            <td><?php echo $product['product_price']; ?></td>
                            <td><img src="<?php echo $product['product_image']; ?>" width="100" alt=""></td>
                            <td>
                                <div id="action">

                                    <a href="?delete=<?php echo $product['id']; ?>" onclick="return confirmDelete()">
                                        <button type="button" class="btn btn-outline-danger">Delete</button>
                                    </a>

                                    <a href="update.php?update=<?php echo $product['id']; ?>">
                                        <button type="button" class="btn btn-outline-primary">Update</button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>




            </table>

        </div>
        <?php }else{echo "<h2 class='text-danger'>No Products to show</h2>";} ?>


    </div><br><br><br><br>

    <?php
    require_once './includes/footer.php';
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>