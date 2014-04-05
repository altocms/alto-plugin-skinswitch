<?php
/*---------------------------------------------------------------------------
 * @Project: Alto CMS
 * @Project URI: http://altocms.com
 * @Description: Perfect Content Management System & Advanced Community Engine
 * @Copyright: Alto CMS Team
 * @License: GNU GPL v2 & MIT
 *----------------------------------------------------------------------------
 */

$config['get_skin_name'] = 'skin';
$config['get_theme_name'] = 'theme';

$config['widgets']['skinswitch'] = array(
    'name' => 'skinswitch',
    'plugin' => 'skinswitch',
    'group' => 'toolbar',
    'priority' => 'top',
    'off' => array(
        'admin',
    ),
    'display' => true,
);

return $config;

// EOF