# Lab 04

For this lab, you will create a simple CRUD application based upon the theme of 'Things To See & Do In Edmonton'. While this can include a wide variety of things like your favourite restaurants, various places to shop, museums, or annual festivals, **you must create a minimum of twenty (20) entries**.

## Application Requirements

### Basic Features

This application will have a home page that lists all of the available attractions currently in the database.

If the user is not logged in, they will not be able to access some of the more risky features (i.e. they will not be able to create, update, or delete any entries); however, they will be given the option to log in via a login form.

If the user is logged in, they will have full access to the application and all of its features. They will also have the option of logging out. Upon logging out, their $_SESSION will be destroyed and they will no longer have access to all of the application's features. 


### Home Page

The home page will list all of the available records in an easy-to-read, responsive, and user-friendly manner. For each record, you will need to print the values for each of your chosen columns (see Database Requirements for further details). 


#### Additional Challenge

When the user loads the home page, they will see a list of links for various attraction categories. When they click one of these links, a query string will be generated in the URL and they will see all of the records for that particular category. 

Note: Remember that all links, including query strings, cannot contain spaces. Therefore, you may need to use the `urlencode()` function to properly encode your category names into appropriate values, then `urldecode()` in order to convert the query string into appropriate names for user output.


### Administrative Area

While you do not need an explicit administrative area, users should only be able to access the add, edit, and delete pages when they are logged in. 


### Add Page

The add page will include a form with fields for each of the columns in the attractions table. Each field must be appropriate for the data type of each column. 

Additionally, the form must be validated and account for XSS attacks and SQL injections. 

Upon successful submission of the form, the new record will be inserted into the database and the user will be given a confirmation message stating that their record was added. 


### Edit Page

The user will be given a list of existing records in the database, including a button to edit each specific entry. 

Note: In order to make this user-friendly, only include a few things in this list or table, such as the name and category of the attraction. 

Upon clicking the edit link, the user is given a form, similar to the add page. This form will be prepopulated with all of the existing values in the database. The user will then be able to change the values and, upon successful validation and submission, the record will be updated. 


### Delete Page

The delete page will list of existing records in the database, including a button to delete each specific entry. 

Note: In order to make this user-friendly, only include a few things in this list or table, such as the name and category of the attraction. 

Before the deletion occurs, the user must be prompted for confirmation. 


#### Deletion Confirmation

You must prompt the user to confirm whether or not they mean to delete their chosen entry. You may choose to do this using various methods, including a pop-up modal, an alert, or as a separate confirmation page. 


## Database Requirements

Create the necessary 'username_attractions' DB table from the included init.sql file.



### Login Credentials

You may use a simple Secure Login script without the database necessary for this lab.

However, please add 2 variables (username/password) that allow for a common administrator to login. You can then accomodate either your login or the common admin one in your if/then logic. 

The username should be `admin` and the plain text password should be `Password1!`. Please note that if your instructor cannot access the add, edit, and delete functions of your application that you will not receive credit for it. 


### Attractions

For the attractions, you will name the table using your student name, followed by `_attractions`. For example, your table may be called `jsmith1_attractions`. 

For this table, you will need the following columns:

- primary key
- name of attraction
- category
- description

In addition to these four mandatory columns, you will need to include an additional **six** columns that capture different aspects of each attraction. For example, you might include:

- cost
- address
- official website (URL)
- your rating
- area of town
- family friendly
- season of availability 
- hours of operation
- other flags you may see on applications such as Google Maps (LGBTQ+ friendly, women-owned, etc.)

Each of these columns must have an appropriate data type and length. 


### Pepared Statements

Every time your application queries the database, it must do so using prepared statements. 

Note that even simple statements without values, such as `SELECT * FROM jsmith1_attractions` can still use prepared statements; however, since there are no `?` in the statement, you do not need to bind any parameters and can skip right to `->execute()`.