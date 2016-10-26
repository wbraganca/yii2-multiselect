<?php
/**
 * @link      https://github.com/wbraganca/yii2-multiselect
 * @copyright Copyright (c) 2016 Wanderson Bragança
 * @license   https://github.com/wbraganca/yii2-multiselect/blob/master/LICENSE
 */

namespace wbraganca\multiselect;

use yii\web\AssetBundle;

/**
 * Asset bundle for multiselect Widget
 *
 * @author Wanderson Bragança <wanderson.wbc@gmail.com>
 */
class MultiSelectAsset extends AssetBundle
{
    public $sourcePath = '@bower/bootstrap-multiselect/dist';

    public $js = [
        'js/bootstrap-multiselect.js'
    ];

    public $css = [
        'css/bootstrap-multiselect.css'
    ];

    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset'
    ];
}
