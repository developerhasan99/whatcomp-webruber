<?php 
// Template name: Shop page

get_header(); ?>
<div class="shop_page" <?php post_class(); ?>>
    <div class="container">
    <?php if(have_posts()):while(have_posts()):the_post(); ?> 
        <div id="content"> 
            <h1 class="text-center mb-5">Buy Coins To Publish Your Competitions</h1>
            <div class="row">
                <div class="col-md-3">
                    <a class="coin-card d-block mb-4" href="https://whatcomp.com/coins/50-coins/">
                        <img src="https://lotterylisting.local/wp-content/uploads/2023/04/WhatsApp-Image-2023-04-13-at-1.26.30-PM.jpeg" alt="Coin" class="img-fluid">
                    </a>
                </div>
                <div class="col-md-3">
                    <a class="coin-card d-block mb-4" href="https://whatcomp.com/coins/50-coins/">
                        <img src="https://lotterylisting.local/wp-content/uploads/2023/04/WhatsApp-Image-2023-04-13-at-1.26.30-PM.jpeg" alt="Coin" class="img-fluid">
                    </a>
                </div>
                <div class="col-md-3">
                    <a class="coin-card d-block mb-4" href="https://whatcomp.com/coins/50-coins/">
                        <img src="https://lotterylisting.local/wp-content/uploads/2023/04/WhatsApp-Image-2023-04-13-at-1.26.30-PM.jpeg" alt="Coin" class="img-fluid">
                    </a>
                </div>
                <div class="col-md-3">
                    <a class="coin-card d-block mb-4" href="https://whatcomp.com/coins/50-coins/">
                        <img src="https://lotterylisting.local/wp-content/uploads/2023/04/WhatsApp-Image-2023-04-13-at-1.26.30-PM.jpeg" alt="Coin" class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <a class="coin-card d-block mb-4" href="https://whatcomp.com/coins/50-coins/">
                        <img src="https://lotterylisting.local/wp-content/uploads/2023/04/WhatsApp-Image-2023-04-13-at-1.26.30-PM.jpeg" alt="Coin" class="img-fluid">
                    </a>
                </div>
                <div class="col-md-3">
                    <a class="coin-card d-block mb-4" href="https://whatcomp.com/coins/50-coins/">
                        <img src="https://lotterylisting.local/wp-content/uploads/2023/04/WhatsApp-Image-2023-04-13-at-1.26.30-PM.jpeg" alt="Coin" class="img-fluid">
                    </a>
                </div>
                <div class="col-md-3">
                    <a class="coin-card d-block mb-4" href="https://whatcomp.com/coins/50-coins/">
                        <img src="https://lotterylisting.local/wp-content/uploads/2023/04/WhatsApp-Image-2023-04-13-at-1.26.30-PM.jpeg" alt="Coin" class="img-fluid">
                    </a>
                </div>
                <div class="col-md-3">
                    <a class="coin-card d-block mb-4" href="https://whatcomp.com/coins/50-coins/">
                        <img src="https://lotterylisting.local/wp-content/uploads/2023/04/WhatsApp-Image-2023-04-13-at-1.26.30-PM.jpeg" alt="Coin" class="img-fluid">
                    </a>
                </div>
            </div>
        </div>
    <?php endwhile; endif; ?>
    </div>
</div>
<?php get_footer(); ?>