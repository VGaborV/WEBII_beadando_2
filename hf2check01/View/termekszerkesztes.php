<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h3>Szerkesztés / beszúrás</h3>
      <form id="szerkesztoform" method="POST">
        <?php foreach(['id', 'gyarto', 'tipus', 'kijelzo', 'memoria', 'merevlemez', 'videovezerlo', 'ar', 'processzorid', 'oprendszerid', 'db'] as $field) { ?>
           <?php echo $field; ?>: <input id="szerkeszt-<?php echo $field; ?>" type="text" name="<?php echo $field; ?>"><br>
        <?php } ?>
        <button>Küldés</button>
      </form>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table id="szerkeszteslista">
        <tr>
          <th>ID</th>
          <th>Gyarto</th>
          <th>Típus</th>
          <th>Kijelző</th>
          <th>Memória</th>
          <th>Merevlemez</th>
          <th>Videóvezérlő</th>
          <th>Ár</th>
          <th>Processzor</th>
          <th>Operációs rendszer</th>
          <th>Darab</th>
          <th>Akciók</th>
        </tr>
      </table>
    </div>
  </div>
</div>

<script>
  var termekszerkesztes = new Termekszerkesztes();
  termekszerkesztes.init();
  termekszerkesztes.termekBetoltes();
</script>