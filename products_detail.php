<?php
$pageTitle = "Smart Phones";
include('include/header.php');
include("admin/db/connection.php");
?>

<main>
    <!-- SMART PHONES-->
    <section class="main-page">
        <div class="row page-detail">
            <div class="product_detail d-flex">
                <?php
                if (isset($_GET['pro_id'])) {
                    $pro_id = $_GET['pro_id'];
                    $get_pro = "SELECT * FROM products WHERE pro_id = ?";
                    $stmt = mysqli_prepare($conn, $get_pro);
                    mysqli_stmt_bind_param($stmt, "i", $pro_id);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    $row_products = mysqli_fetch_assoc($result);
                    if ($row_products) {
                        $brand_id = $row_products['brand_id'];
                        $cat_id = $row_products['cat_id'];
                        $product_des = $row_products['product_des'];
                        $product_quantity = $row_products['product_quantity'];
                        $product_name = $row_products['product_name'];
                        $product_price = $row_products['product_price'];
                        $product_image = $row_products['product_image'];
                        $product_gallery = $row_products['product_gallery'];
                        $product_discount = $row_products['product_discount'];
                        $product_dis = $product_price - ($product_price * $product_discount / 100);
                        $product_dis_per = ($product_price * $product_discount / 100);
                ?>
                        <div class="col-5">
                            <div class="image-detail">
                                <div class="pro_img">
                                    <img class="image-first" src="admin/assets/images/uploads/product/<?php echo $product_image ?>" alt="">
                                </div>
                                <div class="pro_gal d-flex justify-content-center">
                                    <img class="image-two" src="admin/assets/images/uploads/product/<?php echo $product_gallery ?>" alt="">
                                    <img class="image-two" src="admin/assets/images/uploads/product/<?php echo $product_gallery ?>" alt="">
                                    <img class="image-two" src="admin/assets/images/uploads/product/<?php echo $product_gallery ?>" alt="">
                                    <img class="image-two" src="admin/assets/images/uploads/product/<?php echo $product_gallery ?>" alt="">
                                    <img class="image-two" src="admin/assets/images/uploads/product/<?php echo $product_gallery ?>" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-7 detail">
                            <h2 class="de-name"><?php echo $product_name ?>
                                <?php if ($product_discount > 0) : ?>
                                    <span>(<?php echo $product_discount ?>% <sup>Off</sup>)</span>
                                <?php endif; ?>
                            </h2>
                            <div class="price-detail d-flex">
                                <p class="de-price-none <?php if ($product_discount > 0) : ?>de-price<?php endif; ?>">Price: <span>$ <?php echo number_format($product_price, 2, '.', ',')  ?></span></p>
                                <?php if ($product_discount > 0) : ?>
                                    <p class="de-dis">$<?php echo number_format($product_dis, 2, '.', ',')  ?></p>
                                    <p class="de-dis-per">$<?php echo number_format($product_dis_per, 2, '.', ',')  ?>/<sup>Off</sup></p>
                                <?php endif; ?>
                            </div>
                            <p class="warr">One Year Warranty</p>
                            <div class="add-qty">
                                <div class="cart-box">
                                    <div class="qty qty-minus" onclick="decreaseQty('cartQty', 'cartQuantity')">-</div>
                                    <input id="cartQty" class="qty" type="number" value="1" min="1" size="1">
                                    <div class="qty qty-plus" onclick="increaseQty('cartQty', 'cartQuantity')">+</div>
                                    <button class="submit-cart" type="button" onclick="addToCart()">Add to Cart</button>
                                    <button class="far-cart" type="button" onclick="addToFavorite()">Add to Favorite</button>
                                </div>
                            </div>
                            <div class="stock-qty">
                                <?php
                                if ($product_quantity > 0) {
                                ?>
                                    <button class="btn btn-success show-stock">In Stock</button>
                                <?php } else {
                                ?>
                                    <button class="btn btn-warning show-stock">Out Of Stock</button>
                                <?php } ?>
                            </div>
                        </div>
                <?php
                    } else {
                        echo "No product found.";
                    }
                }
                ?>
            </div>
        </div>
    </section>
</main>

<?php
include('include/footer.php');
?>

<!-- add to cart  -->

<script>
    var totalQuantity = 0;

    function addToCart() {
        var productId = <?php echo $pro_id; ?>;
        var brandId = <?php echo $brand_id; ?>;
        var catId = <?php echo $cat_id; ?>;
        var productName = <?php echo $product_name ?>;
        var productPrice = <?php echo $product_price; ?>;
        var productDiscount = <?php echo ($product_discount > 0) ? json_encode($product_dis) : json_encode($product_price - $product_dis); ?>;

        var productQuantity = parseInt(document.getElementById('cartQty').value);
        var productImage = "<?php echo addslashes($product_image); ?>";

        totalQuantity += productQuantity;
        document.getElementById('cartQuantity').textContent = totalQuantity;

        $.ajax({
            url: 'add-to-cart.php',
            type: 'POST',
            data: {
                productId: productId,
                brandId: brandId,
                catId: catId,
                productName: productName,
                productPrice: productPrice,
                productDiscount: productDiscount,
                productQuantity: productQuantity,
                productImage: productImage,
            },
            success: function(response) {
                alert(response);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
</script>