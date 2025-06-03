
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <base href="<?= base_url()?>/admin/">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Thêm món ăn</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="fix-header">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <div id="main-wrapper">

       <?=$header?>

        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="col-lg-12">
                    <div class="card card-outline-primary">
                        <div class="card-header">
                            <h4 class="m-b-0 text-white">Thêm món ăn</h4>
                        </div>
                         <?php if(session('MESSAGE_ERROR')): ?>
                            <?php foreach(session('MESSAGE_ERROR') as $msg): ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Thông báo: </strong> <?= $msg?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php break ?>
                            <?php endforeach ?>
                        <?php endif ?>
                        <?php if(session('MESSAGE_SUCCESS')): ?>
                            <?php foreach(session('MESSAGE_SUCCESS') as $msg): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Thông báo: </strong> <?= $msg?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php break ?>
                            <?php endforeach ?>
                        <?php endif ?>
                        <div class="card-body">
                            <form action='foods\create' method='post' enctype="multipart/form-data">
                                <div class="form-body">
                                    <hr>
                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Tên
                                                    món</label>
                                                <input type="text" name="title" value="<?=old('title')?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group has-danger">
                                                <label class="control-label">Mô
                                                    tả</label>
                                                <input type="text" name="slogan" value="<?=old('slogan')?>" class="form-control form-control-danger">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Giá
                                                    tiền </label>
                                                <input type="text" name="price" value="<?=old('price')?>" class="form-control" placeholder="$">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group has-danger">
                                                <label class="control-label">Hình
                                                    ảnh</label>
                                                <input type="file" name="file" id="lastName" class="form-control form-control-danger" placeholder="12n">
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                        </div>
                        <div class="form-actions">
                            <input type="submit" name="submit" class="btn btn-primary" value="Save">
                            <a href="/admin/foods" class="btn btn-inverse">Cancel</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <footer class="footer"> © 2025 - TH Team </footer>
        </div>
    </div>
    </div>
    </div>

    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>

</body>

</html>