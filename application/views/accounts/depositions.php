<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure you want to delete this?');
}
</script>
    <link rel="stylesheet" href="<?=site_url('kendo/css/kendo.common.min.css')?>" />
    <link rel="stylesheet" href="<?=site_url('kendo/css/kendo.default.min.css')?>" />
    <script charset="utf-8" src="<?=site_url('kendo/css/vendors.min.js')?>"></script>
    <script src="<?=site_url('kendo/js/jquery.min.js')?>"></script>
    <script src="<?=site_url('kendo/js/kendo.all.min.js')?>"></script>
    
 <div class=main-content>
     <?php if($this->session->userdata('msg')): ?>
            <div class="alert alert-<?=$this->session->userdata('msg_class')?>" role="alert">
                                <strong><?=$this->session->userdata('msg')?></strong>
            </div>
            <?php $this->session->unset_userdata('msg'); endif; ?>
    </h3>
     <div class=" col-xs-9">
        <h3><center><span><b>Deposition Record</b></span></center>
    </h3>
        <table id="grid"></table>
     </div>
<!--      <div class=" col-xs-3">
          
          <div class=" col-xs-12 text-center"><h3>Account Info:</h3></div>
          <div class=" col-xs-6 text-right"><b>Name</b></div><div class=" col-xs-6 text-left"><?=$account['name']?></div>
          <div class=" col-xs-6 text-right"><b>Address</b></div><div class=" col-xs-6 text-left"><?=$account['address']?></div>
          <div class=" col-xs-6 text-right"><b>N.I.C</b></div><div class=" col-xs-6 text-left"><?=$account['nic']?></div>
          <div class=" col-xs-6 text-right"><b>Entry Date</b></div><div class=" col-xs-6 text-left"><?=$account['entryDate']?></div>
          <div class=" col-xs-6 text-right"><b>Phone</b></div><div class=" col-xs-6 text-left"><?=$account['phone']?></div>
          <div class=" col-xs-6 text-right"><b>Email</b></div><div class=" col-xs-6 text-left"><?=$account['email']?>.</div>
          <div class=" col-xs-6 text-right"><b>Fax</b></div><div class=" col-xs-6 text-left"><?=$account['fax']?>.</div>
          <div class=" col-xs-6 text-right"><h3 style="color: green">Balance :</h3></div><div class=" col-xs-6 text-left"><h3><?=$account['balance']?></h3></div>

     </div>    -->
     
     
     <script>
                $(document).ready(function() {
                var dataSource = new kendo.data.DataSource({

                transport: {

                read: {

                url: "<?=site_url("accounts/depositions_json/$id")?>",

                dataType: "JSON",

                data: { zoneParent: "depositions" },

                    type: "POST"
                },

                parameterMap: function (data, operation) {
                    return kendo.stringify(data);
                    }
                },

                schema: {

                data: "depositions",
                id:"transId"
            }, 
//                pageSize: 13,
//            serverPaging: true,
//              serverFiltering: true,
//              serverSorting: true
    });
                
                   var grid = $("#grid").kendoGrid({

        dataSource: dataSource,
            columns: [
            
            {
                field: "transactionDate",
                title: "Deposit Date"
            },
            {
                field: "depositMethod",
                title: "Deposit Method"
            },
            
            {
                field: "depositAmount",
                title: "Deposit Amount"
            },
            {
                field: "lastBalance",
                title: "Balance"
            }
,
           {
                template:"<div><a href='<?=  site_url("accounts/delete_deposite")?>/#:data.transId#/#:data.acId#' onclick='return checkDelete()' class='btn btn-link btn-round' data-title='Delete item'><span style='color:darkred; font-size:20px;' class='pull-right fa fa-trash'></span></a></div>",
                title:"Actions"
            }
                    
            ],

        height: 400,
                        sortable: true,
                        filterable: true,
                        columnMenu: true,
                        pageable: true,
    });
                });
            </script>

 </div></div>
 
 <?php if($this->session->userdata('type')!=3){ ?>
<div class="footer-buttons" style="position:absolute; left: 70%; bottom:81%">
                 <a href="<?=site_url("accounts/deposite/$id")?>" class="btn btn-primary btn-round btn-lg" data-title="New Transation" data-toggle="tooltip" data-original-title="" title="Deposit"><i class="fa fa-plus"></i></a>
            </div>
            <?php } ?>