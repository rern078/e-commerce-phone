<?php
$pageTitle = "Smart Phones";
include('include/header.php');
include("admin/db/connection.php");
?>

<main>
    <!-- SMART PHONES-->
    <section class="main-page">
        <div class="d-flex justify-content-between product-title">
            <h2 class="title-pro">View Cart</h2>
        </div>
        <div class="row">
            <div class="product_detail_view">
                <?php
                $countQuery = "SELECT COUNT(*) AS count FROM carts";
                $result = mysqli_query($conn, $countQuery);
                $row = mysqli_fetch_assoc($result);
                $count = $row['count'];
                if ($count > 0) { ?>
                    <?php
                    $get_pro = "SELECT * FROM products";
                    $stmt = mysqli_prepare($conn, $get_pro);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    $row_products = mysqli_fetch_assoc($result);
                    if ($row_products) {
                        $product_name = $row_products['product_name'];
                        $product_price = $row_products['product_price'];
                        $product_image = $row_products['product_image'];
                        $product_gallery = $row_products['product_gallery'];
                        $product_discount = $row_products['product_discount'];
                        $product_dis = $product_price - ($product_price * $product_discount / 100);
                        $product_dis_per = ($product_price * $product_discount / 100);
                    ?>
                        <div class="d-flex justify-content-between view-cart">
                            <div class="col-6 view-cart-left">
                                <?php
                                $get_cart = "SELECT * FROM carts";
                                $get_cart_show = mysqli_query($conn, $get_cart);
                                $rows = mysqli_fetch_all($get_cart_show, MYSQLI_ASSOC);
                                foreach ($rows as $row_carts) {
                                    $cart_id = $row_carts['cart_id'];
                                    $pro_name = $row_carts['pro_name'];
                                    $pro_price = $row_carts['pro_price'];
                                    $pro_discount =  $row_carts['pro_discount'];
                                    $pro_quantity =  $row_carts['pro_quantity'];
                                    $pro_image =  $row_carts['pro_image'];
                                ?>

                                    <div class="detail-view-item d-flex justify-content-between remove-item" data-cart-id="<?php echo $cart_id; ?>">
                                        <button type="button" class="close delete-cart-item" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <div class="img-view">
                                            <img class="img-view-001" src="admin/assets/images/uploads/product/<?php echo $pro_image ?>" alt="">
                                        </div>
                                        <div class="product-view-detail">
                                            <p class="view-name"><?php echo $pro_name ?></p>
                                            <p class="view-price">Price: $ <?php echo number_format($pro_price, 2, '.', ',') ?></p>
                                            <div class="view-discount">
                                                <p>Discount: $ <?php echo number_format($product_dis_per, 2, '.', ',') ?></p>
                                                <p><?php echo $pro_discount ?>% <sup>Off</sup></p>
                                            </div>
                                            <div class="button-container">
                                                <button class="qty cart-qty-plus" type="button" onclick="decreaseQty('cartQty')">-</button>
                                                <input type="text" name="cartQty" min="0" id="cartQty" class="qty form-control" value="<?php echo $pro_quantity ?>" />
                                                <button class="qty cart-qty-minus" onclick="increaseQty('cartQty')" type="button">+</button>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-6 view-cart-right">
                                <div class="detail-view-item d-flex">
                                    <div class="payment">

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }  ?>
                <?php } else { ?>
                    <h2 class="not-found">No Oder Found</h2>
                <?php } ?>
            </div>
        </div>
    </section>
</main>

<?php
include('include/footer.php');
?>

<script>
    $(document).ready(function() {
        $(".delete-cart-item").click(function() {
            var cartId = $(this).closest('.remove-item').data('cart-id');
            var deleteButton = $(this);
            $.ajax({
                type: 'POST',
                url: 'delete-cart-item.php',
                data: {
                    cart_id: cartId
                },
                success: function(response) {
                    if (response === 'success') {
                        deleteButton.closest('.remove-item').remove();
                    } else {
                        alert('Failed to delete item.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>