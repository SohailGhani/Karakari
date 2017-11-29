<div class="main-content">     
    <form class="form-horizontal" action="<?=$action?>" method="post" enctype="multipart/form-data">
    <div class="row">
    <div class="form-group">
        <label for="currency" class="col-sm-2 control-label">Item Name:</label>
        <div class="col-sm-6">
            <input type="text" id='currency' class="form-control" name="item" value="<?=$item['itemName']?>" required="">
        </div>
        <div class="col-sm-4"></div>
    </div>
    </div>
     <div class="row">
    <div class="form-group">
        <label for="currency" class="col-sm-2 control-label">Currency Symbol:</label>
        <div class="col-sm-6">
            <input type="text" id='currency' class="form-control" name="qty" value="<?=$item['itemQuantity']?>" required="">
        </div>
        <div class="col-sm-4"></div>
    </div>
    </div>  
    <div class="row">
    
    </div>
 
    <div class="form-group">
        <div class="col-sm-offset-6 col-sm-6">
            <a href="<?=site_url('settings/item_view')?>" class="btn btn-Success">Close</a> <button type="submit" class="btn btn-Success">Update Info</button>
        </div>
    </div>
</form>
        </div><!--Main Panel-->
</div>


