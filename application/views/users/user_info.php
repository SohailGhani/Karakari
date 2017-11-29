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
     <h3><center><span><b>Users: Information</b></span></center>
    </h3>
     <table id="grid"></table>
            <script>
                $(document).ready(function() {
                var dataSource = new kendo.data.DataSource({

                transport: {

                read: {

                url: "<?=site_url('Users/user_json')?>",

                dataType: "JSON",

                data: { zoneParent: "users" },

                    type: "POST"
                },

                parameterMap: function (data, operation) {
                    return kendo.stringify(data);
                    }
                },

                schema: {

                data: "users",
                id:"userId"
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
                field: "user_name",
                title: "User Name"
            },
            {
                field: "email",
                title: "Email Address"
            },
            
            {
                field: "contact_no",
                title: "Contact Number"
            },
            
                    {
                        template:"<div><a href='<?=  site_url('Users/user_edit')?>/#:data.userId#' class='btn btn-link btn-round' data-title='Edit'><span style='color:orange; font-size:20px;' class='pull-left fa fa-edit'></span></a><a href='<?=  site_url("Users/user_delete")?>/#:data.userId#' onclick='return checkDelete()' class='btn btn-link btn-round' data-title='Delete item'><span style='color:darkred; font-size:20px;' class='pull-right fa fa-trash'></span></a></div>",
                     title:"Actions"
                    }
                    
            ],

        height: 400,
                        sortable: true,
                        filterable: true,
                        columnMenu: true,
                        pageable: true
    });
                });
            </script>

 </div></div>
 

<div class="footer-buttons" style="position:absolute; left: 1250px; bottom: 550px">
                <a href="<?=site_url('Users/user_add')?>" class="btn btn-primary btn-round btn-lg" data-title="New User" data-toggle="tooltip" data-original-title="" title=""><i class="fa fa-plus"></i></a>
            </div>
    

