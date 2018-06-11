<?php if (!empty($buttonTops)): ?>
    <div class="row">
        <div class="col-sm-12 m-b-xs">
            <?php foreach ($buttonTops as $buttons): ?>
                <a class="btn btn-<?= $buttons['color'] ?>"  href="<?= $buttons['url'] ?>">
                    <i class="fa fa-<?= $buttons['icon'] ?>"></i>
                    <?= $buttons['name'] ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?> 