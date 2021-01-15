<?php $store->newVegs()?>
<?php foreach ($store->getAll() as $key => $value):?>
<div class="plant auginimas col-6 col-sm-12">
    <div class="img">
        <img src="<?= $value->img ?>" alt="vegetable-photo">
    </div>
    <div class="info">
        <h4> <?=$value->type?>. Krūmas nr. <?= $value->id ?> </h4>
        <p> Daržovių: <?= $value->count ?> </p>
        <p> Kaina: <?= round($rate * $value->price, 2)?> &#36; </p>
        <h3 style="display:inline;color:green;">+<?= $value->newVegetables ?> daržovės </h3>
    </div>
</div>
<?php $_SESSION['myVegetables'][$key] = serialize($value)?>
<?php endforeach ?>