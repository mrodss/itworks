<table class="table">
    <?php foreach ($listaExtrato as $item): ?>
    <tr>
        <td><?php echo $item->id; ?></td>
        <td><?php echo $item->valor; ?></td>
        <td><?php echo $item->movimentacao; ?></td>
        <td><?php echo $item->dataRegistro; ?></td>
    </tr> 
    <?php endforeach; ?>

  </table>