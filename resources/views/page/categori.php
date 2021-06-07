<?php include "header.php"; ?>
<?php
$idTL = $_GET['idTL'];
$tin->result = $tin->ChiTietTheLoai($idTL);
$row_lienket = $tin->fetchRow();
?>


<!-- Trending Area Start -->
<main>
<div class="link_page bg-primary ">
    <div class="container">
        <a href="index.php">Trang Chủ</a>
        <a href="categori.php?idTL=<?php echo $row_lienket['idTL']; ?>"> <?php echo ' / ' . $row_lienket['TenTL']; ?></a>        
    </div>
</div>
    <!--   Weekly-News start -->
    <?php include "tinnoibat.php"; ?>
    <!-- End Weekly-News -->
    <!-- Whats New Start -->
    <section class="whats-news-area pt-50 pb-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- ========================================Danh Mục Tin==================================== -->
                    <?php
                    $loaitin->result = $loaitin->TinCungTheLoaiMoiNhat($idTL, 1, 10);
                    while ($row_loaitin = $loaitin->fetchRow()) {

                    ?>
                        <div class="col-lg-12">
                            <div class="row d-flex justify-content-between">
                                <div class="col-lg-3 col-md-3">
                                    <div class="section-tittle mb-30">
                                        <h3><?php echo $row_loaitin['TenTL']; ?></h3>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9">
                                    <div class="properties__button">
                                        <!--Nav Button  -->
                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Tất cả</a>
                                                <?php
                                                $loaitin->result = $loaitin->LoaiTinTrongTheLoai($idTL);
                                                while ($row_loaitin = $loaitin->fetchRow()) {
                                                    $idLT = $row_loaitin['idLT'];
                                                ?>
                                                    <a class="nav-item nav-link " id="nav-<?php echo $row_loaitin['Ten_KhongDau']; ?>-tab" data-toggle="tab" href="#nav-<?php echo $row_loaitin['Ten_KhongDau']; ?>" role="tab" aria-controls="nav-<?php echo $row_loaitin['Ten_KhongDau']; ?>" aria-selected="true"><?php echo $row_loaitin['Ten']; ?></a>
                                                <?php
                                                }
                                                ?>

                                                <!-- ===================================================================== -->
                                            </div>
                                        </nav>
                                        <!--End Nav Button  -->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <!-- Nav Card -->
                                    <div class="tab-content" id="nav-tabContent">
                                        <!-- card one -->
                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                            <div class="whats-news-caption">
                                                <div class="row">
                                                    <!-- ============================Tin Tất Cả===================== -->
                                                    <?php
                                                    $tincungtheloai = $tintrongloai->TinCungTheLoai($idTL, 1, 10);
                                                    while ($row_tincungtheloai = mysqli_fetch_assoc($tincungtheloai)) {
                                                    ?>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="single-what-news mb-100">
                                                                <div class="what-img">
                                                                    <a href="single-post.php?idTin=<?php echo $row_tincungtheloai['idTin']; ?>"><img src="<?php echo $row_tincungtheloai['urlHinh']; ?>" alt="Hinh Anh"></a>

                                                                </div>
                                                                <div class="what-cap">
                                                                    <a href="loaitin.php?idLT=<?php echo $row_tincungtheloai['idLT']; ?>&pageNum=1"><span class="color1"><?php echo $row_tincungtheloai['Ten']; ?></span></a>
                                                                    <h4><a href="single-post.php?idTin=<?php echo $row_tincungtheloai['idTin']; ?>"><?php echo $row_tincungtheloai['TieuDe']; ?></a></h4>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- Card two -->
                                        <!-- ===========Tin Theo Loai tin=============== -->

                                        <?php
                                        $loaitin->result = $loaitin->LoaiTinTrongTheLoai($idTL);
                                        while ($row_loaitin = $loaitin->fetchRow()) {
                                            $idLT = $row_loaitin['idLT'];
                                        ?>
                                            <div class="tab-pane fade show " id="nav-<?php echo $row_loaitin['Ten_KhongDau']; ?>" role="tabpanel" aria-labelledby="nav-<?php echo $row_loaitin['Ten_KhongDau']; ?>-tab">
                                                <div class="whats-news-caption">
                                                    <div class="row">
                                                        <?php
                                                        $tintrongloai->result = $tintrongloai->TinTrongLoai($idLT, 1, 10);
                                                        while ($row_tintrongloai = $tintrongloai->fetchRow()) {
                                                        ?>
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="single-what-news mb-100">
                                                                    <div class="what-img">
                                                                        <a href="single-post.php?idTin=<?php echo $row_tintrongloai['idTin']; ?>"><img src="<?php echo $row_tintrongloai['urlHinh']; ?>" alt="Hinh Anh"></a>
                                                                    </div>
                                                                    <div class="what-cap">
                                                                        <a href="loaitin.php?idLT=<?php echo $row_loaitin['idLT']; ?>&pageNum=1"><span class="color1"><?php echo $row_tintrongloai['Ten']; ?> </span></a>

                                                                        <h4><a href="single-post.php?idTin=<?php echo $row_tintrongloai['idTin']; ?>"><?php echo $row_tintrongloai['TieuDe']; ?></a></h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php
                                        } ?>

                                    </div>
                                    <!-- End Nav Card -->
                                </div>
                            </div>
                        </div>


                    <?php
                    }
                    ?>

                </div>

                <div class="col-lg-4 ">
                    <!-- SideBar -->
                    <?php include "sidebar.php"; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Whats New End -->
    
   <!-- Tin trong tuan -->
   <?php include "tintrongtuan.php";?>
</main>

<?php include "footer.php"; ?>


<!-- JS here -->

<!-- All JS Custom Plugins Link Here here -->
<script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="./assets/js/popper.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
<!-- Jquery Mobile Menu -->
<script src="./assets/js/jquery.slicknav.min.js"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="./assets/js/owl.carousel.min.js"></script>
<script src="./assets/js/slick.min.js"></script>
<!-- Date Picker -->
<script src="./assets/js/gijgo.min.js"></script>
<!-- One Page, Animated-HeadLin -->
<script src="./assets/js/wow.min.js"></script>
<script src="./assets/js/animated.headline.js"></script>
<script src="./assets/js/jquery.magnific-popup.js"></script>

<!-- Breaking New Pluging -->
<script src="./assets/js/jquery.ticker.js"></script>
<script src="./assets/js/site.js"></script>

<!-- Scrollup, nice-select, sticky -->
<script src="./assets/js/jquery.scrollUp.min.js"></script>
<script src="./assets/js/jquery.nice-select.min.js"></script>
<script src="./assets/js/jquery.sticky.js"></script>

<!-- contact js -->
<script src="./assets/js/contact.js"></script>
<script src="./assets/js/jquery.form.js"></script>
<script src="./assets/js/jquery.validate.min.js"></script>
<script src="./assets/js/mail-script.js"></script>
<script src="./assets/js/jquery.ajaxchimp.min.js"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="./assets/js/plugins.js"></script>
<script src="./assets/js/main.js"></script>

</body>

</html>