# Hint widget for Yii2

Displays a pop-up hint dialog widget triggered by a (?) button.
Standalon use or inserted into forms.
Compatible with bootrstrap form-group and input-group. 

## Prerequisites

- yii2 >= 2.0.13
- php >= 5.6
- Boostrap >= 3

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

To install, either run
```
    composer require uhi67/yii2-hintwidget "1.*" 
```

or add 

```
"uhi67/yii2-hintwidget" : "1.*"
```

or clone form github

```
    git clone https://github.com/uhi67/yii2-hintwidget
```

## Usage in views

### Standalone:

```
<?php HintWidget::begin(['title' => 'Súgó', 'width'=>500]) ?>
... content
<?php HintWidget::end() ?>
```
### In form field:

```
$form->field($model, $fieldname, HintWidget::fieldOptions(3,9))->...
```
The example above creates a form-group with (?) as add-on, using model's attributeHint as hint text.

### In form-group manually:

```html
 <div class="form-group">
     <label class="control-label col-sm-3" for="field-1">label-1</label>
     <div class="col-sm-9">
         <div class="input-group">
             <input ... />
             <?= HintWidget::addOn(... 'content' => $model->getAttributeHint($fieldname)])) ?>
         </div>
     </div>
 </div>
```
