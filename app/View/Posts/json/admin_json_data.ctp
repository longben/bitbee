<?php

//大字段不返回
/*
foreach ($data as &$post) {
    unset($post['Post']['post_content']);
    }
*/

$posts = Set::extract($data, '{n}.Post'); 

echo json_encode(array('total' => $this->params['paging']['Post']['count'], 'rows' => $posts));
?>
