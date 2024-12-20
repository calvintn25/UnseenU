<!doctype html>
<html lang="en">

<body>



    <main>

        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?= base_url('assets/img/banner-1.png'); ?>" alt="">

                    <div class="container">
                        <div class="carousel-caption text-start">
                            <p><a class="btn btn-lg btn-primary mb-5 ms-5" href="#">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                    <span>Buy Now</span>
                                </a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url('assets/img/banner-2.png') ?>" alt="">
                    <div class="container">
                        <div class="carousel-caption">
                            <p><a class="btn btn-lg btn-primary float-end mb-5" href="#">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                    <span>Buy Now</span>
                                </a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url('assets/img/banner-3.png') ?>" alt="">
                    <div class="container">
                        <div class="carousel-caption text-end">
                            <p><a class="btn btn-lg btn-primary mb-5" href="#">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                    <span>Buy Now</span>
                                </a></p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


        <!-- Marketing messaging and featurettes
  ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->

        <div class="container marketing">

            <!-- Three columns of text below the carousel -->
            <div class="row">
                <div class="col-lg-4">
                    <div class="card shadow" style="width: 18rem;">
                        <img src="<?= base_url('assets/img/ShinchanDessertTime.jpg') ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Shinchan : Dessert Time</h5>
                            <p class="card-text">Deskripsi Produk : Isi deskripsi produk sedikit, tapi jangan terapin harga dulu, add to cart masukkin ke keranjang</p>
                            <a href="#" class="btn btn-primary">
                                <i class="fa-solid fa-cart-arrow-down"></i>
                                <span> Add to Cart</span>
                            </a>
                        </div>
                    </div>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <div class="card shadow" style="width: 18rem;">
                        <img src="<?= base_url('assets/img/BunnyMagicSeries.jpg') ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Bunny Magic</h5>
                            <p class="card-text">Deskripsi Produk : Isi deskripsi produk sedikit, tapi jangan terapin harga dulu, add to cart masukkin ke keranjang</p>
                            <a href="#" class="btn btn-primary">
                                <i class="fa-solid fa-cart-arrow-down"></i>
                                <span> Add to Cart</span>
                            </a>
                        </div>
                    </div>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4 mb-5">
                    <div class="card shadow" style="width: 18rem;">
                        <img src="<?= base_url('assets/img/DimooNoOneGonnaSleepTonight.jpg') ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Dimoo : Noone's Gonna Sleep Tonight</h5>
                            <p class="card-text">Deskripsi Produk : Isi deskripsi produk sedikit, tapi jangan terapin harga dulu</p>
                            <a href="#" class="btn btn-primary">
                                <i class="fa-solid fa-cart-arrow-down"></i>
                                <span> Add to Cart</span>
                            </a>
                        </div>
                    </div>
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->


            <!-- START THE FEATURETTES -->

            <hr class="border border-primary border-3 mb-5">

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
                    <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting prose here.</p>
                </div>
                <div class="col-md-5">
                    <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#eee" /><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text>
                    </svg>

                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading">Oh yeah, it’s that good. <span class="text-muted">See for yourself.</span></h2>
                    <p class="lead">Another featurette? Of course. More placeholder content here to give you an idea of how this layout would work with some actual real-world content in place.</p>
                </div>
                <div class="col-md-5 order-md-1">
                    <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#eee" /><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text>
                    </svg>

                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
                    <p class="lead">And yes, this is the last block of representative placeholder content. Again, not really intended to be actually read, simply here to give you a better view of what this would look like with some actual content. Your content.</p>
                </div>
                <div class="col-md-5">
                    <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#eee" /><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text>
                    </svg>

                </div>
            </div>

            <hr class="featurette-divider">

            <!-- /END THE FEATURETTES -->

        </div><!-- /.container -->

</body>

</html>