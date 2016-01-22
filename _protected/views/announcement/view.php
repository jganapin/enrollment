<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Announcement */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Announcements', 'url' => ['index']];
?>
<div class="announcement-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'content',
            [
                'attribute' => 'posted_by',
                'value' => $model->getPostedBy($model->posted_by)
            ],
            [
                'label' => 'Created at',
                'value' => \Carbon\Carbon::parse(date('Y-m-d H:i:s', $model->created_at))->diffForHumans()
            ],
            [
                'label' => 'Updated at',
                'value' => \Carbon\Carbon::parse(date('Y-m-d H:i:s', $model->updated_at))->diffForHumans()
            ],
        ],
    ]) ?>

</div>
