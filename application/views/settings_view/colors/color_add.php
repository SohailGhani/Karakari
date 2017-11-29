<div class="main-content">     
    <form class="form-horizontal" action="<?=$action?>" method="post" enctype="multipart/form-data">
        
        <div class="row">
            <div class="form-group margin0">
                <label for="color_name" class="col-sm-2 control-label">Color Name:</label>
                <div class="col-sm-6">
                    <input type="text" id='color_name' class="form-control" name="color_name" value="<?=set_value('color_name')?>">
                    <?php echo form_error('color_name', '<p style="color:red">', '</p>'); ?>
                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>
        
    <div class="form-group">
        <div class="col-sm-offset-6 col-sm-6">
            <button type="submit" class="btn btn-Success">Add Color</button>
        </div>
    </div>
</form>
        </div><!--Main Panel-->
</div>
</div>