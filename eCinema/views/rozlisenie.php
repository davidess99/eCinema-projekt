<div class="container">
<h2 class="page-title">
        <?php if($action_details == '') {
          echo "Rozlíšenie filmov";
        } else if($action_details == 'add-new') {
          echo "Nové rozlíšenie filmov";
        } else if($action_details == 'edit') {
          echo "Úprava rozlíšenia filmov";
        }
        ?><span>.</span>
      </h2>  

    <?php if($action_details == '') { ?>
        <?php echo '<a href="/'.$page_name.'?action=add-new" class="btn btn-primary add-new-item-btn"><i class="fas fa-plus"></i> Pridať rozlíšenie</a>'; ?>
        <table class="table table-striped table-dark table-fancy">
          <thead>
            <tr>
              <th scope="col">Rozlíšenie</th>
              <th scope="col"> </th>
            </tr>
          </thead>
          <tbody>
              <?php 
                  foreach($readAll as $row):
                    echo "<tr>";
                      echo "<td>".$row['rozlisenie']."</td>";
                      echo '<td>
                                <a href="/'.$page_name.'?action=edit&id='.$row['id_rozlisenia'].'" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="upraviť"><i class="fas fa-edit"></i></a>
                                <a href="/'.$page_name.'?action=delete&id='.$row['id_rozlisenia'].'" class="btn btn-danger custom-delete-item" data-toggle="modal" data-target="#confirmDeleteModal" data-placement="bottom" title="odstrániť položku"><i class="far fa-trash-alt"></i></a>
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
              <div class="form-group col-md-12">
                <label>Rozlíšenie filmu:</label>
                <input type="text" name="rozlisenie" maxlength="2" class="form-control" placeholder="Rozlíšenie filmu" required>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Pridať záznam</button>
          </form>
      <?php } 
      
      else if($action_details == 'edit') { ?>
        <form action="<?php echo '/'.$page_name.'?action=edit&id='.$edit_rozlisenie_data['id_rozlisenia'].''; ?>" method="post">
            <div class="form-row">
              <div class="form-group col-md-12">
                <label>Označenie sály:</label>
                <input type="text" name="rozlisenie" maxlength="2" class="form-control" placeholder="Rozlíšenie filmu" value="<?php echo $edit_rozlisenie_data['rozlisenie']; ?>" required>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Upraviť záznam</button>
          </form>
      <?php } ?> 

</div>