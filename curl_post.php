<?php

echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
function send_post($url, $post_data) {
  $postdata = http_build_query($post_data);
  $options = array(
    'http' => array(
      'method' => 'POST',
      'header' => 'Content-type:application/x-www-form-urlencoded',
      'content' => $postdata,
      'timeout' => 15 * 60 // 超时时间（单位:s）
    )
  );
  $context = stream_context_create($options);
  $result = file_get_contents($url, false, $context);
  return $result;
}

//使用方法
$post_data = array(
  'v' => '1.0',
  'sign' => '4F898F441F0727080C21A74EC62B6AE0',
  'message'=>'{"starttime": "2013-01-01","endtime": "2014-01-01"}',
  'shopcode'=>'tianm',
);

$somhns=send_post('http://121.41.172.3:30019/PubService.svc/GetOrdersByTime', $post_data);
echo $somhns;
var_dump($post_data);


?>
