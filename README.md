# COMP4350-Project
A web application made for Software Engineering 2 class at UofM.

For our document handins for all iterations, check the corresponding iteration folder in the documentation directory.

TO RUN THE TESTS:
  1. CD into the project main directory.
  2. Seed the database (creates 2 default users) by using the command: php artisan migrate:refresh --seed
    * NOTE: You must do this everytime you want to run the tests (currently).
  3. Now run the tests with the command: vendor/bin/phpunit
