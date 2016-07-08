<html>
<head>
    <?php
    require_once "components/common.php";
    require_once "components/lib.php";
    require_once "components/css.php";
    require_once "components/menu.php";
    $page = basename($_SERVER["SCRIPT_FILENAME"]);
    echo "<title>SmartCube | " . find_title_by_url_from_array($menu, $page) . "</title>";
    ?>
    <link href="css/feature.css" rel="stylesheet" type="text/css"/>
</head>
<body class="page-header-fixed page-quick-sidebar-over-content">
<div class="page-header -i navbar navbar-fixed-top">
    <div class="page-header-inner">
        <?php require_once "components/logo.php"; ?>
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <?php require_once "components/login.php"; ?>
            </ul>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="page-container">
    <?php echo curl($PROTOCOL . $DOMAIN . '/joker2/components/sidebar.php?page=' . $page . '&user=' . $_COOKIE['joker_username']); ?>
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <?php echo curl($PROTOCOL . $DOMAIN . '/joker2/components/breadcrumb.php?page=' . $page); ?>
            <!-- BEGIN PAGE -->
            <div class="row form-group">
                <div class="col-md-12">
                    <div class="input-group">
                        <span class="input-group-addon">Segment</span>
                        <select id="statistics" class="form-control">
                            <option value="70_75">70 & 75 (MV &ge; 45 YO)</option>
                            <option value="2">Model 2</option>
                            <option value="4">Model 4</option>
                        </select>
                        <span class="input-group-addon btn red" onclick="cust_search();">ID Search</span>
                    </div>
                </div>
            </div>
            <hr/>
            <div id="figure-container"></div>
            <!-- END PAGE -->
        </div>
    </div>
    <!-- END CONTENT -->
</div>
<?php require_once "components/footer.php"; ?>
<?php require_once "components/js.php"; ?>
<script src="lib/d3.min.js"></script>
<script src="js/figure.js" type="text/javascript"></script>
</body>
</html>
