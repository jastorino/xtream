<?php
header('Content-Type: application/json');

$action = isset($_GET['action']) ? $_GET['action'] : 'auth';
$user = isset($_GET['username']) ? $_GET['username'] : 'unknown';

// Log the incoming request
error_log("IPTV Request - User: $user, Action: $action");

if ($action == 'get_live_streams') {
    error_log("Found Action: $action");
    echo json_encode([
        [
            "category_id" => "1000",
            "stream_id" => 1,
            "name" => "NASA TV",
            "stream_type" => "live",
            "stream_icon" => "https://upload.wikimedia.org/wikipedia/commons/e/e5/NASA_logo.svg",
            "direct_source" => "https://content.uplynk.com/channel/3324f2467c414329b3b0cc5cd987b6be.m3u8"
        ],
        [
            "category_id" => "1000",
            "stream_id" => 2,
            "name" => "Red Bull TV",
            "stream_type" => "live",
            "stream_icon" => "https://upload.wikimedia.org/wikipedia/commons/3/34/Red_Bull_TV_logo.svg",
            "stream_url" => "https://rbmn-live.akamaized.net/hls/live/590964/BoRB-AT/master.m3u8"
        ]
    ]);
} elseif ($action == 'get_vod_streams') {
    error_log("Found Action: $action");
    echo json_encode([
        [
            "category_id" => "3000",
            "stream_id" => 100,
            "name" => "My Man godfrey",
            "stream_type" => "movie",
            "container_extension" => "mp4",
            "stream_icon" => "https://images.justwatch.com/poster/35151046/s332/my-man-godfrey.avif",
            "direct_source" => "https://dn600307.us.archive.org/0/items/MyManGodfrey1936/MyManGodfrey1936_512kb.mp4"
        ]
    ]);
} elseif ($action == 'get_vod_info') {
    $vod_id = isset($_GET['vod_id']) ? $_GET['vod_id'] : 0;
    
    switch ($vod_id) {
    case '100':
        echo json_encode([
            "info" => [
                "plot" => "Fifth Avenue socialite Irene Bullock needs a forgotten man to win a scavenger hunt, and no one is more forgotten than Godfrey Park, who resides in a dump by the East River. Irene hires Godfrey as a servant for her riotously unhinged family, to the chagrin of her spoiled sister, Cornelia, who tries her best to get Godfrey fired. As Irene falls for her new butler, Godfrey turns the tables and teaches the frivolous Bullocks a lesson or two.",
                "releasedate" => "1936",
                "rating" => "7.9",
                "genre" => "Comedy, Romance",
                "duration" => "1h 33m",
                "movie_image" => "https://images.justwatch.com/poster/35151046/s332/my-man-godfrey.avif"
            ]
        ]);    
        break;        
    default:
        // Code for authentication (if no action matches)
        break;
    }
} elseif ($action == 'get_series') {
    error_log("Found Action: $action");
} elseif ($action == 'get_vod_categories') {
    error_log("Found Action: $action");
    echo json_encode([
        [
            "category_id" => "3000",
            "category_name" => "Oldies",
            "parent_id" => 0
        ]
    ]);    
} elseif ($action == 'get_live_categories') {
    error_log("Found Action: $action");
    echo json_encode([
        [
            "category_id" => "1000",
            "category_name" => "Public Broadcast",
            "parent_id" => 0
        ]
    ]);
} elseif ($action == 'get_series_categories') {
    error_log("Found Action: $action");
    echo json_encode([
        [
            "category_id" => "2000",
            "category_name" => "Oldies",
            "parent_id" => 0
        ]
    ]);
} else {
    echo json_encode([
        "user_info" => ["username" => "demo", "status" => "Active", "exp_date" => "1999999999"],
        "server_info" => ["url" => "https://" . $_SERVER['HTTP_HOST'], "port" => "443"]
    ]);
}
?>