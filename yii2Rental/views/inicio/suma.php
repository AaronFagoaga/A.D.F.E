<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
?>
<div clas="row">
    <div class="container">
        <h1>Suma</h1>
        <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model, 'valor_a')->textInput() ?>
            <?= $form->field($model, 'valor_b')->textInput() ?>
            <div class="form-group">
                <?= Html::submitButton('Sumar', ['class' => 'btn btn-success']) ?>
            </div>
        <?php ActiveForm::end(); ?>

        <?php if ($model->valor_a && $model->valor_b): ?>
            <h2>Resultado: <?= $model->suma() ?></h2>
        <?php endif; ?>

    </div>
</div>