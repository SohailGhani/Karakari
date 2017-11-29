
            <div class="main-content">
                <div class="row">
                    <div class="col-md-4"> 
                        <div class="widget bg-white no-padding"> 
                            <a href="<?=site_url('accounts/accounts_info')?>" class="block text-center relative p15"> 
                                <span class="fa fa-archive"style="font-size: 100px"></span>
                                <div class="h5 mb0"><strong>Accounts</strong> 
                                </div> 
                            </a> 
                        </div> 
                    </div>


                    <div class="col-md-4">
                        <div class="widget bg-white no-padding">
                            <a href="<?=site_url('accounts/payeesAccounts_info')?>" class="block text-center relative p15">
                                <span class="fa fa-archive"style="font-size: 100px"></span>
                                <div class="h5 mb0"><strong>Payees</strong>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    
                    <div class="col-md-4">
                        <div class="widget bg-white no-padding"> 
                            <a href="<?=site_url('Settings/item_view')?>" class="block text-center relative p15"> 
                                <img src="<?=site_url('assets/pics/reports.jpg" class="avatar avatar-lg img-circle" alt="" style="height: 100px"')?>"> 
                                <div class="h5 mb0"><strong>Stock</strong> 
                                </div> 
                            </a> 
                            
                        </div>
                    </div>
                    <div class="col-md-4"> 
                        <div class="widget bg-white no-padding"> 
                            <a href="<?=site_url('reports/search')?>" class="block text-center relative p15"> 
                                <span class="fa fa-clipboard"style="font-size: 100px"></span>
                                <div class="h5 mb0"><strong>Sale Report</strong> 
                                </div> 
                            </a> 
                            
                        </div> 
                    </div>
                    <div class="col-md-4"> 
                        <div class="widget bg-white no-padding"> 
                            <a href="<?=site_url('reports/search_stock')?>" class="block text-center relative p15"> 
                                <span class="fa fa-clipboard"style="font-size: 100px"></span>
                                <div class="h5 mb0"><strong>Stock Report</strong> 
                                </div> 
                            </a> 
                            
                        </div> 
                    </div>



                    <div class="col-md-4">
                        <div class="widget bg-white no-padding">
                            <a href="<?=site_url('reports/search_stockin')?>" class="block text-center relative p15">
                                <span class="fa fa-clipboard"style="font-size: 100px"></span>
                                <div class="h5 mb0"><strong>Stock In Report</strong>
                                </div>
                            </a>

                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="widget bg-white no-padding">
                            <a href="<?=site_url('reports/search_payees')?>" class="block text-center relative p15">
                                <span class="fa fa-clipboard"style="font-size: 100px"></span>
                                <div class="h5 mb0"><strong>Payees Report</strong>
                                </div>
                            </a>

                        </div>
                    </div>



                    <div class="col-md-4"> 
                        <div class="widget bg-white no-padding"> 
                            <a href="<?=site_url('accounts/add_pay')?>" class="block text-center relative p15"> 
                                <span class="fa fa-dollar"style="font-size: 100px"></span>
                                <div class="h5 mb0"><strong>Pay</strong> 
                                </div> 
                            </a> 
                            
                        </div> 
                    </div>
                    <div class="col-md-4"> 
                        <div class="widget bg-white no-padding"> 
                            <a href="<?=site_url('reports/account_search')?>" class="block text-center relative p15"> 
                                <span class="fa fa-area-chart"style="font-size: 100px"></span>
                                <div class="h5 mb0"><strong>Bank Records</strong> 
                                </div> 
                            </a> 
                            
                        </div> 
                    </div>
                    <div class="col-md-4"> 
                        <div class="widget bg-white no-padding"> 
                            <a href="<?=site_url('reports/roznamcha_search')?>" class="block text-center relative p15"> 
                                <span class="fa fa-asterisk"style="font-size: 100px"></span>
                                <div class="h5 mb0"><strong>Roznamcha</strong> 
                                </div> 
                            </a> 
                            
                        </div> 
                    </div>


                </div>


                <hr>





                <div class="row"> 
                    <b style="font-size: 13px">Stock Updates:</b><br>
                    <marquee direction="leftoright" scrollspeed="1" style=" background-color: yellowgreen">
                        <?php foreach($items as $item):
                                echo "<b>$item->itemName<b>: $item->itemQuantity  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; | &nbsp; &nbsp; &nbsp; &nbsp;";
                         endforeach; ?>
                    </marquee>
                </div>
                <div class="row"> 
                    <b style="font-size: 13px">Customers Updates:</b><br>
                    <marquee direction="leftoright" scrollspeed="1" style=" background-color: #07a5ff">
                        <?php foreach($accounts as $account):
                                echo "<b>$account->name<b>: $account->balance &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; | &nbsp; &nbsp; &nbsp; &nbsp;";
                        endforeach; ?>
                    </marquee>
                </div>
                <div class="row"> 
                    <b style="font-size: 13px">Accounts Updates:</b><br>
                    <marquee direction="leftoright" scrollspeed="2" style=" background-color: #59606a; color:  white">
                        <?php foreach($totals as $total):
                                echo "<b>$total->bank_name<b>: $total->total &nbsp; |  &nbsp;";
                        endforeach; ?>
                    </marquee>
                </div>
        </div><!--Main content-->
  </div><!--Main Panel-->
            </div></div>