<div class="container-fluid"
    <!--Brand Logo -->
    <div class="row col-md-3 col-sm-12">
        <a href="http://www.greenriver.edu/bas" target="_blank">
            <h3 class="created-by-text">
                Made with &#9749; by <br> Green River College students
            </h3>
        </a>
    </div>
    <div class="row col-md-3 col-sm-12">
        <!--Plug to main campus-->
        <strong>Main Campus:</strong><br>
        <p class="text-center">
            <a class="footer-link" target="_blank" href="https://www.google.com/maps/place/Green+River+Community+College/@47.3130745,-122.179769,16z/data=!4m2!3m1!1s0x549058a045230aab:0x296322357297393b">
            <span class="contrast">12401 Southeast 320th Street<br>Auburn, WA 98092</span></a>
        </p>
    </div>
    <!-- Social Media Buttons and Icons -->
    <div class="row col-md-3 col-sm-12 social-media">
        <h5>Follow us on:</h5>
        <div class="Social-Media">
            <a class="icons" href="https://www.facebook.com/" target="_blank">
                <i class="fa fa-facebook-square" aria-hidden="true"></i>
            </a>
            <a class="icons" href="http://instagram.com/" target="_blank">
                <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
            <a class="icons" href="https://www.linkedin.com/" target="_blank">
                <i class="fa fa-linkedin-square" aria-hidden="true"></i>
            </a>
        </div>
    </div>
    <!-- login on footer nav bar -->
    <div class="row col-md-3 col-sm-12">
        <ul class="nav navbar-nav navbar-right log-border">
            <li>
                <check if="{{ isset($_SESSION['logged']) }}">
                    <true>
                        <a href="{{ @BASE }}/logout" target="_self">Logout</a></li>
                    </true>
                    <false>
                        <a href="{{ @BASE }}/login" target="_self">Admin Login</a></li>
                    </false>
                </check>
        </ul>
    </div>
</div>