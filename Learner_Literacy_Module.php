<?php
session_start();
$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- <title>Project Dashboard | Hyper - Responsive Bootstrap 5 Admin Dashboard</title> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <!-- App favicon -->
    <!-- <link rel="shortcut icon" href="assets/images/favicon.ico"> -->

    <!-- App css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
    <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" disabled="disabled">

</head>

<body <?php include('dataconfig.php') ?>>
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu">

            <!-- LOGO -->
            <a href="index.php" class="logo text-center logo-light">
                <span class="logo-lg">
                    <img src="assets/images/" alt="" height="16">
                </span>
                <span class="logo-sm">
                    <img src="assets/images/logo_sm.png" alt="" height="16">
                </span>
            </a>

            <!-- LOGO -->
            <a href="index.php" class="logo text-center logo-dark">
                <span class="logo-lg">
                    <img src="assets/images/logo-dark.png" alt="" height="16">
                </span>
                <span class="logo-sm">
                    <img src="assets/images/logo_sm_dark.png" alt="" height="16">
                </span>
            </a>

            <div class="h-100" id="leftside-menu-container" data-simplebar="init">
                <div class="simplebar-wrapper" style="margin: 0px;">
                    <div class="simplebar-height-auto-observer-wrapper">
                        <div class="simplebar-height-auto-observer"></div>
                    </div>
                    <div class="simplebar-mask">
                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                            <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;">
                                <div class="simplebar-content" style="padding: 0px;">

                                    <!--- Sidemenu -->
                                    <?php include('learnerSideMenu.php') ?>


                                    <!-- End Sidebar -->

                                    <div class="clearfix"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="simplebar-placeholder" style="width: 260px; height: 1512px;"></div>
                </div>
                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                    <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                </div>
                <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                    <div class="simplebar-scrollbar"
                        style="height: 344px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                </div>
            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                <div class="navbar-custom">
                    <ul class="list-unstyled topbar-menu float-end mb-0">
                        <li class="dropdown notification-list d-lg-none">
                            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#"
                                role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="dripicons-search noti-icon"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                                <form class="p-3">
                                    <input type="text" class="form-control" placeholder="Search ..."
                                        aria-label="Recipient's username">
                                </form>
                            </div>
                        </li>

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#"
                                role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="dripicons-bell noti-icon"></i>
                                <span class="noti-icon-badge"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg">

                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="m-0">
                                        <span class="float-end">
                                            <a href="javascript: void(0);" class="text-dark">
                                                <small>Clear All</small>
                                            </a>
                                        </span>Notification
                                    </h5>
                                </div>

                                <div style="max-height: 230px;" data-simplebar="init">
                                    <div class="simplebar-wrapper" style="margin: 0px;">
                                        <div class="simplebar-height-auto-observer-wrapper">
                                            <div class="simplebar-height-auto-observer"></div>
                                        </div>
                                        <div class="simplebar-mask">
                                            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                                <div class="simplebar-content-wrapper"
                                                    style="height: auto; overflow: hidden;">
                                                    <div class="simplebar-content" style="padding: 0px;">

                                                        <!-- All-->
                                                        <a href="javascript:void(0);"
                                                            class="dropdown-item text-center text-primary notify-item notify-all">
                                                            View All
                                                        </a>

                                                    </div>
                        </li>


                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown"
                                href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <span class="account-user-avatar">
                                    <img src="assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                                </span>

                                <?php
                                include 'dbcon.php';

                                if (isset($_SESSION['user_id'])) {
                                    $user_id = $_SESSION['user_id'];

                                    $sql = "SELECT tbl_userinfo.user_id, tbl_userinfo.firstname, tbl_userinfo.middlename, tbl_userinfo.lastname, tbl_user_level.level
                                                FROM tbl_learner
                                                JOIN tbl_userinfo ON tbl_learner.user_id = tbl_userinfo.user_id
                                                JOIN tbl_user_level ON tbl_learner.level_id = tbl_user_level.level_id
                                                WHERE tbl_user_level.level = 'LEARNER' AND tbl_userinfo.user_id = '$user_id'
                                                LIMIT 1;";

                                    $result = mysqli_query($conn, $sql);

                                    if ($result && mysqli_num_rows($result) > 0) {
                                        $row = mysqli_fetch_assoc($result);
                                        ?>
                                <span>
                                    <span class="account-user-name">
                                        <?php echo $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname']; ?>
                                    </span>
                                    <span class="account-position">
                                        <?php echo $row['level']; ?>
                                    </span>
                                </span>
                                <?php
                                    } else {
                                        echo "No records found in tbl_learner";
                                    }
                                } else {
                                    echo "No user ID provided";
                                }
                                ?>
                            </a>
                            <div
                                class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="mdi mdi-account-circle me-1"></i>
                                    <span>My Account</span>
                                </a>
                                <!-- item-->
                                <a href="learner_login.php?logout=true" class="dropdown-item notify-item">
                                    <i class="mdi mdi-logout me-1"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </li>

                    </ul>
                    <button class="button-menu-mobile open-left">
                        <i class="mdi mdi-menu"></i>
                    </button>
                    <div class="app-search dropdown d-none d-lg-block">
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control dropdown-toggle" placeholder="Search..."
                                    id="top-search">
                                <span class="mdi mdi-magnify search-icon"></span>
                                <button class="input-group-text btn-primary" type="submit">Search</button>
                            </div>
                        </form>

                        <div class="dropdown-menu dropdown-menu-animated dropdown-lg" id="search-dropdown">

                            <!-- item-->


                            <div class="notification-list">
                                <!-- item-->



                            </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end Topbar -->

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">

                                    <!-- <li class="breadcrumb-item"><a href="Teacher_index.php">Dashboard</a></li> -->

                                </ol>
                            </div>
                            <!-- <h4 class="page-title">TOPICS</h4> -->
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="col-">
                    <div class="card">
                        <?php
                        include 'dbcon.php';

                        $sql = "SELECT DISTINCT lesson_id, name, objective, level, type, added_by, lesson_files, status, lesson, firstname, middlename, lastname, title
                        FROM (
                            SELECT tbl_lesson.lesson_id, tbl_lesson.name, tbl_lesson.objective, tbl_lesson.level, tbl_lesson.type, tbl_lesson.added_by, tbl_lesson_files.lesson AS lesson_files,
                            tbl_lesson_files.status, tbl_lesson_files.lesson, tbl_userinfo.firstname, tbl_userinfo.middlename, tbl_userinfo.lastname, tbl_quiz_options.title
                            FROM tbl_lesson
                            LEFT JOIN tbl_lesson_files ON tbl_lesson.lesson_id = tbl_lesson_files.lesson_files_id AND tbl_lesson_files.status = 1
                            LEFT JOIN tbl_userinfo ON tbl_lesson.added_by = tbl_userinfo.user_id
                            LEFT JOIN tbl_quiz_options ON tbl_lesson.lesson_id = tbl_quiz_options.quiz_options_id
                        ) AS MergedData
                        WHERE type = 'Literacy'";

                        $result = mysqli_query($conn, $sql);

                        if (!$result) {
                            die("Error executing the query: " . mysqli_error($conn));
                        }

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                        <div class="row g-0 align-items-center">
                            <div class="col-md-2">
                                <img src="assets/images/small/small-4.jpg" class="card-img" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?php echo $row['type'] . ': ' . $row['name']; ?>
                                    </h5>
                                    <p><b>Objective: </b>
                                        <?php echo $row['objective']; ?>
                                    </p>
                                    <p><b>Level: </b>
                                        <?php echo $row['level']; ?>
                                    </p>
                                    <div class="tab-content">
                                        <?php
                                                $collapseID = "collapseExample" . $row['lesson_id'];
                                                ?>
                                        <div class="tab-pane show active"
                                            id="collapse-preview<?php echo $row['lesson_id']; ?>">
                                            <p>
                                                <a class="btn btn-primary collapsed" data-bs-toggle="collapse"
                                                    href="#<?php echo $collapseID; ?>" aria-expanded="false"
                                                    aria-controls="<?php echo $collapseID; ?>">
                                                    Manage Lesson
                                                </a>
                                            </p>
                                            <div class="collapse" id="<?php echo $collapseID; ?>" style="">
                                                <?php
                                                        $lesson_id = $row['lesson_id'];
                                                        $lesson = "SELECT tbl_lesson.lesson_id, tbl_lesson_files.lesson, tbl_lesson_files.status
                                                                            FROM tbl_lesson
                                                                            LEFT JOIN tbl_lesson_files ON tbl_lesson.lesson_id = tbl_lesson_files.lesson_id
                                                                            WHERE tbl_lesson_files.lesson_id = $lesson_id AND tbl_lesson_files.status = 1";

                                                        $quiz = "SELECT tbl_lesson.lesson_id, tbl_quiz_options.quiz_options_id, tbl_quiz_options.title
                                                                            FROM tbl_lesson
                                                                            LEFT JOIN tbl_quiz_options ON tbl_lesson.lesson_id = tbl_quiz_options.lesson
                                                                            WHERE tbl_quiz_options.lesson = $lesson_id";

                                                        $lesson_result = mysqli_query($conn, $lesson);
                                                        $quiz_result = mysqli_query($conn, $quiz);

                                                        if (!$lesson_result || !$quiz_result) {
                                                            die("Error" . mysqli_error($conn));
                                                        }

                                                        if (mysqli_num_rows($lesson_result) > 0) {
                                                            while ($lesson_row = mysqli_fetch_assoc($lesson_result)) {
                                                                ?>
                                                                <div class="mb-1">
                                                                    <span>
                                                                        <a href="teachers/lessons/<?php echo $lesson_row['lesson']; ?>"
                                                                            target="_blank">
                                                                            <?php echo substr($lesson_row['lesson'], 0, 15); ?>
                                                                        </a>
                                                                    </span>
                                                                </div>
                                                                <?php
                                                            }
                                                        }

                                                        if (mysqli_num_rows($quiz_result) > 0) {
                                                            while ($quiz_row = mysqli_fetch_assoc($quiz_result)) {
                                                                ?>
                                                <div class="mb-1">
                                                    <span>
                                                        <a
                                                            href="Learner_InstructionsQuiz.php?quiz_options_id=<?php echo $quiz_row['quiz_options_id'] ?>">
                                                            <?php echo $quiz_row['title']; ?>
                                                        </a>
                                                    </span>
                                                </div>
                                                <?php
                                                            }
                                                        }
                                                        ?>
                                            </div>
                                        </div> <!-- end preview-->

                                        <div class="tab-pane" id="collapse-code2">
                                            <pre class="mb-0"> <!-- Your code here -->
                                                                                        </pre>
                                        </div> <!-- end preview code-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>




            </div> <!-- container -->

        </div> <!-- content -->



    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->


    <!-- Start right sidebar -->
    <?php #include('Teacher_Settings.php'); ?>
    <!-- End right side bar -->

    <!-- bundle -->
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>

    <!-- third party js -->
    <script src="assets/js/vendor/Chart.bundle.min.js"></script>
    <!-- third party js ends -->

    <!-- demo app -->
    <script src="assets/js/pages/demo.dashboard-projects.js"></script>
    <!-- end demo js-->







</body>

</html>