<div style="padding: 20px;border: 1px solid #DDDDDD;border-radius: 3px;margin-bottom: 20px ">
    <fieldset>
        <legend align="center"><?=$_title?></legend>
        <?=$html?>
        <?php if(is_login()) :?>
            <div class="row" style="float: right">
                <a href="/p/edit/<?=$id?>">编辑此文</a>
                <a href="/p/edit">添加新文</a>
            </div>
        <?php endif?>
    </fieldset>
</div>

