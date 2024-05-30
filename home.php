<?php

include 'connection.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link rel="shortcut icon" href="images/fav-icon.png" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <title>Kanchon Food Store</title>
</head>

<body>
    <!--==Navigation================================-->
    <nav class="navigation">
        <!--logo-------->
        <a href="index.html" class="logo"> <span>কিনবেন </span>নাকি?</a>
        <!--menu-btn---->
        <input type="checkbox" class="menu-btn" id="menu-btn" />
        <label for="menu-btn" class="menu-icon">
            <span class="nav-icon"></span>
        </label>
        <!--menu-------->
        <ul class="menu">
            <li><a href="home.php" class="active">Home</a></li>
            <li><a href="#category">Categories</a></li>
            <li><a href="login.php">Our Packages</a></li>
            <li><a href="reg.php">Feedback</a></li>
        </ul>
        <!--right-nav-(cart-like)-->
        <div class="right-nav">
            <!--like----->
            <a href="#" class="like">
                <i class="far fa-heart"></i>
                <span>0</span>
            </a>
            <!--cart----->
            <a href="#" class="cart">
                <i class="fas fa-shopping-cart"></i>
                <span>0</span>
            </a>
        </div>
    </nav>
    <!--nav-end--------------------->
    <!--==Search-banner=======================================-->
    <section id="search-banner">
        <!--bg--------->
        <img src="images/bg-1.png" class="bg-1" alt="bg" />
        <img src="images/bg-2.png" class="bg-2" alt="bg-2" />
        <!--text------->
        <div class="search-banner-text">
            <h1>Kanchon Daily Kacha Bazar</h1>
            <strong>#Free Delivery</strong>
            <!--search-box------>
            <form action="search.php" method="POST" class="search-box">
                <!--icon------>
                <i class="fas fa-search"></i>
                <!--input----->
                <input type="text" class="search-input" placeholder="Search your daily groceries" name="search_term" required />
                <!--btn------->
                <input type="submit" class="search-btn" value="Search" name="search" />
            </form>
        </div>
    </section>
    <!--search-banner-end--------------->
    <!--==category=========================================-->
    <section id="category">
        <!--heading---------------->
        <div class="category-heading">
            <h2>Category</h2>
            <span>All</span>
        </div>
        <!--box-container---------->
        <div class="category-container">
            <!--box---------------->
            <a href="#" class="category-box">
                <img src="images/fish.png" alt="Fish" />
                <span>Fish & Meat</span>
            </a>
            <!--box---------------->
            <a href="#" class="category-box">
                <img src="images/Vegetables.png" alt="Fish" />
                <span>Vegatbles</span>
            </a>
            <!--box---------------->
            <a href="#" class="category-box">
                <img src="images/medicine.png" alt="Fish" />
                <span>Medicine</span>
            </a>
            <!--box---------------->
            <a href="#" class="category-box">
                <img src="images/baby.png" alt="Fish" />
                <span>Baby</span>
            </a>
            <!--box---------------->
            <a href="#" class="category-box">
                <img src="images/office.png" alt="Fish" />
                <span>Office</span>
            </a>
            <!--box---------------->
            <a href="#" class="category-box">
                <img src="images/beauty.png" alt="Fish" />
                <span>Beauty</span>
            </a>
            <!--box---------------->
            <a href="#" class="category-box">
                <img src="images/Gardening.png" alt="Fish" />
                <span>Gardening</span>
            </a>
        </div>
    </section>
    <!--category-end----------------------------------->
    <!--==Products====================================-->
    <section id="popular-product">
        <!--heading----------->
        <div class="product-heading">
            <h3>Popular Product</h3>
            <span>All</span>
        </div>
        <!--box-container------>
        <div class="product-container">
            <!--box---------->

            <?php

            $select_query = "SELECT * FROM items";
            $result = mysqli_query($db_connect, $select_query);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="product-box">
                        <img src="images/<?php echo htmlspecialchars($row['file']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>" />
                        <strong><?php echo htmlspecialchars($row['name']); ?></strong>
                        <span class="quantity"><?php echo htmlspecialchars($row['weight']); ?> KG</span>
                        <span class="price"><?php echo htmlspecialchars($row['price']); ?> TK</span>
                        <!--cart-btn------->
                        <a href="#" class="cart-btn">
                            <i class="fas fa-shopping-bag"></i> Add Cart
                        </a>
                        <!--like-btn------->
                        <a href="#" class="like-btn">
                            <i class="far fa-heart"></i>
                        </a>
                    </div>
            <?php
                }
            } else {
                echo "Error: " . $select_query . "<br>" . mysqli_error($db_connect);
            }

            ?>
        </div>
    </section>
    <!--popular-product-end--------------------->

    <section id="popular-product">
        <!--heading----------->
        <div class="product-heading">
            <h3>Meat & Fish</h3>
            <span>All</span>
        </div>
        <!--box-container------>
        <div class="product-container">

            <?php


            $select_query = "SELECT * FROM item2";
            $result = mysqli_query($db_connect, $select_query);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="product-box">
                        <img src="images/<?php echo htmlspecialchars($row['file']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>" />
                        <strong><?php echo htmlspecialchars($row['name']); ?></strong>
                        <span class="quantity"><?php echo htmlspecialchars($row['weight']); ?> KG</span>
                        <span class="price"><?php echo htmlspecialchars($row['price']); ?> TK</span>
                        <!--cart-btn------->
                        <a href="#" class="cart-btn">
                            <i class="fas fa-shopping-bag"></i> Add Cart
                        </a>
                        <!--like-btn------->
                        <a href="#" class="like-btn">
                            <i class="far fa-heart"></i>
                        </a>
                    </div>
            <?php
                }
            } else {
                echo "Error: " . $select_query . "<br>" . mysqli_error($db_connect);
            }

            ?>
        </div>
    </section>
    <!--Popular-bundle-pack===================================-->
    <section id="popular-bundle-pack">
        <!--heading-------------->
        <div class="product-heading">
            <h3>Popular Bundle Pack</h3>
        </div>
        <!--box-container------>
        <div class="product-container">
            <!--box---------->
            <div class="product-box">
                <img src="images/pack1.png" alt="pack" />
                <strong>Big Pack</strong>
                <span class="quantity">Lemone, Tamato, Patato,+4</span>
                <span class="price">1000 TK</span>
                <!--cart-btn------->
                <a href="#" class="cart-btn">
                    <i class="fas fa-shopping-bag"></i> Add Cart
                </a>
                <!--like-btn------->
                <a href="#" class="like-btn">
                    <i class="far fa-heart"></i>
                </a>
            </div>
            <!--box---------->
            <div class="product-box">
                <img src="images/pack2.jpg" alt="apple" />
                <strong>Large Pack</strong>
                <span class="quantity">Lemone, Tamato, Patato,+2</span>
                <span class="price">700 tk</span>
                <!--cart-btn------->
                <a href="#" class="cart-btn">
                    <i class="fas fa-shopping-bag"></i> Add Cart
                </a>
                <!--like-btn------->
                <a href="#" class="like-btn">
                    <i class="far fa-heart"></i>
                </a>
            </div>
            <!--box---------->
            <div class="product-box">
                <img src="images/pack3.png" alt="apple" />
                <strong>Small Pack</strong>
                <span class="quantity">Lemone, Tamato, Patato</span>
                <span class="price">500 TK</span>
                <!--cart-btn------->
                <a href="#" class="cart-btn">
                    <i class="fas fa-shopping-bag"></i> Add Cart
                </a>
                <!--like-btn------->
                <a href="#" class="like-btn">
                    <i class="far fa-heart"></i>
                </a>
            </div>
            <!--box---------->
            <div class="product-box">
                <img src="images/mPack.png" alt="pack" />
                <strong>Big Pack</strong>
                <span class="quantity">Lemone, Tamato, Patato,+4</span>
                <span class="price">1300 TK</span>
                <!--cart-btn------->
                <a href="#" class="cart-btn">
                    <i class="fas fa-shopping-bag"></i> Add Cart
                </a>
                <!--like-btn------->
                <a href="#" class="like-btn">
                    <i class="far fa-heart"></i>
                </a>
            </div>
            <!--box---------->
            <div class="product-box">
                <img src="images/Mpakket.png" alt="apple" />
                <strong>Large Pack</strong>
                <span class="quantity">Lemone, Tamato, Patato,+2</span>
                <span class="price">600 TK</span>
                <!--cart-btn------->
                <a href="#" class="cart-btn">
                    <i class="fas fa-shopping-bag"></i> Add Cart
                </a>
                <!--like-btn------->
                <a href="#" class="like-btn">
                    <i class="far fa-heart"></i>
                </a>
            </div>
            <!--box---------->
            <div class="product-box">
                <img src="images/pack3.png" alt="apple" />
                <strong>Small Pack</strong>
                <span class="quantity">Lemone, Tamato, Patato</span>
                <span class="price">400 TK</span>
                <!--cart-btn------->
                <a href="#" class="cart-btn">
                    <i class="fas fa-shopping-bag"></i> Add Cart
                </a>
                <!--like-btn------->
                <a href="#" class="like-btn">
                    <i class="far fa-heart"></i>
                </a>
            </div>
        </div>
    </section>
    <!--popular-bundle-pack-end-------------------------------->

    <!--==Clients===============================================-->
    <section id="clients">
        <!--heading---------------->
        <div class="client-heading">
            <h3>What Our Customer's Say</h3>
        </div>
        <!--box-container---------->
        <div class="client-box-container">
            <!--box------------->
            <div class="client-box">
                <!--==profile===-->
                <div class="client-profile">
                    <!--img--->
                    <img src="images/client-1.jpg" alt="client" />
                    <!--text-->
                    <div class="profile-text">
                        <strong>James Mcavoy</strong>
                        <span>CEO</span>
                    </div>
                </div>
                <!--==Rating======-->
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <!--==comments===-->
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fugiat ea
                    id, itaque architecto atque mollitia aperiam voluptatem consequatur
                    incidunt sed placeat, harum recusandae quaerat at hic labore eius
                    laborum quas!
                </p>
            </div>
            <!--box------------->
            <div class="client-box">
                <!--==profile===-->
                <div class="client-profile">
                    <!--img--->
                    <img src="images/client-2.jpg" alt="client" />
                    <!--text-->
                    <div class="profile-text">
                        <strong>Adward Mcavoy</strong>
                        <span>Software Developer</span>
                    </div>
                </div>
                <!--==Rating======-->
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <!--==comments===-->
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fugiat ea
                    id, itaque architecto atque mollitia aperiam voluptatem consequatur
                    incidunt sed placeat, harum recusandae quaerat at hic labore eius
                    laborum quas!
                </p>
            </div>
            <!--box------------->
            <div class="client-box">
                <!--==profile===-->
                <div class="client-profile">
                    <!--img--->
                    <img src="images/client-3.jpg" alt="client" />
                    <!--text-->
                    <div class="profile-text">
                        <strong>Ava Alex</strong>
                        <span>Marketer</span>
                    </div>
                </div>
                <!--==Rating======-->
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <!--==comments===-->
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fugiat ea
                    id, itaque architecto atque
                </p>
            </div>
            <?php


            if (isset($_POST['submit'])) {
                $name = $_POST['name'];
                $comment = $_POST['comment'];
                $star = $_POST['star'];
                $pos = $_POST['pos'];

                // File upload handling
                $file_name = $_FILES['image']['name'];
                $tempname = $_FILES['image']['tmp_name'];
                $folder = 'images/' . $file_name;

                // Check if file is uploaded and move it to the specified folder
                if (move_uploaded_file($tempname, $folder)) {
                    // Insert data into the database
                    $insert_query = "INSERT INTO feedback(name, file, comment, star, pos) VALUES ('$name', '$file_name', '$comment', '$star', '$pos')";
                    if (mysqli_query($db_connect, $insert_query)) {
                    } else {
                        echo "Error: " . $insert_query . "<br>" . mysqli_error($db_connect);
                    }
                } else {
                    echo "Failed to upload image.";
                }
            }
            ?>

            <?php
            $select_query = "SELECT * FROM feedback";
            $result = mysqli_query($db_connect, $select_query);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="client-box">
                        <!--==profile===-->
                        <div class="client-profile">
                            <!--img--->
                            <img src="images/<?php echo htmlspecialchars($row['file']); ?>" alt="client" />
                            <!--text-->
                            <div class="profile-text">
                                <strong><?php echo htmlspecialchars($row['name']); ?></strong>
                                <span><?php echo htmlspecialchars($row['pos']); ?></span>
                            </div>
                        </div>
                        <!--==Rating======-->
                        <div class="rating">
                            <?php
                            // Display star rating based on the 'star' value from the database
                            for ($i = 0; $i < 5; $i++) {
                                if ($i < $row['star']) {
                                    echo '<i class="fas fa-star"></i>';
                                } else {
                                    echo '<i class="far fa-star"></i>';
                                }
                            }
                            ?>
                        </div>
                        <!--==comments===-->
                        <p>
                            <?php echo htmlspecialchars($row['comment']); ?>
                        </p>
                    </div>
            <?php
                }
            } else {
                echo "Error: " . $select_query . "<br>" . mysqli_error($db_connect);
            }

            // Close the database connection
            mysqli_close($db_connect);
            ?>

        </div>

    </section>
    <!-- Feedback -->

    <section class="contact">
        <h2>
            Give Us Your Feedback
        </h2>
        <br>
        <form method="post" enctype="multipart/form-data" class="form">
            <div class="box">
                <div class="input-box">
                    <div class="input-field">
                        <input type="text" placeholder="Full Name" id="name" name="name" class="item" autocomplete="off">
                        <span class="focus"></span>
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Job Title" id="jobTitle" name="pos" class="item" autocomplete="off">
                        <span class="focus"></span>
                    </div>
                </div>
                <div class="input-box">
                    <div class="input-field">
                        <input type="file" placeholder="Image URL" id="userImage" name="image" class="item" autocomplete="off">
                        <span class="focus"></span>
                    </div>
                    <div class="input-field">
                        <select placeholder="" id="subject" name="star" class="item" autocomplete="off">
                            <option value="⭐">⭐</option>
                            <option value="⭐⭐">⭐⭐</option>
                            <option value="⭐⭐⭐">⭐⭐⭐</option>
                            <option value="⭐⭐⭐⭐">⭐⭐⭐⭐</option>
                            <option value="⭐⭐⭐⭐⭐">⭐⭐⭐⭐⭐</option>
                        </select>

                        <span class="focus"></span>
                    </div>
                </div>

                <div class="textarea-field">
                    <textarea id="message" name="comment" cols="30" rows="10" placeholder="Your message " class="item" autocomplete="off"></textarea>
                    <span class="focus"></span>
                </div>
                <div class="btn-box btns">

                    <button type="submit" name="submit" class="button-89">Submit</button>

                </div>
            </div>
        </form>

    </section>

    <!--client-section-end---------->
    <!--==Footer=============================================-->
    <footer>
        <div class="footer-container">
            <!--logo-container------>
            <div class="footer-logo">
                <a href="#"><span>kinben</span>NAKI?</a>
                <!--social----->
                <div class="footer-social">
                    <a href="https://www.facebook.com/sabbir.x.tanvir/"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://x.com/Sabbir__Tanvir"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.instagram.com/sabbir_x_tanvir/"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <!--links------------------------->
            <div class="footer-links">
                <strong>Product</strong>
                <ul>
                    <li><a href="#">Clothes</a></li>
                    <li><a href="#">Packages</a></li>
                    <li><a href="#">Popular</a></li>
                    <li><a href="#">New</a></li>
                </ul>
            </div>
            <!--links------------------------->
            <div class="footer-links">
                <strong>Category</strong>
                <ul>
                    <li><a href="#">Beauty</a></li>
                    <li><a href="#">Meats</a></li>
                    <li><a href="#">Kids</a></li>
                    <li><a href="#">Clothes</a></li>
                </ul>
            </div>
            <!--links-------------------------->
            <div class="footer-links">
                <strong>Contact</strong>
                <ul>
                    <li><a href="#">Phone : 0177777777</a></li>
                    <li><a href="#">Email : sabbirmahmudtanvir@gmail.com</a></li>
                </ul>
            </div>
        </div>
    </footer>


    <script src="script.js"></script>
</body>

</html>