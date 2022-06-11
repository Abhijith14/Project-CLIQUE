<?php

include 'getuser.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Clique">
    <meta name="keywords" content="Clique">
    <meta name="author" content="Clique">
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon" />
    <title>Clique</title>

    <!--Google font-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Theme css -->
    <link id="change-link" rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>

<body>

    <!-- header start -->
    <header>
        <div class="mobile-fix-menu"></div>
        <div class="container-fluid custom-padding">
            <div class="header-section">
                <div class="header-left">
                    <div class="brand-logo">
                        <a href="index.php">
                            <img src="assets/images/icon/logo.png" alt="logo" class="img-fluid blur-up lazyload">
                        </a>
                    </div>
                    <div class="search-box">
                        <i data-feather="search" class="icon iw-16 icon-light"></i>
                        <input type="text" class="form-control search-type" placeholder="search...">
                        <div class="icon-close">
                            <i data-feather="x" class="iw-16 icon-light"></i>
                        </div>
                    </div>
                    <ul class="btn-group">
                    </ul>
                </div>
                <div class="header-right">
                    <?php if (isset($_SESSION['loggedin']) and $_SESSION['loggedin'])  { ?>
                    <ul class="option-list">
                              <li class="header-btn custom-dropdown profile-btn btn-group">
                                <a class="main-link" href="javascript:void(0)" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user icon-light stroke-width-3 d-sm-none d-block iw-16 ih-16"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <div class="media d-none d-sm-flex">
                                        <div class="user-img bg-size blur-up lazyloaded">
                                            <img src="assets/images/user-sm/<?php if ($gender == 0) { echo "guy.png"; } else { echo "lady.png"; } ?>" class="img-fluid blur-up lazyload bg-img" alt="user">
                                            <span class="available-stats online"></span>
                                        </div>
                                        <div class="media-body d-none d-md-block">
                                            <h4><?php echo $name; ?></h4>
                                            <span>active now</span>
                                        </div>
                                    </div>
                                </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-header">
                                    <span>profile</span>
                                    <div class="mobile-close">
                                        <h5>close</h5>
                                    </div>
                                </div>
                                <div class="dropdown-content">
                                    <ul class="friend-list">
                                        <li>
                                            <a href="profile.php">
                                                <div class="media">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                                    <div class="media-body">
                                                        <div>
                                                            <h5 class="mt-0">Profile</h5>
                                                            <h6>Profile preview &amp; settings</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="authentication.php?id=0" name="logoutBtn">
                                                <div class="media">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                                    <div class="media-body">
                                                        <div>
                                                            <h5 class="mt-0">log out</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        </ul>
                        <?php } ?>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->

    
    <!-- page body start -->
    <div class="page-body container-fluid custom-padding newsfeed-style7">

       <!-- sidebar panel start -->
        <div class="sidebar-panel">
            <div class="main-icon">
                <a href="#">
                    <i data-feather="grid" class="bar-icon"></i>
                </a>
            </div>
            <ul class="sidebar-icon">
                <li>
                    <a href="index.php">
                        <i data-feather="file" class="bar-icon"></i>
                        <div class="tooltip-cls">
                            <span>Dashboard</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="profile.php">
                        <i data-feather="users" class="bar-icon"></i>
                        <div class="tooltip-cls">
                            <span>Profile</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="development.php">
                        <i data-feather="star" class="bar-icon"></i>
                        <div class="tooltip-cls">
                            <span>Groups</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="workspace.php">
                        <i data-feather="edit" class="bar-icon"></i>
                        <div class="tooltip-cls">
                            <span>workspace</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="about.php">
                        <i data-feather="help-circle" class="bar-icon"></i>
                        <div class="tooltip-cls">
                            <span>About</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="timeline.php">
                        <i data-feather="calendar" class="bar-icon"></i>
                        <div class="tooltip-cls">
                            <span>Upcoming Features</span>
                        </div>
                    </a>
                </li>

                <li>
                    <a href="authentication.php?id=0">
                        <i data-feather="log-in" class="bar-icon"></i>
                            <div class="tooltip-cls">
                                <span><?php if (isset($_SESSION['loggedin']) and $_SESSION['loggedin'])  { ?> logout <?php } else { ?> login / signup <?php } ?></span>
                            </div>
                    </a>
                </li>
            </ul>
        </div>
        <!-- sidebar panel end -->

        <div class="page-center page-lg">

            <div class="container-fluid section-t-space px-0 layout-threecolumn">
                <div class="page-content">
                    <div class="content-left">
                        
                        </div>
                       
                    </div>
                    <div class="content-center content-full">
                        <div class="row">
                            <div class="col-xl-12">
                                    <div class="create-bg"  >
                                        <iframe src="about_alone.html" width="1620px" height="860px" style="margin-top: -40px;"></iframe>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   
    <!-- latest jquery-->
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <!-- popper js-->
    <script src="assets/js/popper.min.js"></script>

    <!-- slick slider js -->
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/custom-slick.js"></script>

    <!-- chatbox js -->
    <script src="assets/js/chatbox-2.js"></script>

    <!-- counter js -->
    <script src="assets/js/counter.js"></script>

    <!-- popover js for custom popover -->
    <script src="assets/js/popover.js"></script>

    <!-- feather icon js-->
    <script src="assets/js/feather.min.js"></script>

    <!-- emoji picker js-->
    <script src="assets/js/emojionearea.min.js"></script>

    <!-- Bootstrap js-->
    <script src="assets/js/bootstrap.js"></script>

    <!-- lazyload js-->
    <script src="assets/js/lazysizes.min.js"></script>

    <!-- theme setting js-->
    <script src="assets/js/theme-setting.js"></script>

    <!-- Theme js-->
    <script src="assets/js/script.js"></script>

    <script>
        feather.replace();
        $(".emojiPicker").emojioneArea({
            inline: true,
            placement: 'absleft',
            pickerPosition: "top left",
        });
    </script>

</body>

</html>