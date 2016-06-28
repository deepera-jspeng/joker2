<?php
require_once "menu.php";
function generate_breadcrumb($m) {
    $page = $_GET["page"];
    for ($i = 0; $i < count($m); $i++) {
        $active_menu = find_title_by_url($m[$i], $page) != null;
        if ($active_menu) {
            echo "<li>";
            echo "<i class='" . $m[$i]["icon"] . "'></i> ";
            echo "<a href='" . $m[$i]["url"] . "'>" . $m[$i]["title"] . "</a>";
            if (array_key_exists("submenu", $m[$i])) echo "<i class='fa fa-angle-right'></i>";
            echo "</li>";
            if (array_key_exists("submenu", $m[$i])) generate_breadcrumb($m[$i]["submenu"]);
            break;
        }
    }
}

?>
<!-- BEGIN BREADCRUMB -->
<h3 class="page-title"><?php echo find_title_by_url_from_array($menu, $_GET["page"]); ?></h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <?php generate_breadcrumb($menu); ?>
    </ul>
    <div class="page-toolbar">
        <div class="btn-group pull-right">
            <button type="button" class="btn btn-fit-height grey-salt" onclick="window.print();">
                &nbsp;<i class="fa fa-print"></i>
            </button>
        </div>
    </div>

</div>
<!-- END BREADCRUMB -->
