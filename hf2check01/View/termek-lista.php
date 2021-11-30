<table>
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
  </tr>
<?php foreach($params['termekek'] as $termek) { ?>
  <tr>
    <td><?php echo $termek['id']; ?></td>
    <td><?php echo $termek['gyarto']; ?></td>
    <td><?php echo $termek['tipus']; ?></td>
    <td><?php echo $termek['kijelzo']; ?></td>
    <td><?php echo $termek['memoria']; ?></td>
    <td><?php echo $termek['merevlemez']; ?></td>
    <td><?php echo $termek['videovezerlo']; ?></td>
    <td><?php echo $termek['ar']; ?></td>
    <td><?php echo $termek['processzor']; ?></td>
    <td><?php echo $termek['oprendszer']; ?></td>
    <td><?php echo $termek['db']; ?></td>
  </tr>
<?php } ?>
</table>
