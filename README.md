# Homework07 – GROUP WORK
In this assignment you will combine HTML, PHP, and SQL in order to create a web form that allows a manager to add films to the sakila database.  You will also create a method to allow the manager to view a list of all films along with their related information, and a list of actors in the movies.

## Task 1
- Create an initial HTML page titled manager.html  with 2 buttons. The first button will be labeled “View Customers”, and the second button will be labeled “Add Film”.  The first button should link to a file titled view_customers.php.  The second button should link to a file titled add_film.html.
- Create the view_customers.php file. This file should generate an html page that contains a table that lists all of the customers from the sakila database.  You should list the following information about each customer: first_name, last_name, address, city, district, postal_code, and a list of film titles that each customer has rented. This page should have a button that returns you to the manager.html page.  The last column in your table will be a string containing all the film titles … you do not need a different cell for each film title because the number of films each customer has rented is not the same.  Use a comma to separate film titles. 
- Your table should be sorted by customer last name.
  
## Task 2
- Create the add_film.html  file. It should have a form with text boxes to input the following information about a new film: title, description, release_year, language_id, rental_duration, rental_rate, length, replacement_cost, rating, special_features. “rating” should be a drop down box with only the following values: G, PG, PG-13, R, NC-17.  “special features” should be a drop down box with only the following values: Trailers, Commentaries, Deleted Scenes, Behind the Scenes.  You do not need to do error checking on the input (i.e. verify that cost is a number), but be aware that if you don’t enter the correct data type your query may fail.  So use good data for testing.  You will need two buttons on this page, save and cancel.  The save button will need to insert the film information into the database as described below (by linking to a file titled add_film.php), display a message stating whether the query was successful or not, and display button to return to the manager.html page.  The cancel button will simply need to return to the manager.html page.
## Task 3
- Create the add_film.php file. Here is a sample query that does the work for you: INSERT INTO sakila.film (title,description,release_year,language_id,rental_duration,rental_rate,length,replacement_cost,rating,special_features) VALUES ('1st Grade FBI Agent','An undercover FBI agent must pretend to be a 1st grade teacher to catch the bad guy',2014,2,5,4.99,123,20.99,'PG-13','trailers');
- You will need to use the query above as a guide to use inputs from the $_POST array to insert into the database. Your add_film.php  page should display success if the film was added, or an error message if the insertion failed.  You should also have a button linking back to the manager.html page.
## Reference Material
Code examples that demonstrate prepared SQL statements.

https://websitebeaver.com/prepared-statements-in-php-mysqli-to-prevent-sql-injectionLinks to an external site.

You must use SQL Prepared Statements to submit your SQL queries. 

 

Submission:

All html and php codes
One page PDF tell the grader how you team members make the contribution for the team, and something you do good or bad
A YouTube video demos the correctness and completeness for the project.
sample output:

![image](https://github.com/morrowchristian/Homework_7/assets/89509020/0b465041-e20f-4f67-8381-9b30196dd643)

