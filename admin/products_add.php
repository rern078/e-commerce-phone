<?php
$pageTitleAdmin = "Add Products";
include("include/admin_title.php");
?>
<?php
include("db/connection.php");
error_reporting(0);
$message = "";
if (isset($_POST["create"])) {
    $product_code = htmlspecialchars($_POST["product_code"]);
    $product_name = htmlspecialchars($_POST["product_name"]);
    $category = $_POST["category"];
    $brands_id = $_POST["brands_id"];
    $product_price = htmlspecialchars($_POST["product_price"]);
    $product_discount = htmlspecialchars($_POST["product_discount"]);
    $product_des = htmlspecialchars($_POST["product_des"]);
    $product_quantity = htmlspecialchars($_POST["product_quantity"]);
    $status = $_POST["status"];

    if (
        isset($_FILES["product_image"]) && $_FILES["product_image"]["error"] == 0
    ) {
        $product_image = $_FILES["product_image"]["name"];
        $temp_name = $_FILES['product_image']['tmp_name'];
        move_uploaded_file($temp_name, "assets/images/uploads/product/$product_image");
    } else {
        $product_image = "";
    }

    if (
        isset($_FILES["product_gallery"]) && $_FILES["product_gallery"]["error"] == 0
    ) {
        $product_gallery = $_FILES["product_gallery"]["name"];
        $temp_name = $_FILES['product_gallery']['tmp_name'];
        move_uploaded_file($temp_name, "assets/images/uploads/product/$product_gallery");
    } else {
        $product_gallery = "";
    }

    $sql_query = "INSERT INTO products (cat_id,product_code, product_name, brand_id, product_price, product_discount, product_des, product_quantity,product_image,product_gallery, status) 
                VALUES ('$category', '$product_code', '$product_name', '$brands_id', '$product_price','$product_discount',  '$product_des',  '$product_quantity', '$product_image','$product_gallery','$status')";

    $data = mysqli_query($conn, $sql_query);

    if ($data) {
        // $message = "Product Added Successfully ! ";
        echo "<script>swal.fire('Success!', 'Product Added Successfully ! ', 'success');</script>";
        // header('location: products_list.php');
    } else {
        // $message = "Error :" . $sql . "" . mysqli_error($conn);
        echo "<script>swal.fire('Errors!', 'Product Added Field ! ', 'error');</script>";
    }
    mysqli_close($conn);
}

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
                                <h2>Products | Add Products</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- table section -->
                        <div class="col-md-12">
                            <div class="white_shd full margin_bottom_30">
                                <div class="full graph_head d-flex justify-content-between">
                                    <div class="heading1 margin_0">
                                        <h2>Add Products</h2>
                                    </div>
                                    <div class="heading1 margin_0 right-menu">
                                        <div class="dropdown_section drop-new">
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-primary dropdown-toggle  drop-new-01" data-toggle="dropdown"><i class="fa fa-tasks"></i></button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="products_list.php"><i class="fa-solid fa-list-ul sub-icon"></i>List Products</a>
                                                    <a class="dropdown-item" href="#"><i class="fa-solid fa-plus sub-icon"></i>Import Products</a>
                                                    <a class="dropdown-item" href="#"><i class="fa-solid fa-plus sub-icon"></i>Export Excel File</a>
                                                    <a class="dropdown-item line-style" href="products_add.php"><i class="fa-solid fa-trash-can sub-icon"></i>Add Products</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="table_section padding_infor_info">
                                    <div class="table-responsive-sm">
                                        <div class="container">
                                            <div class="form-container">
                                                <form action="products_add.php" method="POST" enctype="multipart/form-data" name="form" id="form1" onsubmit="return Check_Field_Pro()">
                                                    <?php if (!empty($message)) : ?>
                                                        <?php if ($data) : ?>
                                                            <div class="alert alert-success"><?php echo $message; ?></div>
                                                        <?php else : ?>
                                                            <div class="alert alert-warning"><?php echo $message  . " Create Product Is Faild"; ?></div>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                    <div class="form-group">
                                                        <label for="product_code">Product Code <span>*</span></label>
                                                        <input type="text" class="form-control" id="product_code" name="product_code" onblur="detect_pro_code(this.value);">
                                                        <div id="check_product_code" class="err_div"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="product_name">Product Name <span>*</span></label>
                                                        <input type="text" class="form-control" id="product_name" name="product_name" onblur="detect_pro_name(this.value);">
                                                        <div id="check_product_name" class="err_div"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="category">Category<span>*</span></label>
                                                        <select name="category" id="category" class="form-control" onblur="detect_pro_category(this.value);">
                                                            <option value="0" selected disabled>Please Select category Name</option>
                                                            <?php
                                                            $get_cat = "SELECT * FROM categories ";
                                                            $run_cat = mysqli_query($conn, $get_cat);
                                                            while ($row_cat = mysqli_fetch_array($run_cat)) {
                                                                $cat_id = $row_cat['cat_id'];
                                                                $category_name = $row_cat['category_name'];
                                                            ?>
                                                                <option value='<?php echo $cat_id ?>'><?php echo $category_name ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="brands_id">Brand Name<span>*</span></label>
                                                        <select name="brands_id" id="brands_id" class="form-control" onblur="detect_pro_brand_id(this.value);">
                                                            <option value="0" selected disabled>Please Select brand Name</option>
                                                            <?php
                                                            $get_brand = "SELECT * FROM brands ";
                                                            $run_brand = mysqli_query($conn, $get_brand);
                                                            while ($row_brand = mysqli_fetch_array($run_brand)) {
                                                                $brand_id = $row_brand['brand_id'];
                                                                $brand_name = $row_brand['brand_name'];
                                                            ?>
                                                                <option value='<?php echo $brand_id ?>'><?php echo $brand_name ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="product_price">Product Price <span>*</span></label>
                                                        <input type="number" class="form-control" id="product_price" name="product_price" placeholder="$" onblur="detect_pro_price(this.value);" onchange="formatPrice(this)">
                                                        <div id="check_product_price" class="err_div"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="product_discount">Product Discount</label>
                                                        <input type="number" class="form-control" id="product_discount" name="product_discount" placeholder="$">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="product_des">Product Description</label>
                                                        <textarea name="product_des" id="product_des" class="form-control" cols="30" rows="5"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="product_quantity">Product Quantity<span>*</span></label>
                                                        <input type="number" class="form-control" id="product_quantity" name="product_quantity" onblur="detect_pro_quantity(this.value);">
                                                        <div id="check_product_quantity" class="err_div"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="product_image">Product Image</label>
                                                        <input type="file" class="form-control" id="product_image" name="product_image">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="product_gallery">Product Gallery</label>
                                                        <input type="file" class="form-control" id="product_gallery" name="product_gallery">
                                                        <div id="image_preview"></div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="status">Status<span>*</span></label>
                                                        <select name="status" id="status" class="form-control">
                                                            <option value="active">Active</option>
                                                            <option value="inactive">Inactive</option>
                                                        </select>
                                                        <div id="check_category_status" class="err_div"></div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary add-category" name="create">Add Product</button>
                                                </form>
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
            alert("Field Product Name cannot empty!'");
            form.product_name.focus();
            return (false);
        }

        var category = document.getElementById("category").value;
        if (category === '0') {
            alert("Please select a category Name.");
            return false;
        }

        var brands_id = document.getElementById("brands_id").value;
        if (brands_id === '0') {
            alert("Please select a brand Name.");
            return false;
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


<script>
    document.getElementById('product_gallery').addEventListener('change', function() {
        var files = this.files;
        var imagePreviewDiv = document.getElementById('image_preview');
        imagePreviewDiv.innerHTML = ''; // Clear previous previews

        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    var img = new Image();
                    img.src = event.target.result;
                    img.width = 50; // Set width to 50 pixels
                    img.height = 50; // Set height to 50 pixels
                    imagePreviewDiv.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        }
    });
</script>