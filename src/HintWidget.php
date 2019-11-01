<?php
/**
 * Created by PhpStorm.
 * User: uhi
 * Date: 2018. 04. 26.
 * Time: 11:23
 */

namespace uhi67\hintwidget;


use yii\bootstrap\Html;
use yii\base\Widget;

/**
 * Class HintWidget
 *
 * ## Usage in view
 * ### Standalone:
 *
 * ```
 * <?php HintWidget::begin(['title' => 'Súgó', 'width'=>500]) ?>
 * ... content
 * <?php HintWidget::end() ?>
 * ```
 * ### In form field:
 *
 * ```
 * $form->field($model, $fieldname, HintWidget::fieldOptions(3,9))->...
 * ```
 * The example above creates a form-group with (?) as add-on, using model's attributeHint as hint text.
 *
 * ### In form-group manually:
 *
 * ```html
 *  <div class="form-group">
 *      <label class="control-label col-sm-3" for="field-1">label-1</label>
 *      <div class="col-sm-9">
 *          <div class="input-group">
 *              <input ... />
 *              <?= HintWidget::addOn(... 'content' => $model->getAttributeHint($fieldname)])) ?>
 *          </div>
 *      </div>
 *  </div>
 * ```
 *
 * ## Attributes
 *
 * - title: caption of title title bar in the hint dialog
 * - width: width of the hint dialog contents
 * - contents: contents of the dialog if using ::widget() method
 * - buttonOptions: html attributes for hint button tag
 *
 * @package uhi67\hintwidget
 */
class HintWidget extends Widget {
	public $title='';
	public $width=400;
	public $content;
	/** @var array $buttonOptions */
	public $buttonOptions;

	public function init() {
		parent::init();
		if(!$this->content) ob_start();
	}

	public function run() {
		HintWidgetAsset::register($this->getView());
		$content = $this->content ? $this->content : ob_get_clean();
		$content = Html::tag('i', '', array_merge(
			['class'=>'fa fa-question-circle hint-hint', 'data-id'=>$this->id],
			$this->buttonOptions ? $this->buttonOptions : []
		)) .
			Html::tag('div', $content, [
				'id'=>$this->id,
				'class'=>'hint-content',
				'style'=>'display:none;',
				'title'=>$this->title,
				'data-width'=>$this->width
			]);
		return $content;
	}

	/**
	 * @param array $params
	 * @return string
	 * @throws
	 */
	public static function addOn($params) {
		return Html::tag('span', HintWidget::widget($params), ['class' => "input-group-addon transparent hint-addon"]);
	}

	public static function fieldOptions($labelWidth=0, $fieldWidth=0) {
		$fieldClass = $fieldWidth ? 'col-sm-'.$fieldWidth : '';
		$labelClass = $labelWidth ? 'col-sm-'.$labelWidth : '';
		$errorClass = $labelWidth ? 'col-sm-offset-'.$labelWidth : '';
		return [
			'template' => '{label}
		        <div class="'.$fieldClass.'">
		           <div class="input-group">
		                {input}
		                <span class="input-group-addon transparent hint-container" style="display:none">
		                    <i class="fa fa-question-circle hint-hint"></i>
		                    {hint}
		                </span>
		           </div>
		        </div>
		        {error}',
			'labelOptions' => ['class' => 'control-label '.$labelClass],
			'errorOptions' => ['class' => 'help-block '.$errorClass]
		];
	}

}
