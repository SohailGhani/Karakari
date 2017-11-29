<div class="main-content">     
    <form class="form-horizontal" action="<?=$action?>" method="post">
        
        <div class="row">
            <div class="form-group margin0">
                <label for="deposit" class="col-sm-2 control-label">Deposit</label>
                <div class="col-sm-6">
                    <input type="text" id='deposit' class="form-control" name="deposit" value="<?=$transaction['deposit']?>">
                    <input type="hidden" id='deposit' class="form-control" name="prevdeposit" value="<?=$transaction['deposit']?>">
                </div>
                <div class="col-sm-4"></div>
            </div>
            <div class="form-group margin0">
                <label for="withdraw" class="col-sm-2 control-label">Withdraw</label>
                <div class="col-sm-6">
                    <input type="text" id='withdraw' class="form-control" name="withdraw" value="<?=$transaction['withdraw']?>">
                    <input type="hidden" id='deposit' class="form-control" name="prevdeposit" value="<?=$transaction['withdraw']?>">
                </div>
                <div class="col-sm-4"></div>
            </div>
            <div class="form-group margin0">
                <label for="nic" class="col-sm-2 control-label">Date</label>
                <div class="col-sm-6">
                    <input type="date" id='date' class="form-control" name="date" required="" value="<?=$transaction['date']?>">
                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>
        <input type="hidden" name="acid" value="<?=$transaction['acId']?>">
    <div class="form-group">
        <div class="col-sm-offset-6 col-sm-6">
            <a href="<?=  site_url('accounts/accounts_info')?>" class="btn btn-Success">Cancel</a> <button type="submit" class="btn btn-Success">Update Account</button>
        </div>
    </div>
</form>
        </div><!--Main Panel-->
</div>
</div>

