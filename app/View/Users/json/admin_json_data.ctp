<?php
  $users = Set::extract($data, '{n}'); 
   
  echo json_encode(array('total' => $this->params['paging']['User']['count'], 'rows' => $users));
?>