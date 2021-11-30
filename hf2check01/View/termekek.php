
  <div class="container">
      <div class="row">
          <div class="col-md-12">
            <h3>Szűrés</h3>
            Operációs rendszer: <select id="oprendszer-szures">
              <option value="">Mind</option>
<?php
if (!empty($params['oprendszerek'])) {
    foreach($params['oprendszerek'] as $oprendszer) {
        ?>

                <option value="<?php echo $oprendszer['id']?>"><?php echo $oprendszer['nev']?></option>
        <?php
    }
}
?>
            </select>
            Gép gyártó: <select id="gyarto-szures">
              <option value="">Mind</option>
                  <?php
                  if (!empty($params['gepGyarto'])) {
                      foreach($params['gepGyarto'] as $gepgyarto) {
                          ?>
                        <option value="<?php echo $gepgyarto['gyarto']?>"><?php echo $gepgyarto['gyarto']?></option>
                          <?php
                      }
                  }
                  ?>
            </select>
            Processzor gyártója:
            <select id="processzor-gyarto-szures">
              <option value="">Mind</option>
                <?php
                if (!empty($params['processzorGyarto'])) {
                    foreach($params['processzorGyarto'] as $gyarto) {
                        ?>
                      <option value="<?php echo $gyarto['gyarto']?>"><?php echo $gyarto['gyarto']?></option>
                        <?php
                    }
                }
                ?>
            </select>
            <button class="btn btn-primary" id="termekSzures">Szűrés</button>
            <button class="btn btn-primary" id="pdfExport">PDF Exportálás</button>
          </div>
        <div class="row">
          <div class="col-md-12">
            <div id="termek-tartalom"></div>
          </div>
      </div>
  </div>
<script>
  var termekek = new Termekek();
  termekek.init();
  termekek.termekBetoltes();
</script>