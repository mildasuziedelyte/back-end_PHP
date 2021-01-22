<?php foreach ($store->getAll() as $key => $value):?>
    <div class="plant sodinimas col-6 col-sm-12">
        <div class="img">
            <img src="<?= $value->img ?>" alt="vegetable-photo">
        </div>
        <div class="info">
            <h4> <?= $value->type ?>. Krūmas nr. <?= $value->id ?> </h4>
            <p> Daržovių: <?= $value->count ?> </p>
            <p> Kaina: <?= $value->priceEUR ?> &euro; / <?= $value->priceUSD ?> &#36;</p>
        </div>
        <button class='buttonI' type="button" name="rauti" value="<?= $value->id ?>">Išrauti</button>
    </div>
<?php endforeach ?>