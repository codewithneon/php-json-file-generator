<?php
$langjson='lang/qa.json';
if(is_file($langjson)){
    $lang=file_get_contents($langjson);
    $lang=json_decode($lang,true);
    foreach($lang as $key=>$value){
        $data[$key]=$value;
    }
}
$data['age']='27';
$data['gender']='male';
$data['name']='faysalneon';
file_put_contents($langjson, json_encode($data));

