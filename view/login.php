<!DOCTYPE html>
<html>
    <head>
        <include href="{{ @head_title }}" />
    </head>
    <body id="body">
        <include href="{{ @nav }}" />
        <check if="{{ isset(@errors) }}">
			<include href="{{ @problems }}" />
		</check>
            <div class="container">
                <div class="col-sm-12 split-top">
                    <div class="col-sm-12">
                        <form class="form-horizontal" action="" method="post">
                            <div class="form-group">
                                <label class="control-label col-sm-2">Email:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Enter email" name="email" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Password:</label>
                                <div class="col-sm-8">          
                                    <input type="password" class="form-control" placeholder="Enter password" name="password" required>
                                </div>
                            </div>
                            <div class="form-group">        
                                <div class="col-sm-offset-2 col-sm-8">
                                    <input type="submit" class="btn btn-primary col-xs-12 col-sm-offset-2 col-sm-8 split-top"></input>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <footer>
            <include href="{{ @footer }}" />   
        </footer>    
    </body>
</html>
