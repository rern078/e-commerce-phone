<?php
$pageTitleAdmin = "Categories List";
include("include/admin_title.php");
?>
<?php
include("db/connection.php");
error_reporting(0);
$message = "";
if (isset($_POST["create"])) {
    $category_code = htmlspecialchars($_POST["category_code"]);
    $category_name = htmlspecialchars($_POST["category_name"]);
    $sequence = htmlspecialchars($_POST["sequence"]);
    $status = $_POST["status"];

    if (
        isset($_FILES["category_image"]) && $_FILES["category_image"]["error"] == 0
    ) {
        $category_image = $_FILES["category_image"]["name"];
        $temp_name = $_FILES['category_image']['tmp_name'];
        move_uploaded_file($temp_name, "assets/images/uploads/$category_image");
    } else {
        $category_image = "";
    }

    $sql_query = "INSERT INTO categories (category_code, category_name, category_image,sequence, status) 
                VALUES ('$category_code', '$category_name',  '$category_image','$sequence','$status')";

    $data = mysqli_query($conn, $sql_query);

    if ($data) {
        // $message = "Category Added Successfully ! ";
        echo "<script>swal.fire('Success!', 'Category Added Successfully', 'success');</script>";

        // header('location: categories_list.php');
    } else {
        // $message = "Error :" . $sql . "" . mysqli_error($conn);
        echo "<script>swal.fire('Error!', 'Category Add Field .', 'error');</script>";
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
                                <h2>Categories | Add Categories</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- table section -->
                        <div class="col-md-12">
                            <div class="white_shd full margin_bottom_30">
                                <div class="full graph_head d-flex justify-content-between">
                                    <div class="heading1 margin_0">
                                        <h2>Add Categories</h2>
                                    </div>
                                    <div class="heading1 margin_0 right-menu">
                                        <div class="dropdown_section drop-new">
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-primary dropdown-toggle  drop-new-01" data-toggle="dropdown"><i class="fa fa-tasks"></i></button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="categories_list.php"><i class="fa-solid fa-list-ul sub-icon"></i>List Category</a>
                                                    <a class="dropdown-item" href="#"><i class="fa-solid fa-plus sub-icon"></i>Import Category</a>
                                                    <a class="dropdown-item" href="#"><i class="fa-solid fa-plus sub-icon"></i>Export Excel File</a>
                                                    <a class="dropdown-item line-style" href="categories_list.php"><i class="fa-solid fa-trash-can sub-icon"></i>Delete Category</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="table_section padding_infor_info">
                                    <div class="table-responsive-sm">
                                        <div class="container">
                                            <div class="form-container">
                                                <form action="categories_add.php" method="POST" enctype="multipart/form-data" name="form" id="form1" onsubmit="return Check_Field_Cate()">
                                                    <!-- <?php if (!empty($message)) : ?>
                                                        <?php if ($data) : ?>
                                                            <div class="alert alert-success"><?php echo $message; ?></div>
                                                        <?php else : ?>
                                                            <div class="alert alert-warning"><?php echo $message; ?></div>
                                                        <?php endif; ?>
                                                    <?php endif; ?> -->
                                                    <div class="form-group">
                                                        <label for="category_code">Category Code <span>*</span></label>
                                                        <input type="text" class="form-control" id="category_code" name="category_code" onblur="detect_cate_code(this.value);">
                                                        <div id="check_category_code" class="err_div"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="category_name">Category Name <span>*</span></label>
                                                        <input type="text" class="form-control" id="category_name" name="category_name" onblur="detect_cate_name(this.value);">
                                                        <div id="check_category_name" class="err_div"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="category_image">Category Image</label>
                                                        <input type="file" class="form-control" id="category_image" name="category_image">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="sequence">Sequence</label>
                                                        <input type="text" class="form-control" id="sequence" name="sequence" value="0">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="status">Status<span>*</span></label>
                                                        <select name="status" id="status" class="form-control">
                                                            <option value="active">Active</option>
                                                            <option value="inactive">Inactive</option>
                                                        </select>
                                                        <div id="check_category_status" class="err_div"></div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary add-category" name="create">Add Category</button>
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
    function Check_Field_Cate() {
        var category_code = document.getElementById("category_code").value.trim();
        if (category_code === '') {
            form.category_code.focus();
            Swal.fire({
                title: "Field Category Code",
                text: "Field Category Code cannot empty!",
                icon: "error"
            });
            return (false);
        }

        var category_name = document.getElementById("category_name").value.trim();
        if (category_name === '') {
            form.category_name.focus();
            Swal.fire({
                title: "Field Category Name",
                text: "Field Category Name cannot empty!",
                icon: "error"
            });
            return (false);
        }

        var status = document.getElementById("status").value;
        if (status === '') {
            // form.status.focus();
            Swal.fire({
                title: "Field Status",
                text: "Please Select Status",
                icon: "error"
            });
            return (false);
        }

        return (true)
    }

    function detect_cate_code(value) {

        var detect_cate_code = /^[a-zA-Z\d]/.test(value);
        if (!detect_cate_code) {
            clear();
            document.getElementById("check_category_code").innerHTML =
                "The Category Code must contain: numbers and letters";
        } else {
            document.getElementById("check_category_code").innerHTML = "";
        }
    }

    function detect_cate_name(value) {

        var detect_cate_name = /[a-zA-Z]/.test(value);
        if (!detect_cate_name) {
            clear();
            document.getElementById("check_category_name").innerHTML =
                "The Category Name must contain: numbers and letters";
        } else {
            document.getElementById("check_category_name").innerHTML = "";
        }
    }

    function clear() {
        document.getElementById("check_category_code").innerHTML = "";
        document.getElementById("check_category_name").innerHTML = "";
    }
</script>