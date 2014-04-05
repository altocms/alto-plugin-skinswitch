<?php
/*---------------------------------------------------------------------------
 * @Project: Alto CMS
 * @Project URI: http://altocms.com
 * @Description: Perfect Content Management System & Advanced Community Engine
 * @Copyright: Alto CMS Team
 * @License: GNU GPL v2 & MIT
 *----------------------------------------------------------------------------
 */

class PluginSkinswitch_ModuleViewer extends PluginSkinswitch_Inherit_ModuleViewer {

    protected $sCustomSkin;
    protected $sCustomTheme;

    public function SetSkin($sSkin) {

        $this->sCustomSkin = $sSkin;
    }

    public function SetTheme($sTheme) {

        $this->sCustomTheme = $sTheme;
    }

    public function GetConfigSkin($bSiteSkin = false) {

        if ($this->sCustomSkin) {
            return $this->sCustomSkin;
        }
        return parent::GetConfigSkin($bSiteSkin);
    }

    public function GetConfigTheme($bSiteSkin = false) {

        if ($this->sCustomTheme) {
            return $this->sCustomTheme;
        }
        return parent::GetConfigTheme($bSiteSkin);
    }

}

// EOF