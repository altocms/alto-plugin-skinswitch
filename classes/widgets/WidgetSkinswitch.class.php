<?php
/*---------------------------------------------------------------------------
 * @Project: Alto CMS
 * @Project URI: http://altocms.com
 * @Description: Perfect Content Management System & Advanced Community Engine
 * @Copyright: Alto CMS Team
 * @License: GNU GPL v2 & MIT
 *----------------------------------------------------------------------------
 */

class PluginSkinswitch_WidgetSkinswitch extends Widget {

    public function Exec() {

        $aSkins = $this->PluginSkinswitch_ModuleSkinswitch_GetSkins();
        $sGetSkinParam = Config::Get('plugin.skinswitch.get_skin_name');
        $sGetThemeParam = Config::Get('plugin.skinswitch.get_theme_name');

        $sCurrentSkin = Config::Get('view.skin');
        $sCurrentTheme = Config::Get('view.theme');

        $aSkinswitchSkins = array();
        foreach($aSkins as $sSkin) {
            $bCurrent = (($sCurrentSkin == $sSkin) && !$sCurrentTheme);
            $aSkinswitchSkins[] = array(
                'name' => $sSkin,
                'link' => '?' . $sGetSkinParam . '=' . urlencode($sSkin),
                'current' => $bCurrent,
                'level' => 0,
            );
            $aThemes = $this->PluginSkinswitch_ModuleSkinswitch_GetThemes($sSkin);
            if ($aThemes) {
                foreach ($aThemes as $sTheme) {
                    $bCurrent = (($sCurrentSkin == $sSkin) && ($sCurrentTheme == $sTheme));
                    $aSkinswitchSkins[] = array(
                        'name' => $sTheme,
                        'link' => '?' . $sGetSkinParam . '=' . urlencode($sSkin) . '&' . $sGetThemeParam . '=' . $sTheme,
                        'current' => $bCurrent,
                        'level' => 1,
                    );
                }
            }
        }
        $this->Viewer_Assign('aSkinswitchSkins', $aSkinswitchSkins);
        return $this->Viewer_Fetch(Plugin::GetTemplatePath(__CLASS__) . 'toolbar.skinswitch.tpl');
    }

}

// EOF