Backend Unit Tests
==================
To run the PHPUnit tests, change directory to 'src' and run '../vendor/bin/phpunit ../tests'

Steps:
1. cd Bookmarker/src
2. ../vendor/bin/phpunit ../tests

Setup
======
1. Import the database.sql file
2. Make sure PDO is enabled in php.ini
3. cd Bookmarker/
4. run 'php composer.phar install'
5. setup a virtualhost record in apache or ngnix with DocumentRoot = Bookmarker/
6. Make sure mysql is running
7. Update the database configuration in 'Bookmarker/db/Database.php'

Live Demo
=========
I have a machine running/serving this application on port 8888. You can see a live demo at:
Live Demo Url: http://66.65.155.213:8888/

1. Create an account. (will automatically be logged in upon successful creation)
2. Create Multiple accounts :).

