<div class="main-content">     
    <form class="form-horizontal" action="<?=$action?>" method="post">
        
        <div class="row">
            <div class="form-group margin0">
                <label for="company_name" class="col-sm-2 control-label">Company Name:</label>
                <div class="col-sm-6">
                    <input type="text" id='color_name' class="form-control" name="company_name" value="<?=set_value('company_name')?>">
                    <?php echo form_error('company_name', '<p style="color:red">', '</p>'); ?>
                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>
        
    <div class="form-group">
        <div class="col-sm-offset-6 col-sm-6">
            <button type="submit" class="btn btn-Success">Add Company</button>
        </div>
    </div>
</form>
        </div><!--Main Panel-->
</div>
</div>

