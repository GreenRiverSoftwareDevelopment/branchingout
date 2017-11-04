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
                            <h3><strong>Edit Form</strong> - {{ @job['job_title'] }}</h3>
                            <div class="col-xs-12">
                                <div class="col-xs-12 input-group">
                                    <input class="form-control" type="text" id="title" name="title" maxlength="100" placeholder="Job Title"  required autofocus value="{{ @job['job_title'] }}"><!--&nbsp;-->
                                </div>
                            </div>

                            <div class="col-md-6 col-xs-12">
                                <div class="col-xs-12 input-group">
                                    <input class="form-control" type="text" id="company" name="company" maxlength="35" placeholder="Company Name" required value="{{ @job['company_name'] }}">
                                </div>
                            </div>

                            <div class="col-md-6 col-xs-12">
                                <div class="col-xs-12 input-group">
                                    <input class="form-control" type="text" id="location" name="location" maxlength="50" placeholder="Work Location" required value="{{ @job['location'] }}">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="col-xs-12 input-group">
                                    <input class="form-control" type="text" id="url" name="url" maxlength="300" placeholder="Link to original post" value="{{ @job['url_link'] }}">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-xs-12 input-group">
                                    <h4>Expiration</h4>
                                    <input class="form-control" type="date" id="date" name="date" value="{{ @job['expiration'] }}">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-xs-12 input-group">
                                        <h4>Applicable Career Track:<h4>
                                        <input class="form-control" type="text" id="catagories" name="catagories" maxlength="100" placeholder="Career track"  required value="{{ @job['catagory'] }}">
                                </div>
                            </div>
                            <input type="text" name="job_number" value="{{ @job['job_number'] }}" hidden>
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
