<?php

namespace frontend\widgets\Select1one\views;

use kartik\select2;
use anmaslov\autocomplete\AutoComplete;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

use backend\widgets\WidgetCity\MyCity;






echo Html::activeInput('text', $model,'name', ['id'=>$inputID]);
