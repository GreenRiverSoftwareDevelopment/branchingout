<!DOCTYPE html>
<html>
    <head>
        <include href="{{ @head_title }}" />
    </head>
    <body id="body">
        <include href="{{ @nav }}" />
            <div class="container">
                <div class="col-sm-12 split-top">
                    <div class="col-sm-12">
                        <form class="form-vertical" action="" method="post">
                            <h3><strong>New Job Form</h3>
                            <div class="col-xs-12">
                                <div class="col-xs-12 input-group">
                                    <input class="form-control" type="text" id="title" name="title" maxlength="100" placeholder="Job Title" value="{{ @sticky['title'] }}" required autofocus><!--&nbsp;-->
                                </div>
                            </div>

                            <div class="col-md-6 col-xs-12">
                                <div class="col-xs-12 input-group">
                                    <input class="form-control" type="text" id="company" name="company" maxlength="35" placeholder="Company Name" value="{{ @sticky['company'] }}" required>
                                </div>
                            </div>

                            <div class="col-md-6 col-xs-12">
                                <div class="col-xs-12 input-group">
                                    <input class="form-control" type="text" id="location" name="location" maxlength="50" placeholder="Work Location" value="{{ @sticky['location'] }}"required>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="col-xs-12 input-group">
                                    <input class="form-control" type="text" id="url" name="url" maxlength="300" placeholder="Link to original post" value="{{ @sticky['url'] }}">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-xs-12 input-group">
                                    <h4>Expiration</h4>
                                    <input class="form-control" type="date" id="date" name="date" value="{{ @sticky['date'] }}">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-xs-12 input-group">
                                    <fieldset class="form-group" id="payment-checkbox-display">
                                        <h4>Select all that apply for the job:</h4>
                                        <div class="col-xs-12">
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="payment[]" value="Paid"><span>Paid</span></label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="payment[]" value="Part-Time"><span>Part-time</span></label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="payment[]" value="Full-Time"><span>Full-time</span></label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="payment[]" value="Other"><span>Other</span></label>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-xs-12 input-group">
                                    <fieldset class="form-group" id="checkbox-display">
                                        <h4>Applicable Career Track:<h4>
                                        <div class="col-xs-12">
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="catagory[]" value="GIS"><span>GIS</span></label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="catagory[]" value="Forestry"><span>Forestry</span></label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="catagory[]" value="Water Quality"><span>Water Quality</span></label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="catagory[]" value="Park Management"><span>Park Management</span></label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="catagory[]" value="Restoration"><span>Restoration</span></label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="catagory[]" value="Conservation"><span>Conservation</span></label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="catagory[]" value="Fish and Wildlife"><span>Fish and Wildlife</span></label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="catagory[]" value="Wildland Fire"><span>Wildland Fire</span></label>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
        
                            <input id="submit" type="submit" class="btn btn-primary col-xs-12 col-sm-offset-2 col-sm-8 split-top" name="submit" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
        <footer>
            <include href="{{ @footer }}" />   
        </footer>    
    </body>
</html>
