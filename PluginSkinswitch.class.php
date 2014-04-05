<?php
/*---------------------------------------------------------------------------
 * @Project: Alto CMS
 * @Project URI: http://altocms.com
 * @Description: Perfect Content Management System & Advanced Community Engine
 * @Copyright: Alto CMS Team
 * @License: GNU GPL v2 & MIT
 *----------------------------------------------------------------------------
 */

if (!class_exists('Plugin')) {
    die('Hacking attempt!');
}

class PluginSkinswitch extends Plugin {

    protected $aInherits = array(
        'module' => array(
            'ModuleViewer',
        ),
    );

    public function Activate() {
        return true;
    }

    public function Init() {
        return true;
    }

}

// EOF