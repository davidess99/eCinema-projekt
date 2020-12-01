<div class="container">
      <h2 class="page-title">
        <?php if($action_details == '') {
          echo "Herci filmov";
        } else if($action_details == 'add-new') {
          echo "Nový herec filmov";
        } else if($action_details == 'edit') {
          echo "Úprava herca filmov";
        }
        ?><span>.</span>
      </h2>  

    <?php if($action_details == '') { ?>
        <?php echo '<a href="/'.$page_name.'?action=add-new" class="btn btn-primary add-new-item-btn"><i class="fas fa-plus"></i> Pridať herca</a>'; ?>
        <table class="table table-striped table-dark table-fancy">
          <thead>
            <tr>
              <th scope="col">Meno</th>
              <th scope="col">Priezvisko</th>
              <th scope="col"> </th>
            </tr>
          </thead>
          <tbody>
              <?php 
                  foreach($readAll as $row):
                    echo "<tr>";
                      echo "<td>".$row['meno']."</td>";
                      echo "<td>".$row['priezvisko']."</td>";
                      echo '<td>
                                <a href="/'.$page_name.'?action=edit&id='.$row['id_herca'].'" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="upraviť"><i class="fas fa-edit"></i></a>
                                <a href="/'.$page_name.'?action=delete&id='.$row['id_herca'].'" class="btn btn-danger custom-delete-item" data-toggle="modal" data-target="#confirmDeleteModal" data-placement="bottom" title="odstrániť položku"><i class="far fa-trash-alt"></i></a>
                            </td>';
                    echo "</tr>";
                  endforeach;
              ?>
          </tbody>
        </table>
      <?php } 
      
      else if($action_details == 'add-new') { ?>
          <form action="<?php echo '/'.$page_name.'?action=add-new'; ?>" method="post">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Meno:</label>
                <input type="text" name="meno" class="form-control" placeholder="Meno" required>
              </div>
              <div class="form-group col-md-6">
                <label>Priezvisko:</label>
                <input type="text" name="priezvisko" class="form-control" placeholder="Priezvisko" required>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Pridať záznam</button>
          </form>
      <?php } 
      
      else if($action_details == 'edit') { ?>
        <form action="<?php echo '/'.$page_name.'?action=edit&id='.$edit_herec_data['id_herca'].''; ?>" method="post">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Meno:</label>
                <input type="text" name="meno" class="form-control" placeholder="Meno" value="<?php echo $edit_herec_data['meno']; ?>" required>
              </div>
              <div class="form-group col-md-6">
                <label>Priezvisko:</label>
                <input type="text" name="priezvisko" class="form-control" placeholder="Priezvisko" value="<?php echo $edit_herec_data['priezvisko']; ?>" required>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Upraviť záznam</button>
          </form>
      <?php } ?> 

</div>