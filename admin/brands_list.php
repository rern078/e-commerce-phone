<?php
$pageTitleAdmin = "Brands List";
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
                                <h2>Brands | Brands List</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- table section -->
                        <div class="col-md-12">
                            <div class="white_shd full margin_bottom_30">
                                <div class="full graph_head d-flex justify-content-between">
                                    <div class="heading1 margin_0">
                                        <h2>Brands List</h2>
                                    </div>
                                    <div class="heading1 margin_0 right-menu">
                                        <div class="dropdown_section drop-new">
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-primary dropdown-toggle  drop-new-01" data-toggle="dropdown"><i class="fa fa-tasks"></i></button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="brands_add.php"><i class="fa-solid fa-list-ul sub-icon"></i>Add Brands</a>
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
                                        <?php if (!empty($message_de)) : ?>
                                            <?php if ($data) : ?>
                                                <div class="alert alert-success"><?php echo $message_de; ?></div>
                                            <?php else : ?>
                                                <div class="alert alert-warning"><?php echo $message_de; ?></div>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        <?php
                                        include("db/connection.php");
                                        $sql_query = "SELECT * FROM brands ORDER BY brand_code DESC ";
                                        $data = mysqli_query($conn, $sql_query);
                                        $total = mysqli_num_rows($data);
                                        if ($total = mysqli_num_rows($data)) {
                                        ?>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Sequence </th>
                                                        <th>Image</th>
                                                        <th>Code</th>
                                                        <th>Name</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    while ($brand = mysqli_fetch_array($data)) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $no++ ?></td>
                                                            <td><?php echo $brand["sequence"] ?></td>
                                                            <td>
                                                                <a href="javascript:void(0);">
                                                                    <img src="assets/images/uploads/brand/<?php echo $brand["brand_image"] ?> " width='30px' style="border:1px solid #898989;padding:2px" alt="">
                                                                </a>
                                                            </td>
                                                            <td><?php echo $brand["brand_code"] ?></td>
                                                            <td><?php echo $brand["brand_name"] ?></td>
                                                            <td style="color: <?php echo ($brand["status"] == 'active') ? 'red' : 'orange'; ?>;">
                                                                <?php echo $brand["status"] ?>
                                                            </td>
                                                            <td>
                                                                <div class="icon">
                                                                    <a href="" class="print-icon"><i class="fa-solid fa-print"></i><span class="tooltiptext">Print Barcode</span></a>
                                                                    <a href="brands_update.php?brand_id=<?php echo $brand['brand_id'] ?>" class="edit-icon">
                                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                                        <span class="tooltiptext">Edit Brands</span></a>
                                                                    <a href="#" onclick="confirmDelete(<?php echo $brand['brand_id']; ?>)" class="delete-icon"><i class="fa-solid fa-trash-can"></i><span class="tooltiptext">Delete Brands</span></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        <?php } else {
                                            echo "Brands Not Found";
                                        } ?>
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
    function confirmDelete(brand_id) {
        var result = confirm("Are you sure you want to delete this brands?");
        if (result) {
            window.location.href = "brands_delete.php?brand_id=" + brand_id;
        }
    }
</script>