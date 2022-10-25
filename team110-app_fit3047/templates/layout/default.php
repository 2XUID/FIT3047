<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- From default.php -->
        <?= $this->Html->charset() ?>
        <title><?= $this->fetch('title') ?></title>
        <?= $this->Html->meta('icon') ?>
        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
        <!-- From default.php -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <!-- <link href="css/admin_styles.css" rel="stylesheet" /> -->
        <?= $this->Html->css(['admin_styles.css']) ?>
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <!-- Top bar -->
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="<?= $this->Url->build('/admin') ?>">Aromy Admin</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <a class="btn-new" href="<?= $this->Url->build('/') ?>">Back To Home</a>
            </ul>
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <?= $this->Html->link('Logout/Register',['controller'=>'Users','action'=>'logout'],['class'=>'thm-btn v2 scndry-bg brd-rd5 d-inline-block position-relative overflow-hidden'])?>
            </ul>
        </nav>
        <!-- Top bar -->

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <!-- side bar -->
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="<?= $this->Url->build('/admin') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <!-- content of sidebar -->
                            <!-- Nav Item Orders -->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseOrders" aria-expanded="false" aria-controls="collapseOrders">
                                <div class="sb-nav-link-icon"><i class="fa fa-file"></i></div>
                                Orders
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseOrders" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?= $this->Url->build('/orders') ?>">List</a>
                                    <a class="nav-link" href="<?= $this->Url->build('/orders/add') ?>">New Orders</a>
                                </nav>
                            </div>
                            <!-- Nav Item Orders -->
                            <!-- Nav Item Customers -->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCustomers" aria-expanded="false" aria-controls="collapseCustomers">
                                <div class="sb-nav-link-icon"><i class="fa fa-file"></i></div>
                                Customers
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseCustomers" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?= $this->Url->build('/Customers') ?>">List</a>
                                    <a class="nav-link" href="<?= $this->Url->build('/Customers/add') ?>">New Customers</a>
                                </nav>
                            </div>
                            <!-- Nav Item Customers -->
                            <!-- Nav Item Products -->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseProducts" aria-expanded="false" aria-controls="collapseProducts">
                                <div class="sb-nav-link-icon"><i class="fa fa-file"></i></div>
                                Products
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseProducts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?= $this->Url->build('/Products') ?>">List</a>
                                    <a class="nav-link" href="<?= $this->Url->build('/Products/add') ?>">New Products</a>
                                    <a class="nav-link" href="<?= $this->Url->build('/Categories') ?>">Categories</a>
                                </nav>
                            </div>
                            <!-- Nav Item Products -->
                            <!-- Nav Item Email Enquiry -->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseEnquiry" aria-expanded="false" aria-controls="collapseEnquiry">
                                <div class="sb-nav-link-icon"><i class="fa fa-file"></i></div>
                                Enquiry
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseEnquiry" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?= $this->Url->build('/Enquiries') ?>">List</a>
                                </nav>
                            </div>
                            <!-- Nav Item Email Enquiry -->
                            <!-- content of sidebar -->
                        </div>
                    </div>
                </nav>
                <!-- side bar -->
            </div>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <div id="layoutSidenav_content">
                <!-- main part -->
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
                <!-- main part -->

                <!-- footer part -->
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright Aromy Website 2022</div>
                        </div>
                    </div>
                </footer>
                <!-- footer part -->
            </div>
        </div>
        <!-- Bootstrap core JavaScript-->
        <?= $this->Html->script('/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Core plugin JavaScript-->
        <?= $this->Html->script('/vendor/jquery-easing/jquery.easing.min.js') ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="webroot/js/admin_script.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="vendor/js/datatables-simple-demo.js"></script>
        <script src="js/scripts.js"></script>
        <?= $this->Html->script('/vendor/assets/demo/chart-area-demo.js') ?>
        <?= $this->Html->script('/vendor/assets/demo/chart-bar-demo.js') ?>
        <?= $this->fetch('admin_script') ?>
        <?= $this->fetch('script') ?>
    </body>
</html>
