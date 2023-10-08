<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/wishlist_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<div class="home-bg">

<section class="home">

   <div class="swiper home-slider">
   
   <div class="swiper-wrapper">

      <div class="swiper-slide slide">
         <div class="image">
            <img src="images/home-bg1.png" alt="">
         </div>
         <div class="content">
            <h4><i>Our values</i></h4>
            <p>We value our commitment to setting and achieving the highest standards in manufacturing.We value then needs of our customers.</p>
             <p>We value then needs of our customers, we are committed to building a relationship with them based on integrity, loyalty and trust.</p>
            <p>We value the trust shown in us by our shareholders and strive to ensure they are rewarded for their loyalty to our company.</p>
            <a href="shop.php" class="btn">shop now</a>
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <img src="images/home-bg2.png" alt="">
         </div>
         <div class="content">
            <h4><i>Sun Chips</i></h4>
            <p>Sun Chips is the first and popular venture of Quasem Food. Since its establishment in 2010, the exceptional taste and consistent quality of Sun Chips, a brand of Quasem Food products Ltd., have made it number 1 real potato chips in the hearts and minds of Bangladeshi People. The success of Sun Chips is what has encouraged Quasem Food to continue innovation in the food market.</p>
            <a href="shop.php" class="btn">shop now</a>
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <img src="images/home-bg3.png" alt="">
         </div>
         <div class="content">
            <h4><i>Sunlite Lighters</i></h4>
            <p>Initiated in 2006, SUNLITE GAS LIGHTERS is the first and only manufacturer of gas lighters of Bangladesh. Over the last fifteen years SUNLITE has been committed to bringing innovation and technology the sector has to offer. The commitment has solidified our position as the most trusted source of gas lighters for the people of Bangladesh.</p>
            <a href="shop.php" class="btn">shop now</a>
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <img src="images/home-bg4.png" alt="">
         </div>
         <div class="content">
            <h4><i>Sun Premium Ghee</i></h4>
            <p>Barely three years old,Sun Premium Ghee is the fastest growing product in Quasem Food portfolio, showing impressive increases in both production and sales since inception. It’s unique formula, using imported butter, already lands it as a one-of-a-kind competitor in the market</p>
            <a href="shop.php" class="btn">shop now</a>
         </div>
      </div>

   </div>

      <div class="swiper-pagination"></div>

   </div>

</section>

</div>

<section class="category">

   <h1 class="heading">Explore Our Brand</h1>

   <div class="swiper category-slider">

   <div class="swiper-wrapper">

   <a href="category.php?category=Sunlight" class="swiper-slide slide">
      <img src="images/sunlite.jpg" alt="">
      <h1>Battery & Lighter</h1>
   </a>

   <a href="category.php?category=Sunfoods" class="swiper-slide slide">
      <img src="images/sun-chips.png" alt="">
      <h1>Food & Bevarage</h1>
   </a>

   <a href="category.php?category=Waves" class="swiper-slide slide">
      <img src="images/Sunstone.png" alt="">
      <h1>Engineered Quartz</h1>
   </a>

     <a href="category.php?category=Waves" class="swiper-slide slide">
      <img src="images/Wave.jpg" alt="">
      <h1>Home Care Products</h1>
   </a>


   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>

<section class="home-products">

   <h1 class="heading">latest products</h1>

   <div class="swiper products-slider">

   <div class="swiper-wrapper">

   <?php
     $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6"); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="swiper-slide slide">
      <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
      <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">
      <button class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
      <a href="quick_view.php?pid=<?= $fetch_product['id']; ?>" class="fas fa-eye"></a>
      <img src="uploaded_img/<?= $fetch_product['image_01']; ?>" alt="">
      <div class="name"><?= $fetch_product['name']; ?></div>
      <div class="flex">
         <div class="price"><span>৳</span><?= $fetch_product['price']; ?><span>/-</span></div>
         <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
      </div>
      <input type="submit" value="add to cart" class="btn" name="add_to_cart">
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?>

   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>





<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".home-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
    },
});

 var swiper = new Swiper(".category-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
         slidesPerView: 2,
       },
      650: {
        slidesPerView: 3,
      },
      768: {
        slidesPerView: 4,
      },
      1024: {
        slidesPerView: 5,
      },
   },
});

var swiper = new Swiper(".products-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      550: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>