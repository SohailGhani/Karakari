<script src="<?=site_url('assets/js/jquery-1.10.2.js')?>"></script>

<script>
            $(document).ready(function() {
             
    var max_fields      = 100; //maximum input boxes allowed
    var wrapper         = $(".ui-widget"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="row"><div class="col-xs-6"><select class="form-control" name="items[]"><option value="">Select Item</option><?php  foreach($items as $item): ?><option value="<?=$item->itemId?>"><?=$item->itemName?></option><?php endforeach ?></select></div><div class="col-xs-6"><input class="form-control" name="quantity[]" placeholder="Quantity" ></div></div>'); //add input box
//            $( ".combobox" ).combobox();
		
       }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
            </script>
<div class="main-content">     
    <form class="form-horizontal" action="<?=$action?>" method="post">
        
        
            <div class="form-group margin0">
                <label for="name" class="col-sm-2 control-label">Deposit Amount</label>
                <div class="col-sm-6">
                    <input  id='name' class="form-control" name="deposite" required="">
                        
                </div>
                <div class="col-sm-4"></div>
            </div>
            <div class="form-group margin0">
                <label for="name" class="col-sm-2 control-label">Deposit Method</label>
                <div class="col-sm-6">
                    <select  id='name' class="form-control" name="deposite_method" required="">
                        <option value="cash">Cash</option>
                        <option value="faysal_faisal">Fysal Bank (Faisal)</option>
                        <option value="faysal_shah_wazir">Fysal Bank (Shah)</option>
                        <option value="alfalah_faisal">Alfalah Bank (Faisal)</option>
                        <option value="alfalah_shah_wazir">Alfalah Bank (Shah)</option>
                        <option value="meezan_faisal">Meezan Bank (Faisal)</option>
                         <option value="meezan_shah_wazir">Meezan Bank (Shah)</option>
                    </select>
                        
                </div>
                <div class="col-sm-4"></div>
            </div>
        <div class="form-group margin0">
                <label for="name" class="col-sm-2 control-label">Detail </label>
                <div class="col-sm-6">
                    <input type="text"  class="form-control" name="detail" required="">
                </div>
                <div class="col-sm-4"></div>
        </div>
        <div class="form-group margin0">
                <label for="name" class="col-sm-2 control-label">Deposit date</label>
                <div class="col-sm-6">
                    <input type="date"  id='name' class="form-control" name="depositedate" required="">
                        
                </div>
                <div class="col-sm-4"></div>
            </div>
            
        </div>
        
    <div class="form-group">
        <div class="col-sm-offset-6 col-sm-6">
            <a href="<?=  site_url('')?>" class="btn btn-Success">Cancel</a> <button type="submit" class="btn btn-Success">Pay</button>
        </div>
    </div>
</form>
        </div><!--Main Panel-->
</div>
</div>

