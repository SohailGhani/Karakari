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
     <h3><center><span><b>Stock</b></span></center>
    </h3>
     <table id="grid"></table>
            <script>
                $(document).ready(function() {
                var dataSource = new kendo.data.DataSource({

                transport: {

                read: {

                url: "<?=site_url('Settings/items_json')?>",

                dataType: "JSON",

                data: { zoneParent: "item" },

                    type: "POST"
                },

                parameterMap: function (data, operation) {
                    return kendo.stringify(data);
                    }
                },

                schema: {

                data: "item",
                id:"id"
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
                field: "itemName",
                title: "Item Name"
            },
            {
                field: "itemQuantity",
                title: "Quantity"
            },
          
            
                    {
                        template:"<div><a href='<?=  site_url('Settings/item_reload')?>/#:data.itemId#' class='btn btn-link btn-round' data-title='Edit'><span style='color:orange; font-size:20px;' class='pull-left fa fa-plus'></span></a> <a href='<?=  site_url('Settings/item_edit')?>/#:data.itemId#' class='btn btn-link btn-round' data-title='Edit'><span style='color:orange; font-size:20px;' class='pull-left fa fa-edit'></span></a><a href='<?=  site_url("Settings/item_delete")?>/#:data.itemId#' onclick='return checkDelete()' class='btn btn-link btn-round' data-title='Delete item'><span style='color:darkred; font-size:20px;' class='pull-right fa fa-trash'></span></a></div>",
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
<style type="text/css">
    .currency-picture {
        display: inline-block;
        width: 80px;
        height: 60px;
        border-radius: 50%;
        background-size: 60px 80px;
        background-position: center center;
        vertical-align: middle;
        line-height: 32px;
        box-shadow: inset 0 0 1px #999, inset 0 0 10px rgba(0,0,0,.2);
        margin-left: 5px;
    }
    </style>
 </div></div>
 
 <?php if($this->session->userdata('type')!=3){ ?>
<div class="footer-buttons" style="position:absolute; left: 1250px; bottom: 550px">
                <a href="<?=site_url('Settings/item_add')?>" class="btn btn-primary btn-round btn-lg" data-title="New Sale" data-toggle="tooltip" data-original-title="" title=""><i class="fa fa-plus"></i></a>
            </div>
            <?php } ?>