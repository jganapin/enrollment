<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\helpers\CssHelper;
$this->title = 'Payments';
?>

<div class="payment-form-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="fa fa-plus"></i> New Payment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'attribute' => 'student_id',
            'paid_amount',
            [
                'attribute' => 'type',
                'filter' => $searchModel->paymentType,
                'value' => function($searchModel){if($searchModel->type === 1)return 'Card';return 'Cash';},
                'contentOptions'=>function($model, $key, $index, $column) {
                    return ['class'=>CssHelper::statusCss($model->paymentType)];
                }
            ],
            ['class' => 'yii\grid\ActionColumn',
                    'header' => "Options",
                    'template' => '{view} {update} {delete}',
                    'options' => ['style' => 'width: 100px; text-align: center; margin: auto;'],
                    'buttons' => [
                        'view' => function ($url, $model, $key) {
                            return Html::a('', $url, ['title'=>'View Payment', 
                                'class'=>'fa fa-user fa-2x']);
                        },
                        'update' => function ($url, $model, $key) {
                            return Html::a('', $url, ['title'=>'Update Payment', 
                                'class'=>'fa fa-edit fa-2x']);
                        },
                        'delete' => function ($url, $model, $key) {
                            return Html::a('', $url, 
                                ['title'=>'Delete Applicant', 
                                    'class'=>'fa fa-times fa-2x fa-remove text-centered',
                                    'data' => [
                                        'confirm' => Yii::t('app', 'Are you sure you want to delete this payment?'),
                                        'method' => 'post']
                ]);
                    }
                ]
            ],
        ],
    ]); ?>

</div>
