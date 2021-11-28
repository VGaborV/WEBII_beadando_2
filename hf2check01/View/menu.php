 <aside id="nav">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                    <?php foreach ($params['routes'] as $oldal) { ?>
                                        <?php if(
                                            ! isset($_SESSION['login']) && $oldal['vendeg_latja'] ||
                                            isset($_SESSION['login']) && (
                                                ($oldal['bejelentkezett_latja']  && $_SESSION['szerepkor'] === 'regisztralt') ||
                                                ($oldal['admin_latja']  && $_SESSION['szerepkor'] === 'admin')
                                        )) { ?>
                                            <li class="nav-item <?= (($oldal['url'] === $params['keres']) ? 'active' : '') ?> <?php (count($oldal['gyerekek']) > 0 ? 'dropdown' : '')  ?>">

                                                <?php if(count($oldal['gyerekek']) > 0) {  ?>
                                                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <?= $oldal['cim'] ?>
                                                  </a>
                                                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                    <a class="dropdown-item" href="/<?= $oldal['url'] ?>"><?= $oldal['cim'] ?></a>
                                                    <?php foreach ($oldal['gyerekek'] as $gyerek) { ?>
                                                        <?php if(
                                                            ! isset($_SESSION['login']) && $gyerek['vendeg_latja'] ||
                                                            isset($_SESSION['login']) && (
                                                                ($gyerek['bejelentkezett_latja']  && $_SESSION['szerepkor'] === 'regisztralt') ||
                                                                ($gyerek['admin_latja']  && $_SESSION['szerepkor'] === 'admin')
                                                            )) { ?>
                                                            <a class="dropdown-item" href="<?= $gyerek['url'] ?>"><?= $gyerek['cim'] ?></a>
                                                        <?php } ?>
                                                    <?php } ?>
                                                  </div>
                                                <?php } else { ?>
                                                  <a class="nav-link" href="/<?= $oldal['url'] ?>"><?= $oldal['cim'] ?></a>
                                                <?php } ?>
                                            </li>
                                        <?php } ?>
                                    <?php } ?>

                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
  </aside>