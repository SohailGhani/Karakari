<div class="main-content">     
    <form class="form-horizontal" action="<?=$action?>" method="post">
        <div class="row">
            <div class="form-group margin0">
                <label for="car_name" class="col-sm-2 control-label">Car Name:</label>
                <div class="col-sm-6">
                    <select type="text" name="car_name" class="form-control">
                        <?php 
                            foreach($cars as $car):
                        ?>
                       <option <?php if($car->carId==$sales['car_id']) echo'selected="selected"' ?> value="<?=$car->carId?>"><?=$car->car_name?>&nbsp;&nbsp;( <?=$car->color_name?> )</option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>
        
        <div class="row">
            <div class="form-group margin0">
                <label for="quantity" class="col-sm-2 control-label">Quantity:</label>
                <div class="col-sm-6">
                    <input type="number" id='quantity' class="form-control" name="quantity" value="<?=$sales['quantity']?>">
                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>
        
        <div class="row">
            <div class="form-group margin0">
                <label for="amount" class="col-sm-2 control-label">Amount Paid:</label>
                <div class="col-sm-6">
                    <input type="number" id='amount_paid' class="form-control" name="amount_paid" value="<?=$sales['amount_paid']?>">
                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>
        
        <div class="row">
            <div class="form-group margin0">
                <label for="balance" class="col-sm-2 control-label">Balance:</label>
                <div class="col-sm-6">
                    <input type="number" id='balance' class="form-control" name="total_amount" value="<?=$sales['total_amount']?>">
                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>
        
        <div class="row">
            <div class="form-group margin0">
                <label for="date" class="col-sm-2 control-label">Date:</label>
                <div class="col-sm-6">
                    <input type="date" id='amount_paid' class="form-control" name="date" value="<?=$sales['date']?>">
                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>
        
    <div class="form-group">
        <div class="col-sm-offset-6 col-sm-6">
            <button type="submit" class="btn btn-Success">Add Sale</button>
            <a class="btn btn-default" href="<?=site_url("Sales/sales_info")?>"style="background-color: lightgrey">Cancel</a>
        </div>
    </div>
</form>
        </div><!--Main Panel-->
</div>
</div>


