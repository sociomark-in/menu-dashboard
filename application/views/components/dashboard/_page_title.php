<section>
    <?php foreach ($breadcrumb as $key => $value) : ?>
    <?php if($value == 'Current') : ?>
        <h1><?= $value ?></h1>
    <?php endif ?>
    <?php endforeach ?>
</section>