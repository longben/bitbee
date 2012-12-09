<?php
  $codes = Set::extract($data, '{n}.Code'); 
   
  echo json_encode(array('total' => $this->params['paging']['Code']['count'], 'rows' => $codes));
?>
