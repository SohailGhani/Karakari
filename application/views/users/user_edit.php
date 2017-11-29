<div class="main-content">     
    <form class="form-horizontal" action="<?=$action?>" method="post" enctype="multipart/form-data">

        <div class="form-group margin0">
            <label for="user_name" class="col-sm-2 control-label">User Name:</label>
            <div class="col-sm-6">
                <input type="text" id='user_name' class="form-control" name="user_name" value="<?=$users['user_name']?>">
            </div>
            <div class="col-sm-4"></div>
        </div>
        
        <div class="form-group margin0">
            <label for="email" class="col-sm-2 control-label">Email Address:</label>
            <div class="col-sm-6">
                <input type="email" id='stock_quantity' class="form-control" name="email" value="<?=$users['email']?>">
            </div>
            <div class="col-sm-4"></div>
        </div>
        
        <div class="form-group margin0">
            <label for="password" class="col-sm-2 control-label">password:</label>
            <div class="col-sm-6">
                <input type="password" id='password' class="form-control" name="password" value="<?=$users['password']?>">
            </div>
            <div class="col-sm-4"></div>
        </div>
        
        <div class="form-group margin0">
            <label for="contact_no" class="col-sm-2 control-label">Contact Number:</label>
            <div class="col-sm-6">
                <input type="number" id='contact_no' class="form-control" name="contact_no" value="<?=$users['contact_no']?>">
            </div>
            <div class="col-sm-4"></div>
        </div>
        
    <div class="form-group">
        <div class="col-sm-offset-5 col-sm-7">
            <button type="submit" class="btn btn-Success">Update Info</button>
            <a class="btn btn-default" href="<?=site_url("Users/user_info")?>"style="background-color: lightgrey">Cancel</a>
        </div>
    </div>
</form>
        </div><!--Main Panel-->
</div>
</div>

