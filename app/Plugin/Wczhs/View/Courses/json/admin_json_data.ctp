<?php
  $courses = Set::extract($data, '{n}.Course'); 
  
  echo json_encode(array('total' => $this->params['paging']['Course']['count'], 'rows' => $courses));
?>
