<?php
require_once "menu.php";
function generate_menu($m, $title_mode)
{
    $page = $_GET["page"];
    for ($i = 0; $i < count($m); $i++) {
        if ($m[$i]["admin"] && $_GET['user'] != "admin") continue;
        $active_menu = find_title_by_url($m[$i], $page) != null;
        $li_class = "";
        if ($i == 0) $li_class .= "start"; elseif ($i == count($m) - 1) $li_class .= "last";
        if ($active_menu) $li_class .= " active open";
        echo "<li class='" . $li_class . "'>";
        echo "<a href='" . $m[$i]["url"] . "'" . ($title_mode ? " style='height:3em;'" : "") . ">";
        echo "<i class='" . $m[$i]["icon"] . "'></i> ";
        if ($title_mode) {
            echo "<span class='title'>" . $m[$i]["title"] . "</span>";
            if ($active_menu) echo "<span class='selected'></span>";
        } else echo $m[$i]["title"];
        if (array_key_exists("submenu", $m[$i])) echo "<span class='arrow'></span>";
        echo "</a>";
        if (array_key_exists("submenu", $m[$i])) {
            echo "<ul class='sub-menu'>";
            generate_menu($m[$i]["submenu"], false);
            echo "</ul>";
        }
        echo "</li>";
    }
}

?>
<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="sidebar-toggler-wrapper" style="margin-bottom:15px;">
                <div class="sidebar-toggler"></div>
            </li>
            <?php generate_menu($menu, true); ?>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>
<!-- END SIDEBAR -->
