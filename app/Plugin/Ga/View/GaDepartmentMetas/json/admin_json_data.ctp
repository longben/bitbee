<?php
  $departments = Set::extract($data, '{n}');

  echo json_encode(array('total' => $this->params['paging']['GaDepartmentMeta']['count'], 'rows' => $departments));
?>
