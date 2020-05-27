

<h3><?=$this->post['title']?></h3>
<div>
    <?=$this->post['post'];?>
    <? if ($this->user): ?>
    <div class="btn-group" role="group" aria-label="Basic">
        <a href="/?edit/<?=$this->post['id']?>" class="btn btn-mini btn-info"><i class="icon-pencil"></i> изменить</a>
        <a href="/?del/<?=$this->post['id']?>" class="btn btn-mini btn-danger" onclick="return confirm('Точно удалить?');"><i class="icon-trash"></i> удалить</a>
    </div>
    <? endif ?>
</div>

<hr>
