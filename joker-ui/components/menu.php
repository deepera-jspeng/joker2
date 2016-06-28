<?php
$menu = [[
    "title" => "Dashboard",
    "icon" => "icon-home",
    "url" => "dashboard.php",
], [
    "title" => "Models",
    "icon" => "icon-rocket",
    "url" => "javascript:void(0)",
    "submenu" => [[
        "title" => "Figure Example",
        "icon" => "icon-list",
        "url" => "figure.php"
    ]]
]];

function find_title_by_url($m, $url) {
    if ($m["url"] == $url) return $m["title"];
    if (array_key_exists("submenu", $m)) {
        for ($i = 0; $i < count($m["submenu"]); $i++) {
            $title = find_title_by_url($m["submenu"][$i], $url);
            if ($title != null) return $m["title"] . " : " . $title;
        }
    }
    return null;
}

function find_title_by_url_from_array($m, $url) {
    for ($i = 0; $i < count($m); $i++) {
        $title = find_title_by_url($m[$i], $url);
        if ($title != null) {
            return $title;
        }
    }
    return null;
}
