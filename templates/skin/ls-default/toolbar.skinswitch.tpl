{literal}
    <style type="text/css">
        #skinswitch-button {
            position: relative;
            font-family: Arial, Helvetica, sans-serif;
        }
        #skinswitch-button, #skinswitch-button a {
            text-align: center;
            text-decoration: none;
        }

        #skinswitch-list {
            background-color: white;
            border: 1px solid #ccc;
            display: block;
            padding: 10px;
            position: fixed;
            z-index: 999;
            box-shadow: 0 0 10px rgba(0,0,0,0.5);
        }

        #skinswitch-list .skinswitch-item {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px !important;
            line-height: 14px !important;
            background-color: white !important;
            color: black !important;
            font-weight: normal;
            text-decoration: none;
            display: block;
            height: 16px !important;
            padding: 0 4px;
            margin: 2px;
        }

        #skinswitch-list .skinswitch-item-hover {
            color: white !important;
            background-color: black !important;
        }

        #skinswitch-list .skinswitch-item-current {
            font-weight: bold;
            text-decoration: underline;
        }

        #skinswitch-list .skinswitch-item-hide-noncurrent .skinswitch-item.skinswitch-item-current {
            display: block;
        }
        #skinswitch-list .skinswitch-item.skinswitch-level-1 {
            margin-left: 20px;
        }
    </style>
    <script language="javascript">

        $(function () {
            var button = $('#skinswitch-button'),
                    list = $('#skinswitch-list').appendTo('body'),
                    posTop, posLeft;
            var resizeFunc = function () {
                posTop = button.position().top + button.parent('.toolbar').position().top + 5;
                posLeft = button.offset().left - list.outerWidth() - 5;
                list.css({top: posTop + 'px', left: posLeft + 'px'});
            };

            $(window).resize(function () {
                resizeFunc();
            });
            resizeFunc();

            list.hide();
            list.css({
                backgroundColor: button.css('background-color'),
                color: button.css('color'),
                boxShadow: button.css('box-shadow')
            });
            var timeout = null;
            var inArea = 0;
            button.mouseover(function () {
                list.slideDown();
                ++inArea;
                timeout = setInterval(function () {
                    if (inArea <= 0) {
                        list.slideUp();
                        clearInterval(timeout);
                    }
                }, 2000);
            });
            button.mouseout(function () {
                --inArea;
            });
            list.mouseover(function () {
                ++inArea;
            });
            list.mouseout(function () {
                --inArea;
            });

            $('.skinswitch-item')
                    .mouseover(function () {
                        $(this).addClass('skinswitch-item-hover');
                    })
                    .mouseout(function () {
                        $(this).removeClass('skinswitch-item-hover');
                    });
        });
    </script>
{/literal}

{if $aSkinswitchSkins}
    <section class="toolbar-scinswich" id="skinswitch-button">
        <a href="#">
            <strong>S</strong>
        </a>
        <div id="skinswitch-list" style="display: none;">
            {foreach $aSkinswitchSkins as $aSkinTheme}
                <a class="skinswitch-item skinswitch-level-{$aSkinTheme['level']} {if $aSkinTheme['current']}skinswitch-item-current{/if}" href="{$aSkinTheme['link']}">
                    {$aSkinTheme['name']}
                </a>
            {/foreach}
        </div>
    </section>
{/if}