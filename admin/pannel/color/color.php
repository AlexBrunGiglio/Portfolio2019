<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="description" content="Portfolio Alexandre">
    <meta name="Alexandre" content="Portfolio">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title>Administration</title>
    <!-- STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/plugins.css" />
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link rel="apple-touch-icon" sizes="57x57" href="../img/icon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../img/icon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../img/icon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../img/icon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../img/icon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../img/icon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../img/icon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../img/icon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../img/icon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="../img/icon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../img/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../img/icon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../img/icon/favicon-16x16.png">
    <link rel="manifest" href="../js/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!--[if lt IE 9]> <script type="text/javascript" src="js/modernizr.custom.js"></script> <![endif]-->
    <!-- /STYLES -->

</head>

<body>

    <!-- WRAPPER ALL -->
    <div class="arlo_tm_wrapper_all">

        <div id="arlo_tm_popup_blog">
            <div class="container">
                <div class="inner_popup scrollable"></div>
            </div>
            <span class="close"><a href="#"></a></span>
        </div>

        <!-- PRELOADER -->
        <div class="arlo_tm_preloader">
            <div class="spinner_wrap">
                <div class="spinner"></div>
            </div>
        </div>
        <!-- /PRELOADER -->
        <?php
        $parameters = parse_ini_file('../../db.ini');
        $connect = new PDO($parameters['host'], $parameters['user'], $parameters['pass']);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $connect->prepare("SELECT * FROM color WHERE id = 1");
        $sql->execute();
        while ($row = $sql->fetch()) {
            ?>

        <!-- MOBILE MENU -->
        <div class="arlo_tm_mobile_header_wrap" style="background-color : <?php echo $row['color'] ?>">
            <div class="main_wrap" style="background-color : <?php echo $row['color'] ?>">
                <div class="logo">
                    <img src="img/logo/mobile_logo3.png" alt="" />
                </div>
                <div class="arlo_tm_trigger">
                    <div class="hamburger hamburger--collapse-r">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="arlo_tm_mobile_menu_wrap" style="background-color : <?php echo $row['color'] ?>">
                <div class="mob_menu">
                    <ul class="anchor_nav">
                        <li><a href="../../index.php">Accueil</a></li>
                        <li><a href="../../pannel/description/description.php">Description</a></li>
                        <li><a href="../../pannel/competences/competences.php">Compétences</a></li>
                        <li><a href="../../pannel/experiences/experience.php">Expériences Pro</a></li>
                        <li><a href="../../pannel/projets/projets.php">Projets</a></li>
                        <li><a href="../../pannel/citations/citations.php">Citations</a></li>
                        <li><a href="../../pannel/blog/blog.php">Blog</a></li>
                        <li><a href="../../pannel/color/color.php">Apparence site</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /MOBILE MENU -->

        <!-- CONTENT -->
        <div class="arlo_tm_content">

            <!-- LEFTPART -->
            <div class="arlo_tm_leftpart_wrap" style="background-color : <?php echo $row['color'] ?>">

                <div class="leftpart_inner">
                    <div class="logo_wrap" style="background-color : <?php echo $row['color'] ?>">
                        <a href="../"><img src="../img/logo/desktop-logo4.png" alt="logo" /></a>
                    </div>
                    <?php } ?>
                    <div class="menu_list_wrap">
                        <ul class="anchor_nav">
                            <li><a href="../../index.php">Accueil</a></li>
                            <li><a href="../../pannel/description/description.php">Description</a></li>
                            <li><a href="../../pannel/competences/competences.php">Compétences</a></li>
                            <li><a href="../../pannel/experiences/experience.php">Expériences Pro</a></li>
                            <li><a href="../../pannel/projets/projets.php">Projets</a></li>
                            <li><a href="../../pannel/citations/citations.php">Citations</a></li>
                            <li><a href="../../pannel/blog/blog.php">Blog</a></li>
                            <li><a href="../../pannel/color/color.php">Apparence site</a></li>
                        </ul>
                    </div>
                    <a class="arlo_tm_resize" href="#"><i class="xcon-angle-left"></i></a>
                </div>
            </div>
            <!-- /LEFTPART -->

            <!-- RIGHTPART -->
            <div class="arlo_tm_rightpart">
                <div class="rightpart_inner">
                    <div class="arlo_tm_portfolio_single_wrap">
                        <div class="container">
                            <div class="arlo_tm_title_holder">
                                <h3>Interface</h3>
                                <span>Vous pouvez modifier les couleurs</span>
                            </div>
                            <form action="colorChange.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="texte" class=" form-control-label">Couleur actuelle :</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <?php
                                        $parameters = parse_ini_file('../../db.ini');
                                        $connect = new PDO($parameters['host'], $parameters['user'], $parameters['pass']);
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql = $connect->prepare("SELECT * FROM color WHERE id='1'");
                                        $sql->execute();
                                        while ($row = $sql->fetch()) {
                                            echo $row['color'];
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="texte" class=" form-control-label">Nouvelle couleur :</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="color" id="color" rows="9" placeholder="Hexa..." class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fas fa-check"></i> Enregistrer
                                    </button>
                                    <button type="reset" class="btn btn-danger btn-sm">
                                        <i class="fa fa-ban"></i> Annuler
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /RIGHTPART -->

    <a class="arlo_tm_totop" href="#"></a>

    </div>
    </div>
    <!-- / WRAPPER ALL -->

    <!-- SCRIPTS -->
    <script src="../js/jquery.js"></script>
    <!--[if lt IE 10]> <script type="text/javascript" src="js/ie8.js"></script> <![endif]-->
    <script src="../js/plugins.js"></script>
    <script src="../js/init.js"></script>
    <!-- /SCRIPTS -->

</body>

</html>