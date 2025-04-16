<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">      
    <base href="<?= base_url()?>">
    <link rel="icon" href="#">
    <title>Chọn bàn</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        .table-alert {
            margin: 20px 0;
            padding: 15px;
            border-radius: 4px;
        }
        .table-alert.info {
            background-color: #d9edf7;
            border: 1px solid #bce8f1;
            color: #31708f;
        }
        .table-card {
            position: relative;
        }
        .table-status {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 5px 10px;
            border-radius: 3px;
            color: white;
            font-weight: bold;
            z-index: 1;
        }
        .status-occupied {
            background-color: #d9534f;
        }
        .status-available {
            background-color: #5cb85c;
        }
        .figure-wrap img {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <!--header starts-->
    <?=$header?>
    <div class="page-wrapper">
        <!-- top Links -->
        <div class="top-links">
            <div class="container">
                <ul class="row links">
                    <li class="col-xs-12 col-sm-4 link-item active">
                        <span>1</span><a href="restaurants.php">Chọn bàn</a>
                    </li>
                    <li class="col-xs-12 col-sm-4 link-item"><span>2</span><a
                            href="#">Đặt món ăn yêu thích của bạn</a>
                    </li>
                    <li class="col-xs-12 col-sm-4 link-item"><span>3</span><a
                            href="#">Thanh toán và thưởng thức</a></li>
                </ul>
            </div>
        </div>
        <div class="inner-page-hero bg-image"
            data-image-src="images/img/res.jpeg">
            <div class="container"> </div>
        </div>
        <div class="result-show">
            <div class="container">
                <div class="row">
                </div>
            </div>
        </div>
        <section class="restaurants-page">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-3">
                        <div class="widget clearfix">
                            <div class="widget-heading">
                                <h3 class="widget-title text-dark">
                                    Popular tags
                                </h3>
                                <div class="clearfix"></div>
                            </div>
                            <div class="widget-body">
                                <ul class="tags">
                                    <li> <a href="#" class="tag">
                                            Pizza
                                        </a> </li>
                                    <li> <a href="#" class="tag">
                                            Sendwich
                                        </a> </li>
                                    <li> <a href="#" class="tag">
                                            Sendwich
                                        </a> </li>
                                    <li> <a href="#" class="tag">
                                            Fish
                                        </a> </li>
                                    <li> <a href="#" class="tag">
                                            Desert
                                        </a> </li>
                                    <li> <a href="#" class="tag">
                                            Salad
                                        </a> </li>
                                </ul>
                            </div>
                        </div>
                        <!-- end:Widget -->
                    </div>
                    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-9">
                        <div class="bg-gray restaurant-entry">
                            <div class="row">
                                
                                <div class="col-xs-12 col-sm-6 col-md-4 food-item">
                                    <div class="food-item-wrap table-card">
                                        <div class="table-status "></div>
                                        <div class="figure-wrap">
                                            <img src="admin/Res_img/" alt="">
                                        </div>
                                        <div class="content">
                                            <h5><a href="" ></a></h5>
                                            <div class="product-name"></div>
                                            <div class="price-btn-block">
                                                <span class="price">Số người hiện tại: 0/20</span>
                                                <a href="" class="btn theme-btn-dash pull-right">Chọn bàn</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
    <?=$footer?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
    <script>
    </script>
</body>

</html>