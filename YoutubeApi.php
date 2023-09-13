<?php
$apikey = "AIzaSyAZ-IktVQGKdpCW0UqJexu5KTT80975o9g";
$channelId = "UCPy-d3vVFsKSyxzHRKLm1HA";

$url = "https://www.googleapis.com/youtube/v3/search?key=$apikey&channelId=$channelId&part=snippet,id&order=date&maxResults=50";

$response = file_get_contents($url);
$data = json_decode($response);

foreach ($data->items as $item) {
    $videoId = $item->id->videoId;
    $videoTitle = $item->snippet->title;
    $videoThumbnail = $item->snippet->thumbnails->default->url;

    echo "<h2>$videoTitle</h2>";
    echo "<iframe width='1280' height='720' src='https://www.youtube.com/embed/$videoId' frameborder='0' allowfullscreen></iframe>";
}
?>