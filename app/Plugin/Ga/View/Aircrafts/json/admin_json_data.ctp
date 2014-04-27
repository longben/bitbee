<?php
$aircrafts = Set::extract($data, '{n}');
echo json_encode(array('total' => $this->params['paging']['Aircraft']['count'], 'rows' => $aircrafts));
