<h2>Квартиры</h2>
<div class="apps">
    <?php if(count($objects) > 0):?>
        <?php foreach($objects as $objects):?>
            <div class="app">
                <div></div>
            </div>
        <?php endforeach;?>
    <?php else:?>
        <div>Предложений нет</div>
    <?php endif;?>
</div>
