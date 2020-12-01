<div class="container">
      <h2 class="page-title">
        <?php if($action_details == '') {
          echo "Herci filmov";
        } else if($action_details == 'add-new') {
          echo "Nový herec filmu";
        } else if($action_details == 'edit') {
          echo "Úprava herca filmu";
        }
        ?><span>.</span>
      </h2>  

    <?php if($action_details == '') { ?>
        <?php echo '<a href="/'.$page_name.'?action=add-new" class="btn btn-primary add-new-item-btn"><i class="fas fa-plus"></i> Pridať herca filmu</a>'; ?>
        <div class="table-wrapper">
        <table class="table table-striped table-dark table-fancy">
          <thead>
            <tr>
              <th scope="col">Film</th>
              <th scope="col">Herec</th>
              <th scope="col"> </th>
            </tr>
          </thead>
          <tbody>
              <?php 
                  foreach($readAll as $row):
                    echo "<tr>";
                      echo "<td>".$row['nazov']."</td>";
                      echo "<td>".$row['meno']." ".$row['priezvisko']."</td>";
                      echo '<td>
                                <a href="/'.$page_name.'?action=edit&id='.$row['id_film_herca'].'" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="upraviť"><i class="fas fa-edit"></i></a>
                                <a href="/'.$page_name.'?action=delete&id='.$row['id_film_herca'].'" class="btn btn-danger custom-delete-item" data-toggle="modal" data-target="#confirmDeleteModal" data-placement="bottom" title="odstrániť položku"><i class="far fa-trash-alt"></i></a>
                            </td>';
                    echo "</tr>";
                  endforeach;
              ?>
          </tbody>
        </table>
        </div>
      <?php } 
      
      else if($action_details == 'add-new') { ?>
          <form action="<?php echo '/'.$page_name.'?action=add-new'; ?>" method="post">

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Film:</label>
                <select name="filmy_id_filmu" class="form-control select2" required>
                    <option></option>
                    <?php 
                        foreach($readFilmy as $row):
                            echo "<option value='".$row['id_filmu']."'>".$row['nazov']."</option>";
                        endforeach;
                    ?>
	              </select>
              </div>
              <div class="form-group col-md-6">
              <label>Herec filmu:</label>
                <select name="herci_id_herca" class="form-control select2" required>
                    <option></option>
                    <?php 
                        foreach($readHerci as $row):
                            echo "<option value='".$row['id_herca']."'>".$row['meno']." ".$row['priezvisko']."</option>";
                        endforeach;
                    ?>
	              </select>
              </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Pridať záznam</button>
          </form>
      <?php } 
      
      else if($action_details == 'edit') { ?>
          <form action="<?php echo '/'.$page_name.'?action=edit&id='.$edit_film_herec_data['id_film_herca'].''; ?>" method="post">

          <div class="form-row">
              <div class="form-group col-md-6">
                <label>Film:</label>
                <select name="filmy_id_filmu" class="form-control select2" required>
                    <option></option>
                    <?php 
                        foreach($readFilmy as $row):
                            if($edit_film_herec_data['filmy_id_filmu'] == $row['id_filmu']) {
                                echo "<option value='".$row['id_filmu']."' selected='selected'>".$row['nazov']."</option>";
                            } else {
                                echo "<option value='".$row['id_filmu']."'>".$row['nazov']."</option>";
                            }
                        endforeach;
                    ?>
	              </select>
              </div>
              <div class="form-group col-md-6">
              <label>Herec filmu:</label>
                <select name="herci_id_herca" class="form-control select2" required>
                    <option></option>
                    <?php 
                        foreach($readHerci as $row):
                            if($edit_film_herec_data['herci_id_herca'] == $row['id_herca']) {
                                echo "<option value='".$row['id_herca']."' selected='selected'>".$row['meno']." ".$row['priezvisko']."</option>";
                            } else {
                                echo "<option value='".$row['id_herca']."'>".$row['meno']." ".$row['priezvisko']."</option>";
                            }
                        endforeach;
                    ?>
	              </select>
              </div>
            </div>

            <button type="submit" class="btn btn-primary">Upraviť záznam</button>
          </form>
      <?php } ?> 

</div>