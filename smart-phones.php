<?php
$pageTitle = "Smart Phones";
include('include/header.php');
include("admin/db/connection.php");
?>

<main>
    <!-- SMART PHONES-->
    <section class="main-page">
        <div class="product-title-smart-phone d-flex justify-content-between">
            <h2 class="title-pro">SMART PHONES</h2>
            <div class="sort-by">
                <label for="">Sort By</label>
                <select name="sort" class="p-2 select-sort-by" id="sort">
                    <option value="">Default</option>
                    <option value="high_to_low_price">High - Low Price</option>
                    <option value="low_to_high_price">Low - High Price</option>
                    <option value="most_popular">Most Popular</option>
                    <option value="a_to_z_name">A - Z Order</option>
                    <option value="z_to_a_name">Z - A Order</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="container d-flex justify-content-between">
                <div class="col-2 smart-phone-list">
                    <div class="product-smart-phone">
                        <h4 class="categoires-title">Categories</h4>
                        <ul class="smart-phone-item">
                            <li class="itemslist active" onclick="showDetails('All', this)" data-type="All"><i class="fas fa-angle-right"></i>All</li>
                            <li class="itemslist" onclick="showDetails('Samsungphone', this)" data-type="Samsungphone"><i class="fas fa-angle-right"></i>Samsung</li>
                            <li class="itemslist" onclick="showDetails('Applephone', this)" data-type="Applephone"><i class="fas fa-angle-right"></i>Apple</li>
                            <li class="itemslist" onclick="showDetails('Oppophone', this)" data-type="Oppophone"><i class="fas fa-angle-right"></i>Oppo</li>
                            <li class="itemslist" onclick="showDetails('Vivophone', this)" data-type="Vivophone"><i class="fas fa-angle-right"></i>Vivo</li>
                            <li class="itemslist" onclick="showDetails('Lenovophone', this)" data-type="Lenovophone"><i class="fas fa-angle-right"></i>Lenovo</li>
                            <li class="itemslist" onclick="showDetails('Realmiphone', this)" data-type="Realmiphone"><i class="fas fa-angle-right"></i>Realmi</li>
                        </ul>
                        <h4 class="categoires-title">Brands</h4>
                        <ul class="smart-phone-item-brand">
                            <li class="item-brand"><img src="assets/images/brand/tablet/samsung.png" alt=""></li>
                            <li class="item-brand"><img src="assets/images/brand/tablet/apple.png" alt=""></li>
                            <li class="item-brand"><img src="assets/images/brand/tablet/dell.png" alt=""></li>
                            <li class="item-brand"><img src="assets/images/brand/tablet/acer.png" alt=""></li>
                            <li class="item-brand"><img src="assets/images/brand/tablet/amazon.png" alt=""></li>
                            <li class="item-brand"><img src="assets/images/brand/tablet/noble.png" alt=""></li>
                            <li class="item-brand"><img src="assets/images/brand/tablet/archos.png" alt=""></li>
                            <li class="item-brand"><img src="assets/images/brand/tablet/asus.png" alt=""></li>
                            <li class="item-brand"><img src="assets/images/brand/tablet/Aoc.png" alt=""></li>
                            <li class="item-brand"><img src="assets/images/brand/tablet/d-link.png" alt=""></li>
                            <li class="item-brand"><img src="assets/images/brand/tablet/datawind.png" alt=""></li>
                            <li class="item-brand"><img src="assets/images/brand/tablet/flipkart.png" alt=""></li>
                            <li class="item-brand"><img src="assets/images/brand/tablet/smart.png" alt=""></li>
                            <li class="item-brand"><img src="assets/images/brand/tablet/smartlink.png" alt=""></li>
                            <li class="item-brand"><img src="assets/images/brand/tablet/smartron.png" alt=""></li>
                        </ul>
                    </div>
                </div>
                <div class="col-10">
                    <div class="product-list-accessories showbrand" id="All">
                        <?php
                        $get_pro = "SELECT * FROM products WHERE cat_id=1 LIMIT 8";
                        $get_pro_show = mysqli_query($conn, $get_pro);
                        $rows = mysqli_fetch_all($get_pro_show, MYSQLI_ASSOC);
                        foreach ($rows as $row_products) {
                            $pro_id = $row_products['pro_id'];
                            $product_name = $row_products['product_name'];
                            $product_price = $row_products['product_price'];
                            $product_image = $row_products['product_image'];
                            $product_discount = $row_products['product_discount'];
                            $product_dis = $product_price - $product_discount;
                        ?>
                            <div class="product-accessories">
                                <div class="img">
                                    <img src="admin/assets/images/uploads/product/<?php echo $product_image ?>" alt="">
                                </div>
                                <div class="des">
                                    <div class="info">
                                        <h4><?php echo $product_name ?> </h4>
                                    </div>
                                    <div class="price">
                                        <p>Price </p>
                                        <span class="ori-none <?php if ($product_discount > 0) : ?>ori<?php endif; ?>">$ <?php echo number_format($product_price, 2, '.', ',') ?></span>
                                        <?php if ($product_discount > 0) : ?>
                                            <span class="dis">$ <?php echo number_format($product_dis, 2, '.', ',') ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="info">
                                        <button class="btn-add-cart btn-add">Add to Cart</button>
                                    </div>
                                </div>
                                <div class="overlay-view-smart">
                                    <a href="products_detail.php?pro_id=<?php echo $pro_id ?>">View Detail</a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="product-list-accessories showbrand" id="Samsungphone">
                        <?php
                        $get_pro = "SELECT * FROM products WHERE brand_id=4";
                        $get_pro_show = mysqli_query($conn, $get_pro);
                        $rows = mysqli_fetch_all($get_pro_show, MYSQLI_ASSOC);

                        foreach ($rows as $row_products) {
                            $pro_id = $row_products['pro_id'];
                            $product_name = $row_products['product_name'];
                            $product_price = $row_products['product_price'];
                            $product_image = $row_products['product_image'];
                            $product_discount = $row_products['product_discount'];
                            $product_dis = $product_price - $product_discount;
                        ?>
                            <div class="product-accessories">
                                <div class="img">
                                    <img src="admin/assets/images/uploads/product/<?php echo $product_image ?>" alt="">
                                </div>
                                <div class="des">
                                    <div class="info">
                                        <h4><?php echo $product_name ?> </h4>
                                    </div>
                                    <div class="price">
                                        <p>Price </p>
                                        <span class="ori-none <?php if ($product_discount > 0) : ?>ori<?php endif; ?>">$ <?php echo number_format($product_price, 2, '.', ',') ?></span>
                                        <?php if ($product_discount > 0) : ?>
                                            <span class="dis">$ <?php echo number_format($product_dis, 2, '.', ',') ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="info">
                                        <button class="btn-add-cart btn-add">Add to Cart</button>
                                    </div>
                                </div>
                                <div class="overlay-view-smart">
                                    <a href="products_detail.php?pro_id=<?php echo $pro_id ?>">View Detail</a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="product-list-accessories showbrand" id="Applephone">
                        <?php
                        $get_pro = "SELECT * FROM products WHERE brand_id=1";
                        $get_pro_show = mysqli_query($conn, $get_pro);
                        $rows = mysqli_fetch_all($get_pro_show, MYSQLI_ASSOC);
                        foreach ($rows as $row_products) {
                            $pro_id = $row_products['pro_id'];
                            $product_name = $row_products['product_name'];
                            $product_price = $row_products['product_price'];
                            $product_image = $row_products['product_image'];
                            $product_discount = $row_products['product_discount'];
                            $product_dis = $product_price - $product_discount;
                        ?>
                            <div class="product-accessories">
                                <div class="img">
                                    <img src="admin/assets/images/uploads/product/<?php echo $product_image ?>" alt="">
                                </div>
                                <div class="des">
                                    <div class="info">
                                        <h4><?php echo $product_name ?> </h4>
                                    </div>
                                    <div class="price">
                                        <p>Price </p>
                                        <span class="ori-none <?php if ($product_discount > 0) : ?>ori<?php endif; ?>">$ <?php echo number_format($product_price, 2, '.', ',') ?></span>
                                        <?php if ($product_discount > 0) : ?>
                                            <span class="dis">$ <?php echo number_format($product_dis, 2, '.', ',') ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="info">
                                        <button class="btn-add-cart btn-add">Add to Cart</button>
                                    </div>
                                </div>
                                <div class="overlay-view-smart">
                                    <a href="products_detail.php?pro_id=<?php echo $pro_id ?>">View Detail</a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="product-list-accessories showbrand" id="Oppophone">
                        <?php
                        $get_pro = "SELECT * FROM products WHERE brand_id=8";
                        $get_pro_show = mysqli_query($conn, $get_pro);
                        $rows = mysqli_fetch_all($get_pro_show, MYSQLI_ASSOC);
                        foreach ($rows as $row_products) {
                            $pro_id = $row_products['pro_id'];
                            $product_name = $row_products['product_name'];
                            $product_price = $row_products['product_price'];
                            $product_image = $row_products['product_image'];
                            $product_discount = $row_products['product_discount'];
                            $product_dis = $product_price - $product_discount;
                        ?>
                            <div class="product-accessories">
                                <div class="img">
                                    <img src="admin/assets/images/uploads/product/<?php echo $product_image ?>" alt="">
                                </div>
                                <div class="des">
                                    <div class="info">
                                        <h4><?php echo $product_name ?> </h4>
                                    </div>
                                    <div class="price">
                                        <p>Price </p>
                                        <span class="ori-none <?php if ($product_discount > 0) : ?>ori<?php endif; ?>">$ <?php echo number_format($product_price, 2, '.', ',') ?></span>
                                        <?php if ($product_discount > 0) : ?>
                                            <span class="dis">$ <?php echo number_format($product_dis, 2, '.', ',') ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="info">
                                        <button class="btn-add-cart btn-add">Add to Cart</button>
                                    </div>
                                </div>
                                <div class="overlay-view-smart">
                                    <a href="products_detail.php?pro_id=<?php echo $pro_id ?>">View Detail</a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="product-list-accessories showbrand" id="Vivophone">
                        <?php
                        $get_pro = "SELECT * FROM products WHERE brand_id=5";
                        $get_pro_show = mysqli_query($conn, $get_pro);
                        $rows = mysqli_fetch_all($get_pro_show, MYSQLI_ASSOC);
                        foreach ($rows as $row_products) {
                            $pro_id = $row_products['pro_id'];
                            $product_name = $row_products['product_name'];
                            $product_price = $row_products['product_price'];
                            $product_image = $row_products['product_image'];
                            $product_discount = $row_products['product_discount'];
                            $product_dis = $product_price - $product_discount;
                        ?>
                            <div class="product-accessories">
                                <div class="img">
                                    <img src="admin/assets/images/uploads/product/<?php echo $product_image ?>" alt="">
                                </div>
                                <div class="des">
                                    <div class="info">
                                        <h4><?php echo $product_name ?> </h4>
                                    </div>
                                    <div class="price">
                                        <p>Price </p>
                                        <span class="ori-none <?php if ($product_discount > 0) : ?>ori<?php endif; ?>">$ <?php echo number_format($product_price, 2, '.', ',') ?></span>
                                        <?php if ($product_discount > 0) : ?>
                                            <span class="dis">$ <?php echo number_format($product_dis, 2, '.', ',') ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="info">
                                        <button class="btn-add-cart btn-add">Add to Cart</button>
                                    </div>
                                </div>
                                <div class="overlay-view-smart">
                                    <a href="products_detail.php?pro_id=<?php echo $pro_id ?>">View Detail</a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="product-list-accessories showbrand" id="Lenovophone">
                        <?php
                        $get_pro = "SELECT * FROM products WHERE brand_id=7";
                        $get_pro_show = mysqli_query($conn, $get_pro);
                        $rows = mysqli_fetch_all($get_pro_show, MYSQLI_ASSOC);
                        foreach ($rows as $row_products) {
                            $pro_id = $row_products['pro_id'];
                            $product_name = $row_products['product_name'];
                            $product_price = $row_products['product_price'];
                            $product_image = $row_products['product_image'];
                            $product_discount = $row_products['product_discount'];
                            $product_dis = $product_price - $product_discount;
                        ?>
                            <div class="product-accessories">
                                <div class="img">
                                    <img src="admin/assets/images/uploads/product/<?php echo $product_image ?>" alt="">
                                </div>
                                <div class="des">
                                    <div class="info">
                                        <h4><?php echo $product_name ?> </h4>
                                    </div>
                                    <div class="price">
                                        <p>Price </p>
                                        <span class="ori-none <?php if ($product_discount > 0) : ?>ori<?php endif; ?>">$ <?php echo number_format($product_price, 2, '.', ',') ?></span>
                                        <?php if ($product_discount > 0) : ?>
                                            <span class="dis">$ <?php echo number_format($product_dis, 2, '.', ',') ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="info">
                                        <button class="btn-add-cart btn-add">Add to Cart</button>
                                    </div>
                                </div>
                                <div class="overlay-view-smart">
                                    <a href="products_detail.php?pro_id=<?php echo $pro_id ?>">View Detail</a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="product-list-accessories showbrand" id="Realmiphone">
                        <?php
                        $get_pro = "SELECT * FROM products WHERE brand_id=6";
                        $get_pro_show = mysqli_query($conn, $get_pro);
                        $rows = mysqli_fetch_all($get_pro_show, MYSQLI_ASSOC);
                        foreach ($rows as $row_products) {
                            $pro_id = $row_products['pro_id'];
                            $product_name = $row_products['product_name'];
                            $product_price = $row_products['product_price'];
                            $product_image = $row_products['product_image'];
                            $product_discount = $row_products['product_discount'];
                            $product_dis = $product_price - $product_discount;
                        ?>
                            <div class="product-accessories">
                                <div class="img">
                                    <img src="admin/assets/images/uploads/product/<?php echo $product_image ?>" alt="">
                                </div>
                                <div class="des">
                                    <div class="info">
                                        <h4><?php echo $product_name ?> </h4>
                                    </div>
                                    <div class="price">
                                        <p>Price </p>
                                        <span class="ori-none <?php if ($product_discount > 0) : ?>ori<?php endif; ?>">$ <?php echo number_format($product_price, 2, '.', ',') ?></span>
                                        <?php if ($product_discount > 0) : ?>
                                            <span class="dis">$ <?php echo number_format($product_dis, 2, '.', ',') ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="info">
                                        <button class="btn-add-cart btn-add">Add to Cart</button>
                                    </div>
                                </div>
                                <div class="overlay-view-smart">
                                    <a href="products_detail.php?pro_id=<?php echo $pro_id ?>">View Detail</a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
include('include/footer.php');
?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        showDetails('All', document.querySelector('.itemslist.active'));
    });

    function showDetails(brand, listItem) {
        // Remove 'active' class from all list items
        var allListItems = document.querySelectorAll('.itemslist');
        allListItems.forEach(function(item) {
            item.classList.remove('active');
        });

        // Add 'active' class to the clicked list item
        listItem.classList.add('active');

        // Get all brand details elements
        var brandDetails = document.querySelectorAll('.product-list-accessories.showbrand');

        // Hide all brand details elements
        brandDetails.forEach(function(detail) {
            detail.style.display = 'none';
        });

        // Show details for the selected brand
        var selectedBrandDetails = document.getElementById(brand);
        if (selectedBrandDetails) {
            selectedBrandDetails.style.display = 'block';
        }
    }
</script>