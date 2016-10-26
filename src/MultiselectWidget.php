<?php
/**
 * @link      https://github.com/wbraganca/yii2-multiselect
 * @copyright Copyright (c) 2016 Wanderson Bragança
 * @license   https://github.com/wbraganca/yii2-multiselect/blob/master/LICENSE
 */
namespace wbraganca\multiselect;

use wbraganca\multiselect\MultiselectAsset;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\View;

/**
 * The yii2-multiselect is a Yii 2 wrapper for "Bootstrap Multiselect".
 * See more: http://davidstutz.github.io/bootstrap-multiselect/
 *
 * @author Wanderson Bragança <wanderson.wbc@gmail.com>
 */
class MultiselectWidget extends \yii\widgets\InputWidget
{
    /**
     * The name of the jQuery plugin to use for this widget.
     */
    const WIDGET_NAME = 'multiselect';

    /**
     * @var array data for generating the list options (value=>display)
     */
    public $data = [];

    /**
     * @var array the options for the "Bootstrap Multiselect" plugin.
     * @see http://davidstutz.github.io/bootstrap-multiselect/#configuration-options
     */
    public $clientOptions = [];

    /**
     * @var array the HTML attributes for the input tag.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $options = [];

    /**
     * @var string the hashed variable to store the clientOptions
     */
    protected $_hashVar;

    /**
     * Initializes the widget.
     */
    public function init()
    {
        if (empty($this->data)) {
            throw new  InvalidConfigException('"Multiselect::$data" attribute cannot be blank or an empty array.');
        }
        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        $this->registerClientScript();
        if ($this->hasModel()) {
            echo Html::activeDropDownList($this->model, $this->attribute, $this->data, $this->options);
        } else {
            echo Html::dropDownList($this->name, $this->value, $this->data, $this->options);
        }
    }

    /**
     * Generates a hashed variable to store the `clientOptions`. Helps in reusing the variable for similar
     * options passed for other widgets on the same page. The following special data attribute will also be
     * setup for the input widget, that can be accessed through javascript:
     *
     * - 'data-plugin-multiselect' will store the hashed variable storing the plugin options.
     *
     * @param View $view the view instance
     */
    protected function hashPluginOptions($view)
    {
        $encOptions = empty($this->clientOptions) ? '{}' : Json::encode($this->clientOptions);
        $this->_hashVar = static::WIDGET_NAME . '_' . hash('crc32', $encOptions);
        $this->options['data-plugin-' . static::WIDGET_NAME] = $this->_hashVar;
        $view->registerJs("var {$this->_hashVar} = {$encOptions};\n", View::POS_HEAD);
    }

    /**
     * Registers the needed client script and options.
     */
    public function registerClientScript()
    {
        $js = '';
        $view = $this->getView();
        $this->hashPluginOptions($view);
        $id = $this->options['id'];
        $js .= '$("#' . $id . '").' . static::WIDGET_NAME . "(" . $this->_hashVar . ");\n";
        MultiselectAsset::register($view);
        $view->registerJs($js);
    }
}
