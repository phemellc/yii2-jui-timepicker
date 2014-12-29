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
class DateTimePickerLanguageAsset extends AssetBundle
{
    public $sourcePath = '@bower/jqueryui-timepicker-addon';
    /**
     * @var boolean whether to automatically generate the needed language js files.
     * If this is true, the language js files will be determined based on the actual usage of [[DatePicker]]
     * and its language settings. If this is false, you should explicitly specify the language js files via [[js]].
     */
    public $autoGenerate = true;

    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\jui\JuiAsset',
    ];
}
