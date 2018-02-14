<?php
use yii\bootstrap\ActiveForm;
?>

    <h1>Страница логирования пользователя</h1>

<?php
    $form = ActiveForm::begin(['class'=>'form-horizontal']);
?>

<?= $form->field($model,'email')->textInput(['autofocus'=>true]); ?>

<div>
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
<?php ActiveForm::end(); ?>
