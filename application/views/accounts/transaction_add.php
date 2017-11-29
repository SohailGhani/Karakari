<link rel="stylesheet" href="<?=site_url('assets/css/jquery-ui.css')?>">
<script src="<?=site_url('assets/js/jquery-1.10.2.js')?>"></script>
<script src="<?=site_url('assets/js/jquery-ui.js')?>"></script>

<script>
	(function( $ ) {
		$.widget( "custom.combobox", {
			_create: function() {
				this.wrapper = $( "<span>" )
					.addClass( "custom-combobox" )
					.insertAfter( this.element );

				this.element.hide();
				this._createAutocomplete();
				this._createShowAllButton();
			},

			_createAutocomplete: function() {
				var selected = this.element.children( ":selected" ),
					value = selected.val() ? selected.text() : "";

				this.input = $( "<input>" )
					.appendTo( this.wrapper )
					.val( value )
					.attr( "title", "" )
					.addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
					.autocomplete({
						delay: 0,
						minLength: 0,
						source: $.proxy( this, "_source" )
					})
					.tooltip({
						tooltipClass: "ui-state-highlight"
					});

				this._on( this.input, {
					autocompleteselect: function( event, ui ) {
						ui.item.option.selected = true;
						this._trigger( "select", event, {
							item: ui.item.option
						});
					},

					autocompletechange: "_removeIfInvalid"
				});
			},

			_createShowAllButton: function() {
				var input = this.input,
					wasOpen = false;

				$( "<a>" )
					.attr( "tabIndex", -1 )
					.attr( "title", "Show All Items" )
					.tooltip()
					.appendTo( this.wrapper )
					.button({
						icons: {
							primary: "ui-icon-triangle-1-s"
						},
						text: false
					})
					.removeClass( "ui-corner-all" )
					.addClass( "custom-combobox-toggle ui-corner-right" )
					.mousedown(function() {
						wasOpen = input.autocomplete( "widget" ).is( ":visible" );
					})
					.click(function() {
						input.focus();

						// Close if already visible
						if ( wasOpen ) {
							return;
						}

						// Pass empty string as value to search for, displaying all results
						input.autocomplete( "search", "" );
					});
			},

			_source: function( request, response ) {
				var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
				response( this.element.children( "option" ).map(function() {
					var text = $( this ).text();
					if ( this.value && ( !request.term || matcher.test(text) ) )
						return {
							label: text,
							value: text,
							option: this
						};
				}) );
			},

			_removeIfInvalid: function( event, ui ) {

				// Selected an item, nothing to do
				if ( ui.item ) {
					return;
				}

				// Search for a match (case-insensitive)
				var value = this.input.val(),
					valueLowerCase = value.toLowerCase(),
					valid = false;
				this.element.children( "option" ).each(function() {
					if ( $( this ).text().toLowerCase() === valueLowerCase ) {
						this.selected = valid = true;
						return false;
					}
				});

				// Found a match, nothing to do
				if ( valid ) {
					return;
				}

				// Remove invalid value
				this.input
					.val( "" )
					.attr( "title", value + " didn't match any item" )
					.tooltip( "open" );
				this.element.val( "" );
				this._delay(function() {
					this.input.tooltip( "close" ).attr( "title", "" );
				}, 2500 );
				this.input.autocomplete( "instance" ).term = "";
			},

			_destroy: function() {
				this.wrapper.remove();
				this.element.show();
			}
		});
	})( jQuery );

	$(function () {
		$( ".combobox" ).combobox();
		$( "#toggle" ).click(function() {
			$( ".combobox" ).toggle();
		});
	});
	</script>
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
            $(wrapper).append('<div class="row"><div class="col-xs-4"><select class="form-control combobox" name="items[]"><?php  foreach($items as $item): ?><option value="<?=$item->itemId?>"><?=$item->itemName?></option><?php endforeach ?></select></div><div class="col-xs-3"><input onkeyup='+"'calcul("+'"qty'+x+'","per'+x+'","tot'+x+'")'+"'"+' class="form-control" id="qty'+x+'" name="quantity[]" placeholder="Quantity" value="1" ></div><div class="col-xs-2"><input onkeyup='+"'calcul("+'"qty'+x+'","per'+x+'","tot'+x+'")'+"'"+' value="0" class="form-control" id="per'+x+'" name="per_price[]" placeholder="per price" ></div><div class="col-xs-3"><input class="form-control" id="tot'+x+'" name="price[]" value="0" placeholder="price" readonly></div></div>'); //add input box
            $( ".combobox" ).combobox();
		
       }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    });
});
            </script>
<div class="main-content">     
    <form class="form-horizontal" action="<?=$action?>" method="post">
        
        <div class="row">
            <div class="form-group margin0">
                <label for="invoice" class="col-sm-2 control-label">Invoice No.</label>
                <div class="col-sm-6">
                    <input  id='name' class="form-control" name="invoice" required="">
                        
                </div>
                <div class="col-sm-4"></div>
            </div>
            <div class="form-group margin0">
                <label for="name" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-6">
                    <select id='name' class="form-control" name="acid" required="" readonly>
                        <?php foreach ($accounts as $account): ?>
                        <option value="<?=$account->acId?>" <?php if($id==$account->acId) echo 'selected="selected"'; ?>><?=$account->name?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="col-sm-4"></div>
            </div>
            <div class="form-group margin0">
                <button type="button" onclick="total_status()" class="add_field_button">Add More Item</button>
                <label for="item" class="col-sm-2 control-label">Item(s)</label>
                <div class="col-sm-6">
                    <div class="ui-widget">
                        <!--<div class="row"><div class="col-xs-4"><select class="form-control combobox" name="items[]"><?php  foreach($items as $item): ?><option value="<?=$item->itemId?>"><?=$item->itemName?></option><?php endforeach ?></select></div><div class="col-xs-3"><input class="form-control" name="quantity[]" placeholder="Quantity" ></div><div class="col-xs-2"><input class="form-control" name="per_price[]" placeholder="per price" ></div><div class="col-xs-3"><input class="form-control" name="price[]" placeholder="Total Price" ></div></div>-->
                        </div>
                </div>
            </div>
            <div class="form-group margin0">
                <label for="name" class="col-sm-2 control-label">Paid Amount</label>
                <div class="col-sm-6">
                    <input  id='name' class="form-control" name="paid" value="0">
                        
                </div>
                <div class="col-sm-4"></div>
            </div>
            <div class="form-group margin0">
                <label for="name" class="col-sm-2 control-label">Paid By</label>
                <div class="col-sm-6">
                    <select id='name' class="form-control" name="paidby">
                        <option value="">Select Pay method</option>
                        <option value="cash">Cash</option>
                                                <option value="faysal_faisal">Fysal Bank (Faisal)</option>
                                                <option value="faysal_shah_wazir">Fysal Bank (Shah)</option>
                                                <option value="alfalah_faisal">Alfalah Bank (Faisal)</option>
                                                <option value="alfalah_shah_wazir">Alfalah Bank (Shah)</option>
                                                <option value="meezan_shah_wazir">Meezan Bank (Faisal)</option>
                                                <option value="meezan_faisal">Meezan Bank (Shah)</option>
                    </select>
                </div>
                <div class="col-sm-4"></div>
            </div>
            <div class="form-group margin0">
                <label for="name" class="col-sm-2 control-label">Total</label>
                <div class="col-sm-6">
                    <input  id='main_total' class="form-control" name="total" required="">
                        
                </div>
                <div class="col-sm-4"></div>
            </div>
            <div class="form-group margin0">
                <label for="name" class="col-sm-2 control-label">Discount</label>
                <div class="col-sm-6">
                    <input  id='main_total' class="form-control" name="discount" required="">
                        
                </div>
                <div class="col-sm-4"></div>
            </div>
            <div class="form-group margin0">
                <label for="name" class="col-sm-2 control-label">Balance</label>
                <div class="col-sm-6">
                    <input  id='balance' class="form-control" name="balance" required="">
                        
                </div>
                <div class="col-sm-4"></div>
            </div>
            <div class="form-group margin0">
                <label for="nic" class="col-sm-2 control-label">Date</label>
                <div class="col-sm-6">
                    <input type="date" id='date' class="form-control" name="date" required="">
                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>
        
    <div class="form-group">
        <div class="col-sm-offset-6 col-sm-6">
            <a href="<?=  site_url('accounts/transactions_info/$account->acId/'.$id)?>" class="btn btn-Success">Cancel</a> <button type="submit" class="btn btn-Success">Sale</button>
        </div>
    </div>
</form>
        </div><!--Main Panel-->
</div>
</div>

<script>
var x=1;    
//var sum=0;
//var main_total=0;
    function total_status(){
        x++;
    }
    function calcul(qty,per,tot){
//        main_total=0;
       var sum=0;
//        var total=tot;
//        alert(tot);
        var quantity=$('#'+qty).val();
        var per_price=$('#'+per).val();
//        var total
        $('#'+tot).val((quantity*per_price));
        
        for(i=2;i<=x;i++){
           sum= parseInt(sum) + parseInt($('#tot'+i).val());
        }
        $('#main_total').val(sum);
        $('#balance').val(sum);
    }
    </script>