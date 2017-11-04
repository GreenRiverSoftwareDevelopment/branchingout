<!DOCTYPE html>
<html>
    <head>
        <include href="{{ @head_title }}" />
    </head>
    <body id="body">
<!--  Maintenance Banner
<div class="alert alert-danger alert-dismissible show black" role="alert">
<button type="button" class="close text-right" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true" class="glyphicon glyphicon-remove black"></span>
</button>
<strong><i class="fa fa-comment-o"></i> This site is undergoing maintenance </strong>Some features may be temporarily disabled.
</div>-->
        <include href="{{ @nav }}" />
            <div class="container-fluid">
                <div class="table-responsive split-top">
                    <table id="myTable" class="table table-bordered table-hover table-striped sortable" style="background-color: ghostwhite">
                        <check if="{{ isset($_SESSION['logged']) && $_SESSION['logged']['admin'] == 1 }}">
                            <true>                        
                                <thead>
                                    <tr>
                                        <th>Delete</th>
                                        <th>Edit</th>
                                        <th>Title</th>
                                        <th>Company</th>
                                        <th>Category</th>
                                        <th>Location</th>
                                        <th>Date Posted</th>
                                        <th>Expires</th>
                                      <th>Apply Now</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <repeat group="{{ @jobs }}" value="{{ @job }}">
                                        <tr>
                                            <td id="delete" class="center-text"><a style="color:red;" href="{{ @BASE }}/hide/{{ @job['job_number'] }}" target="_self"><i class="fa fa-scissors" aria-hidden="true"></i></a></td>
                                            <td class="center-text"><a class="edit-button-style" href="{{ @BASE }}/edit/{{ @job['job_number'] }}" target="_self"><i class="fa fa-wrench" aria-hidden="true"></i></a></td>
                                            <td>{{ @job['job_title'] }}</td>
                                            <td>{{ @job['company_name'] }}</td>
                                            <td>{{ @job['catagory'] }}</td>
                                            <td>{{ @job['location'] }}</td>
                                            <td>{{ @job['date'] }}</td>
                                            <td>{{ @job['expire'] }}</td>
                                            <td class="center-text"><a href="{{ @job['url_link'] }}" target="_blank"><i class="fa fa-chevron-up" aria-hidden="true"></i></a></td>
                                        </tr>                                    
                                     </repeat>
                                </tbody>                                
                            </true>
                            <false>                        
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Company</th>
                                        <th>Category</th>
                                        <th>Location</th>
                                        <th>Date Posted</th>
                                        <th>Expires</th>
                                        <th>Apply Now</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <repeat group="{{ @jobs }}" value="{{ @job }}">
                                        <tr>
                                            <td>{{ @job['job_title'] }}</td>
                                            <td>{{ @job['company_name'] }}</td>
                                            <td>{{ @job['catagory'] }}</td>
                                            <td>{{ @job['location'] }}</td>
                                            <td>{{ @job['date'] }}</td>
                                            <td>{{ @job['expire'] }}</td></a>
                                            <td class="center-text"><a href="{{ @job['url_link'] }}" target="_blank"><i class="fa fa-chevron-up" aria-hidden="true"></i></a></td>
                                        </tr>
                                    </repeat>
                                </tbody>                                
                            </false>
                        </check>
                    </table>
                    <check if="{{ isset($_SESSION['logged']) && isset($_SESSION['logged']['username']) }}">
                        <true>
                            <script type="text/javascript">
                            $(document).ready(function() {
                                $('#myTable').DataTable( {
                                "order": [[ 6, "desc" ]]
                                } );
                            } );
                            </script>
                        </true>
                        <false>
                            <script type="text/javascript">
                            //This initiates the table functionality (sort, search)
                            $(document).ready(function() {
                                $('#myTable').DataTable( {
                                    "order": [[ 4, "desc" ]]
                                } );
                            } );
                            </script>
                        </false>
                        
                    </check>
                </div>
            </div>
        <footer>
            <include href="{{ @footer }}" />   
        </footer>    
    </body>
</html>
