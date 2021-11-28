        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    

        <?php if(isset($params['uzenet'])) { ?>
            <h1><?= $params['uzenet'] ?></h1>
            <?php if($params['ujra']) { ?>
              Próbálja újra!
            <?php } ?>
        <?php } ?>
                      <h3>Regisztrálja magát, ha még nem felhasználó!</h3>
                      <form action = "/regisztralas" method = "post">
                        <fieldset>
                          <legend>Regisztráció</legend>
                          <br>
                          <input type="text" name="vezeteknev" placeholder="vezetéknév" required><br><br>
                          <input type="text" name="utonev" placeholder="utónév" required><br><br>
                          <input type="text" name="felhasznalo" placeholder="felhasználói név" required><br><br>
                          <input type="password" name="jelszo" placeholder="jelszó" required><br><br>
                          <input type="submit" name="regisztracio" value="Regisztráció">
                          <br>&nbsp;
                        </fieldset>
                      </form>
                    </div>
                </div>
            </div>
        </div>