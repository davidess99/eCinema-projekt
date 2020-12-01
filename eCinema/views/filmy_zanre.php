<div class="container">
      <h2 class="page-title">
        <?php if($action_details == '') {
          echo "Žánre filmov";
        } else if($action_details == 'add-new') {
          echo "Nový žáner filmu";
        } else if($action_details == 'edit') {
          echo "Úprava žánru filmu";
        }
        ?><span>.</span>
      </h2>  

    <?php if($action_details == '') { ?>
        <?php echo '<a href="/'.$page_name.'?action=add-new" class="btn btn-primary add-new-item-btn"><i class="fas fa-plus"></i> Pridať žáner filmu</a>'; ?>
        <div class="table-wrapper">
        <table class="table table-striped table-dark table-fancy">
          <thead>
            <tr>
              <th scope="col">Film</th>
              <th scope="col">Žáner</th>
              <th scope="col"> </th>
            </tr>
          </thead>
          <tbody>
              <?php 
                  foreach($readAll as $row):
                    echo "<tr>";
                      echo "<td>".$row['nazov']."</td>";
                      echo "<td>".$row['zaner']."</td>";
                      echo '<td>
                                <a href="/'.$page_name.'?action=edit&id='.$row['id_film_zanru'].'" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="upraviť"><i class="fas fa-edit"></i></a>
                                <a href="/'.$page_name.'?action=delete&id='.$row['id_film_zanru'].'" class="btn btn-danger custom-delete-item" data-toggle="modal" data-target="#confirmDeleteModal" data-placement="bottom" title="odstrániť položku"><i class="far fa-trash-alt"></i></a>
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
              <label>Žáner filmu:</label>
                <select name="zanre_filmu_id_zanru" class="form-control select2" required>
                    <option></option>
                    <?php 
                        foreach($readZanre as $row):
                            echo "<option value='".$row['id_zanru']."'>".$row['zaner']."</option>";
                        endforeach;
                    ?>
	              </select>
              </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Pridať záznam</button>
          </form>
      <?php } 
      
      else if($action_details == 'edit') { ?>
          <form action="<?php echo '/'.$page_name.'?action=edit&id='.$edit_film_zaner_data['id_film_zanru'].''; ?>" method="post">

          <div class="form-row">
              <div class="form-group col-md-6">
                <label>Film:</label>
                <select name="filmy_id_filmu" class="form-control select2" required>
                    <option></option>
                    <?php 
                        foreach($readFilmy as $row):
                            if($edit_film_zaner_data['filmy_id_filmu'] == $row['id_filmu']) {
                                echo "<option value='".$row['id_filmu']."' selected='selected'>".$row['nazov']."</option>";
                            } else {
                                echo "<option value='".$row['id_filmu']."'>".$row['nazov']."</option>";
                            }
                        endforeach;
                    ?>
	              </select>
              </div>
              <div class="form-group col-md-6">
              <label>Žáner filmu:</label>
                <select name="zanre_filmu_id_zanru" class="form-control select2" required>
                    <option></option>
                    <?php 
                        foreach($readZanre as $row):
                            if($edit_film_zaner_data['zanre_filmu_id_zanru'] == $row['id_zanru']) {
                                echo "<option value='".$row['id_zanru']."' selected='selected'>".$row['zaner']."</option>";
                            } else {
                                echo "<option value='".$row['id_zanru']."'>".$row['zaner']."</option>";
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