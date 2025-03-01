<head>
    <meta charset="utf-8">
    <title>Learner Log in</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
    <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" disabled="disabled">
    <style>
    .error {
        text-align: center;
        background: #f59595fb;
        color: #b92c2c;
        padding: 10px;
        width: 100%;
        border-radius: 5px;
    }
    </style>

</head>

<body class="authentication-bg"
    data-layout-config="{&quot;leftSideBarTheme&quot;:&quot;dark&quot;,&quot;layoutBoxed&quot;:false, &quot;leftSidebarCondensed&quot;:false, &quot;leftSidebarScrollable&quot;:false,&quot;darkMode&quot;:false, &quot;showRightSidebarOnStart&quot;: true}"
    data-leftbar-theme="dark" style="visibility: visible;">
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5">
                    <div class="card">

                        <!-- Logo -->
                        <div class="card-header text-center bg-white">
                            <a href="Administrator_login.php">
                                <span>
                                    <span><img src="assets/images/tboli.jpg" alt="" height="120" width="170"></span>
                                    <h3 class="text-black">Administrator Login</h3>
                                </span>
                            </a>
                        </div>

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <h4 class="text-dark-50 text-center pb-0 fw-bold">Sign In</h4>
                                <p class="text-muted mb-4">Enter your email address and password.</p>
                            </div>
                            <form action="#" method="POST">
                                <?php
                    session_start();
                    include 'dbcon.php';

                    if (isset($_POST['btnLogin'])) {
                        $email = $_POST['email'];
                        $password = $_POST['password'];

                        if (empty($email)) {
                            header("Location: Administrator_login.php?error=Email must be filled");
                            exit();
                        } elseif (empty($password)) {
                            header("Location: Administrator_login.php?error=Password must be filled");
                            exit();
                        } else {
                            $sql = "SELECT tbl_userinfo.user_id, tbl_accounts.email, tbl_accounts.password, tbl_user_level.level, tbl_user_status.status
                            FROM tbl_admin 
                            JOIN tbl_userinfo ON tbl_admin.user_id = tbl_userinfo.user_id
                            JOIN tbl_accounts ON tbl_admin.account_id = tbl_accounts.account_id
                            JOIN tbl_user_level ON tbl_admin.level_id = tbl_user_level.level_id
                            JOIN tbl_user_status ON tbl_admin.status_id = tbl_user_status.status_id
                            WHERE tbl_accounts.email = '$email'
                            AND tbl_user_status.status = 1 AND tbl_user_level.level = 'ADMIN'";

                            $result = mysqli_query($conn, $sql);

                            if ($result && mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_assoc($result);
                                $storedPasswordHash = $row['password'];
                                $level = $row['level'];

                                if (password_verify($password, $storedPasswordHash) && $row['status'] == 1) {
                                    $_SESSION['user_id'] = $row['user_id'];
                                    $_SESSION['email'] = $email;
                                    $_SESSION['user_level'] = $level;

                                    if ($level === 'ADMIN') {
                                        header("Location: admin_dashboard.php?Login Successfully");
                                        exit();
                                    }
                                }
                            }
                            header("Location: Administrator_login.phperror=Invalid email or password");
                            exit();
                        }
                    }
                    ?>
                                <div class="mb-3">
                                    <?php if (isset($_GET['error'])) { ?>
                                    <p class="error">
                                        <?php echo $_GET['error']; ?>
                                    </p>
                                    <?php } ?>
                                    <label for="emailaddress" class="form-label">Email</label>
                                    <input class="form-control" type="email" id="emailaddress" required=""
                                        placeholder="Enter your email" name="email">
                                </div>

                                <div class="mb-3">
                                    <a href="pages-recoverpw.html" class="text-muted float-end"><small>Forgot your
                                            password?</small></a>
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control"
                                            placeholder="Enter your password" name="password">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>



                                <div class="mb-3 mb-0 text-center">
                                    <button class="btn btn-primary" type="submit" name="btnLogin"> Log In </button>
                                </div>

                            </form>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <footer class="footer footer-alt">
        TBOLI LEARNING MANAGEMENT SYSTEM
    </footer>

    <!-- bundle -->
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>



</body>