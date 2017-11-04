<img src="{{ @BASE }}/pictures/helmet-newstickersupercrop.jpg" class="img-responsive hidden-xs" alt="Branching Out" />
<check if="{{ isset($_SESSION['logged']) }}">
    <true>
        <nav class="navbar navbar-default"> <!--id="top"-->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar" aria-expanded="false">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"></a>
            </div>
            <div class="navbar-collapse collapse" id="myNavbar" role="navigation" aria-expanded="false" style="height: 1px;">
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="{{ @BASE }}/" id="home-link" target="_self">All Jobs</a></li>
                    <li><a href="{{ @BASE }}/post-job" id="post-link" target="_self">Job Submission</a></li>
                    <li><a href="{{ @BASE }}/announcements" id="annoucement-link" target="_self" >Announcements</a></li>
                </ul>
            </div>
        </nav>
    </true>
    <false>
        <nav class="navbar navbar-default"> <!--id="top"-->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar" aria-expanded="false">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"></a>
            </div>
            <div class="navbar-collapse collapse" id="myNavbar" role="navigation" aria-expanded="false" style="height: 1px;">
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="{{ @BASE }}/" id="home-link" target="_self">All Jobs</a></li>
                    <li><a href="http://www.greenriver.edu/academics/areas-of-study/bas-programs/natural-resources.htm" target="_blank" >Earn your Bachelor’s at Green River</a></li>
                    <li><a href="{{ @BASE }}/announcements" id="annoucement-link" target="_self" >Announcements</a></li>
                </ul>
            </div>
        </nav>
    </false>
</check>


