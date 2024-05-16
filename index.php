<?php
$pageTitle = "Home Page";
include('include/header.php');
include("admin/db/connection.php");
?>

<main>
    <section class="section slider-section-head">
        <div class="slider-column">
            <div class="swiper swiper-slider">
                <div class="swiper-wrapper">
                    <img class="swiper-slide" src="assets/images/slider/01.jpg" alt="Swiper">
                    <img class="swiper-slide" src="assets/images/slider/02.jpg" alt="Swiper">
                    <img class="swiper-slide" src="assets/images/slider/03.jpg" alt="Swiper">
                    <img class="swiper-slide" src="assets/images/slider/04.jpg" alt="Swiper">
                    <img class="swiper-slide" src="assets/images/slider/05.jpg" alt="Swiper">
                    <img class="swiper-slide" src="assets/images/slider/06.jpg" alt="Swiper">
                    <img class="swiper-slide" src="assets/images/slider/07.jpg" alt="Swiper">
                    <img class="swiper-slide" src="assets/images/slider/08.jpg" alt="Swiper">
                    <img class="swiper-slide" src="assets/images/slider/09.jpg" alt="Swiper">
                </div>
                <!-- <span class="swiper-pagination"></span> -->
                <span class="swiper-button-prev"></span>
                <span class="swiper-button-next"></span>
            </div>
        </div>
    </section>
    <!-- SPECIAL OFFER -->
    <section class="main-page">
        <div class="d-flex justify-content-between product-title">
            <h2 class="title-pro">SPECIAL OFFER</h2>
            <p><a class="view-all" href="">View All »</a></p>
        </div>
        <div class="product-list">
            <?php
            $get_pro = "SELECT * FROM products";
            $get_pro_show = mysqli_query($conn, $get_pro);
            $rows = mysqli_fetch_all($get_pro_show, MYSQLI_ASSOC);
            foreach ($rows as $row_products) {
                $pro_id = $row_products['pro_id'];
                $product_name = $row_products['product_name'];
                $product_price = $row_products['product_price'];
                $product_image = $row_products['product_image'];
                $product_discount = $row_products['product_discount'];
                $product_dis = $product_price - ($product_price * $product_discount / 100);
            ?>
                <div class="product">
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
                        <div class="overlay-view">
                            <a href="products_detail.php?pro_id=<?php echo $pro_id ?>">View Detail</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
    <!-- NEW ARRIVAL -->
    <section class="main-page">
        <div class="d-flex justify-content-between product-title">
            <h2 class="title-pro">NEW ARRIVAL</h2>
            <ul class="d-flex justify-content-end product-category">
                <li class="view-all all">All</li> |
                <li class="view-all mobilephone">Mobile Phone</li> |
                <li class="view-all tablet">Tablet</li> |
                <li class="view-all smartwatch">Smart Watch</li> |
                <li class="view-all laptop">Laptop</li> |
                <li class="view-all monitor">Monitor</li> |
                <li class="view-all accessories">Accessories</li>
            </ul>
        </div>

        <div class="product-list showproduct all">
            <?php
            $get_pro = "SELECT * FROM products ORDER BY cat_id ASC";
            $get_pro_show = mysqli_query($conn, $get_pro);
            $rows = mysqli_fetch_all($get_pro_show, MYSQLI_ASSOC);
            foreach ($rows as $row_products) {
                $pro_id = $row_products['pro_id'];
                $product_name = $row_products['product_name'];
                $product_price = $row_products['product_price'];
                $product_image = $row_products['product_image'];
                $product_discount = $row_products['product_discount'];
                $product_dis = $product_price - ($product_price * $product_discount / 100);
            ?>
                <div class="product">
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
                        <div class="overlay-view">
                            <a href="products_detail.php?pro_id=<?php echo $pro_id ?>">View Detail</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="product-list showproduct mobilephone">
            <?php
            $get_pro = "SELECT * FROM products WHERE cat_id=1";
            $get_pro_show = mysqli_query($conn, $get_pro);
            $rows = mysqli_fetch_all($get_pro_show, MYSQLI_ASSOC);
            foreach ($rows as $row_products) {
                $pro_id = $row_products['pro_id'];
                $product_name = $row_products['product_name'];
                $product_price = $row_products['product_price'];
                $product_image = $row_products['product_image'];
                $product_discount = $row_products['product_discount'];
                $product_dis = $product_price - ($product_price * $product_discount / 100);
            ?>
                <div class="product">
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
                        <div class="overlay-view">
                            <a href="products_detail.php?pro_id=<?php echo $pro_id ?>">View Detail</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="product-list showproduct tablet">
            <?php
            $get_pro = "SELECT * FROM products WHERE cat_id=5";
            $get_pro_show = mysqli_query($conn, $get_pro);
            $rows = mysqli_fetch_all($get_pro_show, MYSQLI_ASSOC);
            foreach ($rows as $row_products) {
                $pro_id = $row_products['pro_id'];
                $product_name = $row_products['product_name'];
                $product_price = $row_products['product_price'];
                $product_image = $row_products['product_image'];
                $product_discount = $row_products['product_discount'];
                $product_dis = $product_price - ($product_price * $product_discount / 100);
            ?>
                <div class="product">
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
                        <div class="overlay-view">
                            <a href="products_detail.php?pro_id=<?php echo $pro_id ?>">View Detail</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="product-list showproduct smartwatch">
            <?php
            $get_pro = "SELECT * FROM products WHERE cat_id=2";
            // $get_pro = "SELECT * FROM products";
            $get_pro_show = mysqli_query($conn, $get_pro);
            $rows = mysqli_fetch_all($get_pro_show, MYSQLI_ASSOC);
            foreach ($rows as $row_products) {
                $pro_id = $row_products['pro_id'];
                $product_name = $row_products['product_name'];
                $product_price = $row_products['product_price'];
                $product_image = $row_products['product_image'];
                $product_discount = $row_products['product_discount'];
                $product_dis = $product_price - ($product_price * $product_discount / 100);
            ?>
                <div class="product">
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
                        <div class="overlay-view">
                            <a href="products_detail.php?pro_id=<?php echo $pro_id ?>">View Detail</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="product-list showproduct laptop">
            <?php
            $get_pro = "SELECT * FROM products WHERE cat_id=3";
            // $get_pro = "SELECT * FROM products";
            $get_pro_show = mysqli_query($conn, $get_pro);
            $rows = mysqli_fetch_all($get_pro_show, MYSQLI_ASSOC);
            foreach ($rows as $row_products) {
                $pro_id = $row_products['pro_id'];
                $product_name = $row_products['product_name'];
                $product_price = $row_products['product_price'];
                $product_image = $row_products['product_image'];
                $product_discount = $row_products['product_discount'];
                $product_dis = $product_price - ($product_price * $product_discount / 100);
            ?>
                <div class="product">
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
                        <div class="overlay-view">
                            <a href="products_detail.php?pro_id=<?php echo $pro_id ?>">View Detail</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="product-list showproduct monitor">
            <?php
            $get_pro = "SELECT * FROM products WHERE cat_id=4";
            // $get_pro = "SELECT * FROM products";
            $get_pro_show = mysqli_query($conn, $get_pro);
            $rows = mysqli_fetch_all($get_pro_show, MYSQLI_ASSOC);
            foreach ($rows as $row_products) {
                $pro_id = $row_products['pro_id'];
                $product_name = $row_products['product_name'];
                $product_price = $row_products['product_price'];
                $product_image = $row_products['product_image'];
                $product_discount = $row_products['product_discount'];
                $product_dis = $product_price - ($product_price * $product_discount / 100);
            ?>
                <div class="product">
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
                        <div class="overlay-view">
                            <a href="products_detail.php?pro_id=<?php echo $pro_id ?>">View Detail</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="product-list showproduct accessories">
            <?php
            $get_pro = "SELECT * FROM products WHERE cat_id=6";
            // $get_pro = "SELECT * FROM products";
            $get_pro_show = mysqli_query($conn, $get_pro);
            $rows = mysqli_fetch_all($get_pro_show, MYSQLI_ASSOC);
            foreach ($rows as $row_products) {
                $pro_id = $row_products['pro_id'];
                $product_name = $row_products['product_name'];
                $product_price = $row_products['product_price'];
                $product_image = $row_products['product_image'];
                $product_discount = $row_products['product_discount'];
                $product_dis = $product_price - ($product_price * $product_discount / 100);
            ?>
                <div class="product">
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
                        <div class="overlay-view">
                            <a href="products_detail.php?pro_id=<?php echo $pro_id ?>">View Detail</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
    <!-- POPULAR CATEGORIES -->
    <section class="w-100">
        <div class="main-page-category">
            <div class="d-flex justify-content-between product-title">
                <h2 class="title-pro">POPULAR CATEGORIES</h2>
                <p><a class="view-all" href="">View All »</a></p>
            </div>
            <div class="category-item">
                <div class="icon-category">
                    <img src="assets/images/category/icon/mobile.png" alt="">
                    <span class="cat">
                        <h4 class="cat-title">Mobile Phone</h4>
                        <a href="" class="view-more">View More »</a>
                    </span>
                </div>
                <div class="icon-category">
                    <img src="assets/images/category/icon/smart-watch.png" alt="">
                    <span class="cat">
                        <h4 class="cat-title">Smart Watch</h4>
                        <a href="" class="view-more">View More »</a>
                    </span>
                </div>
                <div class="icon-category">
                    <img src="assets/images/category/icon/laptop.png" alt="">
                    <span class="cat">
                        <h4 class="cat-title">Laptop</h4>
                        <a href="" class="view-more">View More »</a>
                    </span>
                </div>
                <div class="icon-category">
                    <img src="assets/images/category/icon/monitor.png" alt="">
                    <span class="cat">
                        <h4 class="cat-title">Monitor</h4>
                        <a href="" class="view-more">View More »</a>
                    </span>
                </div>
                <div class="icon-category">
                    <img src="assets/images/category/icon/accessories.png" alt="">
                    <span class="cat">
                        <h4 class="cat-title">Accessories</h4>
                        <a href="" class="view-more">View More »</a>
                    </span>
                </div>
            </div>
        </div>
    </section>
    <!-- SMART PHONE-->
    <section class="main-page">
        <div class="d-flex justify-content-between product-title">
            <h2 class="title-pro">SMARTS PHONE</h2>
            <p><a class="view-all" href="">View All »</a></p>
        </div>
        <div class="product-list">
            <?php
            $get_pro = "SELECT * FROM products WHERE cat_id=1";
            // $get_pro = "SELECT * FROM products";
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
                <div class="product">
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
                        <div class="overlay-view">
                            <a href="products_detail.php?pro_id=<?php echo $pro_id ?>">View Detail</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
    <!-- LAPTOP-->
    <section class="main-page">
        <div class="d-flex justify-content-between product-title">
            <h2 class="title-pro">LAPTOPS</h2>
            <p><a class="view-all" href="">View All »</a></p>
        </div>
        <div class="product-list-accessories">
            <?php
            $get_pro = "SELECT * FROM products WHERE cat_id=3";
            // $get_pro = "SELECT * FROM products";
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
                            <h4><?php echo $product_name ?></h4>
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
                        <div class="overlay-view">
                            <a href="products_detail.php?pro_id=<?php echo $pro_id ?>">View Detail</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
    <!-- SMART WATCH -->
    <section class="main-page">
        <div class="d-flex justify-content-between product-title">
            <h2 class="title-pro">SMARTS WATCH</h2>
            <p><a class="view-all" href="">View All »</a></p>
        </div>
        <div class="product-list">
            <?php
            $get_pro = "SELECT * FROM products WHERE cat_id=2";
            // $get_pro = "SELECT * FROM products";
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
                <div class="product">
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
                        <div class="overlay-view">
                            <a href="products_detail.php?pro_id=<?php echo $pro_id ?>">View Detail</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
    <!-- MONITORS-->
    <section class="main-page">
        <div class="d-flex justify-content-between product-title">
            <h2 class="title-pro">MONITORS</h2>
            <p><a class="view-all" href="">View All »</a></p>
        </div>
        <div class="product-list">
            <?php
            $get_pro = "SELECT * FROM products WHERE cat_id=4";
            // $get_pro = "SELECT * FROM products";
            $get_pro_show = mysqli_query($conn, $get_pro);
            $rows = mysqli_fetch_all($get_pro_show, MYSQLI_ASSOC);
            foreach ($rows as $row_products) {
                $pro_id = $row_products['pro_id'];
                $product_name = $row_products['product_name'];
                $product_price = $row_products['product_price'];
                $product_image = $row_products['product_image'];
                $product_discount = $row_products['product_discount'];
                $product_dis = $product_price - ($product_price * $product_discount / 100);
            ?>
                <div class="product">
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
                        <div class="overlay-view">
                            <a href="products_detail.php?pro_id=<?php echo $pro_id ?>">View Detail</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
    <!-- ACCESSORIES -->
    <section class="main-page">
        <div class="d-flex justify-content-between product-title">
            <h2 class="title-pro">ACCESSORIES</h2>
            <p><a class="view-all" href="">View All »</a></p>
        </div>
        <div class="product-list-accessories">
            <?php
            $get_pro = "SELECT * FROM products WHERE cat_id=6";
            // $get_pro = "SELECT * FROM products";
            $get_pro_show = mysqli_query($conn, $get_pro);
            $rows = mysqli_fetch_all($get_pro_show, MYSQLI_ASSOC);
            foreach ($rows as $row_products) {
                $pro_id = $row_products['pro_id'];
                $product_name = $row_products['product_name'];
                $product_price = $row_products['product_price'];
                $product_image = $row_products['product_image'];
                $product_discount = $row_products['product_discount'];
                $product_dis = $product_price - ($product_price * $product_discount / 100);
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
                        <div class="overlay-view">
                            <a href="products_detail.php?pro_id=<?php echo $pro_id ?>">View Detail</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
</main>


<?php
include('include/footer.php')
?>

<script>
    $('.product-list').slick({
        slidesToShow: 4,
        slidesToScroll: 4,
        focusOnSelect: true,
        prevArrow: '<button class="slick-prev btn-arrow" aria-label="Previous" type="button">Previous</button>',
        nextArrow: '<button class="slick-next btn-arrow" aria-label="Next" type="button">Next</button>'
    });

    $('.category-item').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        focusOnSelect: true,
        prevArrow: '<button class="slick-prev btn-arrow" aria-label="Previous" type="button">Previous</button>',
        nextArrow: '<button class="slick-next btn-arrow" aria-label="Next" type="button">Next</button>'
    });

    $('.product-list-accessories').slick({
        slidesToShow: 5,
        rows: 2,
        // slidesPerRow: 2,
        focusOnSelect: true,
        slidesToScroll: 1,
        prevArrow: '<button class="slick-prev btn-arrow" aria-label="Previous" type="button">Previous</button>',
        nextArrow: '<button class="slick-next btn-arrow" aria-label="Next" type="button">Next</button>'
    });
</script>