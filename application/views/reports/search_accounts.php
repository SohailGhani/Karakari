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
                                            <select  id='name' class="form-control" name="selection" required="">
                                                <option value="faysal_faisal">Fysal Bank (Faisal)</option>
                                                <option value="faysal_shah_wazir">Fysal Bank (Shah)</option>
                                                <option value="alfalah_faisal">Alfalah Bank (Faisal)</option>
                                                <option value="alfalah_shah_wazir">Alfalah Bank (Shah)</option>
                                                <option value="meezan_faisal">Meezan Bank (Faisal)</option>
                                                <option value="meezan_shah_wazir">Meezan Bank (Shah)</option>
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

