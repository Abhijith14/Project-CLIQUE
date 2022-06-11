<?php

include 'getuser.php';

include 'db.php';

$sql = "SELECT * FROM post ORDER BY id DESC";
$post_result = $conn->query($sql);

if (isset($_SESSION['userid'])){
    $currUser = $_SESSION['userid'];
    $sqlP = "SELECT * FROM post WHERE user_id = $currUser";
    $post_all = $conn->query($sqlP);
    $user_post_count = $post_all->num_rows;

}

function get_date_diff($date_string){
    date_default_timezone_set("Asia/Kolkata");
    $d1=strtotime($date_string);
    $min = ceil((time() - $d1)/60);
    $hour = ceil((time() - $d1)/60/60) - 1;
    $days = ceil((time() - $d1)/60/60/24) - 1;

    $status = "";

    if ($min < 3){
        $status =  "Updated Now";
    }
    elseif ($min <= 60){
        $status = "$min minutes";
    }
    else{
        if ($hour <= 24){
            $status = "$hour hours";
        }
        else{
            $status = "$days days";
        }
    }


    return $status;

}



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
                        <input type="text" class="form-control search-type" placeholder="Search...">
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
                    <a href="<?php if (isset($_SESSION['loggedin']) and $_SESSION['loggedin'])    { ?> authentication.php?id=0 <?php } else { ?>login.php<?php } ?>">
                        <i data-feather="log-in" class="bar-icon"></i>
                            <div class="tooltip-cls">
                                <span><?php if (isset($_SESSION['loggedin']) and $_SESSION['loggedin'])    { ?> logout <?php } else { ?> login / signup <?php } ?></span>
                            </div>
                    </a>
                </li>
            </ul>
        </div>
        <!-- sidebar panel end -->

        <div class="page-center page-lg" style="margin-left: 100px;">

            

            <div class="container-fluid section-t-space px-0 layout-threecolumn">
                <div class="page-content">
                    <?php if (isset($_SESSION['loggedin']) and $_SESSION['loggedin'])  { ?>
                    <div class="content-left">
                        <!-- profile box -->
                        <div class="profile-box" >
                            <div class="profile-content">
                                <a href="profile.php" class="image-section">
                                    <div class="profile-img">
                                        <div>
                                            <img src="assets/images/user-sm/<?php if ($gender == 0) { echo "guy.png"; } else { echo "lady.png"; } ?>"
                                                class="img-fluid blur-up lazyload bg-img" alt="profile">
                                        </div>
                                        <span class="stats">
                                            <img src="assets/images/icon/verified.png"
                                                class="img-fluid blur-up lazyload" alt="verified">
                                        </span>
                                    </div>
                                </a>
                                <div class="profile-detail">
                                    <a href="profile.php">
                                        <h2><?php echo $name; ?></h2>
                                    </a>
                                    <h5><?php echo $email; ?></h5>
                                    <div class="counter-stats">
                                        <ul id="counter">
                                            <li>
                                                <h3 class="counter-value" data-count="0">0</h3>
                                                <h5>followers</h5>
                                            </li>
                                            <li>
                                                <h3 class="counter-value" data-count="<?php echo $user_post_count; ?>">0</h3>
                                                <h5>Posts</h5>
                                            </li>
                                            <li>
                                                <h3 class="counter-value" data-count="0">0</h3>
                                                <h5>Memes</h5>
                                            </li>
                                        </ul>
                                    </div>
                                    <a href="profile.php" class="btn btn-solid">view profile</a>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    <?php } ?>
                    <div class="content-center content-full">
                        <div class="row">
                            <?php if (isset($_SESSION['loggedin']) and $_SESSION['loggedin'])  { ?>
                            <div class="col-xl-6">
                                <!-- create post -->
                                <div class="create-post">

                                	<form action="post_content.php" method="POST" id="myForm"  enctype="multipart/form-data">

                                		<input type="hidden" name="user-name" value="<?php echo $name; ?>">

                                		<input type="hidden" name="user-gender" value="<?php echo $gender; ?>">

                                    <div class="static-section">
                                        <div class="card-title">
                                            <h3>create post</h3>
                                            <div class="settings">
                                                <div class="setting-btn ms-2 setting-dropdown no-bg">
                                                    <div class="btn-group custom-dropdown arrow-none dropdown-sm">
                                                        <div role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal icon icon-font-color iw-14"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-right custom-dropdown">
                                                            <ul>
                                                                <li>
                                                                    <a href="workspace.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit icon-font-light iw-16 ih-16"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>Generate Memes</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="search-input input-style icon-right">
                                            <input type="text" class="form-control enable" placeholder="write something here..">
                                        </div>
                                    </div>
                                    <div class="create-bg">
                                        <div class="bg-post" id="bg-post">
                                            <div class="input-sec">
                                                <input type="text" class="form-control enable" placeholder="write something here..">
                                                <div class="close-icon">
                                                    <a href="javascript:void(0)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x iw-20 ih-20"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="gradient-bg">
                                            <li onclick="clickGradient('gr-1')" class="gr-1"></li>
                                            <li onclick="clickGradient('gr-2')" class="gr-2"></li>
                                            <li onclick="clickGradient('gr-3')" class="gr-3"></li>
                                            <li onclick="clickGradient('gr-4')" class="gr-4"></li>
                                            <li onclick="clickGradient('gr-5')" class="gr-5"></li>
                                            <li onclick="clickGradient('gr-6')" class="gr-6"></li>
                                            <li onclick="clickGradient('gr-7')" class="gr-7"></li>
                                            <li onclick="clickGradient('gr-8')" class="gr-8"></li>
                                            <li onclick="clickGradient('gr-9')" class="gr-9"></li>
                                            <li onclick="clickGradient('gr-10')" class="gr-10"></li>
                                            <li onclick="clickGradient('gr-11')" class="gr-11"></li>
                                            <li onclick="clickGradient('gr-12')" class="gr-12"></li>
                                            <li onclick="clickGradient('gr-13')" class="gr-13"></li>
                                            <li onclick="clickGradient('gr-14')" class="gr-14"></li>
                                            <li onclick="clickGradient('gr-15')" class="gr-15"></li>
                                        </ul>
                                    </div>
                                    <div class="options-input" id="additional-input">
                                        <a id="icon-close" href="javascript:void(0)">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x iw-15 icon-font-light icon-close"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                        </a>
                                        <div class="search-input feeling-input">
                                            <input type="text" class="form-control enable" list="feelings" placeholder="How Are You Feeling?">
                                            <datalist id="feelings">
                                                <option value="Happy">
                                                </option><option value="Sad">
                                                </option><option value="Angry">
                                                </option><option value="Worried">
                                                </option><option value="Shy">
                                                </option><option value="Excited">
                                                </option><option value="Surprised">
                                                </option><option value="Silly">
                                                </option><option value="Embarrassed">
                                            </option></datalist>
                                            <a href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-smile iw-15 icon-left icon-font-light"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line></svg>
                                            </a>
                                        </div>
                                        <div class="search-input place-input">
                                            <input type="text" class="form-control" placeholder="search for places...">
                                            <a href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin iw-15 icon-left icon-font-light"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                            </a>
                                        </div>
                                        <div class="search-input friend-input">
                                            <input type="text" class="form-control" list="friends" placeholder="search your friends...">
                                            <a href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag iw-15 icon-left icon-font-light"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7.01" y2="7"></line></svg>
                                            </a>
                                        </div>
                                    </div>
                                    <ul class="create-btm-option">
                                        <li>
                                            <input class="choose-file" type="file" name="post_file" id="post_file">
                                            <h5><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-camera iw-14"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>album</h5>
                                        </li>
                                        <li id="feeling-btn">
                                            <h5><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-smile iw-15"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line></svg>feelings &amp; acitivity</h5>
                                        </li>
                                        <li id="checkin-btn">
                                            <h5><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin iw-15"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>check in</h5>
                                        </li>
                                        <li id="friends-btn">
                                            <h5><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag iw-15"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7.01" y2="7"></line></svg>tag friends</h5>
                                        </li>
                                    </ul>
                                    <div id="post-btn" class="post-btn" style="display: block !important;">
                                    	<img style="margin-top: 20px; margin-left: 110px;" width="300" alt="post-preview" class="d-none" id="output">
                                        <button onclick="document.getElementById('myForm').submit();" id="postBtn" name="postBtn" disabled="true" style="cursor: default;">post</button>
                                    </div>
                                </form>
                                </div>
                            </div>

                        <?php } ?>

                            <div class="col-xl-6">
                                <!-- category box starts -->
                                    <div class="profile-box" >
                                        <div class="profile-content">
                                            <div class="profile-detail">
                                                <a href="profile.php">
                                                    <h2>Available Languages</h2>
                                                </a>
                                                <div class="description">
                                                    <p>Currently we provide 5 different lanuguage support for meme templates.</p>
                                                </div>
                                                <a href="gallery.php?cat=1" class="btn btn-solid">English</a>
                                                <a href="gallery.php?cat=2" class="btn btn-solid">Tamil</a>
                                                <a href="gallery.php?cat=3" class="btn btn-solid">Malayalam</a>
                                                <a href="gallery.php?cat=4" class="btn btn-solid">Telugu</a>
                                                <a href="gallery.php?cat=5" class="btn btn-solid">Hindi</a>
                                            </div>
                                        </div>
                                    </div>
                                <!-- category box ends -->
                            </div>
                            <?php if (isset($_SESSION['loggedin']) and $_SESSION['loggedin'] == false)  { ?>
                            <div class="col-xl-6">
                                <!-- category box starts -->
                                    <div class="profile-box" >
                                        <div class="profile-content">
                                            <div class="profile-detail">
                                                <a href="profile.php">
                                                    <h2>Generate your own meme !</h2>
                                                </a>
                                                <div class="description">
                                                    <p>Test your creativity by using Clique meme generation tools !</p>
                                                </div>
                                                <a href="workspace.php" class="btn btn-solid">Generate Meme</a>
                                            </div>
                                        </div>
                                    </div>
                                <!-- category box ends -->
                            </div>
                            <?php } ?>
                        </div>
                        <div class="row">

                        	<?php
                                $counter_variable = 0;
                        	while($row = $post_result->fetch_assoc()) {
				                
                        	?>


                        	<?php if($counter_variable % 2 === 0) { ?><div style="height: 30px;"></div> <?php } ?>
                        	<div class="col-xl-6">
                                <!-- category box starts -->
                                    <div class="profile-box" >
                                        <div class="profile-content">
                                            <div class="profile-detail">
                                            	<img src="assets/images/<?php echo $row['profile_pic']; ?>" width="40" height="40" style="border-radius: 50%; float: left; margin-top: -30px;">
                                                    <h2 style="font-size: 15px; text-transform: uppercase; margin-top: -25px; float: left; margin-left: 15px;"><?php echo $row['name']; ?></h2>
                                                <h5 style="float: left; margin-left: 15px; margin-top: -5px;"><?php echo get_date_diff($row['status']); ?></h5>
                                                <br>
                                                <img src="<?php echo $row['post_pic']; ?>" width="300" style="margin-top: 20px;">
                                            </div>
                                        </div>
                                    </div>
                                <!-- category box ends -->
                            </div>

                        <?php $counter_variable = $counter_variable + 1; } ?>
                        <div style="height: 30px;"></div>
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


  //       $("document").ready(function(){

		//     $("#post_file").change(function() {
		//         var image_out = document.getElementById('output');
		//         image_out.src =  URL.createObjectURL(this.target.files[0]);
		//  		image_out.classList.remove("d-none");
		//     });
		// });

		function readURL(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();

		        reader.onload = function (e) {
		            $('#output').attr('src', e.target.result);
		        }

		        reader.readAsDataURL(input.files[0]);
		    }
		}

		$("#post_file").change(function(){
			$("#output").removeClass("d-none");
			$("#postBtn").prop('disabled', false);
			$("#postBtn").css('cursor', 'pointer'); 
		    readURL(this);
		});

    </script>

</body>

</html>