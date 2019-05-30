<?php
return array(
    /*'sort/([a-z]+)'=>'sort/index/$1',*/
    'sort/([a-z]+)/([0-9]+)'=>'sort/index/$1/$2',
    '/([0-9]+)'=>'Main/index/$1',
    'admin'=>'admin/index',
    ''=>'Main/index'
);