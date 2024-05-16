<?php
$pageTitleAdmin = "Brands Update";
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
                                <h2>Brands | Update Brands</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- table section -->
                        <div class="col-md-12">
                            <div class="white_shd full margin_bottom_30">
                                <div class="full graph_head d-flex justify-content-between">
                                    <div class="heading1 margin_0">
                                        <h2>Update Brands</h2>
                                    </div>
                                    <div class="heading1 margin_0 right-menu">
                                        <div class="dropdown_section drop-new">
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-primary dropdown-toggle  drop-new-01" data-toggle="dropdown"><i class="fa fa-tasks"></i></button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="brands_list.php"><i class="fa-solid fa-list-ul sub-icon"></i>List Brand</a>
                                                    <a class="dropdown-item" href="categorires_add.php"><i class="fa-solid fa-plus sub-icon"></i>Add Category</a>
                                                    <a class="dropdown-item" href="products_add.php"><i class="fa-solid fa-plus sub-icon"></i>Add Products</a>
                                                    <a class="dropdown-item line-style" href="brands_add.php"><i class="fa-solid fa-trash-can sub-icon"></i>Delete Brand</a>
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
                                                        $brands_id = $_GET["brand_id"];
                                                        $brand_code = $_POST["brand_code"];
                                                        $brand_name = $_POST["brand_name"];
                                                        $cate_id = $_POST["cate_id"];
                                                        $sequence = $_POST["sequence"];
                                                        $status = $_POST["status"];

                                                        if (isset($_FILES["brand_image"]) && $_FILES["brand_image"]["error"] == 0) {
                                                            $brand_image = $_FILES["brand_image"]["name"];
                                                            $temp_name = $_FILES['brand_image']['tmp_name'];
                                                            move_uploaded_file($temp_name, "assets/images/uploads/brand/$brand_image");
                                                        } else {
                                                            if (isset($_POST["current_image"])) {
                                                                $brand_image = $_POST["current_image"];
                                                            } else {
                                                                echo "Current image not provided!";
                                                                exit;
                                                            }
                                                        }

                                                        $sql = "UPDATE brands SET 
                                                                    brand_code='$brand_code', 
                                                                    brand_name='$brand_name',
                                                                    cat_id='$cate_id',  
                                                                    brand_image='$brand_image', 
                                                                    sequence='$sequence',
                                                                    status='$status' 
                                                                    WHERE brand_id=$brands_id";

                                                        if ($conn->query($sql) === TRUE) {
                                                            // header('location: brands_list.php');
                                                            // $message = "Brands updated successfully";
                                                            echo "<script>swal.fire('Success!', 'Brands updated Sucessfully', 'success');</script>";
                                                        } else {
                                                            // $message = "Error updating brands: " . $conn->error;
                                                            echo "<script>swal.fire('Errors!', 'Brands updated Field', 'error');</script>";
                                                        }
                                                    }
                                                }
                                                ?>
                                                <?php
                                                if (isset($_GET['brand_id'])) {
                                                    $brands_id = $_GET['brand_id'];
                                                    $sql = "SELECT * FROM brands WHERE brand_id = ?";
                                                    $stmt = mysqli_prepare($conn, $sql);

                                                    mysqli_stmt_bind_param($stmt, "i", $brands_id);
                                                    mysqli_stmt_execute($stmt);
                                                    $result = mysqli_stmt_get_result($stmt);

                                                    if (mysqli_num_rows($result) > 0) {
                                                        $brand = mysqli_fetch_assoc($result);
                                                ?>
                                                        <form action="brands_update.php?brand_id=<?php echo $brands_id; ?>" method="POST" enctype="multipart/form-data" name="form" id="form1" onsubmit="return Check_Field_Brand()">
                                                            <?php if (!empty($message)) : ?>
                                                                <?php if ($conn->query($sql) === false) : ?>
                                                                    <div class="alert alert-success"><?php echo $message; ?></div>
                                                                <?php else : ?>
                                                                    <div class="alert alert-warning"><?php echo $message; ?></div>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                            <div class="form-group">
                                                                <label for="brand_code">Brands Code <span>*</span></label>
                                                                <input type="text" class="form-control" id="brand_code" name="brand_code" value="<?php echo $brand['brand_code']; ?>" onblur="detect_brand_code(this.value);">
                                                                <div id="check_brand_code" class="err_div"></div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="brand_name">Brand Name <span>*</span></label>
                                                                <input type="text" class="form-control" id="brand_name" name="brand_name" value="<?php echo $brand['brand_name']; ?>" onblur="detect_brand_name(this.value);">
                                                                <div id="check_brand_name" class="err_div"></div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cate_id">Category<span>*</span></label>
                                                                <select name="cate_id" id="cate_id" class="form-control">
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
                                                                <label for="brand_image">Brand Image</label>
                                                                <input type="file" class="form-control" id="brand_image" name="brand_image">
                                                                <img src="assets/images/uploads/brand/<?php echo $brand['brand_image'] ?>" width='100px' alt="Current Image">
                                                                <input type="hidden" name="current_image" value="<?php echo $brand['brand_image'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="sequence">Sequence</label>
                                                                <input type="text" class="form-control" id="sequence" name="sequence" value="<?php echo $brand['sequence']; ?>">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="status">Status<span>*</span></label>
                                                                <select name="status" id="status" class="form-control">
                                                                    <option value="0" disabled selected>Please Select Status</option>
                                                                    <option value="active" <?php if ($brand['status'] == 'active') echo 'selected'; ?>>Active</option>
                                                                    <option value="inactive" <?php if ($brand['status'] == 'inactive') echo 'selected'; ?>>Inactive</option>
                                                                </select>
                                                                <div id="check_brand_status" class="err_div"></div>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary add-category" name="update">Update Brand</button>
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
    function Check_Field_Brand() {
        var brand_code = document.getElementById("brand_code").value.trim();
        if (brand_code === '') {
            alert("Field brand Code cannot empty!'");
            form.brand_code.focus();
            return (false);
        }

        var brand_name = document.getElementById("brand_name").value.trim();
        if (brand_name === '') {
            alert("Field brand Name cannot empty!'");
            form.brand_name.focus();
            return (false);
        }

        var cate_id = document.getElementById("cate_id").value;
        if (cate_id === '0') {
            alert("Please select a Category Name.");
            return false;
        }

        var status = document.getElementById("status").value;
        if (status === '0') {
            alert("Please select a Status.");
            return false;
        }

        return (true)
    }

    function detect_brand_code(value) {

        var detect_brand_code = /^[a-zA-Z\d]/.test(value);
        if (!detect_brand_code) {
            clear();
            document.getElementById("check_brand_code").innerHTML =
                "The Brand Code must contain: numbers and letters";
        } else {
            document.getElementById("check_brand_code").innerHTML = "";
        }
    }

    function detect_brand_name(value) {

        var detect_brand_name = /[a-zA-Z]/.test(value);
        if (!detect_brand_name) {
            clear();
            document.getElementById("check_brand_name").innerHTML =
                "The Brand Name must contain: numbers and letters";
        } else {
            document.getElementById("check_brand_name").innerHTML = "";
        }
    }

    function clear() {
        document.getElementById("check_brand_code").innerHTML = "";
        document.getElementById("check_brand_name").innerHTML = "";
    }
</script>