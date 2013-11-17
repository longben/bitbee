<?php
  $polls = Set::extract($data, '{n}.Poll');
  echo json_encode(array('total' => $this->params['paging']['Poll']['count'], 'rows' => $polls));
?>
