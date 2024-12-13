    <!DOCTYPE html>
    <html lang="en">

    <head>
        <style>
            .swiper-slide {
                display: flex;
                justify-content: center;
                align-items: center;
            }
        </style>
    </head>
    <div class="container my-5">
        <h2 class="text-center mb-4 text-primary">Character</h2>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <!-- Swiper Slides -->
                <?php foreach ($categories as $category) : ?>
                    <div class="swiper-slide">
                        <div class="card border border-0">
                            <img src="<?= base_url('assets/img/category/' . $category['image']); ?>" class="card-img-top product-img" alt="Category Name">
                            <div class="card-body">
                                <h5 class="card-title"><?= $category['category'] ?></h5>
                                <a href="#" class="btn btn-primary float-end">
                                    <span>View More</span>
                                    <i class="fa-solid fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- Swiper Navigation Buttons -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <!-- Swiper Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <body>
        <div class="container">


            <hr class="border-3 border-primary">
            <?php foreach ($itemByCatg as $category_name => $category): ?>
                <h3 id="<?= $category_name ?>"><?= $category_name ?></h3>

                <hr class="border-3 border-primary">

                <div class="row">
                    <?php foreach ($category['items'] as $item): ?>
                        <div class="col-lg-4">
                            <?php
                            echo form_open('index.php/cart/add');
                            echo form_hidden('id', $item['ItemId']);
                            echo form_hidden('qty', 1);
                            echo form_hidden('price', $item['Price']);
                            echo form_hidden('name', $item['ItemName']);
                            echo form_hidden('redirect_page', str_replace('index.php', 'index.php', 'index.php/series'));
                            ?>
                            <div class="card shadow" style="width: 18rem;">
                                <img src="<?= base_url('assets/img/item/' . $item['Image']) ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $item['ItemName'] ?></h5>
                                    <p><?= $item['Price'] ?></p>
                                    <button type="submit" class="btn rounded-pill btn-primary float-end">
                                        <i class="fa-solid fa-cart-shopping"></i>
                                    </button>
                                </div>
                                </form>
                            </div>

                        </div><!-- /.col-lg-4 -->
                    <?php endforeach; ?>

                <?php endforeach; ?>
                </div><!-- /.row -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
                <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

                <script>
                    const swiper = new Swiper('.mySwiper', {
                        slidesPerView: 1, // Adjust number of cards displayed
                        spaceBetween: 20, // Spacing between cards
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev',
                        },
                        pagination: {
                            el: '.swiper-pagination',
                            clickable: true,
                        },
                        breakpoints: {
                            576: {
                                slidesPerView: 2, // 2 cards on small screens
                                spaceBetween: 20,
                            },
                            768: {
                                slidesPerView: 3, // 3 cards on medium screens
                                spaceBetween: 30,
                            },
                            992: {
                                slidesPerView: 4, // 4 cards on large screens
                                spaceBetween: 40,
                            },
                        },
                    });
                </script>
    </body>




    </html>