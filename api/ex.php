<?php

$hls = isset($_GET['hls']) ? $_GET['hls'] : (isset($_GET['seg']) ? $_GET['seg'] : null);

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "http://live-ssai-cf-mum.cdn.hotstar.com/hls/live/2024729/inallow-icct20wc-2024/hin/1540029842/15mindvrm01f5a96785fa0344209ec76790a9631f8511june2024/$hls?random=0-inallow-icct20wc-2024&content_id=1540029842&language=hindi&resolution=854x480&hash=4c69&bandwidth=393800&media_codec=codec=h265:dr=sdr&audio_codec=aac&layer=child&playback_proto=http&playback_host=live12p-pristine-akt.cdn.hotstar.com&si_match_id=710308",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_COOKIE => 'hdntl=exp=1718207345~acl=%2fhls%2flive%2f2024729%2finallow-icct20wc-2024%2fhin%2f1540029842%2f15mindvrm01f5a96785fa0344209ec76790a9631f8511june2024%2fmaster_apmf*~data=ip%3ddnuyNaJZhwn-userid%3ddnuyNaJZhwn-did%3ddnuyNaJZhwn-cc%3din-ttl%3d86400-type%3dfree-~hmac=bfe76404d9be7923c51da5c4a3437e8913654b37358f4903681d3638be44e42a',
  CURLOPT_HTTPHEADER => [
    'User-Agent: Hotstar;in.startv.hotstar/24.04.23.6.9999 (Android/11)',
    'Accept-Encoding: gzip',
    'Connection: Keep-Alive',
  ],
]);
$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo 'cURL Error #:' . $err;
} else {
  header('Content-type: application/x-mpegURL');
// Modify response to add "t.php?hls=" before each "master_" part
 $response = str_replace("/hls", "http://localhost:8000/hotstar/index.m3u8/ts.php?hls=hls", $response);

// Display modified response
echo $response;
}
