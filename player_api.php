<?php
header('Content-Type: application/json');

$action = isset($_GET['action']) ? $_GET['action'] : '';

if ($action == 'get_live_streams') {
    echo json_encode([
        [
            "stream_id" => 1,
            "name" => "NASA TV",
            "stream_type" => "live",
            "stream_url" => "<unsafe_url>https://ntv1.akamaized.net/hls/live/2014075/NASA-NTV1-Public/master.m3u8</unsafe_url>"
        ]
    ]);
} elseif ($action == 'get_vod_streams') {
    echo json_encode([
        [
            "stream_id" => 100,
            "name" => "Night of the Living Dead",
            "stream_type" => "movie",
            "container_extension" => "mp4",
            "direct_source" => "<unsafe_url>https://archive.org/download/night_of_the_living_dead/night_of_the_living_dead_512kb.mp4</unsafe_url>"
        ]
    ]);
} else {
    // Default Authentication Response
    echo json_encode([
        "user_info" => ["username" => "demo", "status" => "Active", "exp_date" => "1999999999"],
        "server_info" => ["url" => "https://" . $_SERVER['HTTP_HOST'], "port" => "80"]
    ]);
}
?>