<?php
/**
 * This file plays middle-man between user interaction and data requests
 *
 * This file is to handle requestions on the front-end and decide
 * what should happen next, whether it be forwarding the user to another page,
 * back to where they where previously, or pull/push data to/from the back-end.
 *
 * PHP version 7
 *
 * LICENSE: Infomation here.
 *
 * @author     Jacob Laqua <jlaqua@mail.greenriver.edu>
 * @author     Dmitriy Drkhipchuk <Darkhipchuk@mail.greenriver.edu> //This needs to reflect naturalresourcesjobs.greenrivertech.net
 * @author     Angelo Blanchard <ablanchard3@mail.greenriver.edu> //This needs to reflect naturalresourcesjobs.greenrivertech.net
 * @version    1.0 GitHub: <https://github.com/GreenRiverSoftwareDevelopment/techie> //This needs to reflect naturalresourcesjobs.greenrivertech.net
 * @link       http://techies.greenrivertech.net/controller/controller.php //This needs to reflect naturalresourcesjobs.greenrivertech.net
 */
    session_start();

    /**
     * This class creates a Controller object
     *
     * @author     Jacob Laqua <jlaqua@mail.greenriver.edu>
     * @author     Dmitriy Drkhipchuk <Darkhipchuk@mail.greenriver.edu> //This needs to reflect naturalresourcesjobs.greenrivertech.net
     * @author     Angelo Blanchard <ablanchard3@mail.greenriver.edu> //This needs to reflect naturalresourcesjobs.greenrivertech.net
     * @version    @version Release: 1.0
     */
    class Controller
    {
        private $_f3; //router

        /**
         * Creates a new f3 object and sets the
         * nav bar location for use on view pages
         *
         * @access public
         * @param object $f3   The f3 router being passed
         */
        public function __construct($f3)
        {
            $this->_f3 = $f3;
            $this->_f3->set('nav', 'view/modules/nav.php');
            $this->_f3->set('head_title', 'view/modules/head.php');
            $this->_f3->set('problems', 'view/modules/error-display.php');
            $this->_f3->set('footer', 'view/modules/footer.php');
        }

        //methods

        /**
         * Method for logic to grab the data needed to build the home/default page
         *
         * This method is used by default upon landing landing on the site
         * and also when the user click "home" in the nav bar
         *
         * @access public
         */
        public function home() //This needs to reflect naturalresourcesjobs.greenrivertech.net
        {
            //retrieve jobs
            $data = new DataLayer();
            $jobs = $data->getAllJobs();
            //load the view
            $this->_f3->set('title', 'All Jobs');
			$this->_f3->set('jobs', $jobs);
            echo Template::instance()->render('view/jobs.php');
        }
		
        /**
         * Method for logic to grab the data needed to build the home/default page
         *
         * This method is used by default upon landing landing on the site
         * and also when the user click "home" in the nav bar
         *
         * @access public
         */
        public function postJob() //This needs to reflect naturalresourcesjobs.greenrivertech.net
        {
			if (isset($_SESSION['logged']) && $_SESSION['logged']['admin'] == 1) {
				$this->_f3->set('title', 'New Job');
				if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST !== $_SESSION['last-set']) {
					$data = new DataLayer();
					
					//send post data to the model
					// $user will either return with user data or errors
					$job = $data->postJob($_POST);
					$_SESSION['last-set'] = $_POST;
					if (isset($job['title'])) {
						// the user is in the db
						// store the good data in session for the confirmation 
						$_SESSION['job'] = $job;
						header("Location: /");
					} else {
						$this->_f3->set('sticky', $_POST);
						$this->_f3->set('errors', $user);
					}
				} else {
					$this->_f3->clear('errors');
					$this->_f3->clear('sticky');
				}
				//load the view
				echo Template::instance()->render('view/post-job.php');
			} else {
				header("Location: /");
			}
        }
		
        /**
         * Method for logic to grab the data needed to build the home/default page
         *
         * This method is used by default upon landing landing on the site
         * and also when the user click "home" in the nav bar
         *
         * @access public
         */
        public function announcements() //This needs to reflect naturalresourcesjobs.greenrivertech.net
        {
            //retrieve users
            $data = new DataLayer();
			if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['title'])) {
				//log the user in
				$announcement = $data->postAnnouncement($_POST);
				if ($user['admin'] == 1) { //handle success			
				}
			}
            //load the view
			$announcements = $data->getAllAnnouncements();
            $this->_f3->set('title', 'Announcements');
			$this->_f3->set('announcements', $announcements);
            echo Template::instance()->render('view/announcements.php');
        }

		public function confirmation() //This needs to reflect naturalresourcesjobs.greenrivertech.net
		{
			//Prevent the user from navigating to the confirmation page on their own
			if (!isset($_SESSION['user'])) {
				header("Location: /");
			} else {
				$this->_f3->set('title', "Confirmation");	
				$this->_f3->set('user', $_SESSION['user']);
				session_unset();
				session_destroy();
		  
				//load the view
				echo Template::instance()->render('view/confirmation.php');	
			}
		}

		public function login() //This needs to reflect naturalresourcesjobs.greenrivertech.net
		{
			$data = new DataLayer();
			if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'])) {
				//log the user in
				$user = $data->login($_POST);
				if ($user['admin'] == 1) {
					$_SESSION['logged'] = $user;
					header("Location: /");					
				}
			}
            $this->_f3->set('title', 'Login');
			echo Template::instance()->render('view/login.php');
		}

        /**
         * Method for logic to log a user out.
         *
         * session is unset/destroyed and the user is sent home
         *
         * @access public
         */
        public function logout() //This needs to reflect naturalresourcesjobs.greenrivertech.net
        {
            session_unset();
            session_destroy();
            header("Location: /");
        }

		public function hide($id)
		{
			$data = new DataLayer();

			//send post data to the model
            $data->hideJob($id);
			header("Location: /");
		}
		
		public function hideAnnoucement($id)
		{
			$data = new DataLayer();

			//send post data to the model
            $data->hideAnnouncement($id);
			header("Location: /announcements");
		}
		
		public function edit($id)
		{
			if (isset($_SESSION['logged']) && $_SESSION['logged']['admin'] == 1) {
				$data = new DataLayer();
				if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['title'])) {
					//log the user in
					$job = $data->updateJob($_POST);
					if ($job == 1) {// Do error checking here, if it all looks good move along "header"
						header("Location: /");					
					}
				}
				$job = $data->getSingleJob($id);
				$this->_f3->set('title', 'Edit');
				$this->_f3->set('job', $job);
				echo Template::instance()->render('view/edit-job.php');
			} else {
				header("Location: /");
			}
		}
    }
?>
