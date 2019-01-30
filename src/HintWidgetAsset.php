<?php
/**
 * Created by PhpStorm.
 * User: uhi
 * Date: 2018. 04. 26.
 * Time: 11:37
 */

namespace uhi67\hintwidget;


use yii\web\AssetBundle;

class HintWidgetAsset extends AssetBundle {
	public $js = [
		'js/hintwidget.js'
	];

	public $css = [
		'css/hintwidget.css'
	];

	public $depends = [
		'yii\web\JqueryAsset',
		'yii\jui\JuiAsset',
		'yii\bootstrap\BootstrapAsset',
	];

	public function init()
	{
		// Tell AssetBundle where the assets files are
		$this->sourcePath = __DIR__ . "/assets";
		parent::init();
	}
}
