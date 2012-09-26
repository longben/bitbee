<?php
  $attachments = Set::extract($data, '{n}.Attachment'); 
  echo json_encode(array('total' => $this->params['paging']['Attachment']['count'], 'rows' => $attachments));
?>
