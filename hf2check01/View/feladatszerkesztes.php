<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h3>Szerkesztés / beszúrás</h3>
      <form id="szerkesztoform" method="POST">
        <?php foreach(['userId', 'id', 'title', 'completed'] as $field) { ?>
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
          <th>userId</th>
          <th>id</th>
          <th>title</th>
          <th>completed</th>
        </tr>
      </table>
    </div>
  </div>
</div>

<script>
  var feladatszerkesztes = new Feladatszerkesztes();
  feladatszerkesztes.init();
  feladatszerkesztes.feladatBetoltes();
</script>