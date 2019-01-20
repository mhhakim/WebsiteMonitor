<?php
include ('./config.php');
include ('./functions.php');

$sites = glob('./sites/*.site');

foreach($sites as $site) {
    $json = file_get_contents($site);
    $json = json_decode($json);

    $name = $json->name;
    $url = $json->url;
    $regx = $json->regx;
    $status = $json->status;
    $count = $json->count;

    $pullData = curlGet($url);

    if(preg_match("/$regx/i", $pullData)) {
        $count = 0;
        if($status == 0) {
            $status = 1;
            notifyOk($name);
        }
    }
    else {
        if($status == 1) {
            if($count >= 1) {
                $status = 0;
                notifyError($name);

            }
        $count++;
        }
    }

    $data = '{
        "name" : "'.$name.'",
        "url" : "'.$url.'",
        "regx" : "'.$regx.'",
        "status" : '.$status.',
        "count" : '.$count.'
    }';
    file_put_contents($site, $data);
}