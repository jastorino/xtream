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
            "direct_source" => "https://rbmn-live.akamaized.net/hls/live/590964/BoRB-AT/master.m3u8"
        ],
        [
            "category_id" => "1000",
            "stream_id" => 3,
            "name" => "DW English",
            "stream_type" => "live",
            "stream_icon" => "https://upload.wikimedia.org/wikipedia/commons/9/93/Deutsche_Welle_logo.svg",
            "direct_source" => "https://dwamdstream102.akamaized.net/hls/live/2015525/dwstream102/master.m3u8"
        ],
        [
            "category_id" => "1000",
            "stream_id" => 4,
            "name" => "France 24 English",
            "stream_type" => "live",
            "stream_icon" => "https://upload.wikimedia.org/wikipedia/commons/b/b5/France_24_logo.svg",
            "direct_source" => "https://f24hls-i.akamaihd.net/hls/live/221193/F24_EN_LO_HLS/master.m3u8"
        ],
        [
            "category_id" => "1000",
            "stream_id" => 5,
            "name" => "Sky News",
            "stream_type" => "live",
            "stream_icon" => "https://upload.wikimedia.org/wikipedia/commons/e/e7/Sky_News_2020.svg",
            "direct_source" => "https://skynews.live.cdn.uplynk.com/channel/3324f2467c414329b3b0cc5cd987b6be.m3u8"
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
    echo json_encode([
        [
            "category_id" => "2000",
            "series_id" => 5000,
            "name" => "The Beverly Hillbillies",
            "cover" => "https://archive.org/services/img/TheBeverlyHillbilliesTheClampettsStrikeOil",
            "plot" => "A poor backwoods family strikes oil and moves to Beverly Hills."
        ],
        [
            "category_id" => "2000",
            "series_id" => 5001,
            "name" => "The Dick Van Dyke Show",
            "cover" => "https://archive.org/services/img/TheDickVanDykeShowTheTwizzle",
            "plot" => "The misadventures of a TV writer both at work and at home."
        ],
        [
            "category_id" => "2000",
            "series_id" => 5002,
            "name" => "Bonanza",
            "cover" => "https://archive.org/services/img/BonanzaTheBloodLine",
            "plot" => "The adventures of the Cartwright family on their Nevada ranch."
        ],
        [
            "category_id" => "2000",
            "series_id" => 5003,
            "name" => "The Lucy Show",
            "cover" => "https://archive.org/services/img/TheLucyShowLucyAndTheMissingStamp",
            "plot" => "The comic misadventures of a widow and her friend."
        ],
        [
            "category_id" => "2000",
            "series_id" => 5004,
            "name" => "Sherlock Holmes (1954)",
            "cover" => "https://archive.org/services/img/SherlockHolmesTheCaseOfTheCunninghamHeritage",
            "plot" => "The classic detective solves mysteries in Victorian London."
        ]
    ]);
} elseif ($action == 'get_series_info') {
case 'get_series_info':
        $series_id = isset($_GET['series_id']) ? (int)$_GET['series_id'] : 0;
        
        $response = ["info" => [], "seasons" => [], "episodes" => []];
        
        switch ($series_id) {
            case 5000: // The Beverly Hillbillies
                $response = [
                    "info" => ["name" => "The Beverly Hillbillies", "plot" => "A poor backwoods family strikes oil."],
                    "seasons" => [["season_number" => 1, "episode_count" => 1]],
                    "episodes" => ["1" => [["id" => 50001, "title" => "The Clampetts Strike Oil", "season" => 1, "episode_num" => 1, "direct_source" => "https://archive.org/download/TheBeverlyHillbilliesTheClampettsStrikeOil/TheBeverlyHillbilliesTheClampettsStrikeOil.mp4"]]]
                ];
                break;
            case 5001: // The Dick Van Dyke Show
                $response = [
                    "info" => ["name" => "The Dick Van Dyke Show", "plot" => "The misadventures of a TV writer."],
                    "seasons" => [["season_number" => 1, "episode_count" => 1]],
                    "episodes" => ["1" => [["id" => 50011, "title" => "The Twizzle", "season" => 1, "episode_num" => 1, "direct_source" => "https://archive.org/download/TheDickVanDykeShowTheTwizzle/TheDickVanDykeShowTheTwizzle.mp4"]]]
                ];
                break;
            case 5002: // Bonanza
                $response = [
                    "info" => ["name" => "Bonanza", "plot" => "The adventures of the Cartwright family."],
                    "seasons" => [["season_number" => 1, "episode_count" => 1]],
                    "episodes" => ["1" => [["id" => 50021, "title" => "The Blood Line", "season" => 1, "episode_num" => 1, "direct_source" => "https://archive.org/download/BonanzaTheBloodLine/BonanzaTheBloodLine.mp4"]]]
                ];
                break;
            case 5003: // The Lucy Show
                $response = [
                    "info" => ["name" => "The Lucy Show", "plot" => "The comic misadventures of a widow."],
                    "seasons" => [["season_number" => 1, "episode_count" => 1]],
                    "episodes" => ["1" => [["id" => 50031, "title" => "Lucy and the Missing Stamp", "season" => 1, "episode_num" => 1, "direct_source" => "https://archive.org/download/TheLucyShowLucyAndTheMissingStamp/TheLucyShowLucyAndTheMissingStamp.mp4"]]]
                ];
                break;
            case 5004: // Sherlock Holmes
                $response = [
                    "info" => ["name" => "Sherlock Holmes (1954)", "plot" => "The classic detective solves mysteries."],
                    "seasons" => [["season_number" => 1, "episode_count" => 1]],
                    "episodes" => ["1" => [["id" => 50041, "title" => "The Case of the Cunningham Heritage", "season" => 1, "episode_num" => 1, "direct_source" => "https://archive.org/download/SherlockHolmesTheCaseOfTheCunninghamHeritage/SherlockHolmesTheCaseOfTheCunninghamHeritage.mp4"]]]
                ];
                break;
        }
        
        echo json_encode($response);
}
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