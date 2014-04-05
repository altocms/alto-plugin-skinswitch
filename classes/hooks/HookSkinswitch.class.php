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

class PluginSkinswitch_HookSkinswitch extends Hook {

    public function RegisterHook() {

        if (Router::GetAction() !== 'admin') {
            $this->AddHook('render_init_start', 'Skinswitch');
        }
    }

    /**
     * Hook handler
     */
    public function Skinswitch() {

        $aSkins = $this->PluginSkinswitch_ModuleSkinswitch_GetSkins();
        if (!$aSkins) {
            return;
        }
        $sGetSkinParam = Config::Get('plugin.skinswitch.get_skin_name');
        $sGetThemeParam = Config::Get('plugin.skinswitch.get_theme_name');

        $sGetSkin = getRequest($sGetSkinParam, null, 'get');
        $sGetTheme = getRequest($sGetThemeParam, null, 'get');

        $sSessSkin = (isset($_SESSION['skinswitch.skin_name']) ? $_SESSION['skinswitch.skin_name'] : '');
        $sSessTheme = (isset($_SESSION['skinswitch.theme_name']) ? $_SESSION['skinswitch.theme_name'] : '');

        $bSetSkin = false;
        if (in_array($sGetSkin, $aSkins)) {
            $sSessSkin = $sGetSkin;
            $bSetSkin = true;
        } elseif (in_array($sSessSkin, $aSkins)) {
            $bSetSkin = true;
        }

        if ($bSetSkin) {
            Config::Set('view.skin', $sSessSkin);
            $this->PluginSkinswitch_ModuleViewer_SetSkin($sSessSkin);
            $_SESSION['skinswitch.skin_name'] = $sSessSkin;

            $aThemes = $this->PluginSkinswitch_ModuleSkinswitch_GetThemes($sSessSkin);
            $bSetTheme = false;
            if (in_array($sGetTheme, $aThemes)) {
                $sSessTheme = $sGetTheme;
                $bSetTheme = true;
            } elseif (in_array($sSessTheme, $aThemes)) {
                $bSetTheme = true;
            }
            if ($bSetTheme) {
                Config::Set('view.theme', $sSessTheme);
                $this->PluginSkinswitch_ModuleViewer_SetTheme($sSessTheme);
                $_SESSION['skinswitch.theme_name'] = $sSessTheme;
            }
        }
    }
}

// EOF