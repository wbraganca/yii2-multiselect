# yii2-multiselect

[![Latest Version](https://img.shields.io/github/release/wbraganca/yii2-multiselect.svg?style=flat-square)](https://github.com/wbraganca/yii2-multiselect/releases)
[![Software License](http://img.shields.io/badge/license-BSD3-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/wbraganca/yii2-multiselect.svg?style=flat-square)](https://packagist.org/packages/wbraganca/yii2-multiselect)


## Install

Via Composer

```bash
$ composer require "wbraganca/yii2-multiselect:~1.0.0"
```

or add

```
"wbraganca/yii2-multiselect": "~1.0.0"
```

to the require section of your `composer.json` file.


## Usage

On your view file.

```php

<?php
use wbraganca\multiselect\MultiselectWidget;
?>

<?= MultiSelect::widget([
    'options' => [
        'multiple' => 'multiple',
    ],
    'clientOptions' => [
        'nonSelectedText' => 'Check an option!',
        'nSelectedText' => ' - Options selected!',
        'allSelectedText' => 'All',
        'numberDisplayed' => 0,
        'enableCaseInsensitiveFiltering' => true,
    ],
    'data' => $cities,
    'model' => $model,
    'attribute' => 'cities',
]) ?>

```

For more options, visit: http://davidstutz.github.io/bootstrap-multiselect