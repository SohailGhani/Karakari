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
     <h3><center><h3><?=$title?></h3> </center>
    </h3>
            <table id="grid"></table>
            <script>
                $(document).ready(function() {
                var dataSource = new kendo.data.DataSource({

                transport: {

                read: {

                url: "<?=site_url('exchange/exchanges_json')?>",

                dataType: "JSON",

                data: { zoneParent: "exchanges" },

                    type: "POST"
                },

                parameterMap: function (data, operation) {
                    return kendo.stringify(data);
                    }
                },

                schema: {

                data: "exchanges",
                id:"exId"
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
                field:"date",
                title: "Date"
            },
            {
                field: "customerName",
                title: "Customer Name"
            },
            {
                field: "customerAddress",
                title: "Customer Address"
            },
            {
                template:"#:data.symbol#(#:data.payin#) - (#:data.payout#) PKR",
                title: "PayIn"
            }

,
  
                    {
                        template:"<div><a href='<?=  site_url("Exchange/exchange_delete")?>/#:data.exId#' onclick='return checkDelete()' class='btn btn-link btn-round' data-title='Delete'><span style='color:darkred; font-size:20px;' class='pull-left fa fa-trash'></span></a></div>",
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
 
<style type="text/css">
    .customer-photo {
        display: inline-block;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background-size: 60px 80px;
        background-position: center center;
        vertical-align: middle;
        line-height: 32px;
        box-shadow: inset 0 0 1px #999, inset 0 0 10px rgba(0,0,0,.2);
        margin-left: 5px;
    }

    .customer-name {
        display: inline-block;
        vertical-align: middle;
        line-height: 32px;
        padding-left: 3px;
    }
</style>
 <?php if($this->session->userdata('type')!=3){ ?>
<div class="footer-buttons" style="position:absolute; left: 90%; bottom: 83%;">
    <a href="<?=site_url('Exchange/exchange_add')?>" class="btn btn-primary btn-round btn-lg" data-title="New Exchange" data-toggle="tooltip" data-original-title="" title=""><span class="fa fa-plus"></span></i></a>
            </div>
            <?php } ?>