<div class="main-content">     
    <form class="form-horizontal" action="<?=$action?>" method="post" enctype="multipart/form-data">
<!--    <div class="form-group">
        <label for="currency" class="col-sm-2 control-label">Item Name:</label>
        <div class="col-sm-6">
            <input type="text" id='currencyname' class="form-control" name="item" required="">
        </div>
        <div class="col-sm-4"></div>
    </div>-->
    <div class="form-group">
        <label for="symbol" class="col-sm-2 control-label">Item Quantity</label>
        <div class="col-sm-6">
            <input type="text" id='symbol' class="form-control" name="qty" required="">
        </div>
        <div class="col-sm-4"></div>
    </div>
    
    <div class="form-group">
        <label for="date" class="col-sm-2 control-label">Date</label>
        <div class="col-sm-6">
            <input type="date" id='date' class="form-control" name="date" required="">
        </div>
        <div class="col-sm-4"></div>
    </div>
     
    
    <div class="form-group">
        <div class="col-sm-offset-6 col-sm-6">
            <button type="submit" class="btn btn-Success">Add History</button>
                    <a class="btn btn-default" href="<?=site_url("Settings/item_view")?>" style="background-color: lightgrey">Cancel</a>

        </div>
    </div>
</form>
        </div><!--Main Panel-->
</div>

