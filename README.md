# COMP4350-Project
A web application made for Software Engineering 2 class at UofM.

Android Project: https://github.com/joshsimard/COMP4350-Android.git

For our document handins for all iterations, check the corresponding iteration folder in the documentation directory.

Setup:

1. Download Composer to the directory where the project was cloned
2. From terminal, run composer.phar install
3. Download mysql. if downloaded, create a database "Doctor_Client_Portal"
4. From terminal, run php artisan migrate:install
5. From terminal, run php artisan migrate:refresh --seed
6. After these steps, database should be seeded
7. create a new file called .env and add it to the project. A sample .envexample is given
8. put in the name of the database, user, and password for mysql
9. After these, run form terminal php artisan key:generate
10.Lastly, run "php artisan serve" to run Nginx Server

TO RUN THE INTEGRATION AND UNIT TESTS:
  1. CD into the project main directory.
  2. Seed the database (creates default users) by using the command: php artisan migrate:refresh --seed
    * NOTE: You must do this everytime you want to run the tests (currently).
  3. Now run the tests with the command: vendor/bin/phpunit

TO RUN SELENIUM TESTS:
  1. Download and install Chrome browser if you do not already have it: https://www.google.com/chrome/browser/desktop/
  2. Download Chromedriver: http://chromedriver.storage.googleapis.com/index.html?path=2.21/
  3. Run the Chrome driver
  4. Enter the url (This will test the website on AWS): http://localhost:8000/tests


LINK TO PROJECT ON AWS:
http://ec2-52-32-93-246.us-west-2.compute.amazonaws.com
