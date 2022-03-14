





<div class="   addoredit col-md-4 offset-md-2">
        <form class="my-2 p-3 border" method="POST" >
            <div class="form-group">
                <label for="exampleInputName1"><?= $first_name?></label>
                <input type="text" name="firstN" class="form-control" id="exampleInputName1" >
            </div>
            <div class="form-group">
                <label for="exampleInputName1"><?= $last_name?></label>
                <input type="text" name="lastN" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"><?= $salary?></label>
                <input type="text" name="Salary" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="form-group">
                <label for="exampleInputName1"><?= $role?></label>
                <input type="text" name="role" class="form-control" id="exampleInputName1" >
            </div>
         
            <button type="submit" class="btn btn-primary" name="submit"><?= $save?></button>
        </form>
    </div>
