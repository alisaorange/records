<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<h1 class="display-4 text-center">Справочник пользователей</h1>
<p>
    <?= Html::a('Добавить запись', ['create'], ['class' => 'btn btn-success']) ?>
</p>

<br>
<table>
    <thead>
        <tr>
            <th>ФИО</th>
            <th>Email</th>
            <th>Телефон</th>
            <th>Обновить</th>
            <th>Удалить</th>
        </tr>
    </thead>
    <tbody>
    <?php if(!empty($records)): ?>
        <?php foreach ($records as $record): ?>
            <tr>
                <th><?= $record->name ?></th>
                <th><?= $record->email ?></th>
                <th><?= $record->phone ?></th>
                <th><a href="<?= Url::toRoute(['update', 'id' => $record->id]) ?>"><img width="20" height="20" src="<?php echo Yii::getAlias('@web').'/update.png' ?>"></a></th>
                <th><a onclick="deleteRecord(<?= $record->id ?>)"><img width="20" height="20" src="<?php echo Yii::getAlias('@web').'/delete.png' ?>"></a></th>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr><th>Записей нет</th></tr>
    <?php endif; ?>
    </tbody>
</table>