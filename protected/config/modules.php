<?php
# Override module configurations
return array(
    'modules' => array(
            'gii' => array(
                'class'     => 'system.gii.GiiModule',
                'password'  => '1234',
                'ipFilters' => array('*.*.*.*')
            )
    )
);
?>
