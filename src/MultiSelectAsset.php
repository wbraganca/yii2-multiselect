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
    public $sourcePath = __DIR__ . '/assets';

    public $css = [
        'css/yii2-multiselect.css'
    ];

    public $depends = [
        'wbraganca\multiselect\MultiSelectPluginAsset'
    ];
}
