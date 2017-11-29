<div class="main-content">
                
                <div class="col-md-10 ">
                            <div class="well white">
                                <form class="form-floating placeholder-form" action="<?=$action?>" method="post">
                                <fieldset>
                                  <legend>Search For Sale Report</legend>
                                  
                                  <div class="form-group">
                                    <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="md md-event-available"></i></span>
                                      <div class="row">
                                        <div class="col-md-3">
                                            <input type="date" name="from" class="form-control datepicker-from" value="<?=set_value('from')?>">
                                            <?php echo form_error('from', '<p style="color:red">', '</p>'); ?>
                                          <span class="help-block">Report Date From</span>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="date" name="to" class="form-control datepicker-until" value="<?=set_value('to')?>">
                                            <?php echo form_error('to', '<p style="color:red">', '</p>'); ?>
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

