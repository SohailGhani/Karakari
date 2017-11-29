<div class="main-content">     
    <form class="form-horizontal" action="<?=$action?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="user_name" class="col-sm-2 control-label">User Name:</label>
                <div class="col-sm-6">
                    <input type="text" id='user_name' class="form-control" name="user_name" value="<?=set_value('user_name')?>">
                    <?php echo form_error('user_name', '<p style="color:red">', '</p>'); ?>
                </div>
                <div class="col-sm-4"></div>
            </div>
        
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email:</label>
                <div class="col-sm-6">
                    <input type="email" id='email' class="form-control" name="email" value="<?=set_value('email')?>">
                   <?php echo form_error('email', '<p style="color:red">', '</p>'); ?>
                </div>
                <div class="col-sm-4"></div>
            </div>
        
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Password:</label>
                <div class="col-sm-6">
                    <input type="password" id='password' class="form-control" name="password" value="<?=set_value('password')?>">
                    <?php echo form_error('password', '<p style="color:red">', '</p>'); ?>
                </div>
                <div class="col-sm-4"></div>
            </div>
            <div class="form-group">
                <label for="contact_no" class="col-sm-2 control-label">Contact Number:</label>
                <div class="col-sm-6">
                    <input type="number" id='contact_no' class="form-control" name="contact_no" value="<?=set_value('contact_no')?>">
                    <?php echo form_error('contact_no', '<p style="color:red">', '</p>'); ?>
                </div>
                <div class="col-sm-4"></div>
            </div>
        
        <div class="form-group">
        <div class="col-sm-offset-5 col-sm-7" >
            <button type="submit" class="btn btn-Success">Add User</button>
            <a class="btn btn-default" href="<?=site_url("Users/user_info")?>" style="background-color: lightgrey">Cancel</a>
        </div>
    </div>
</form>
        </div><!--Main Panel-->
</div>
</div>