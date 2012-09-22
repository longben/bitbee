<?php
  $departments = Set::extract($data, '{n}.Department'); 
   
  echo json_encode(array('total' => $this->params['paging']['Department']['count'], 'rows' => $departments));
?>
