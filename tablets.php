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
                <select name="" class="p-2 select-sort-by" id="">
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
                            <li class="item-phone"><i class="fas fa-angle-right"></i>All</li>
                            <li class="item-phone"><i class="fas fa-angle-right"></i>Samsung</li>
                            <li class="item-phone"><i class="fas fa-angle-right"></i>Apple</li>
                            <li class="item-phone"><i class="fas fa-angle-right"></i>Oppo</li>
                            <li class="item-phone"><i class="fas fa-angle-right"></i>Vivo</li>
                            <li class="item-phone"><i class="fas fa-angle-right"></i>Lenovo</li>
                            <li class="item-phone"><i class="fas fa-angle-right"></i>Realmi</li>
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
                    <div class="product-list-accessories d-flex justify-content-end">

                        <?php
                        $get_pro = "SELECT * FROM products WHERE cat_id=5";
                        // $get_pro = "SELECT * FROM products";
                        $get_pro_show = mysqli_query($conn, $get_pro);
                        $rows = mysqli_fetch_all($get_pro_show, MYSQLI_ASSOC);
                        foreach ($rows as $row_products) {
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
                                        <h4>iPhone 15 Pro max </h4>
                                    </div>
                                    <div class="price">
                                        <p>Price </p>
                                        <span class="ori">$ <?php echo $product_price ?></span>
                                        <span class="dis">$ <?php echo $product_dis ?></span>
                                    </div>
                                    <div class="info">
                                        <button class="btn-add-cart btn-add">Add to Cart</button>
                                    </div>
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