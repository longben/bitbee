<?php
  $data = Set::extract($data, '{n}'); 
  echo json_encode(array('total' => $this->params['paging']['CourseMembership']['count'], 'rows' => $data));
?>
