<div class="container">
      <h2 class="page-title">
        <?php if($action_details == '') {
          echo "Titulky filmov";
        } else if($action_details == 'add-new') {
          echo "Nové titulky filmov";
        } else if($action_details == 'edit') {
          echo "Úprava titulky filmov";
        }
        ?><span>.</span>
      </h2>  

    <?php if($action_details == '') { ?>
        <?php echo '<a href="/'.$page_name.'?action=add-new" class="btn btn-primary add-new-item-btn"><i class="fas fa-plus"></i> Pridať titulky</a>'; ?>
        <table class="table table-striped table-dark table-fancy">
          <thead>
            <tr>
              <th scope="col">Označenie titulky</th>
              <th scope="col">Názov titulky</th>
              <th scope="col"> </th>
            </tr>
          </thead>
          <tbody>
              <?php 
                  foreach($readAll as $row):
                    echo "<tr>";
                      echo "<td>".$row['oznacenie_titulky']."</td>";
                      echo "<td>".$row['nazov_titulky']."</td>";
                      echo '<td>
                                <a href="/'.$page_name.'?action=edit&id='.$row['id_titulky'].'" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="upraviť"><i class="fas fa-edit"></i></a>
                                <a href="/'.$page_name.'?action=delete&id='.$row['id_titulky'].'" class="btn btn-danger custom-delete-item" data-toggle="modal" data-target="#confirmDeleteModal" data-placement="bottom" title="odstrániť položku"><i class="far fa-trash-alt"></i></a>
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
                <label>Označenie titulky:</label>
                <input type="text" name="oznacenie_titulky" maxlength="2" class="form-control" placeholder="Označenie titulky" required>
              </div>
              <div class="form-group col-md-6">
                <label>Názov titulky:</label>
                <input type="text" name="nazov_titulky" class="form-control" placeholder="Názov titulky" required>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Pridať záznam</button>
          </form>
      <?php } 
      
      else if($action_details == 'edit') { ?>
        <form action="<?php echo '/'.$page_name.'?action=edit&id='.$edit_titulky_data['id_titulky'].''; ?>" method="post">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Označenie titulky:</label>
                <input type="text" name="oznacenie_titulky" maxlength="2" class="form-control" placeholder="Označenie titulky" value="<?php echo $edit_titulky_data['oznacenie_titulky']; ?>" required>
              </div>
              <div class="form-group col-md-6">
                <label>Názov titulky:</label>
                <input type="text" name="nazov_titulky" class="form-control" placeholder="Názov titulky" value="<?php echo $edit_titulky_data['nazov_titulky']; ?>" required>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Upraviť záznam</button>
          </form>
      <?php } ?> 

</div>