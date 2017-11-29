<script language="JavaScript" type="text/javascript">
    function checkDelete(){
        return confirm('Are you sure you want to delete this?');
    }
</script>

<div class=main-content>
    <?php if($this->session->userdata('msg')): ?>
        <div class="alert alert-<?=$this->session->userdata('msg_class')?>" role="alert">
            <strong><?=$this->session->userdata('msg')?></strong>
        </div>
        <?php $this->session->unset_userdata('msg'); endif; ?>
    <h3><center><span><b>Accounts</b></span></center>
    </h3>
    <?php foreach($accounts as $account): ?>
        <div class="col-xs-4 img-circle">
            <div class="widget bg-white no-padding">
                <a href="<?=  site_url("accounts/payeesTransactions_info/$account->acId")?>" class="block text-center relative p15">
                    <img src="<?=  site_url('assets/avail.png')?>" class="avatar avatar-lg img-circle" alt="" style="height: 100px">
                    <div class="h5 mb0"><strong><?= $account->name?></strong> <br><?= $account->address?>
                    </div>
                </a>
                <div class="widget bg-blue mb0 text-center no-radius">
                    <div class="widget-details">
                        <div class="h5 no-margin"><?= $account->balance?></div>
                        <div class="small bold text-uppercase">Balance</div> </div>
                    <div class="widget-details">
                        <div class="h5 no-margin"><span class=" fa fa-edit"></span></div>
                        <a href="<?=site_url("accounts/payeesAccount_edit/$account->acId")?>" class="small bold text-uppercase">Update Info</a> </div>
                    <div class="widget-details">
                        <div class="h5 no-margin"><span class=" fa fa-trash"></span></div>
                        <a href="<?=site_url("accounts/payeesAccount_delete/$account->acId")?>" class="small bold text-uppercase">Delete Account</a>
                    </div>
                </div>
            </div>

        </div>
    <?php endforeach; ?>
</div></div>

<?php if($this->session->userdata('type')!=3){ ?>
    <div class="footer-buttons" style="position:absolute; left: 95%; bottom:83%">
        <a href="<?=site_url('accounts/payeesAccountAdd')?>" class="btn btn-primary btn-round btn-lg" data-title="New Sale" data-toggle="tooltip" data-original-title="" title=""><i class="fa fa-plus"></i></a>
    </div>
<?php } ?>