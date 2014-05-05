<?php
$corp_aircrafts = Set::extract($data, '{n}');
echo json_encode(array('total' => $this->params['paging']['CorpAircraft']['count'], 'rows' => $corp_aircrafts));
