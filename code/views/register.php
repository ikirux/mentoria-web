<h1>Register</h1>

<?php $form = \app\core\widgets\Form::begin('', 'POST') ?>
  <?= $form->field($model, 'firstname') ?>
  <?= $form->field($model, 'lasttname') ?>
  <?= $form->field($model, 'email') ?>
  <?= $form->field($model, 'password') ?>
  <?= $form->field($model, 'confirmPassword') ?>

  <button type="submit" class="btn btn-primary">Save</button>
<?php \app\core\widgets\Form::end() ?>
