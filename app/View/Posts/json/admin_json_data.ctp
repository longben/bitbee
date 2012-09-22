<?php
  $posts = Set::extract($data, '{n}.Post'); 
   
  echo json_encode(array('total' => $this->params['paging']['Post']['count'], 'rows' => $posts));
?>