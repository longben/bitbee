<?php
$rows = Set::extract($data, '{n}');
echo json_encode(
    array(
        'total' => $this->params['paging'][Inflector::camelize(Inflector::singularize($this->params['controller']))]['count'],
        'rows' => $rows)
);
