<div class="container">
      <h2 class="page-title">
        <?php if($action_details == '') {
          echo "Premietanie filmov";
        } else if($action_details == 'add-new') {
          echo "Nové premietanie filmu";
        } else if($action_details == 'edit') {
          echo "Úprava premietania filmu";
        }
        ?><span>.</span>
      </h2>  

    <?php if($action_details == '') { ?>
        <?php echo '<a href="/'.$page_name.'?action=add-new" class="btn btn-primary add-new-item-btn"><i class="fas fa-plus"></i> Pridať premietanie filmu</a>'; ?>
        <div class="table-wrapper">
        <table class="table table-striped table-dark table-fancy">
          <thead>
            <tr>
              <th scope="col">Film</th>
              <th scope="col">Premietacia sála</th>
              <th scope="col">Dátum - čas</th>
              <th scope="col">Cena</th>
              <th scope="col">Cena po zľave</th>
              <th scope="col"> </th>
            </tr>
          </thead>
          <tbody>
              <?php 
                  foreach($readAll as $row):
                    echo "<tr>";
                      echo "<td>".$row['nazov']."</td>";
                      echo "<td>".$row['oznacenie']."</td>";
                      echo "<td>".$row['datum_cas']."</td>";
                      echo "<td>".$row['cena']." €</td>";
                      echo "<td>".$row['cena_zlava']." €</td>";
                      echo '<td>
                                <a href="/'.$page_name.'?action=edit&id='.$row['id_premietania'].'" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="upraviť"><i class="fas fa-edit"></i></a>
                                <a href="/'.$page_name.'?action=delete&id='.$row['id_premietania'].'" class="btn btn-danger custom-delete-item" data-toggle="modal" data-target="#confirmDeleteModal" data-placement="bottom" title="odstrániť položku"><i class="far fa-trash-alt"></i></a>
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
                <label>Sála:</label>
                <select name="saly_id_saly" class="form-control select2" required>
                    <option></option>
                    <?php 
                        foreach($readSaly as $row):
                            echo "<option value='".$row['id_saly']."'>".$row['oznacenie']."</option>";
                        endforeach;
                    ?>
	            </select>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Dátum a čas:</label>
                <input type="text" name="datum_cas" data-field="datetime" data-format="yyyy-MM-dd hh:mm" class="form-control" placeholder="Dátum a čas" required>
                <div id="dtBox"></div>
              </div>
              <div class="form-group col-md-6">
                <label>Cena:</label>
                <input type="number" step="any" name="cena" class="form-control" placeholder="Cena" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Cena po zľave:</label>
                <input type="number" step="any" name="cena_zlava" class="form-control" placeholder="Cena po zľave" required>
              </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Pridať záznam</button>
          </form>
      <?php } 
      
      else if($action_details == 'edit') { ?>
        <form action="<?php echo '/'.$page_name.'?action=edit&id='.$edit_premietanie_data['id_premietania'].''; ?>" method="post">

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Film:</label>
                <select name="filmy_id_filmu" class="form-control select2" required>
                    <option></option>
                    <?php 
                        foreach($readFilmy as $row):
                            if($edit_premietanie_data['filmy_id_filmu'] == $row['id_filmu']) {
                                echo "<option value='".$row['id_filmu']."' selected='selected'>".$row['nazov']."</option>";
                            } else {
                                echo "<option value='".$row['id_filmu']."'>".$row['nazov']."</option>";
                            }
                        endforeach;
                    ?>
	            </select>
              </div>
              <div class="form-group col-md-6">
                <label>Sála:</label>
                <select name="saly_id_saly" class="form-control select2" required>
                    <option></option>
                    <?php 
                        foreach($readSaly as $row):
                            if($edit_premietanie_data['saly_id_saly'] == $row['id_saly']) {
                                echo "<option value='".$row['id_saly']."' selected='selected'>".$row['oznacenie']."</option>";
                            } else {
                                echo "<option value='".$row['id_saly']."'>".$row['oznacenie']."</option>";
                            }
                        endforeach;
                    ?>
	            </select>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Dátum a čas:</label>
                <input type="text" name="datum_cas" data-field="datetime" data-format="yyyy-MM-dd hh:mm" class="form-control" placeholder="Dátum a čas" value="<?php echo $edit_premietanie_data['datum_cas']; ?>" required>
                <div id="dtBox"></div>
              </div>
              <div class="form-group col-md-6">
                <label>Cena:</label>
                <input type="number" step="any" name="cena" class="form-control" placeholder="Cena" value="<?php echo $edit_premietanie_data['cena']; ?>" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Cena po zľave:</label>
                <input type="number" step="any" name="cena_zlava" class="form-control" placeholder="Cena po zľave" value="<?php echo $edit_premietanie_data['cena_zlava']; ?>" required>
              </div>
            </div>

            
            <button type="submit" class="btn btn-primary">Upraviť záznam</button>
          </form>
      <?php } ?> 

</div>