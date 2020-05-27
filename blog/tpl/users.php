<? foreach ($this->users as $key => $value): ?>
<h3><a href="/?users/<?=$value['id']?>"><?=$value['email']?></a></h3>
<div>Пароль: <?=nl2br($value['pass'])?></div>


<? if ($value['email'] == "admin"): ?>
<? unset($value['email']);?>
<? elseif ($this->user[email] == "admin"): ?>
<div class="btn-group" role="group" aria-label="Basic">
    <a href="/?delUser/<?=$value['id']?>" class="btn btn-mini btn-danger" onclick="return confirm('Точно удалить?');"><i class="icon-trash"></i> удалить</a>
</div>
<? endif ?>
<p>&nbsp;</p>
<? endforeach ?>

<a href="/?addUser/<?=$value['id']?>" class="btn btn-mini btn-info"><i class="icon-pencil"></i>Добавить</a>