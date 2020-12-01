<div class="container">
      <h2 class="page-title">
        <?php if($action_details == '') {
          echo "Platobné údaje";
        } else if($action_details == 'add-new') {
          echo "Nový platobný údaj";
        } else if($action_details == 'edit') {
          echo "Úprava platobného údaja";
        }
        ?><span>.</span>
      </h2>  

    <?php if($action_details == '') { ?>
        <?php echo '<a href="/'.$page_name.'?action=add-new" class="btn btn-primary add-new-item-btn"><i class="fas fa-plus"></i> Pridať platobný údaj</a>'; ?>
        <div class="table-wrapper">
        <table class="table table-striped table-dark table-fancy">
          <thead>
            <tr>
              <th scope="col">Zákazník</th>
              <th scope="col">Číslo karty</th>
              <th scope="col">Platnosť karty</th>
              <th scope="col">CVV kód</th>
              <th scope="col"> </th>
            </tr>
          </thead>
          <tbody>
              <?php 
                  foreach($readAll as $row):
                    echo "<tr>";
                      echo "<td>".$row['meno']." ".$row['priezvisko']."</td>"; // specific value of foreign key 
                      echo "<td>".$row['cislo_karty']."</td>";
                      echo "<td>".$row['platnost_karty']."</td>";
                      echo "<td>".$row['cvv_kod']."</td>";
                      echo '<td>
                                <a href="/'.$page_name.'?action=edit&id='.$row['id_plat_udaja'].'" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="upraviť"><i class="fas fa-edit"></i></a>
                                <a href="/'.$page_name.'?action=delete&id='.$row['id_plat_udaja'].'" class="btn btn-danger custom-delete-item" data-toggle="modal" data-target="#confirmDeleteModal" data-placement="bottom" title="odstrániť položku"><i class="far fa-trash-alt"></i></a>
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
                <label>Zákazník:</label>
                <select name="zakaznici_id_zakaznika" class="form-control select2" required>
                    <option></option>
                    <?php 
                        foreach($readAll as $row):
                            echo "<option value='".$row['id_zakaznika']."'>".$row['meno']." ".$row['priezvisko']."</option>";
                        endforeach;
                    ?>
	            </select>
              </div>
              <div class="form-group col-md-6">
                <label>Číslo karty:</label>
                <input type="text" name="cislo_karty" maxlength="16" class="form-control" placeholder="Číslo karty" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Platnosť karty:</label>
                <input type="text" name="platnost_karty" maxlength="5" class="form-control" placeholder="Platnosť karty" required>
              </div>
              <div class="form-group col-md-6">
                <label>CVV kód:</label>
                <input type="text" name="cvv_kod" maxlength="3" class="form-control" placeholder="CVV kód" required>
              </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Pridať záznam</button>
          </form>
      <?php } 
      
      else if($action_details == 'edit') { ?>
        <form action="<?php echo '/'.$page_name.'?action=edit&id='.$edit_plat_udaj_data['id_plat_udaja'].''; ?>" method="post">

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Zákazník:</label>
                <select name="zakaznici_id_zakaznika" class="form-control select2" required>
                    <option></option>
                    <?php 
                        foreach($readAll as $row):
                            if($edit_plat_udaj_data['zakaznici_id_zakaznika'] == $row['id_zakaznika']) {
                                echo "<option value='".$row['id_zakaznika']."' selected='selected'>".$row['meno']." ".$row['priezvisko']."</option>";
                            } else {
                                echo "<option value='".$row['id_zakaznika']."'>".$row['meno']." ".$row['priezvisko']."</option>";
                            }
                        endforeach;
                    ?>
	            </select>
              </div>
              <div class="form-group col-md-6">
                <label>Číslo karty:</label>
                <input type="text" name="cislo_karty" maxlength="16" class="form-control" placeholder="Číslo karty" value="<?php echo $edit_plat_udaj_data['cislo_karty']; ?>" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Platnosť karty:</label>
                <input type="text" name="platnost_karty" maxlength="5" class="form-control" placeholder="Platnosť karty" value="<?php echo $edit_plat_udaj_data['platnost_karty']; ?>" required>
              </div>
              <div class="form-group col-md-6">
                <label>CVV kód:</label>
                <input type="text" name="cvv_kod" maxlength="3" class="form-control" placeholder="CVV kód" value="<?php echo $edit_plat_udaj_data['cvv_kod']; ?>" required>
              </div>
            </div>

            <button type="submit" class="btn btn-primary">Upraviť záznam</button>
          </form>
      <?php } ?> 

</div>