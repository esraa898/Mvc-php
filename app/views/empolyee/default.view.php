


  <?php if(isset($_SESSION['message'])):?>
    <h5 class="alert alert-danger text-center"><?php echo $_SESSION['message']?></h5>
    <?php unset ($_SESSION['message']);
    endif ;?>
<div style="text-align: right;" >


<h1 class="text-center py-4 text-red my-4"><?= $text_all_empolyess ?></h1>
</div>

<div class="row justify-content-center">
    <div class="col-sm-10">
        <table class="table">
            <thead>
                <tr>
                <th scope="col"><?= $first_name?></th>
                <th scope="col"><?= $last_name?></th>
                <th scope="col"><?= $salary?></th>
                <th scope="col"><?= $role?></th>
                <th scope="col"><?= $edit?></th>
                <th scope="col"><?= $delete?></th>
                </tr>
            </thead>
            <tbody>
            
              <?php if(false !== $empolyees):?>
                <?php foreach($empolyees as $empolyee):?>
                <tr>
                    <th ><?=$empolyee->first_name?></th>
                    <td><?=$empolyee->last_name?></td>
                    <td><?=$empolyee->salary?></td>
                    <td><?=$empolyee->role?></td>
                    <td>
                        <a class="btn btn-info" href="/empolyee/edit/<?= $empolyee->id ?>"> <i class="fa fa-edit"></i> </a>
                    </td>
                    <td>
                        <a class="btn btn-danger"href="/empolyee/delete/<?= $empolyee->id ?>"  onclick="if(!confirm('<?= $text_delete_confirm ?>')) return false;"> <i class="fas fa-times"></i> </a>
                    </td>
                </tr>
                <?php endforeach;?>
                <?php endif;?>
            </tbody>
        </table>
    </div>
</div>

