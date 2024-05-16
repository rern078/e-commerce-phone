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
                                <h2>Products | Products List</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- table section -->
                        <div class="col-md-12">
                            <div class="white_shd full margin_bottom_30">
                                <div class="full graph_head d-flex justify-content-between">
                                    <div class="heading1 margin_0">
                                        <h2>Products List</h2>
                                    </div>
                                    <div class="heading1 margin_0 right-menu">
                                        <div class="dropdown_section drop-new">
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-primary dropdown-toggle  drop-new-01" data-toggle="dropdown"><i class="fa fa-tasks"></i></button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="products_add.php"><i class="fa-solid fa-plus sub-icon"></i>Add Product</a>
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
                                        <?php if (!empty($message_de)) : ?>
                                            <?php if ($data) : ?>
                                                <div class="alert alert-success"><?php echo $message_de; ?></div>
                                            <?php else : ?>
                                                <div class="alert alert-warning"><?php echo $message_de; ?></div>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        <?php
                                        include("db/connection.php");
                                        $sql_query = "SELECT * FROM products ORDER BY product_code DESC ";
                                        $data = mysqli_query($conn, $sql_query);
                                        $total = mysqli_num_rows($data);
                                        if ($total = mysqli_num_rows($data)) {
                                        ?>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Image</th>
                                                        <th>Code</th>
                                                        <th>Name</th>
                                                        <th>Price</th>
                                                        <th>Quantity </th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    while ($product = mysqli_fetch_array($data)) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $no++ ?></td>
                                                            <td>
                                                                <a href="javascript:void(0);">
                                                                    <img src="assets/images/uploads/<?php echo $product["product_image"] ?> " width='30px' style="border:1px solid #898989;padding:2px" alt="">
                                                                </a>
                                                            </td>
                                                            <td><?php echo $product["product_code"] ?></td>
                                                            <td><?php echo $product["product_name"] ?></td>
                                                            <td>$ <?php echo $product["product_price"] ?></td>
                                                            <td><?php echo $product["product_quantity"] ?></td>
                                                            <td style="color: <?php echo ($product["status"] == 'active') ? 'red' : 'orange'; ?>;">
                                                                <?php echo $product["status"] ?>
                                                            </td>
                                                            <td>
                                                                <div class="icon">
                                                                    <a href="" class="print-icon"><i class="fa-solid fa-print"></i><span class="tooltiptext">Print Barcode</span></a>
                                                                    <a href="products_update.php?pro_id=<?php echo $product['pro_id'] ?>&product_code=<?php echo $product['product_code'] ?>&product_name=<?php echo $product['product_name'] ?>" class="edit-icon">
                                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                                        <span class="tooltiptext">Edit Product</span></a>
                                                                    <a href="#" onclick="confirmDelete(<?php echo $product['pro_id']; ?>)" class="delete-icon"><i class="fa-solid fa-trash-can"></i><span class="tooltiptext">Delete Product</span></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        <?php } else {
                                            echo "Products Not Found";
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
    function confirmDelete(pro_id) {
        var result = confirm("Are you sure you want to delete this product?");
        if (result) {
            window.location.href = "products_delete.php?pro_id=" + pro_id;
        }
    }
</script>