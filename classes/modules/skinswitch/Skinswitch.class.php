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

class PluginSkinswitch_ModuleSkinswitch extends Module {

    public function Init() {

    }

    public function GetSkins() {

        $aSkins = Config::Get('plugin.skinswitch.skins');
        if (is_null($aSkins)) {
            $aSkins = $this->Skin_GetSkinsArray('site');
            Config::Set('plugin.skinswitch.skins', $aSkins);
        }
        return $aSkins;
    }

    public function GetThemes($sSkin) {

        $oSkin = $this->Skin_GetSkin($sSkin);
        $aThemes = $oSkin->GetThemes();
        $aResult = array();
        foreach ($aThemes as $aTheme) {
            $aResult[] = $aTheme['code'];
        }
        return $aResult;
    }

}

// EOF