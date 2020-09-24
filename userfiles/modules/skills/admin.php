<script>
    mw.require("files.js");

    mw.lib.require('font_awesome5');

    setprior = function (v, t) {
        t = t || false;
        mwd.getElementById('prior').value = v;
        $(mwd.getElementById('prior')).trigger('change');
        if (!!t) {
            setTimeout(function () {
                $(t).trigger('change');
            }, 70);
        }
    }

    $(document).ready(function () {
        
        var timer_color_pick_shape;

        mw.colorPicker({
            element:'.color_picker_for_shape',
            position:'bottom-left',
            value:'#000000',

            onchange:function(color){

                window.clearTimeout(timer_color_pick_shape);

                mw.$('#shape_color_change_val').val(color);

                timer_color_pick_shape = window.setTimeout(function(){

                    mw.$('#shape_color_change_val').trigger('change');

                },500);

            },
            method: 'inline'
        });

        var timer_color_pick_overlay;

        mw.colorPicker({
            element:'.color_picker_for_overlay',
            position:'bottom-left',
            value:'#000000',

            onchange:function(color){

                window.clearTimeout(timer_color_pick_overlay);

                mw.$('#overlay_color_change_val').val(color);

                timer_color_pick_overlay = window.setTimeout(function(){

                    mw.$('#overlay_color_change_val').trigger('change');

                },500);

            },
            method: 'inline'
        });

    })

</script>

<div class="mw-modules-tabs">

    <div class="mw-accordion-item">
        <div class="mw-ui-box-header mw-accordion-title">
            <div class="header-holder">
                <i class="mw-icon-gear"></i> <?php print _e('Settings'); ?>
            </div>
        </div>
        <div class="mw-accordion-content mw-ui-box mw-ui-box-content">

            <div class="mw-ui-field-holder">
                <label class="mw-ui-label"><?php _e("Shape Color"); ?></label>
                <div class="color_picker_for_shape"></div>
                <input id="shape_color_change_val"  name="shape_color" placeholder="#000000" class="mw-ui-field mw_option_field w100" type="text" data-mod-name="<?php print $params['data-type'] ?>" value="<?php print get_option('shape_color', $params['id']) ?>"/>     
            </div>

            <hr />

            <div class="mw-ui-field-holder">
                <label class="mw-ui-check">
                    <input id="chk_overlay" name="overlay" class="mw-ui-field mw_option_field" type="checkbox" data-mod-name="<?php print $params['data-type'] ?>" value="y" <?php if (get_option('overlay', $params['id']) == 'y') { ?> checked='checked' <?php } ?>/>
                    <span></span>
                    <span><?php _e("Overlay"); ?></span>
                </label>
            </div>
            <div class="mw-ui-field-holder">
                <label class="mw-ui-label"><?php _e("Color"); ?></label>
                <div class="color_picker_for_overlay"></div>
                <input id="overlay_color_change_val"  name="overlay_color" placeholder="#000000" class="mw-ui-field mw_option_field w100" type="text" data-mod-name="<?php print $params['data-type'] ?>" value="<?php print get_option('overlay_color', $params['id']) ?>"/>     
            </div>
            <div class="mw-ui-field-holder">
                <label class="mw-ui-label"><?php _e("Opacity"); ?></label>
                <div class="overlay_opacity"></div>
                <input id="overlay_opacity"  name="overlay_opacity" placeholder="<?php print _e('From 0 to 10'); ?>" class="mw-ui-field mw_option_field w100" type="number" min="1" max="5" step="1" data-mod-name="<?php print $params['data-type'] ?>" value="<?php print get_option('overlay_opacity', $params['id']) ?>"/>     
            </div>
        </div>
    </div>

    <div class="mw-accordion-item">
        <div class="mw-ui-box-header mw-accordion-title">
            <div class="header-holder">
                <i class="mw-icon-beaker"></i> <?php print _e('Templates'); ?>
            </div>
        </div>
        <div class="mw-accordion-content mw-ui-box mw-ui-box-content">
            <module type="admin/modules/templates"/>
        </div>
    </div>

</div>
