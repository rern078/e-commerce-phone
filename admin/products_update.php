<?php
$pageTitleAdmin = "Products List";
include("include/admin_title.php");
?>
<div class="full_container">
    <div class="inner_container">
        <?php include("include/inc/admin_navbar_header.php") ?>
        <div id="content">
            <?php include("include/inc/admin_topbar_header.php") ?>
            <div class="midde_cont">
                <div class="container-fluid">
                    <div class="row column_title">
                        <div class="col-md-12">
                            <div class="page_title">
                                <h2>Products | Update Products</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- table section -->
                        <div class="col-md-12">
                            <div class="white_shd full margin_bottom_30">
                                <div class="full graph_head d-flex justify-content-between">
                                    <div class="heading1 margin_0">
                                        <h2>Update Product</h2>
                                    </div>
                                    <div class="heading1 margin_0 right-menu">
                                        <div class="dropdown_section drop-new">
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-primary dropdown-toggle  drop-new-01" data-toggle="dropdown"><i class="fa fa-tasks"></i></button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="products_list.php"><i class="fa-solid fa-list-ul sub-icon"></i>List Product</a>
                                                    <a class="dropdown-item" href="#"><i class="fa-solid fa-plus sub-icon"></i>Import Product</a>
                                                    <a class="dropdown-item" href="#"><i class="fa-solid fa-plus sub-icon"></i>Export Excel File</a>
                                                    <a class="dropdown-item line-style" href="products_add.php"><i class="fa-solid fa-plus sub-icon"></i>Add Product</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table_section padding_infor_info">
                                    <div class="table-responsive-sm">
                                        <div class="container">
                                            <div class="form-container">

                                                <?php
                                                include("db/connection.php");
                                                $message = "";
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                    if (isset($_POST["update"])) {
                                                        $product_id = $_GET["pro_id"];
                                                        $product_code = $_POST["product_code"];
                                                        $product_name = $_POST["product_name"];
                                                        $category = $_POST["category"];
                                                        $product_price = $_POST["product_price"];
                                                        $product_discount = $_POST["product_discount"];
                                                        $product_des = $_POST["product_des"];
                                                        $product_quantity = $_POST["product_quantity"];
                                                        $status = $_POST["status"];

                                                        if (isset($_FILES["product_image"]) && $_FILES["product_image"]["error"] == 0) {
                                                            $product_image = $_FILES["product_image"]["name"];
                                                            $temp_name = $_FILES['product_image']['tmp_name'];
                                                            move_uploaded_file($temp_name, "assets/images/uploads/product/$product_image");
                                                        } else {
                                                            if (isset($_POST["current_image"])) {
                                                                $product_image = $_POST["current_image"];
                                                            } else {
                                                                echo "Current image not provided!";
                                                                exit;
                                                            }
                                                        }

                                                        if (isset($_FILES["product_gallery"]) && $_FILES["product_gallery"]["error"] == 0) {
                                                            $product_gallery = $_FILES["product_gallery"]["name"];
                                                            $temp_name = $_FILES['product_gallery']['tmp_name'];
                                                            move_uploaded_file($temp_name, "assets/images/uploads/product/$product_gallery");
                                                        } else {
                                                            if (isset($_POST["current_gallery"])) {
                                                                $product_gallery = $_POST["current_gallery"];
                                                            } else {
                                                                // echo "Current gallery not provided!";
                                                                echo "<script>swal.fire('Warning!', 'Current gallery not provided!', 'warning');</script>";
                                                                exit;
                                                            }
                                                        }

                                                        $sql = "UPDATE products SET 
                                                                    product_code='$product_code', 
                                                                    product_name='$product_name',
                                                                    cat_id='$category',  
                                                                    product_price='$product_price', 
                                                                    product_discount='$product_discount', 
                                                                    product_des='$product_des', 
                                                                    product_quantity='$product_quantity', 
                                                                    product_image='$product_image', 
                                                                    product_gallery='$product_gallery', 
                                                                    status='$status' 
                                                                    WHERE pro_id=$product_id";

                                                        if ($conn->query($sql) === TRUE) {
                                                            // header('location: products_list.php');
                                                            // $message = "Products updated successfully";
                                                            echo "<script>swal.fire('Success!', 'Products updated successfully', 'success');</script>";
                                                        } else {
                                                            // $message = "Error updating products: " . $conn->error;
                                                            echo "<script>swal.fire('Error!', 'Products updated Field', 'error');</script>";
                                                        }
                                                    }
                                                }
                                                ?>
                                                <?php
                                                if (isset($_GET['pro_id'])) {
                                                    $product_id = $_GET['pro_id'];
                                                    $sql = "SELECT * FROM products WHERE pro_id = ?";
                                                    $stmt = mysqli_prepare($conn, $sql);

                                                    mysqli_stmt_bind_param($stmt, "i", $product_id);
                                                    mysqli_stmt_execute($stmt);
                                                    $result = mysqli_stmt_get_result($stmt);

                                                    if (mysqli_num_rows($result) > 0) {
                                                        $product = mysqli_fetch_assoc($result);
                                                ?>
                                                        <form action="products_update.php?pro_id=<?php echo $product_id; ?>" method="POST" enctype="multipart/form-data" name="form" id="form1" onsubmit="return Check_Field_Pro()">
                                                            <?php if (!empty($message)) : ?>
                                                                <?php if ($conn->query($sql) === false) : ?>
                                                                    <div class="alert alert-success"><?php echo $message; ?></div>
                                                                <?php else : ?>
                                                                    <div class="alert alert-warning"><?php echo $message; ?></div>
                                                                <?php endif; ?>
                                                            <?php endif; ?>

                                                            <div class="form-group">
                                                                <label for="product_code">Product Code <span>*</span></label>
                                                                <input type="text" class="form-control" id="product_code" name="product_code" onblur="detect_pro_code(this.value);" value="<?php echo $product['product_code']; ?>">
                                                                <div id=" check_product_code" class="err_div">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="product_name">Product Name <span>*</span></label>
                                                                <input type="text" class="form-control" id="product_name" name="product_name" onblur="detect_pro_name(this.value);" value="<?php echo $product['product_name']; ?>">
                                                                <div id="check_product_name" class="err_div"></div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="category">Category<span>*</span></label>
                                                                <select name="category" id="category" class="form-control" onblur="detect_pro_category(this.value);">
                                                                    <?php
                                                                    $get_cat = "SELECT * FROM categories ";
                                                                    $run_cat = mysqli_query($conn, $get_cat);
                                                                    while ($row_cat = mysqli_fetch_array($run_cat)) {
                                                                        $cat_id = $row_cat['cat_id'];
                                                                        $category_name = $row_cat['category_name'];
                                                                        echo "<option value='$cat_id '>$category_name</option>";
                                                                    } ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="product_price">Product Price <span>*</span></label>
                                                                <input type="number" class="form-control" id="product_price" name="product_price" placeholder="$" onblur="detect_pro_price(this.value);" onchange="formatPrice(this)" value="<?php echo $product['product_price']; ?>">
                                                                <div id="check_product_price" class="err_div"></div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="product_discount">Product Discount</label>
                                                                <input type="number" class="form-control" id="product_discount" name="product_discount" placeholder="$" value="<?php echo $product['product_discount']; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="product_des">Product Description</label>
                                                                <textarea name="product_des" id="product_des" class="form-control" cols="30" rows="5"><?php echo $product['product_des']; ?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="product_quantity">Product Quantity<span>*</span></label>
                                                                <input type="number" class="form-control" id="product_quantity" name="product_quantity" onblur="detect_pro_quantity(this.value);" value="<?php echo $product['product_quantity']; ?>">
                                                                <div id="check_product_quantity" class="err_div"></div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="product_image">Product Image</label>
                                                                <input type="file" class="form-control" id="product_image" name="product_image">
                                                                <img src="assets/images/uploads/product/<?php echo $product['product_image'] ?>" width='100px' alt="Current Image">
                                                                <input type="hidden" name="current_image" value="<?php echo $product['product_image'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="product_gallery">Product Gallery</label>
                                                                <input type="file" class="form-control" id="product_gallery" name="product_gallery">
                                                                <img src="assets/images/uploads/product/<?php echo $product['product_gallery'] ?>" width='100px' alt="Current Image">
                                                                <input type="hidden" name="current_gallery" value="<?php echo $product['product_gallery'] ?>">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="status">Status<span>*</span></label>
                                                                <select name="status" id="status" class="form-control">
                                                                    <option value="active" <?php if ($product['status'] == 'active') echo 'selected'; ?>>Active</option>
                                                                    <option value="inactive" <?php if ($product['status'] == 'inactive') echo 'selected'; ?>>Inactive</option>
                                                                </select>
                                                                <div id="check_category_status" class="err_div"></div>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary add-category" name="update">Update Product</button>
                                                        </form>
                                                <?php
                                                    } else {
                                                        echo "No Product found with ID: $product_id";
                                                    }

                                                    mysqli_stmt_close($stmt);
                                                } else {
                                                    echo "No Product ID provided!";
                                                }

                                                mysqli_close($conn);
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include("include/admin_footer.php") ?>
            </div>
        </div>
    </div>
</div>

<script>
    function Check_Field_Pro() {
        var product_code = document.getElementById("product_code").value.trim();
        if (product_code === '') {
            alert("Field Product Code cannot empty!'");
            form.product_code.focus();
            return (false);
        }

        var product_name = document.getElementById("product_name").value.trim();
        if (product_name === '') {
            alert("Field Nroduct Name cannot empty!'");
            form.product_name.focus();
            return (false);
        }

        var product_price = document.getElementById("product_price").value.trim();
        if (product_price === '') {
            alert("Field Product Price cannot empty!'");
            form.product_price.focus();
            return (false);
        }

        var product_quantity = document.getElementById("product_quantity").value.trim();
        if (product_quantity === '') {
            alert("Field Product Auantity cannot empty!'");
            form.product_quantity.focus();
            return (false);
        }

        var status = document.getElementById("status").value;
        if (status === '') {
            alert("Please Select Status'");
            return (false);
        }

        return (true)
    }

    function detect_pro_code(value) {

        var detect_pro_code = /^[a-zA-Z\d]/.test(value);
        if (!detect_pro_code) {
            clear();
            document.getElementById("check_product_code").innerHTML =
                "The Product Code must contain: numbers and letters";
        } else {
            document.getElementById("check_product_code").innerHTML = "";
        }
    }

    function detect_pro_name(value) {

        var detect_pro_name = /[a-zA-Z]/.test(value);
        if (!detect_pro_name) {
            clear();
            document.getElementById("check_product_name").innerHTML =
                "The Product Name must contain: numbers and letters";
        } else {
            document.getElementById("check_product_name").innerHTML = "";
        }
    }

    function detect_pro_price(value) {
        var detect_pro_price = /^\d{1,3}(,\d{3})*(\.\d{2})?$/.test(value);
        if (!detect_pro_price) {
            clear();
            document.getElementById("check_product_price").innerHTML =
                "The Product Price must contain: numbers";
        } else {
            document.getElementById("check_product_price").innerHTML = "";
        }
    }

    function detect_pro_quantity(value) {
        var detect_pro_quantity = /^\d{1,3}(,\d{3})*(\.\d{2})?$/.test(value);
        if (!detect_pro_quantity) {
            clear();
            document.getElementById("check_product_quantity").innerHTML =
                "The Product Quantity must contain: numbers";
        } else {
            document.getElementById("check_product_price").innerHTML = "";
        }
    }

    function clear() {
        document.getElementById("check_product_code").innerHTML = "";
        document.getElementById("check_product_name").innerHTML = "";
        document.getElementById("check_product_price").innerHTML = "";
        document.getElementById("check_product_quantity").innerHTML = "";
    }
</script>