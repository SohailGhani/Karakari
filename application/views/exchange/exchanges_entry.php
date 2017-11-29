    <script src="<?=site_url('kendo/js/jquery.min.js')?>"></script>
    
<div class="main-content">     
    <form class="form-horizontal" action="<?=$action?>" method="post">
        
            
            <div class="form-group margin0">
                <label for="payin" class="col-sm-2 control-label">Rate</label>
                <div class="col-sm-6">
                    <input type="number" id="rate" class="form-control" name="rate">
                </div>
                <div class="col-sm-4"></div>
            </div>
            <div class="form-group margin0">
                <label for="remitRate" class="col-sm-2 control-label">Remit Rate</label>
                <div class="col-sm-6">
                    <input type="number" id="remitRate" class="form-control" name="remitRate">
                </div>
                <div class="col-sm-4"></div>
            </div>
            <div class="form-group margin0">
                <label for="payin" class="col-sm-2 control-label">PayIn</label>
                <div class="col-sm-6">
                    <input type="number" id="payin" class="form-control" name="payin">
                </div>
                <div class="col-sm-4"></div>
            </div>
            
            <div class="form-group margin0">
                <label for="payout" class="col-sm-2 control-label">PayOut</label>
                <div class="col-sm-6">
                    <input type="number" id='payout' class="form-control" name="payout" readonly="">
                </div>
                <div class="col-sm-4"></div>
            </div>
           
            <div class="form-group margin0">
                <label for="payincurrency" class="col-sm-2 control-label">PayIn Currency</label>
                <div class="col-sm-6">
                    <select id='payincurrency' class="form-control" name="payincurrency">
                        <?php foreach ($currencies as $currency):?>
                        <option value="<?=$currency->id?>"><?=$currency->currency?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-sm-4"></div>
            </div>
            <div class="form-group margin0">
                <label for="payincurrency" class="col-sm-2 control-label">Deal</label>
                <div class="col-sm-6">
                    <select id='payincurrency' class="form-control" name="deal">
                        <option value="1">sell</option>
                        <option value="2">puchase</option>
                    </select>
                </div>
                <div class="col-sm-4"></div>
            </div>  
            <div class="form-group margin0">
                <label for="date" class="col-sm-2 control-label">Date</label>
                <div class="col-sm-6">
                    <input type="date" id='payin' class="form-control" name="date">
                </div>
                <div class="col-sm-4"></div>
            </div>
            <div class="form-group margin0">
                <label for="cutomername" class="col-sm-2 control-label">Customer Name</label>
                <div class="col-sm-6">
                    <input type="text" id='cutomername' class="form-control" name="customername">
                </div>
                <div class="col-sm-4"></div>
            </div>
            <div class="form-group margin0">
                <label for="customeraddress" class="col-sm-2 control-label">Customer Address</label>
                <div class="col-sm-6">
                    <input type="text" id='customeraddress' class="form-control" name="customeraddress">
                </div>
                <div class="col-sm-4"></div>
            </div>
            <div class="form-group margin0">
                <label for="customernic" class="col-sm-2 control-label">Customer NIC</label>
                <div class="col-sm-6">
                    <input type="text" id='customernic' class="form-control" name="customernic">
                </div>
                <div class="col-sm-4"></div>
            </div>
            <div class="form-group margin0">
                <label for="customercontact" class="col-sm-2 control-label">Customer Contact</label>
                <div class="col-sm-6">
                    <input type="text" id='customercontact' class="form-control" name="customercontact">
                </div>
                <div class="col-sm-4"></div>
            </div>
    <div class="form-group">
        <div class="col-sm-offset-6 col-sm-6">
            <button type="submit" class="btn btn-Success">Add Exchange Record</button>
            <a class="btn btn-default" href="<?=site_url("Exchange/exchanges_info")?>"style="background-color: lightgrey">Cancel</a>

        </div>
    </div>
</form>
        </div><!--Main Panel-->
</div>
</div>

        <script>
        $("#payin").keyup(function() {
            /*$.ajax({
                   url: '<?=site_url('exchange/calculate')?>/'+$("#payincurrency").val()+'/'+$("#payin").val(),
                    success:function (data){
                     $("#payout").val(data);
                     }
                 });*/
                 $("#payout").val(($("#rate").val()*$("#payin").val()));
            
          });
        </script>
        