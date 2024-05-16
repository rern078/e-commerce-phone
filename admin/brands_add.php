<?php
$pageTitleAdmin = "Brands Add";
include("include/admin_title.php");
?>
<?php
include("db/connection.php");
error_reporting(0);
$message = "";
if (isset($_POST["create"])) {
    $brand_code = htmlspecialchars($_POST["brand_code"]);
    $brand_name = htmlspecialchars($_POST["brand_name"]);
    $cate_id = $_POST["cate_id"];
    $sequence = htmlspecialchars($_POST["sequence"]);
    $status = $_POST["status"];

    if (
        isset($_FILES["brand_image"]) && $_FILES["brand_image"]["error"] == 0
    ) {
        $brand_image = $_FILES["brand_image"]["name"];
        $temp_name = $_FILES['brand_image']['tmp_name'];
        move_uploaded_file($temp_name, "assets/images/uploads/brand/$brand_image");
    } else {
        $brand_image = "";
    }

    $sql_query = "INSERT INTO brands (cat_id, brand_code, brand_name, brand_image, sequence, status) 
                VALUES ('$cate_id','$brand_code', '$brand_name',  '$brand_image','$sequence','$status')";

    $data = mysqli_query($conn, $sql_query);

    if ($data) {
        // $message = "Brand Added Successfully ! ";
        echo "<script>swal.fire('Success!', 'Brand updated successfully', 'success');</script>";
        // header('location: brands_list.php');
    } else {
        $message = "Error :" . $sql . "" . mysqli_error($conn);
        echo "<script>swal.fire('Error!', 'Products Add Field', 'error');</script>";
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
                                <h2>Brands | Add Brands</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- table section -->
                        <div class="col-md-12">
                            <div class="white_shd full margin_bottom_30">
                                <div class="full graph_head d-flex justify-content-between">
                                    <div class="heading1 margin_0">
                                        <h2>Add Brands</h2>
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
                                                <form action="brands_add.php" method="POST" enctype="multipart/form-data" name="form" id="form1" onsubmit="return Check_Field_Brand()">
                                                    <?php if (!empty($message)) : ?>
                                                        <?php if ($data) : ?>
                                                            <div class="alert alert-success"><?php echo $message; ?></div>
                                                        <?php else : ?>
                                                            <div class="alert alert-warning"><?php echo $message; ?></div>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                    <div class="form-group">
                                                        <label for="brand_code">Brands Code <span>*</span></label>
                                                        <input type="text" class="form-control" id="brand_code" name="brand_code" onblur="detect_brand_code(this.value);">
                                                        <div id="check_brand_code" class="err_div"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="brand_name">Brand Name <span>*</span></label>
                                                        <input type="text" class="form-control" id="brand_name" name="brand_name" onblur="detect_brand_name(this.value);">
                                                        <div id="check_brand_name" class="err_div"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cate_id">Category<span>*</span></label>
                                                        <select name="cate_id" id="cate_id" class="form-control">
                                                            <option value="0" disabled selected>Please Select Category</option>
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
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="sequence">Sequence</label>
                                                        <input type="text" class="form-control" id="sequence" name="sequence" value="0">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="status">Status<span>*</span></label>
                                                        <select name="status" id="status" class="form-control">
                                                            <option value="0" disabled selected>Please Select Status</option>
                                                            <option value="active">Active</option>
                                                            <option value="inactive">Inactive</option>
                                                        </select>
                                                        <div id="check_brand_status" class="err_div"></div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary add-category" name="create">Add Brand</button>
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