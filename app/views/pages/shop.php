<?php require APPROOT . "/views/inc/header.php"; ?>





<section class="banner-title">
    <div class="container">
        <div class="titles">
            <h1>Shop</h1>
            <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi,
                praesentium fugit. Ab, ipsa. Corporis, officia?
            </p>
        </div>
    </div>
</section>
<section class="new-arrivals-section">
    <h2>New Arivals</h2>
    <div class="container">
        <div class="new-arrivals">
            <?php foreach ($data['products'] as $product) : ?>
                <?php if (strtolower($product->name_cat) == 'new arrivals') : ?>
                    <div class="prodcut">
                        <div class="product-img-wrapper">
                            <img src="<?php echo URLROOT . '/'.$product->image ?>" alt="product1" style="width: 100%; height:100%; object-fit:contain;" />
                            <div class="overlay"></div>
                            <div class="actions">
                                <div class="add2cart">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                    Add To Cart
                                </div>
                                <div class="more">
                                    <i class="fa-solid fa-heart"></i>
                                    <i class="fa-solid fa-expand"></i>
                                </div>
                            </div>
                        </div>
                        <h5><?= $product->name ?></h5>
                        <p>$<?=number_format($product->price , 2)?></p>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>

        </div>
    </div>
</section>
<section class="banner-section">
    <div class="container">
        <div class="banner">
            <p>
                Discover our Fearture products and get a huge discount up to 70% for
                your first order
            </p>
        </div>
    </div>
</section>
<section class="features-section">
    <h2>Feature Products</h2>
    <div class="container">
        <div class="features">
            <?php foreach ($data['products'] as $product) : ?>
                <?php if (strtolower($product->name_cat) == 'featured') : ?>
                    <div class="feature">
                        <img src="<?php echo URLROOT . '/'.$product->image ?>" alt="feature Product 1" />
                        <div class="rating-reviews">
                            <p class="rating">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star last"></i>
                            </p>
                            <p class="reviews">(43 Reviews)</p>
                        </div>

                        <h5><?=$product->name?></h5>
                        <p>$<?=number_format($product->price , 2)?></p>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
            

        </div>
    </div>
</section>
<?php require APPROOT . "/views/inc/footer.php"; ?>