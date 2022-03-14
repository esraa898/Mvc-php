




<div class="  addoredit col-md-6 offset-md-3">
        <form class="my-2 p-3 border" method="POST" >
            <div class="form-group">
                <label for="exampleInputName1"><?= $first_name?></label>
                <input type="text" name="firstN" class="form-control" id="exampleInputName1" value ="<?=$empolyee->first_name?>">
            </div>
            <div class="form-group">
                <label for="exampleInputName1"><?= $last_name?></label>
                <input type="text" name="lastN" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value ="<?=$empolyee->last_name?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"><?= $salary?></label>
                <input type="text" name="Salary" class="form-control" id="exampleInputPassword1" value ="<?=$empolyee->salary?>">
            </div>
            <div class="form-group">
                <label for="exampleInputName1"><?= $role?></label>
                <input type="text" name="role" class="form-control" id="exampleInputName1" value ="<?=$empolyee->role?>">
            </div>
         
            <button type="submit" class="btn btn-primary"  name="submit" value="save"><?= $save?></button>
        </form>
    </div>

