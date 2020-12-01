<div class="container">

      <h2 class="page-title">
        <?php if($action_details == '') {
          echo "Premietacie sály";
        } else if($action_details == 'add-new') {
          echo "Nová premietacia sála";
        } else if($action_details == 'edit') {
          echo "Úprava premietacej sály";
        }
        ?><span>.</span>
      </h2>  


      <?php if($action_details == '') { ?>
        <?php echo '<a href="/'.$page_name.'?action=add-new" class="btn btn-primary add-new-item-btn"><i class="fas fa-plus"></i> Pridať sálu</a>'; ?>
        <table class="table table-striped table-dark table-fancy">
          <thead>
            <tr>
              <th scope="col">Označenie sály</th>
              <th scope="col">Počet miest</th>
              <th scope="col"> </th>
            </tr>
          </thead>
          <tbody>
              <?php 
                  foreach($readAll as $row):
                    echo "<tr>";
                      echo "<td>".$row['oznacenie']."</td>";
                      echo "<td>".$row['pct_miest']."</td>";
                      echo '<td>
                                <!-- <a href="" class="btn btn-primary disabled" data-toggle="tooltip" data-placement="bottom" title="zobraziť viac"><i class="far fa-eye"></i></a> -->
                                <a href="/'.$page_name.'?action=edit&id='.$row['id_saly'].'" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="upraviť"><i class="fas fa-edit"></i></a>
                                <a href="/'.$page_name.'?action=delete&id='.$row['id_saly'].'" class="btn btn-danger custom-delete-item" data-toggle="modal" data-target="#confirmDeleteModal" data-placement="bottom" title="odstrániť položku"><i class="far fa-trash-alt"></i></a>
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
                <label>Označenie sály:</label>
                <input type="text" name="oznacenie" maxlength="3" class="form-control" placeholder="Označenie sály" required>
              </div>
              <div class="form-group col-md-6">
                <label>Počet miest:</label>
                <input type="number" name="pct_miest" class="form-control" placeholder="Počet miest" required>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Pridať záznam</button>
          </form>
      <?php } 
      
      else if($action_details == 'edit') { ?>
        <form action="<?php echo '/'.$page_name.'?action=edit&id='.$edit_sala_data['id_saly'].''; ?>" method="post">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Označenie sály:</label>
                <input type="text" name="oznacenie" maxlength="3" class="form-control" placeholder="Označenie sály" value="<?php echo $edit_sala_data['oznacenie']; ?>" required>
              </div>
              <div class="form-group col-md-6">
                <label>Počet miest:</label>
                <input type="number" name="pct_miest" class="form-control" placeholder="Počet miest" value="<?php echo $edit_sala_data['pct_miest']; ?>" required>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Upraviť záznam</button>
          </form>
      <?php } ?> 


</div>