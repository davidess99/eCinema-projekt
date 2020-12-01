<div class="container">
      <h2 class="page-title">
        <?php if($action_details == '') {
          echo "Filmy";
        } else if($action_details == 'add-new') {
          echo "Nový film";
        } else if($action_details == 'edit') {
          echo "Úprava filmu";
        }
        ?><span>.</span>
      </h2>  

    <?php if($action_details == '') { ?>
        <?php echo '<a href="/'.$page_name.'?action=add-new" class="btn btn-primary add-new-item-btn"><i class="fas fa-plus"></i> Pridať film</a>'; ?>
        <div class="table-wrapper">
        <table class="table table-striped table-dark table-fancy">
          <thead>
            <tr>
              <th scope="col">Názov filmu</th>
              <th scope="col">Plagát</th>
              <th scope="col">Rozlíšenie</th>
              <th scope="col">Dabing</th>
              <th scope="col">Titulky</th>
              <th scope="col">Vhodné od</th>
              <th scope="col">Premiéra</th>
              <th scope="col">Dĺžka filmu (min)</th>
              <th scope="col">Rok výroby</th>
              <th scope="col">Link na trailer</th>
              <th scope="col"> </th>
            </tr>
          </thead>
          <tbody>
              <?php 
                  foreach($readAll as $row):
                    echo "<tr>";
                      echo "<td>".$row['nazov']."</td>"; // specific value of foreign key 
                      echo "<td><img class='table-poster' src='upload/".$row['plagat']."' alt='plagát'></td>";
                      echo "<td>".$row['rozlisenie']."</td>";
                      echo "<td>".$row['nazov_dabingu']."</td>";
                      echo "<td>".$row['nazov_titulky']."</td>";
                      echo "<td>".$row['vhodne_od']."</td>";
                      echo "<td>".$row['premiera']."</td>";
                      echo "<td>".$row['dlzka_filmu_min']."</td>";
                      echo "<td>".$row['rok_vyroby']."</td>";
                      echo "<td><a href='".$row['link_trailer']."'>".$row['link_trailer']."</a></td>";
                      echo '<td>
                                <a href="/'.$page_name.'?action=edit&id='.$row['id_filmu'].'" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="upraviť"><i class="fas fa-edit"></i></a>
                                <a href="/'.$page_name.'?action=delete&id='.$row['id_filmu'].'" class="btn btn-danger custom-delete-item" data-toggle="modal" data-target="#confirmDeleteModal" data-placement="bottom" title="odstrániť položku"><i class="far fa-trash-alt"></i></a>
                            </td>';
                    echo "</tr>";
                  endforeach;
              ?>
          </tbody>
        </table>
        </div>
      <?php } 
      
      else if($action_details == 'add-new') { ?>
          <form action="<?php echo '/'.$page_name.'?action=add-new'; ?>" method="post" enctype="multipart/form-data">

            <div class="form-row">
              <div class="form-group col-md-12">
                <label>Názov filmu:</label>
                <input type="text" name="nazov" class="form-control" placeholder="Názov filmu" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Rozlíšenie filmu:</label>
                <select name="rozlisenie_id_rozlisenia" class="form-control select2" required>
                    <option></option>
                    <?php 
                        foreach($readRozlisenie as $row):
                            echo "<option value='".$row['id_rozlisenia']."'>".$row['rozlisenie']."</option>";
                        endforeach;
                    ?>
	            </select>
              </div>
              <div class="form-group col-md-6">
                <label>Dabing filmu:</label>
                <select name="dabing_id_dabingu" class="form-control select2" required>
                    <option></option>
                    <?php 
                        foreach($readDabing as $row):
                            echo "<option value='".$row['id_dabingu']."'>".$row['nazov_dabingu']."</option>";
                        endforeach;
                    ?>
	            </select>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Titulky filmu:</label>
                <select name="titulky_id_titulky" class="form-control select2">
                    <option></option>
                    <?php 
                        foreach($readTitulky as $row):
                            echo "<option value='".$row['id_titulky']."'>".$row['nazov_titulky']."</option>";
                        endforeach;
                    ?>
	            </select>
              </div>
              <div class="form-group col-md-6">
                <label>Vhodné od (vek):</label>
                <input type="number" name="vhodne_od" class="form-control" placeholder="Vhodné od (vek)" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Premiéra:</label>
                <input type="text" name="premiera" data-field="datetime" data-format="yyyy-MM-dd hh:mm" class="form-control" placeholder="Premiéra" required>
                <div id="dtBox"></div>
              </div>
              <div class="form-group col-md-6">
                <label>Dĺžka filmu:</label>
                <input type="number" name="dlzka_filmu_min" class="form-control" placeholder="Dĺžka filmu" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Rok výroby:</label>
                <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'');" maxlength="4" name="rok_vyroby" class="form-control" placeholder="RRRR" required>
              </div>
              <div class="form-group col-md-6">
                <label>Link trailer:</label>
                <input type="text" name="link_trailer" class="form-control" placeholder="Link trailer" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-12 foto-upload">
                <label>Plagát k filmu:</label>
                    <div id="image_preview"><img id="previewing" src="/assets/img/poster-placeholder.png" /></div>
                    <div id="selectImage">
                        <input type="file" name="file" id="file" required>
                    </div>
              </div>
            </div>
            <br><br>
            
            <button type="submit" class="btn btn-primary">Pridať záznam</button>
          </form>
      <?php } 
      
      else if($action_details == 'edit') { ?>
        <form action="<?php echo '/'.$page_name.'?action=edit&id='.$edit_film_data['id_filmu'].''; ?>" method="post" enctype="multipart/form-data">

        <div class="form-row">
              <div class="form-group col-md-12">
                <label>Názov filmu:</label>
                <input type="text" name="nazov" class="form-control" placeholder="Názov filmu" value="<?php echo $edit_film_data['nazov']; ?>" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Rozlíšenie filmu:</label>
                <select name="rozlisenie_id_rozlisenia" class="form-control select2" required>
                    <option></option>
                    <?php 
                        foreach($readRozlisenie as $row):
                            if($edit_film_data['rozlisenie_id_rozlisenia'] == $row['id_rozlisenia']) {
                                echo "<option value='".$row['id_rozlisenia']."' selected='selected'>".$row['rozlisenie']."</option>";
                            } else {
                                echo "<option value='".$row['id_rozlisenia']."'>".$row['rozlisenie']."</option>";
                            }
                        endforeach;
                    ?>
	            </select>
              </div>
              <div class="form-group col-md-6">
                <label>Dabing filmu:</label>
                <select name="dabing_id_dabingu" class="form-control select2" required>
                    <option></option>
                    <?php 
                        foreach($readDabing as $row):
                            if($edit_film_data['dabing_id_dabingu'] == $row['id_dabingu']) {
                                echo "<option value='".$row['id_dabingu']."' selected='selected'>".$row['nazov_dabingu']."</option>";
                            } else {
                                echo "<option value='".$row['id_dabingu']."'>".$row['nazov_dabingu']."</option>";
                            }
                        endforeach;
                    ?>
	            </select>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Titulky filmu:</label>
                <select name="titulky_id_titulky" class="form-control select2">
                    <option></option>
                    <?php 
                        foreach($readTitulky as $row):
                            if($edit_film_data['titulky_id_titulky'] == $row['id_titulky']) {
                                echo "<option value='".$row['id_titulky']."' selected='selected'>".$row['nazov_titulky']."</option>";
                            } else {
                                echo "<option value='".$row['id_titulky']."'>".$row['nazov_titulky']."</option>";
                            }
                        endforeach;
                    ?>
	            </select>
              </div>
              <div class="form-group col-md-6">
                <label>Vhodné od (vek):</label>
                <input type="number" name="vhodne_od" class="form-control" placeholder="Vhodné od (vek)" value="<?php echo $edit_film_data['vhodne_od']; ?>" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Premiéra:</label>
                <input type="text" name="premiera" data-field="datetime" data-format="yyyy-MM-dd hh:mm" class="form-control" placeholder="Premiéra" value="<?php echo $edit_film_data['premiera']; ?>" required>
                <div id="dtBox"></div>
              </div>
              <div class="form-group col-md-6">
                <label>Dĺžka filmu:</label>
                <input type="number" name="dlzka_filmu_min" class="form-control" placeholder="Dĺžka filmu" value="<?php echo $edit_film_data['dlzka_filmu_min']; ?>" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Rok výroby:</label>
                <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'');" maxlength="4" name="rok_vyroby" class="form-control" placeholder="RRRR" value="<?php echo $edit_film_data['rok_vyroby']; ?>" required>
              </div>
              <div class="form-group col-md-6">
                <label>Link trailer:</label>
                <input type="text" name="link_trailer" class="form-control" placeholder="Link trailer" value="<?php echo $edit_film_data['link_trailer']; ?>" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-12 foto-upload">
                <label>Plagát k filmu:</label>
                    <div id="image_preview"><img id="previewing" src="/upload/<?php echo $edit_film_data['plagat']; ?>" /></div>
                    <div id="selectImage">
                        <input type="hidden" name="plagat" value="<?php echo $edit_film_data['plagat']; ?>"> 
                        <input type="file" name="file" id="file">
                    </div>
              </div>
            </div>
            <br><br>

            <button type="submit" class="btn btn-primary">Upraviť záznam</button>
          </form>
      <?php } ?> 

</div>