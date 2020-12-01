<div class="container">
      <h2 class="page-title">
        <?php if($action_details == '') {
          echo "Krajiny filmov";
        } else if($action_details == 'add-new') {
          echo "Nová krajina filmu";
        } else if($action_details == 'edit') {
          echo "Úprava krajiny filmu";
        }
        ?><span>.</span>
      </h2>  

    <?php if($action_details == '') { ?>
        <?php echo '<a href="/'.$page_name.'?action=add-new" class="btn btn-primary add-new-item-btn"><i class="fas fa-plus"></i> Pridať krajinu filmu</a>'; ?>
        <div class="table-wrapper">
        <table class="table table-striped table-dark table-fancy">
          <thead>
            <tr>
              <th scope="col">Film</th>
              <th scope="col">Krajina</th>
              <th scope="col"> </th>
            </tr>
          </thead>
          <tbody>
              <?php 
                  foreach($readAll as $row):
                    echo "<tr>";
                      echo "<td>".$row['nazov']."</td>";
                      echo "<td>".$row['krajina']."</td>";
                      echo '<td>
                                <a href="/'.$page_name.'?action=edit&id='.$row['id_film_krajiny'].'" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="upraviť"><i class="fas fa-edit"></i></a>
                                <a href="/'.$page_name.'?action=delete&id='.$row['id_film_krajiny'].'" class="btn btn-danger custom-delete-item" data-toggle="modal" data-target="#confirmDeleteModal" data-placement="bottom" title="odstrániť položku"><i class="far fa-trash-alt"></i></a>
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
              <label>Krajina filmu:</label>
                <select name="krajiny_povodu_id_krajiny" class="form-control select2" required>
                    <option></option>
                    <?php 
                        foreach($readKrajiny as $row):
                            echo "<option value='".$row['id_krajiny']."'>".$row['krajina']."</option>";
                        endforeach;
                    ?>
	              </select>
              </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Pridať záznam</button>
          </form>
      <?php } 
      
      else if($action_details == 'edit') { ?>
          <form action="<?php echo '/'.$page_name.'?action=edit&id='.$edit_film_krajina_data['id_film_krajiny'].''; ?>" method="post">

          <div class="form-row">
              <div class="form-group col-md-6">
                <label>Film:</label>
                <select name="filmy_id_filmu" class="form-control select2" required>
                    <option></option>
                    <?php 
                        foreach($readFilmy as $row):
                            if($edit_film_krajina_data['filmy_id_filmu'] == $row['id_filmu']) {
                                echo "<option value='".$row['id_filmu']."' selected='selected'>".$row['nazov']."</option>";
                            } else {
                                echo "<option value='".$row['id_filmu']."'>".$row['nazov']."</option>";
                            }
                        endforeach;
                    ?>
	              </select>
              </div>
              <div class="form-group col-md-6">
              <label>Krajina filmu:</label>
                <select name="krajiny_povodu_id_krajiny" class="form-control select2" required>
                    <option></option>
                    <?php 
                        foreach($readKrajiny as $row):
                            if($edit_film_krajina_data['krajiny_povodu_id_krajiny'] == $row['id_krajiny']) {
                                echo "<option value='".$row['id_krajiny']."' selected='selected'>".$row['krajina']."</option>";
                            } else {
                                echo "<option value='".$row['id_krajiny']."'>".$row['krajina']."</option>";
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