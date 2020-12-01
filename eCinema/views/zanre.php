<div class="container">
      <h2 class="page-title">
        <?php if($action_details == '') {
          echo "Žánre filmov";
        } else if($action_details == 'add-new') {
          echo "Nový žáner filmov";
        } else if($action_details == 'edit') {
          echo "Úprava žánru filmov";
        }
        ?><span>.</span>
      </h2>  

    <?php if($action_details == '') { ?>
        <?php echo '<a href="/'.$page_name.'?action=add-new" class="btn btn-primary add-new-item-btn"><i class="fas fa-plus"></i> Pridať žáner</a>'; ?>
        <table class="table table-striped table-dark table-fancy">
          <thead>
            <tr>
              <th scope="col">Žáner</th>
              <th scope="col"> </th>
            </tr>
          </thead>
          <tbody>
              <?php 
                  foreach($readAll as $row):
                    echo "<tr>";
                      echo "<td>".$row['zaner']."</td>";
                      echo '<td>
                                <a href="/'.$page_name.'?action=edit&id='.$row['id_zanru'].'" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="upraviť"><i class="fas fa-edit"></i></a>
                                <a href="/'.$page_name.'?action=delete&id='.$row['id_zanru'].'" class="btn btn-danger custom-delete-item" data-toggle="modal" data-target="#confirmDeleteModal" data-placement="bottom" title="odstrániť položku"><i class="far fa-trash-alt"></i></a>
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
                <label>Žáner:</label>
                <input type="text" name="zaner" class="form-control" placeholder="Žáner" required>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Pridať záznam</button>
          </form>
      <?php } 
      
      else if($action_details == 'edit') { ?>
        <form action="<?php echo '/'.$page_name.'?action=edit&id='.$edit_zaner_data['id_zanru'].''; ?>" method="post">
            <div class="form-row">
              <div class="form-group col-md-12">
                <label>Žáner:</label>
                <input type="text" name="zaner" class="form-control" placeholder="Žáner" value="<?php echo $edit_zaner_data['zaner']; ?>" required>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Upraviť záznam</button>
          </form>
      <?php } ?> 

</div>