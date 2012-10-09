<?php
  $roles = Set::extract($data, '{n}.Role'); 
  echo json_encode(array('total' => $this->params['paging']['Role']['count'], 'rows' => $roles));
?>
