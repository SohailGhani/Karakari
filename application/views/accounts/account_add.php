<div class="main-content">     
    <form class="form-horizontal" action="<?=$action?>" method="post">
        
        <div class="row">
            <div class="form-group margin0">
                <label for="name" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" id='name' class="form-control" name="name" required="">
                </div>
                <div class="col-sm-4"></div>
            </div>
            <div class="form-group margin0">
                <label for="address" class="col-sm-2 control-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" id='address' class="form-control" name="address" required="">
                </div>
                <div class="col-sm-4"></div>
            </div>
            <div class="form-group margin0">
                <label for="nic" class="col-sm-2 control-label">N.I.C</label>
                <div class="col-sm-6">
                    <input type="text" id='nic' class="form-control" name="nic" required="">
                </div>
                <div class="col-sm-4"></div>
            </div>
            <div class="form-group margin0">
                <label for="entrydate" class="col-sm-2 control-label">Entry Date</label>
                <div class="col-sm-6">
                    <input type="date" id='entrydate' class="form-control" name="entrydate" required="">
                </div>
                <div class="col-sm-4"></div>
            </div>
            <div class="form-group margin0">
                <label for="phone" class="col-sm-2 control-label">Phone</label>
                <div class="col-sm-6">
                    <input type="text" id='phone' class="form-control" name="phone">
                </div>
                <div class="col-sm-4"></div>
            </div>
            <div class="form-group margin0">
                <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-6">
                    <input type="email" id='email' class="form-control" name="email">
                </div>
                <div class="col-sm-4"></div>
            </div>
            <div class="form-group margin0">
                <label for="fax" class="col-sm-2 control-label">Fax</label>
                <div class="col-sm-6">
                    <input type="text" id='fax' class="form-control" name="fax">
                </div>
                <div class="col-sm-4"></div>
            </div>
            <div class="form-group margin0">
                <label for="balance" class="col-sm-2 control-label">Balance</label>
                <div class="col-sm-6">
                    <input type="number" id='name' class="form-control" name="balance" value="0">
                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>
        
    <div class="form-group">
        <div class="col-sm-offset-6 col-sm-6">
            <a href="<?=  site_url('accounts/accounts_info')?>" class="btn btn-Success">Cancel</a> <button type="submit" class="btn btn-Success">Add Account</button>
        </div>
    </div>
</form>
        </div><!--Main Panel-->
</div>
</div>

