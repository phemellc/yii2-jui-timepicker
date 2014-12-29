Yii2 Timepicker JUI addon
=========================
Adds a timepicker widget to Yii2 JUI

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist pheme/yii2-jui-timepicker "*"
```

or add

```
"pheme/yii2-jui-timepicker": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= $form->field($model, 'datetime')->widget(\pheme\jui\DateTimePicker::className()) ?>
```

```php
<?= $form->field($model, 'time')->widget(\pheme\jui\DateTimePicker::className(), ['timeOnly' => true]) ?>
```