<?php
/**
 * @link http://phe.me
 * @copyright Copyright (c) 2014 Pheme
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace pheme\jui;

use yii\web\AssetBundle;

/**
 * @author Aris Karageorgos <aris@phe.me>
 */
class DateTimePickerAsset extends AssetBundle
{
    public $sourcePath = '@bower/jqueryui-timepicker-addon';

    public $js = [
        'dist/jquery-ui-timepicker-addon.min.js',
    ];

    public $css = [
        'dist/jquery-ui-timepicker-addon.min.css',
    ];

    public $depends = [
        'yii\jui\JuiAsset',
    ];
}
