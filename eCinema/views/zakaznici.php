<div class="container">
      <h2 class="page-title">
        <?php if($action_details == '') {
          echo "Zákazníci";
        } else if($action_details == 'add-new') {
          echo "Nový zákazník";
        } else if($action_details == 'edit') {
          echo "Úprava zákazníka";
        }
        ?><span>.</span>
      </h2>  

    <?php if($action_details == '') { ?>
        <?php echo '<a href="/'.$page_name.'?action=add-new" class="btn btn-primary add-new-item-btn"><i class="fas fa-plus"></i> Pridať zákazníka</a>'; ?>
        <div class="table-wrapper">
        <table class="table table-striped table-dark table-fancy">
          <thead>
            <tr>
              <th scope="col">Meno</th>
              <th scope="col">Priezvisko</th>
              <th scope="col">Dátum narodenia</th>
              <th scope="col">Pohlavie</th>
              <th scope="col">Email</th>
              <th scope="col">Heslo</th>
              <th scope="col">Tel. číslo</th>
              <th scope="col"> </th>
            </tr>
          </thead>
          <tbody>
              <?php 
                  foreach($readAll as $row):
                    echo "<tr>";
                      echo "<td>".$row['meno']."</td>";
                      echo "<td>".$row['priezvisko']."</td>";
                      echo "<td>".$row['datum_narodenia']."</td>";
                      echo "<td>".$row['pohlavie']."</td>";
                      echo "<td>".$row['email']."</td>";
                      echo "<td>".$row['heslo']."</td>";
                      echo "<td>".$row['tel_cislo']."</td>";
                      echo '<td>
                                <a href="/'.$page_name.'?action=edit&id='.$row['id_zakaznika'].'" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="upraviť"><i class="fas fa-edit"></i></a>
                                <a href="/'.$page_name.'?action=delete&id='.$row['id_zakaznika'].'" class="btn btn-danger custom-delete-item" data-toggle="modal" data-target="#confirmDeleteModal" data-placement="bottom" title="odstrániť položku"><i class="far fa-trash-alt"></i></a>
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
                <label>Meno:</label>
                <input type="text" name="meno" class="form-control" placeholder="Meno" required>
              </div>
              <div class="form-group col-md-6">
                <label>Priezvisko:</label>
                <input type="text" name="priezvisko" class="form-control" placeholder="Priezvisko" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Dátum narodenia:</label>
                <input name="datum_narodenia" data-field="date" class="form-control" data-format="yyyy-MM-dd" placeholder="Dátum narodenia" required>
                <div id="dtBox"></div>
              </div>
              <div class="form-group col-md-6">
                <label>Pohlavie:</label><br>
                <label class="radio-inline"><input type="radio" name="pohlavie" value="muž" checked> muž</label>
                <label class="radio-inline"><input type="radio" name="pohlavie" value="žena"> žena</label>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" placeholder="Email" required>
              </div>
              <div class="form-group col-md-6">
                <label>Heslo:</label>
                <input type="password" name="heslo" class="form-control" placeholder="Heslo">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-12">
                <label>Tel. číslo:</label>
                <input type="text" name="tel_cislo" class="form-control" placeholder="Formát: 09XX XXX XXX" required>
              </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Pridať záznam</button>
          </form>
      <?php } 
      
      else if($action_details == 'edit') { ?>
        <form action="<?php echo '/'.$page_name.'?action=edit&id='.$edit_zakaznik_data['id_zakaznika'].''; ?>" method="post">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Meno:</label>
                <input type="text" name="meno" class="form-control" placeholder="Meno" value="<?php echo $edit_zakaznik_data['meno']; ?>" required>
              </div>
              <div class="form-group col-md-6">
                <label>Priezvisko:</label>
                <input type="text" name="priezvisko" class="form-control" placeholder="Priezvisko" value="<?php echo $edit_zakaznik_data['priezvisko']; ?>" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Dátum narodenia:</label>
                <input name="datum_narodenia" data-field="date" class="form-control" data-format="yyyy-MM-dd" placeholder="Dátum narodenia" value="<?php echo $edit_zakaznik_data['datum_narodenia']; ?>" required>
                <div id="dtBox"></div>
              </div>
              <div class="form-group col-md-6">
              <label>Pohlavie:</label><br>
                <label class="radio-inline"><input type="radio" name="pohlavie" value="muž" <?php if($edit_zakaznik_data['pohlavie'] == 'muž') echo "checked='checked'"; ?>> muž</label>
                <label class="radio-inline"><input type="radio" name="pohlavie" value="žena" <?php if($edit_zakaznik_data['pohlavie'] == 'žena') echo "checked='checked'"; ?>> žena</label>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $edit_zakaznik_data['email']; ?>" required>
              </div>
              <div class="form-group col-md-6">
                <label>Heslo:</label>
                <input type="password" name="heslo" class="form-control" placeholder="Heslo" value="<?php echo $edit_zakaznik_data['heslo']; ?>" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-12">
                <label>Tel. číslo:</label>
                <input type="text" name="tel_cislo" class="form-control" placeholder="Formát: 09XX XXX XXX" value="<?php echo $edit_zakaznik_data['tel_cislo']; ?>" required>
              </div>
            </div>


            <button type="submit" class="btn btn-primary">Upraviť záznam</button>
          </form>
      <?php } ?> 

</div>