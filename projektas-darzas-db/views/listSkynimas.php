<?php foreach ($store->getAll() as $key => $value):?>
                <div class="plant col-6 col-lg-12">
                    <div class="img">
                        <img src="<?= $value->img ?>" alt="vegetable-photo">
                    </div>
                    <div class="info">
                        <h4> <?= $value->type ?>. Krūmas nr. <?= $value->id ?> </h4>
                        <p class='p'> Daržovių: <?= $value->count ?>. Kaina: <?= $value->priceEUR ?> &euro; / <?= $value->priceUSD ?> &#36; </p>
                        <?php if($value->count > 0):?>
                            <label for="">Skinamų daržovių skaičius:</label>
                            <div class="input">
                                <input type="text" name="kiekisSkinti[<?= $value->id ?>]">
                                <button class="buttonS" type="button" name="skinti" value="<?= $value->id ?>">Skinti</button>
                            </div>
                                <div class="er"><?= $value->error ?></div>
                            <button class="buttonS buttonVisus" type="submit" name="skintiVisus" value="<?= $value->id ?>">Skinti Visus</button>
                        <?php else:?>
                            <div class="er"><?= $value->error ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach ?>