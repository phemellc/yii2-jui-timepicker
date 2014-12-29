<?php
/**
 * @link http://phe.me
 * @copyright Copyright (c) 2014 Pheme
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace pheme\jui;

use Yii;
use yii\helpers\Json;
use yii\jui\DatePicker;
use yii\jui\JuiAsset;
use yii\helpers\FormatConverter;

/**
 * @author Aris Karageorgos <aris@phe.me>
 */
class DateTimePicker extends DatePicker
{
    /**
     * @var boolean If true, will omit the date portion of the widget.
     */
    public $timeOnly = false;

    /**
     * Renders the widget.
     */
    public function run()
    {
        $picker = $this->timeOnly ? 'timepicker' : 'datetimepicker';

        echo $this->renderWidget() . "\n";

        $containerID = $this->inline ? $this->containerOptions['id'] : $this->options['id'];
        $language = $this->language ? $this->language : Yii::$app->language;

        if (strncmp($this->dateFormat, 'php:', 4) === 0) {
            $this->clientOptions['dateFormat'] = FormatConverter::convertDatePhpToJui(
                substr($this->dateFormat, 4),
                'date',
                $language
            );
        } else {
            $this->clientOptions['dateFormat'] = FormatConverter::convertDateIcuToJui(
                $this->dateFormat,
                'date',
                $language
            );
        }

        if ($language != 'en-US' && $language != 'en') {
            $view = $this->getView();
            $bundle = DateTimePickerLanguageAsset::register($view);
            if ($bundle->autoGenerate) {
                $fallbackLanguage = substr($language, 0, 2);
                if ($fallbackLanguage !== $language && !file_exists(
                        Yii::getAlias($bundle->sourcePath . "/dist/i18n/jquery-ui-timepicker-$language.js")
                    )
                ) {
                    $language = $fallbackLanguage;
                }
                $view->registerJsFile(
                    $bundle->baseUrl . "/dist/i18n/jquery-ui-timepicker-$language.js",
                    [
                        'depends' => [JuiAsset::className()],
                    ]
                );
            }
            $options = Json::encode($this->clientOptions);
            $view->registerJs(
                "$('#{$containerID}').{$picker}($.extend({}, $.{$picker}.regional['{$language}'], $options));"
            );
        } else {
            $this->registerClientOptions($picker, $containerID);
        }

        $this->registerClientEvents($picker, $containerID);
        DateTimePickerAsset::register($this->getView());
    }
}
