<?php
  $products = Set::extract($data, '{n}.Product'); 
   
  echo json_encode(array('total' => $this->params['paging']['Product']['count'], 'rows' => $products));
?>
