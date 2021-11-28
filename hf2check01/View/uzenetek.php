 <aside id="nav">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
<?php
if (!empty($params['rows'])) {
    foreach($params['rows'] as $row) {
        ?>
        <div class="message">
            <div class="head">
                <span class="id">#<?php echo $row['id']?></span>
                <span class="name"><?php echo $row['nev']?></span>
                (<span class="email"><?php echo $row['email']?></span>):
                <span class="subject"><?php echo $row['targy']?></span>
            </div>
            <div class="content">
                <?php echo nl2br($row['message']); ?>
            </div>
        </div>
        <?php
    }
}
?>
                    </div>
                </div>
            </div>
  </aside>