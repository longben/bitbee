<?php
  $courseMemberships = Set::extract($data, '{n}.CourseMembership'); 
  $courses = Set::extract($data, '{n}.Course'); 
  
  echo json_encode(array('total' => $this->params['paging']['CourseMembership']['count'], 'rows' => $courseMemberships, 'rows' => $courses));
?>
