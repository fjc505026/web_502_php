
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="../format/mainpage.css">
        <!-- <title>Course Management System</title> -->
</head>
<body class="bg-secondary" id="mainbody" onload="showData()">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-sm  bg-danger navbar-dark">
            <a class="navbar-brand" href="../index.php">
                <img src="../images/logo.png" alt="logo">
            </a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php"><b>HOME</b> </a>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <div class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <b>Unit</b>
                        </div>
                        <div class="dropdown-menu gdropdown-menu-left bg-danger text-white">
                            <?php if ($_SESSION['access']==1) { //only student access?>
                            <a class="dropdown-item nav-link" href="../php/UnitEnrollment.php"><b>Unit Enrolment</b></a>
                            <?php }?>
                            <a class="dropdown-item nav-link" href="../php/UnitDetail.php"><b>Unit Handbook(Detail)</b></a>
                            <?php if ($_SESSION['access']>=4) { //only UC and DC access?>
                            <a class="dropdown-item nav-link" href="../php/UnitMagmnt.php"><b>Unit Management</b></a>
                            <?php }?>
                        </div>
                    </div>
                </li>
                <?php if ($_SESSION['access']==1) {//student?>
                <li class="nav-item">
                    <a class="nav-link priority" id="MyTimetable_hylink"><b>MyTimetable</b></a>
                </li>
                <?php }?>

                <?php if ($_SESSION['access']==5) { //UC ?>
                <li class="nav-item ">
                    <a class="nav-link priority"  id="MasterStaff_hylink"><b>Staff</b></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link priority" id="MasterUnit_hylink"><b>UnitsMaster</b></a>
                </li>
                <?php }?>

            </ul>
            <div id="div1" class="row">
                <b><a id="Logged_banner" class="text-light afterlog" href="../php/info.php"></a></b>
                <button  id="lg_btn" type="button" class="btn btn-success beforelog" data-toggle="modal" data-target="#log_modal"><b>Log in</b></button>
                <button  id="lg_out" type="button" class="btn text-light btn-warning afterlog" data-toggle="modal" data-target="#logout_modal" ><b>Log out</b></button>
                <button  id="rg_btn" type="button" class="btn btn-primary beforelog" data-toggle="modal" data-target="#roleSelect"><b>Register</b></button>
            </div>
        </nav>



