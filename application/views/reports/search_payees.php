<div class="main-content">

    <div class="col-md-10 ">
        <div class="well white">
            <form class="form-floating placeholder-form" action="<?=$action?>" method="post">
                <fieldset>
                    <legend><?=$title?></legend>

                    <div class="form-group">
                        <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="md md-event-available"></i></span>
                            <div class="row">
                                <div class="col-md-3">
                                    <select name="itemid" class="form-control" >
                                        <?php foreach($items as $item): ?>
                                            <option value="<?php echo $item->acId; ?>"><?php echo $item->name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span class="help-block">Name</span>
                                </div>
                                <div class="col-md-3">
                                    <input type="date" name="from" class="form-control datepicker-from" value="">
                                    <span class="help-block">Report Date From</span>
                                </div>
                                <div class="col-md-3">
                                    <input type="date" name="to" class="form-control datepicker-until" value="">
                                    <span class="help-block">Report Date Until</span>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-default">Search</button> </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
    <div class="md-2"></div>

</div><!--Main content-->
</div><!--Main Panel-->

