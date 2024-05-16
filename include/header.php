<?php
include('title.php');
include('config.php');
include('admin/db/connection.php')
?>
<header>
    <div class="header-content-top">
        <div class="content d-flex justify-content-between">
            <div id="clock">
                <span class="date">2024-02-15 THU</span>
                <span class="time">22:18:19</span>
            </div>
            <div class="contact-to">
                <span><i class="fas fa-phone-square-alt"></i> (+855) 967 797 762</span>
                <span><i class="fas fa-envelope-square"></i>chamrernprogrammer@gmail.com</span>
            </div>
        </div>
    </div>
    <div class="header-container">
        <div class="logo">
            <a href="/"><img src="assets/images/logo.png" alt=""></a>
        </div>
        <label class="open-search" for="open-search">
            <i class="fas fa-search"></i>
            <input class="input-open-search" id="open-search" type="checkbox" name="menu" />
            <div class="search">
                <button class="button-search"><i class="fas fa-search"></i></button>
                <input type="text" placeholder="What are you looking for?" class="input-search" />
            </div>
        </label>
        <nav class="nav-content">
            <ul class="nav-content-list">
                <li class="nav-content-item account-login">
                    <label class="open-menu-login-account" for="open-menu-login-account">
                        <input class="input-menu" id="open-menu-login-account" type="checkbox" name="menu" />
                        <i class="fas fa-user-circle user-icon-login"></i>
                        <span class="login-text">Hello, Sign in
                            <strong>Create Account</strong>
                        </span>
                        <span class="item-arrow"></span>
                        <ul class="login-list">
                            <li class="login-list-item"><a href="#">My account</a></li>
                            <li class="login-list-item"><a href="sign_up.php">Create account</a></li>
                            <li class="login-list-item"><a href="#">logout</a></li>
                        </ul>
                    </label>
                </li>
                <li class="nav-content-item">
                    <a class="nav-content-link" href="#">
                        <i class="fas fa-heart">
                            <sup class="sub-cart-fav" id="cartFavorite">0</sup>
                        </i>
                    </a>
                </li>
                <li class="nav-content-item">
                    <a class="nav-content-link" href="view-cart.php">
                        <i class="fas fa-shopping-cart">
                            <sup class="sub-cart" id="cartQuantity">0</sup>
                        </i>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="nav-container">
        <nav class="all-category-nav">
            <label class="open-menu-all" for="open-menu-all">
                <input class="input-menu-all" id="open-menu-all" type="checkbox" name="menu-open" />
                <span class="all-navigator"><i class="fas fa-bars"></i> <span>All category</span> <i class="fas fa-angle-down"></i>
                    <i class="fas fa-angle-up"></i>
                </span>

                <ul class="all-category-list">
                    <li class="all-category-list-item"><a href="#" class="all-category-list-link">Smart Phones<i class="fas fa-angle-right"></i></a>
                        <div class="category-second-list">
                            <ul class="category-second-list-ul">
                                <?php
                                $get_brand = "SELECT * FROM brands ";
                                $run_brand = mysqli_query($conn, $get_brand);
                                while ($row_brand = mysqli_fetch_array($run_brand)) {
                                    $brand_id = $row_brand['brand_id'];
                                    $brand_name = $row_brand['brand_name'];
                                ?>
                                    <li class="category-second-item">

                                        <a href="#"><?php echo $brand_name ?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </li>
                    <li class="all-category-list-item"><a href="#" class="all-category-list-link">Tablet <i class="fas fa-angle-right"></i></a>
                    </li>
                    <li class="all-category-list-item"><a href="#" class="all-category-list-link">Smart Watch<i class="fas fa-angle-right"></i></a>
                    </li>
                    <li class="all-category-list-item"><a href="#" class="all-category-list-link">Laptop<i class="fas fa-angle-right"></i></a>
                        <div class="category-second-list">
                            <ul class="category-second-list-ul">
                                <li class="category-second-item"><a href="#">Mis</a></li>
                                <li class="category-second-item"><a href="#">Apple</a></li>
                                <li class="category-second-item"><a href="#">Dell</a></li>
                                <li class="category-second-item"><a href="#">Lenovo</a></li>
                                <li class="category-second-item"><a href="#">Acer</a></li>
                                <li class="category-second-item"><a href="#">Hp</a></li>
                                <li class="category-second-item"><a href="#">Samsung</a></li>
                                <li class="category-second-item"><a href="#">Asus</a></li>
                                <li class="category-second-item"><a href="#">Razer</a></li>
                                <li class="category-second-item"><a href="#">Microsoft</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="all-category-list-item"><a href="#" class="all-category-list-link">Monitor<i class="fas fa-angle-right"></i></a>
                    </li>
                    <li class="all-category-list-item"><a href="" class="all-category-list-link">Accessories<i class="fas fa-angle-right"></i></a>
                    </li>
                </ul>
            </label>

        </nav>
        <nav class="featured-category">
            <ul class="nav-row">
                <li class="nav-row-list <?php echo ($_SERVER['REQUEST_URI'] == '/') ? 'active' : ''; ?>"><a href="/" class="nav-row-list-link">Home</a></li>
                <li class="nav-row-list <?php echo ($_SERVER['REQUEST_URI'] == '/smart-phones.php') ? 'active' : ''; ?>"><a href="smart-phones.php" class="nav-row-list-link">Smart Phones</a></li>
                <li class="nav-row-list <?php echo ($_SERVER['REQUEST_URI'] == '/tablets.php') ? 'active' : ''; ?>"><a href="tablets.php" class="nav-row-list-link">Tablet</a></li>
                <li class="nav-row-list <?php echo ($_SERVER['REQUEST_URI'] == '/smart-watchs.php') ? 'active' : ''; ?>"><a href="smart-watchs.php" class="nav-row-list-link">Smart Watch</a></li>
                <li class="nav-row-list <?php echo ($_SERVER['REQUEST_URI'] == '/laptops.php') ? 'active' : ''; ?>"><a href="laptops.php" class="nav-row-list-link">Laptop</a></li>
                <li class="nav-row-list <?php echo ($_SERVER['REQUEST_URI'] == '/monitors.php') ? 'active' : ''; ?>"><a href="monitors.php" class="nav-row-list-link">Monitor</a></li>
                <li class="nav-row-list <?php echo ($_SERVER['REQUEST_URI'] == '/accessories.php') ? 'active' : ''; ?>"><a href="accessories.php" class="nav-row-list-link">Accessories</a></li>
            </ul>
        </nav>
    </div>
</header>

<script>
    function updateClock() {
        var currentDate = new Date();

        // Adjusting for GMT+7
        var hours = currentDate.getUTCHours() + 7;

        // Ensure hours stay within 0-23 range
        hours = hours >= 24 ? hours - 24 : hours;

        // Determine if it's AM or PM
        var amPM = hours >= 12 ? 'PM' : 'AM';

        // Convert to 12-hour format
        hours = hours % 12;
        hours = hours ? hours : 12; // Handle midnight

        var year = currentDate.getFullYear();
        var month = currentDate.getMonth() + 1;
        var day = currentDate.getDate();
        var dayOfWeek = currentDate.getDay();
        var minutes = currentDate.getMinutes();
        var seconds = currentDate.getSeconds();

        var daysOfWeek = ['SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT'];
        var dayString = daysOfWeek[dayOfWeek];

        var formattedDate = year + '-' + pad(month) + '-' + pad(day) + ' ' + dayString;
        var formattedTime = pad(hours) + ':' + pad(minutes) + ':' + pad(seconds) + ' ' + amPM;

        var clockDiv = document.getElementById('clock');
        clockDiv.innerHTML = '<span class="date">' + formattedDate + '</span><span class="time">' +
            formattedTime + ' (GMT+7)</span>';
    }

    function pad(number) {
        return (number < 10 ? '0' : '') + number;
    }

    updateClock();

    setInterval(updateClock, 1000);
</script>