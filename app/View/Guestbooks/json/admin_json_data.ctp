<?php
  $guestbooks = Set::extract($data, '{n}.Guestbook'); 
   
  echo json_encode(array('total' => $this->params['paging']['Guestbook']['count'], 'rows' => $guestbooks));

?>
