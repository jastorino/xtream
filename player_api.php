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
            "stream_url" => "<unsafe_url>https://ntv1.akamaized.net/hls/live/2014075/NASA-NTV1-Public/master.m3u8</unsafe_url>"
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
            "direct_source" => "<unsafe_url>https://cdndirector.dailymotion.com/cdn/manifest/video/x99kkr2.m3u8?sec=a9Dp7tJ1wevzR6lRUuBXF2o9XBXXhu28vyPJT-K6cVy_-uo5_jflVqfJMnkyErgw-AVVNg9K6QifdRSY7pUkLE6fRNDYssnIbLjxqszVPQU</unsafe_url>",
            "info" => [
                "plot" => "Fifth Avenue socialite Irene Bullock needs a forgotten man to win a scavenger hunt, and no one is more forgotten than Godfrey Park, who resides in a dump by the East River. Irene hires Godfrey as a servant for her riotously unhinged family, to the chagrin of her spoiled sister, Cornelia, who tries her best to get Godfrey fired. As Irene falls for her new butler, Godfrey turns the tables and teaches the frivolous Bullocks a lesson or two.",
                "releasedate" => "1936",
                "rating" => "7.9",
                "movie_image" => "https://images.justwatch.com/poster/35151046/s332/my-man-godfrey.avif"
            ]
        ]
    ]);
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