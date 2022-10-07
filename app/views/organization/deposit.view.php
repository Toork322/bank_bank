<html>
<head>
    <?php $this->view('includes/head.tags') ?>
</head>
<body>
    <?php $this->view('includes/header') ?>
    <div class="container">
        <div class="row" style="text-align:center; margin-top:5%">
            <h3>Депозиты организациям</h3>
            <?php foreach($data as $array): ?>
                <div class="col">
                    <div class="card mb-4 box-shadow">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal"><?= $array['name']; ?></h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled mt-3 mb-4">
                            <li><?= $array['describe1']; ?></li>
                            <li><?= $array['describe2']; ?></li>
                            <li><?= $array['describe3']; ?></li>
                            </ul>
                            <button type="button" class="btn btn-lg btn-block btn-outline-primary" 
                            data-bs-toggle="modal" data-bs-target="#<?= $array['data-bs-target']; ?>">Оформить</button>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php foreach($data as $array): ?>
        <div class="modal fade" id="<?= $array['data-bs-target']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><?= $array['name']; ?></h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                    </div>

                    <div class="modal-body">
                        <form style="text-align: center;" method="POST">
                            <h5>Данные по депозиту</h5>
                            <input type="hidden" name="rate" value="<?= $array['rate']; ?>">
                            <label class="form-label">Введите срок (в месяцах)</label> 
                            <input name="period" type="number" min="<?= $array['period-min']; ?>" max="<?= $array['period-max']; ?>" class="form-control" required>
                            <br>
                            <fieldset>
                                <legend>Периодичность капитализации:</legend>
                                <div>
                                  <input type="radio" name="capitalization_period_type" value="0" checked>
                                  <label>Ежемесячно</label>
                                </div>

                                <div>
                                  <input type="radio" name="capitalization_period_type" value="1">
                                  <label>В конце срока</label>
                                </div>
                            </fieldset>
                            <br>
                            <br>
                            <h5>Данные организации</h5>
                            <?php $this->view('includes/organization.data') ?>
                            <h5>Данные физического лица</h5>
                            <?php $this->view('includes/individual.data') ?>
                            <br>
                            <br>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                            <button type="submit" class="btn btn-primary">Подтвердить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</body>

</html>