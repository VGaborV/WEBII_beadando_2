        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    Támogatott valuták:
                                <?php foreach($params['valutes'] as $valuta): ?>
                                <?php echo $valuta; ?>,
                                <?php endforeach; ?> 
                        <form action="/devizavaltas" method="POST">
                        Árfolyam lekérése egy napra:
                            <input type="date" name="date" />
                            <button>Lekérés</button>
                        </form>
                    <br>
                    Értékek erre a napra: <?php echo ($params['data']->attributes()->date); ?>
                        <table>
                            <tr><th>Valuta</th><th>Árfolyam forint értéke</th></tr>
                          
                        <?php if(!empty($params)) { 
                            foreach($params['data']->Rate as $dayBefore => $value) {
                                if (is_array($value)) continue;
                                echo "<tr><td>" . $value->attributes()->curr . "</td><td>" . ((float)$value) . "</td></tr>";
                            }
                        } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>