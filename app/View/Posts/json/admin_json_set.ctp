<?php
  $posts = Set::extract($data, '{n}'); 
   
  echo json_encode(array('total' => $this->params['paging']['Post']['count'], 'rows' => $posts));
?>