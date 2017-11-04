<!DOCTYPE html>
<html>
    <head>
        <include href="{{ @head_title }}" />
    </head>
    <body id="body">
        <include href="{{ @nav }}" />
            <check if="{{ isset($_SESSION['logged']) && $_SESSION['logged']['admin'] == 1 }}">
                <true>
                    <div class="container-fluid split-top">
                        <div id="announcement-form" class="col-xs-12 col-md-6">
                            <div class="col-xs-12">
                                <h3 class="text-center">Create an announcement</h3>
                                <form class="form-vertical" action="" method="post">
                                    <div class="col-xs-12">
                                        <div class="col-xs-12 input-group">
                                            <input class="form-control" type="text" name="title" maxlength="100" placeholder="Announcement Title" required autofocus><!--&nbsp;-->
                                        </div>
                                    </div>
                                    <div class="col-xs-12 split-top-sm">
                                        <div class="col-xs-12 input-group">
                                        Enter the announcement:
                                        <textarea class="form-control" name="description" maxlength="800" rows="5" required></textarea><br><br>
                                        </div>
                                    </div>
                                    <input id="submit" type="submit" class="btn btn-primary col-xs-12 col-sm-offset-2 col-sm-8 split-top" name="submit" value="Submit">
                                </form>
                            </div>
                        </div>
                        <div id="announcements" class="col-xs-12 col-md-6">
                            <div class="col-xs-12">
                                <h3 class="text-center">Announcements</h3>
                                <repeat group="{{ @announcements }}" value="{{ @annoucement }}">
                                    <div class="panel panel-success">
                                        <div class="panel-heading">
                                            <strong>{{ @annoucement['title'] }}</strong>
                                            <span class="pull-right"><strong>{{ @annoucement['date'] }}</strong></span>
                                            <div class="panel-body wrap-text">
                                                {{ @annoucement['description'] }}
                                                <a href="{{ @BASE }}/hideAnnoucement/{{ @annoucement['announcement_number'] }}" class="pull-right red"><span class="glyphicon glyphicon-trash"></span></a>                                                    
                                            </div>
                                        </div>
                                    </div>
                                </repeat>
                            </div>
                        </div>
                    </div>
                </true>
                <false>
                    <div class="container">
                        <div id="announcements" class="col-xs-12">
                            <div class="col-xs-12 split-top">
                                <h2 class="text-center">Announcements</h2>
                                <repeat group="{{ @announcements }}" value="{{ @annoucement }}">
                                    <div class="panel panel-success">
                                        <div class="panel-heading">
                                            <strong>{{ @annoucement['title'] }}</strong>
                                            <span class="pull-right"><strong>{{ @annoucement['date'] }}</strong></span>
                                            <div class="panel-body wrap-text">
                                                {{ @annoucement['description'] }}                                   
                                            </div>
                                        </div>
                                    </div>
                                </repeat>
                            </div>
                        </div>
                    </div>
                </false>
            </check>
        <footer>
            <include href="{{ @footer }}" />   
        </footer>    
    </body>
</html>
