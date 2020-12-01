<div class="container">
      <h2 class="page-title">
        <?php if($action_details == '') {
          echo "Dabing filmov";
        } else if($action_details == 'add-new') {
          echo "Nový dabing filmov";
        } else if($action_details == 'edit') {
          echo "Úprava dabingu filmov";
        }
        ?><span>.</span>
      </h2>  

    <?php if($action_details == '') { ?>
        <?php echo '<a href="/'.$page_name.'?action=add-new" class="btn btn-primary add-new-item-btn"><i class="fas fa-plus"></i> Pridať dabing</a>'; ?>
        <table class="table table-striped table-dark table-fancy">
          <thead>
            <tr>
              <th scope="col">Označenie dabingu</th>
              <th scope="col">Názov dabingu</th>
              <th scope="col"> </th>
            </tr>
          </thead>
          <tbody>
              <?php 
                  foreach($readAll as $row):
                    echo "<tr>";
                      echo "<td>".$row['oznacenie_dabingu']."</td>";
                      echo "<td>".$row['nazov_dabingu']."</td>";
                      echo '<td>
                                <a href="/'.$page_name.'?action=edit&id='.$row['id_dabingu'].'" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="upraviť"><i class="fas fa-edit"></i></a>
                                <a href="/'.$page_name.'?action=delete&id='.$row['id_dabingu'].'" class="btn btn-danger custom-delete-item" data-toggle="modal" data-target="#confirmDeleteModal" data-placement="bottom" title="odstrániť položku"><i class="far fa-trash-alt"></i></a>
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
                <label>Označenie dabingu:</label>
                <input type="text" name="oznacenie_dabingu" maxlength="2" class="form-control" placeholder="Označenie dabingu" required>
              </div>
              <div class="form-group col-md-6">
                <label>Názov dabingu:</label>
                <input type="text" name="nazov_dabingu" class="form-control" placeholder="Názov dabingu" required>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Pridať záznam</button>
          </form>
      <?php } 
      
      else if($action_details == 'edit') { ?>
        <form action="<?php echo '/'.$page_name.'?action=edit&id='.$edit_dabing_data['id_dabingu'].''; ?>" method="post">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Označenie dabingu:</label>
                <input type="text" name="oznacenie_dabingu" maxlength="2" class="form-control" placeholder="Označenie dabingu" value="<?php echo $edit_dabing_data['oznacenie_dabingu']; ?>" required>
              </div>
              <div class="form-group col-md-6">
                <label>Názov dabingu:</label>
                <input type="text" name="nazov_dabingu" class="form-control" placeholder="Názov dabingu" value="<?php echo $edit_dabing_data['nazov_dabingu']; ?>" required>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Upraviť záznam</button>
          </form>
      <?php } ?> 

</div>