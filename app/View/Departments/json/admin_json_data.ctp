<?php
  //$modules = Set::extract($data, '{n}.Module'); 
  $modules = Set::extract($data, '{n}.Module'); 
  //print_r($modules);
   
  echo json_encode(array('total' => $this->params['paging']['Module']['count'], 'rows' => $modules));
?>
