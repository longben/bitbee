<?php
  $users = Set::extract($data, '{n}.User'); 
   
  echo json_encode(array('total' => $this->params['paging']['User']['count'], 'rows' => $users));
?>
