<?php
/**
 * This file handles db interactions
 *
 * This file is used for interections with the db.
 * Whether it be inserting, updating or deleting this file will handle
 * final data validation on the back-end and data-massaging prior to
 * returning to the controller
 *
 * PHP version 7
 *
 * LICENSE: Infomation here.
 *
 * @author     Jacob Laqua <jlaqua@mail.greenriver.edu>
 * @author     Dmitriy Drkhipchuk <Darkhipchuk@mail.greenriver.edu>
 * @author     Angelo Blanchard <ablanchard3@mail.greenriver.edu>
 * @version    1.0 GitHub: <https://github.com/GreenRiverSoftwareDevelopment/techies>
 * @link       http://techies.greenrivertech.net
 */

    require_once('db/connection.php');
    //require_once('db/password.php');
    /**
     * This class creates a DataLayer object
     *
     * @author     Jacob Laqua <jlaqua@mail.greenriver.edu>
     * @author     Dmitriy Drkhipchuk <Darkhipchuk@mail.greenriver.edu>
     * @author     Angelo Blanchard <ablanchard3@mail.greenriver.edu>
     * @version    @version Release: 1.0
     */
    class DataLayer
    {
        private $_pdo; //pdo object

        /**
         * Creates a new PDO object
         *
         * @access public
         * The PDO object has the connection to the db
         */
        public function __construct()
        {
            $this->_pdo = getConnection();
        }

        /* methods */

        /**
         * Method for selecting all jobs
         *
         * This method runs a query on the DB grabbing
         * all of the relevent information about a user
         * based off a given id number. Since this method
         * is primarily used for filling a profile page it
         * only grabs whats needed for the profile
         * 
         * @access public
         * @param  integer  $id   The id of the uer
         * @return array    $row  An assoc array with all of the displayable users.
         *                        This array is two dementional, each array index in $rows
         *                        corresponds to an array of values for that user.
         */
          public function getAllJobs()
          {

              $select = "SELECT job_number, job_title, company_name, catagory, location, job_description, DATE_FORMAT(post_date,'%b %d, %Y') AS date, DATE_FORMAT(expiration,'%b %d, %Y') AS expire, url_link FROM job_table
                               WHERE visibility=1";

              $statement = $this->_pdo->prepare($select);
              $statement->execute();

              $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
              return $rows;
          }
          
        /**
         * Method for selecting all jobs
         *
         * This method runs a query on the DB grabbing
         * all of the relevent information about a user
         * based off a given id number. Since this method
         * is primarily used for filling a profile page it
         * only grabs whats needed for the profile
         * 
         * @access public
         * @param  integer  $id   The id of the uer
         * @return array    $row  An assoc array with all of the displayable users.
         *                        This array is two dementional, each array index in $rows
         *                        corresponds to an array of values for that user.
         */
          public function getAllAnnouncements()
          {

              $select = "SELECT * FROM announcements
                               WHERE visibility=1 ORDER BY date DESC";

              $statement = $this->_pdo->prepare($select);
              $statement->execute();

              $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
              return $rows;
          }

        /**
         * Method for selecting a single job
         *
         * This method runs a query on the DB grabbing
         * all of the relevent information about a user
         * based off a given id number. Since this method
         * is primarily used for filling a profile page it
         * only grabs whats needed for the profile
         * 
         * @access public
         * @param  integer  $id   The id of the uer
         * @return array    $row  An assoc array with all of the displayable users.
         *                        This array is two dementional, each array index in $rows
         *                        corresponds to an array of values for that user.
         */
          public function getSingleJob($id) //This needs to reflect naturalresourcesjobs.greenrivertech.net (can be called getSingleJob)
          {

              $select = "SELECT * FROM job_table
                               WHERE job_number=:id";

              $statement = $this->_pdo->prepare($select);

              $statement->bindValue(':id', $id, PDO::PARAM_INT);
              $statement->execute();

              $row = $statement->fetch(PDO::FETCH_ASSOC);
              return $row;
          }

          
          public function postJob($data) //This needs to reflect naturalresourcesjobs.greenrivertech.net (can be called updateJob)
          {
             $errors = array();
             
                $job_title = null;
                if (!empty($data['title'])) {
                    $job_title = $data['title'];
                }
                else {
                    // this is the syntax to add something at the end of the array
                    $errors[] = 'Job Title is Required.';
                // $job_title should still be null if there was an error
                }
            
                $company_name = null;
                if (!empty($data['company'])) {
                    $company_name = $data['company'];
                }
                else {
                    // this is the syntax to add something at the end of the array
                    $errors[] = 'Company is Required.';
                // $job_title should still be null if there was an error
                }
            
                //some jobs may not be posted elsewhere so the url is not required
                $web_link = null;
                if (!empty($data['url'])) {
                  $web_link = $data['url'];
                }
            
                $location = null;
                if (!empty($data['location'])) {
                    $location = $data['location'];
                }
                else {
                    // this is the syntax to add something at the end of the array
                    $errors[] = 'location is Required.';
                // $job_title should still be null if there was an error
                }
            
                $expiration = null;
                if (!empty($data['date'])) {
                    $expiration = $data['date'];
                }
                else {
                    // this is the syntax to add something at the end of the array
                    $errors[] = 'Date is Required.';
                // $job_title should still be null if there was an error
                }
                if (!isset($data['catagory'])) {
                    $errors[] = 'You have not selected any career tracks';
                } else {
                    $catagory = $data['catagory'];
                    $catagory = implode(", ", $catagory);
                    $data['catagory'] = $catagory; // show a string on confirmation page
                }
                if (!isset($data['payment'])) {
                    $errors[] = 'You have not selected any career tracks';
                } else {
                    $payment = $data['payment'];
                    $payment = implode(", ", $payment);
                    $data['payment'] = $payment; // show a string on confirmation page
                }
                $job_title = $job_title . ", " . $payment;
                
                if (sizeof($errors) == 0) {
                    $insert = 'INSERT INTO job_table (job_title, company_name, catagory, location, expiration, url_link)
                                 VALUES (:job_title, :company_name, :catagory, :location, :expiration, :url_link)';
                    
                    $statement = $this->_pdo->prepare($insert);
                    
                    $statement->bindValue(':job_title', $job_title, PDO::PARAM_STR);
                    $statement->bindValue(':company_name', $company_name, PDO::PARAM_STR);
                    $statement->bindValue(':catagory', $catagory, PDO::PARAM_STR);
                    $statement->bindValue(':location', $location, PDO::PARAM_STR);
                    $statement->bindValue(':expiration', $expiration, PDO::PARAM_STR);
                    $statement->bindValue(':url_link', $web_link, PDO::PARAM_STR);
                    
                    $statement->execute();
                    return $data;
                } else {
                    return $errors;
                }
              

          }
          
          public function postAnnouncement($data) //This needs to reflect naturalresourcesjobs.greenrivertech.net (can be called updateJob)
          {
              if (!isset($data['title'])) {
                  $errors[] = 'You have not selected a title';
              } else {
                  $title = $data['title'];
              }
              if (!isset($data['description'])) {
                  $errors[] = 'You have not entered a  description';
              } else {
                  $description = $data['description'];
              }
              
              $insert = 'INSERT INTO announcements (title, description)
                           VALUES (:title, :description)';

              $statement = $this->_pdo->prepare($insert);

              $statement->bindValue(':title', $title, PDO::PARAM_STR);
              $statement->bindValue(':description', $description, PDO::PARAM_STR);
              
              return $statement->execute();
          }
          
          public function updateJob($data) //This needs to reflect naturalresourcesjobs.greenrivertech.net (can be called updateJob)
          {
                $statement = 'UPDATE job_table SET job_title=:job_title, company_name=:company_name, catagory=:catagory, location=:location,
                expiration=:expiration, url_link=:url_link WHERE job_number=:job_number';
                
                $statement = $this->_pdo->prepare($statement);
                
                $statement->bindValue(':job_number', intval($data['job_number']), PDO::PARAM_INT);
                $statement->bindValue(':job_title', $data['title'], PDO::PARAM_STR);
                $statement->bindValue(':company_name', $data['company'], PDO::PARAM_STR);
                $statement->bindValue(':catagory', $data['catagories'], PDO::PARAM_STR);
                $statement->bindValue(':location', $data['location'], PDO::PARAM_STR);
                $statement->bindValue(':expiration', $data['date'], PDO::PARAM_STR);
                $statement->bindValue(':url_link', $data['url'], PDO::PARAM_STR);
                
                return $statement->execute();
          }

          public function hideJob($id) //This needs to reflect naturalresourcesjobs.greenrivertech.net (can be called hideJob)
          {

              $statement = 'UPDATE job_table SET visibility = 0 WHERE job_number=:job_number';

              $statement = $this->_pdo->prepare($statement);

              $statement->bindValue(':job_number', $id, PDO::PARAM_INT);

              return $statement->execute();
          }
          
          public function hideAnnouncement($id) //This needs to reflect naturalresourcesjobs.greenrivertech.net (can be called hideJob)
          {

              $statement = 'UPDATE announcements SET visibility = 0 WHERE announcement_number=:id';

              $statement = $this->_pdo->prepare($statement);

              $statement->bindValue(':id', $id, PDO::PARAM_INT);

              return $statement->execute();
          }
        
        /**
        * Method to login in a verified user
        *
        * This method calls getUser and verifyUser
        * to avoid redundancy
        *
        * @access public
        * @param  array $data The $_POST array with all contents from the login form
        * @return true if the insert was successful, otherwise false
        */
        public function login($data) //This needs to reflect naturalresourcesjobs.greenrivertech.net
        {
            
            //errors array 
            $errors = array();
            
            //read in and validate the login email
            if(isset($data['email']) && strlen($data['email']) > 1 && strlen($data['email']) <= 40 ) {
                $username = $data['email'];
            } else {
                $errors['username-error'] = 'Please enter your email address';
            }
            
            //read in and validate the login password
            if(isset($data['password']) && strlen($data['password']) >= 4 && strlen($data['password']) <= 20 ) {
                $password = $data['password'];
            } else {
                $errors['password-error'] = 'Please enter your password';
            }
            if (sizeof($errors) == 0) {
                $select = "SELECT username, password, admin_user FROM users WHERE username=:username";
                $statement = $this->_pdo->prepare($select);
                
                //bind inputs
                $statement->bindValue(':username', $username, PDO::PARAM_STR);
                
                //execute query
                $statement->execute();
    
                //retrieve a single row
                $row = $statement->fetch(PDO::FETCH_ASSOC);                                  
                                
                if ($row == null) {
                    return false; //no username is found...
                } else {
                    if( strcmp($password, $row['password']) == 0) {
                        $user = array();
                        $user['username'] = $row['username'];
                        $user['admin'] = $row['admin_user'];
                        return $user;
                    } else {
                        $errors['login-error'] = 'There was an issue logging you in';
                        return $errors;
                    }
                }
            } else {
                return $errors;
            }
        }
    }
?>

