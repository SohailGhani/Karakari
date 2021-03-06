<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure you want to delete this?');
}
</script>
<!--<section>
            <div class="page-header">
              <div class="actions">
                <button type="button" class="btn btn-link btn-round-sm theme-secondary-text"><span class="md md-info-outline"></span></button>
                <button type="button" class="btn btn-link btn-round-sm theme-secondary-text"><span class="md md-search"></span></button>
              </div>
              <h1>      <i class="md md-camera"></i>      Crud application    </h1>
              <p class="lead"> In most applications you need basic table listings and editing capabilities. With this app you can create simple admin functionality based on a json web service. <u>Exclusively on Materialism</u>. </p>
            </div>
          </section>-->
            
            <div class="table-responsive well no-padding white no-margin">
              <style>
                  /* Datatables */
                        .dataTable {
                          float: left;
                          border-bottom: 1px solid #E5E5E5 !important;
                          margin-bottom: 5px;
                        }
                        .dataTable div.checker,
                        .dataTable div.radio {
                          display: inherit;
                        }
                        .dataTables_wrapper {
                          float: left;
                          width: 100%;
                        }
                        .dataTables_length {
                          width: 50%;
                          float: left;
                          padding: 0px 0px 5px;
                          border-bottom: 1px solid #E5E5E5;
                          font-size: 12px;
                        }
                        .dataTables_length label,
                        .dataTables_filter label {
                          padding: 0px;
                          line-height: 26px;
                          height: auto;
                          margin: 0px;
                          font-weight: normal;
                        }
                        .dataTables_length select {
                          width: 70px;
                          display: inline;
                          margin: 0px 5px;
                        }
                        .dataTables_filter {
                          width: 50%;
                          float: right;
                          padding-left: 5px;
                          padding: 0px 0px 5px;
                          border-bottom: 1px solid #E5E5E5;
                          font-size: 12px;
                        }
                        .dataTables_filter label {
                          float: right;
                        }
                        .dataTables_filter label input {
                          width: 150px;
                          display: inline;
                          margin-left: 5px;
                        }
                        td.dataTables_empty {
                          font-size: 11px;
                          text-align: center;
                          color: #333;
                        }
                        .dataTables_info {
                          float: left;
                          font-size: 12px;
                          padding: 0px;
                          line-height: 30px;
                        }
                        .dataTables_paginate {
                          padding: 0px;
                          text-align: right;
                          float: right;
                        }
                        .dataTables_paginate a.paginate_disabled_previous,
                        .dataTables_paginate a.paginate_disabled_next,
                        .dataTables_paginate a.paginate_button,
                        .paginate_enabled_next,
                        .paginate_active,
                        .paginate_enabled_previous {
                          padding: 5px 10px;
                          font-size: 12px;
                          -moz-border-radius: 3px;
                          -webkit-border-radius: 3px;
                          border-radius: 3px;
                          float: left;
                          text-decoration: none;
                          background-color: #fff;
                          border: 1px solid #ddd;
                          color: #656d78;
                          margin-left: 3px;
                          cursor: pointer;
                        }
                        .dataTables_paginate .paginate_enabled_next:hover,
                        .dataTables_paginate a.paginate_button:hover,
                        .dataTables_paginate .paginate_enabled_previous:hover {
                          background-color: #eee;
                          border-color: #ddd;
                          color: #222;
                        }
                        .dataTables_paginate .paginate_button.current,
                        .dataTables_paginate .paginate_button.current:hover {
                          background: #33414e;
                          color: #FFF;
                          border-color: #33414e;
                        }
                        .dataTables_paginate a.paginate_disabled_previous,
                        .dataTables_paginate a.paginate_button_disabled,
                        .dataTables_paginate a.paginate_disabled_next {
                          cursor: default;
                          color: #ccc;
                        }
                        .dataTables_paginate a.paginate_button_disabled:hover {
                          box-shadow: none;
                          color: #ccc;
                        }
                        .sorting_desc,
                        .sorting_asc,
                        .sorting {
                          position: relative;
                          cursor: pointer;
                          padding-right: 20px !important;
                        }
                        .sorting:before,
                        .sorting_desc:before,
                        .sorting_asc:before {
                          position: absolute;
                          top: 8px;
                          right: 5px;
                          font-family: 'FontAwesome';
                          opacity: 0.9;
                          filter: alpha(opacity = 90);
                          width: 10px;
                          height: 10px;
                          display: block;
                        }
                        .sorting:before {
                          /*content: "\f0dc";*/
                          opacity: 0.3;
                          filter: alpha(opacity = 30);
                        }
                        .sorting_desc:before {
                          /*content: "\f0d8";*/
                        }
                        .sorting_asc:before {
                          /*content: "\f0d7";*/
                        }
                        .sorting_asc_disabled:before,
                        .sorting_desc_disabled:before {
                          opacity: 0.1;
                          filter: alpha(opacity = 10);
                        }
                        /* eof Datatables */
                      .page-content-wrap.page-content-adaptive .panel .panel-heading .panel-title {
                            margin-left: 0px;
                            font-weight: 600;
                          }
                          .panel .panel-heading .panel-title-image {
                            float: left;
                            width: 30px;
                            border: 2px solid #D5D5D5;
                            -moz-border-radius: 50%;
                            -webkit-border-radius: 50%;
                            border-radius: 50%;
                            margin-right: 5px;
                          }
                          .panel-default .panel-heading,
                            .panel-primary .panel-heading,
                            .panel-success .panel-heading,
                            .panel-info .panel-heading,
                            .panel-warning .panel-heading,
                            .panel-danger .panel-heading {
                              background: #F5F5F5;
                              border-color: #E5E5E5;
                            }
                            
                        
                  </style>
              <div class="page-content-wrap">
                    <div class="row" style="margin: 0">
                        <div class="col-md-12">
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading" style="background-color:#26C6DA">
                                    <h3 class="panel-title" style="color:white">Search</h3>
                                    <div class="pull-right" style="margin-top:28px">
                                        <form action="<?=$action?>" method="post">
                                            <div class="input-group col-md-7 pull-right"> <span class="input-group-addon" id="basic-addon1"><i class="fa fa-search"></i></span>
                                                       <div class="col-md-4">
                                                           <input type="date" name="from" class="form-control" required=""> </div>
                                                       <div class="col-md-4">
                                                           <input type="date" name="to" class="form-control" required=""> </div>
                                                       <div class="col-md-2">    
                                                           <select name="selection" class="form-control">
                                                                <?php foreach ($data as $row):?>
                                                                <option value="<?=$row->id?>"><?=$row->currency?> </option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                       </div>
                                                       <div class="col-md-2">
                                                           <button type="submit" class="btn btn-default">Search</button> </div>

                                                   </div>
                                           </form>
                                    </div>                                    
                                    
                                </div>
                                <div class="panel-heading">
                                    <h3 class="panel-title">Save Report</h3>
                                    <div class="btn-group pull-right" style="margin-top:-28px">
                                        <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Data</button>
                                        <ul class="dropdown-menu">
                                            
                                            <li><a href="#" onclick="$('#customers2').tableExport({type:'excel',escape:'false'});"><img src="<?=site_url('assets/pics/xls.png')?>" width="24"> XLS</a></li>
                                        </ul>
                                    </div>                                    
                                    
                                </div>
                                <div class="panel-body">
                                        <div id="customers2_wrapper" class="dataTables_wrapper no-footer">
                                            <table id="customers2" class="table datatable dataTable no-footer" role="grid" aria-describedby="customers2_info">
                                                <thead>
                                                    <tr>
                                                        <th colspan="5"> <?=$title?><span style="font-size:13px;">[ Date:<?= " from :".date('d-m-Y',strtotime($from))." To :".date('d-m-Y',strtotime($to)); ?> ]</span></h3></center></th>
                                                    </tr>
                                                    
                                                    <tr role="row" style="border:1px solid #D5D5D5">
                                                        <th  tabindex="0" aria-controls="customers2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column ascending">Date</th>
                                                        <th tabindex="0" aria-controls="customers2" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Customer</th>
                                                        <th tabindex="0" aria-controls="customers2" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending">PayIn</th>
                                                        <th tabindex="0" aria-controls="customers2" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending">PayOut</th>
                                                        <th tabindex="0" aria-controls="customers2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column ascending">Rate</th>
                                                      
                                                    </tr>
                                                </thead>
                                            <tbody>
                                                 <?php
                                                     $total=0;
                                                     $total_amount=0;
                                                     $total_R_amount=0;
                                                    foreach($results as $result): ?>
                                                <tr role="row" class="odd">
                                                    <td class="r_quantity"><?=date(('d/m/Y'),strtotime($result->date))?></td>
                                                    <td class="r_quantity"><?=$result->customerName?></td>
                                                    <?php if($result->deal==1){ ?>
                                                        <td class="sorting_1">0</td>
                                                        <td class="sorting_1"><?=$result->symbol.$result->payin.' ('.$amount=($result->payin*$result->payoutRate).'PKR)'?></td>
                                                    <?php } else{ ?>
                                                        <td class="sorting_1"><?=$result->symbol.$result->payin.' ('.$amount=($result->payin*$result->payoutRate).'PKR)'?></td>
                                                        <td class="sorting_1">0</td>
                                                    <?php } ?>
                                                    <td class="r_total_amount"><?=$result->payoutRate?></td>
                                                    <?php
                                                        //calculations
                                                        $total+=$result->payin;
                                                        $total_amount+=$amount;
                                                        $total_R_amount+=($result->payin*$result->payoutRemit);
                                                    ?>

                                                </tr>
                                                 <?php endforeach; ?>
                                                <tr role="row" class="odd" style="border-top: 3px solid #000">
                                                    <td><b>Total</b></td>
                                                    <td><?=$result->symbol.$total. ' ('.$total_amount.')PKR'?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    
                                                </tr>
                                                <tr role="row" class="odd" style="border-top: 3px solid #000">
                                                    <td><b style="color:green">Profit</b></td>
                                                    <td style="color:green"> <?php if($total_amount > $total_R_amount) echo currency.($total_amount-$total_R_amount); else echo '0'; ?></td>
                                                    <td><b style="color:red">Loss</b></td>
                                                    <td style="color:red"> <?php if($total_amount < $total_R_amount) echo currency.($total_amount-$total_R_amount); else echo '0'; ?> </td>
                                                    <td></td>
                                                    
                                                </tr>
                                                <tr role="row" class="odd" style="border-top: 3px solid #000">
                                                    <td><b>Earned</b></td>
                                                    <td > <?=$total_amount?> PKR</td>
                                                    <td><b >Remit(invested)</b></td>
                                                    <td> <?=$total_R_amount?> PKR</td>
                                                    <td></td>
                                                    
                                                    
                                                </tr>
                                                
                                                
                                                
                                        </table>                                  
                                    </div>
                            </div>
                            <!-- END DATATABLE EXPORT -->                            
                            

                        </div>
                    </div>

                </div>
              </div>
            </div>
</div>
</div>
              <!-- START SCRIPTS -->
             
        <!-- START PLUGINS -->
        <script type="text/javascript" src="<?=site_url('js1/plugins/jquery/jquery.min.js')?>"></script>
        <script type="text/javascript" src="<?=site_url('js1/plugins/jquery/jquery-ui.min.js')?>"></script>
        <script type="text/javascript" src="<?=site_url('js1/plugins/bootstrap/bootstrap.min.js')?>"></script>        
        <!-- END PLUGINS -->
              <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='<?=site_url('js1/plugins/icheck/icheck.min.js')?>'></script>
        <script type="text/javascript" src="<?=site_url('js1/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js')?>"></script>
        
        <!--<script type="text/javascript" src="<?=site_url('js1/plugins/datatables/jquery.dataTables.min.js')?>"></script>-->
        <script type="text/javascript" src="<?=site_url('js1/plugins/tableexport/tableExport.js')?>"></script>
	<script type="text/javascript" src="<?=site_url('js1/plugins/tableexport/jquery.base64.js')?>"></script>
	<script type="text/javascript" src="<?=site_url('js1/plugins/tableexport/html2canvas.js')?>"></script>
	<script type="text/javascript" src="<?=site_url('js1/plugins/tableexport/jspdf/libs/sprintf.js')?>"></script>
	<script type="text/javascript" src="<?=site_url('js1/plugins/tableexport/jspdf/jspdf.js')?>"></script>
	<script type="text/javascript" src="<?=site_url('js1/plugins/tableexport/jspdf/libs/base64.js')?>"></script>        
        <!-- END THIS PAGE PLUGINS-->  
            </div>
            
            <div class="footer-buttons">
<!--                <a title="New Received" href="<?=  site_url("sales/stock_recieved/")?>" class="btn btn-primary btn-round btn-lg" data-title="New Item" data-toggle="tooltip" data-original-title="" title=""><i class="md md-add"></i></a>
                <a title="Next Day" href="<?=  site_url("sales/next_stock/")?>" class="btn btn-primary btn-round btn-lg" data-title="New Item" data-toggle="tooltip" data-original-title="" title=""><i class="md md-arrow-forward"></i></a>-->
            </div>
          </div>

 <script>
//                  var sum = 0;
//                  for(var i=1;i<=php$i;i++){
//                       
//                    // iterate through each td based on class and add the values
//                    $(".count"+i).each(function() {
//                        
//                        var value = $(this).text();
//                        // add only if the value is number
//                        if(!isNaN(value) && value.length != 0) {
//                            sum += parseFloat(value);
//                        }
//                        $('#r_total'+i).text(sum);
//                    });
//                }
                // r_urban
//                  var qty= 0;
//                    // iterate through each td based on class and add the values
//                    $(".r_quantity").each(function() {
//                        
//                        var value = $(this).text();
//                        // add only if the value is number
//                        if(!isNaN(value) && value.length != 0) {
//                            qty += parseFloat(value);
//                        }
//                        $('#t_quantity').text(qty);
//                    });
//                    // 
//                    // r_urban
//                  var sum = 0;
//                    // iterate through each td based on class and add the values
//                    $(".r_total_amount").each(function() {
//                        
//                        var value = $(this).text();
//                        // add only if the value is number
//                        if(!isNaN(value) && value.length != 0) {
//                            sum += parseFloat(value);
//                        }
//                        $('#t_total_amount').text(sum);
//                    });
//                    
//                    //
//                    // r_urban
//                    var sum = 0;
//                    // iterate through each td based on class and add the values
//                    $(".r_amount_paid").each(function() {
//                        
//                        var value = $(this).text();
//                        // add only if the value is number
//                        if(!isNaN(value) && value.length != 0) {
//                            sum += parseFloat(value);
//                        }
//                        $('#t_amount_paid').text(sum);
//                    });
//                    
//                  var sum = 0;
//                    // iterate through each td based on class and add the values
//                    $(".r_balance").each(function() {
//                        
//                        var value = $(this).text();
//                        // add only if the value is number
//                        if(!isNaN(value) && value.length != 0) {
//                            sum += parseFloat(value);
//                        }
//                        $('#t_balance').text(sum);
//                    });
//                    //
//                    // r_urban
//                  
                   
                  </script>