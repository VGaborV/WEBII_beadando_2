        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    <?php if(isset($params) && !empty($params)) { ?>
                        <?php if($params) { ?>
                            <h1>Bejelentkezett:</h1>
                            Azonosító: <strong><?= $params['id'] ?></strong><br><br>
                            Név: <strong><?= $params['csaladi_nev']." ".$params['uto_nev'] ?></strong>
                        <?php } else { ?>
                            <h1>A bejelentkezés nem sikerült!</h1>
                            <a href="?oldal=belepes" >Próbálja újra!</a>
                        <?php } ?>
                    <?php } ?>
                    <?php if(isset($params['errormessage'])) { ?>
                        <h2><?= $params['errormessage'] ?></h2>
                    <?php } ?>

                    </div>
                </div>
            </div>
        </div>