<?php
$pageTitleAdmin = "Categories List";
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
                                <h2>Categories | Update Categories</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- table section -->
                        <div class="col-md-12">
                            <div class="white_shd full margin_bottom_30">
                                <div class="full graph_head d-flex justify-content-between">
                                    <div class="heading1 margin_0">
                                        <h2>Update Categories</h2>
                                    </div>
                                    <div class="heading1 margin_0 right-menu">
                                        <div class="dropdown_section drop-new">
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-primary dropdown-toggle  drop-new-01" data-toggle="dropdown"><i class="fa fa-tasks"></i></button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="categories_list.php"><i class="fa-solid fa-list-ul sub-icon"></i>List Category</a>
                                                    <a class="dropdown-item" href="#"><i class="fa-solid fa-plus sub-icon"></i>Import Category</a>
                                                    <a class="dropdown-item" href="#"><i class="fa-solid fa-plus sub-icon"></i>Export Excel File</a>
                                                    <a class="dropdown-item line-style" href="categories_add.php"><i class="fa-solid fa-plus sub-icon"></i>Add Category</a>
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
                                                        $category_id = $_GET["cat_id"];
                                                        $category_code = $_POST["category_code"];
                                                        $category_name = $_POST["category_name"];
                                                        $status = $_POST["status"];

                                                        if (isset($_FILES["category_image"]) && $_FILES["category_image"]["error"] == 0) {
                                                            $category_image = $_FILES["category_image"]["name"];
                                                            $temp_name = $_FILES['category_image']['tmp_name'];
                                                            move_uploaded_file($temp_name, "assets/images/uploads/$category_image");
                                                        } else {
                                                            if (isset($_POST["current_image"])) {
                                                                $category_image = $_POST["current_image"];
                                                            } else {
                                                                echo "Current image not provided!";
                                                                exit;
                                                            }
                                                        }

                                                        $sql = "UPDATE categories SET category_code='$category_code', category_name='$category_name', category_image='$category_image', status='$status' WHERE cat_id=$category_id";

                                                        if ($conn->query($sql) === TRUE) {
                                                            // header('location: categories_list.php');
                                                            // $message = "Category updated successfully";
                                                            echo "<script>swal.fire('Success!', 'Category updated successfully', 'success');</script>";
                                                        } else {
                                                            echo "<script>swal.fire('Errors!', 'Category Update Field', 'error');</script>";
                                                            // $message = "Error updating category: " . $conn->error;
                                                        }
                                                    }
                                                }
                                                ?>
                                                <?php
                                                if (isset($_GET['cat_id'])) {
                                                    $category_id = $_GET['cat_id'];
                                                    $sql = "SELECT * FROM categories WHERE cat_id = ?";
                                                    $stmt = mysqli_prepare($conn, $sql);

                                                    mysqli_stmt_bind_param($stmt, "i", $category_id);
                                                    mysqli_stmt_execute($stmt);
                                                    $result = mysqli_stmt_get_result($stmt);

                                                    if (mysqli_num_rows($result) > 0) {
                                                        $category = mysqli_fetch_assoc($result);
                                                ?>
                                                        <form action="categories_update.php?cat_id=<?php echo $category_id; ?>" method="POST" onsubmit="return Check_Field_Cate()" enctype="multipart/form-data" name="form" id="form1">
                                                            <?php if (!empty($message)) : ?>
                                                                <?php if ($conn->query($sql) === FALSE) : ?>
                                                                    <div class="alert alert-success"><?php echo $message; ?></div>
                                                                <?php else : ?>
                                                                    <div class="alert alert-warning"><?php echo $message; ?></div>
                                                                <?php endif; ?>
                                                            <?php endif; ?>

                                                            <div class="form-group">
                                                                <label for="category_code">Category Code <span>*</span></label>
                                                                <input type="text" class="form-control" id="category_code" name="category_code" value="<?php echo $category['category_code']; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="category_name">Category Name <span>*</span></label>
                                                                <input type="text" class="form-control" id="category_name" name="category_name" value="<?php echo $category['category_name']; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="category_image">Category Image</label>
                                                                <input type="file" class="form-control" id="category_image" name="category_image">
                                                                <img src="assets/images/uploads/<?php echo $category['category_image'] ?>" width='100px' alt="Current Image">
                                                                <input type="hidden" name="current_image" value="<?php echo $category['category_image'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="sequence">Sequence</label>
                                                                <input type="text" class="form-control" id="sequence" name="sequence" value="<?php echo $category['sequence']; ?>">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="status">Status<span>*</span></label>
                                                                <select name="status" id="status" class="form-control">
                                                                    <option value="active" <?php if ($category['status'] == 'active') echo 'selected'; ?>>Active</option>
                                                                    <option value="inactive" <?php if ($category['status'] == 'inactive') echo 'selected'; ?>>Inactive</option>
                                                                </select>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary add-category" name="update">Update Category</button>
                                                        </form>
                                                <?php
                                                    } else {
                                                        echo "No category found with ID: $category_id";
                                                    }

                                                    mysqli_stmt_close($stmt);
                                                } else {
                                                    echo "No category ID provided!";
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
    function Check_Field_Cate() {
        var category_code = document.getElementById("category_code").value.trim();
        if (category_code === '') {
            alert("Field Category Code cannot empty!'");
            form.category_code.focus();
            return (false);
        }

        var category_name = document.getElementById("category_name").value.trim();
        if (category_name === '') {
            alert("Field Category Name cannot empty!'");
            form.category_name.focus();
            return (false);
        }

        var status = document.getElementById("status").value;
        if (status === '') {
            alert("Please Select Status'");
            // form.status.focus();
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