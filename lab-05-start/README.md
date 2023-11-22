# Lab 05: Comic Book Database

For this lab, you have been given the SQL required to create and populate a table of over 100 different comic book titles. Your task is to create an application that lets the user search, sort, and filter through this data in a user-friendly and intuitive way. 


## Header & Footer

You have been provided with the code for the header and the footer. You will need to include these in each page for your website. 


### Browse By

The header has a list of links to pages where the user may choose to 'browse by ...' a particular category. You will choose at least two (2) of these categories, based upon a column in the table or another metric that makes sense within the context of the provided data. These categories may include:

- browse by writer
- browse by artist
- browse by publisher
- browse by decade
- browse by genre
- browse by character

... and others.

When the user clicks on one of these 'browse by' links, they will be brought to a page with a list of clickable options. Depending upon which option the user chooses, they will then see all of the results for records that match their choice. 

For example, if you have a 'browse by decade' page, the user will be presented with buttons for:

[ 1970s ]  [ 1980s ]  [ 1990s ]  [ 2000s ]  [ 2010s ]

If the user chooses [ 1980s ], then they will be given even title that was published between 1980 and 1989 (i.e. the $year and $year + 9).


### Quick Search

If you choose to complete the quick search challenge (see details below), this search field will also be in the header.


## Paginated List of Records

The index displays all of the available comic book records from the database in a paginated format. Each page will show a specific number of records, and navigation buttons allow the user to move between pages. 

Note: You may choose how many records to display per page, but you _must_ have multiple pages.

The records are presented in a table format, with columns for the title, writer, artist, and a link to the Single Record Page. Clicking on the generated link will direct the user to the Single Record Page for more detailed information about the selected comic.


## Single Record Page

The Single Record Page shows all of the details for an individual comic book. This includes the comic's title, writer, artist, synopsis, genre, publisher, year, and characters. The page also features an option to go back to the index to continue browsing.

If there is no query string or the value is invalid, the user will be given an error message and the option to go back to the index.


## Advanced Search Page

The Advanced Search Page provides users with more refined search options. Users can search for comic books based on multiple criteria, including title, writer, artist, genre, publisher, and year. The Advanced Search Page includes form fields where users can input their search preferences. Additionally, the page offers options to sort the results based on title or year, either in ascending or descending order.


## Search Results Page



---

## Challenges

In addition to the pages and features abive, you will also include at least two (2) of the following challenge features. These challenges are features that we did not explicitly code together in class; however, they still use the same searching, sorting, and filtering concepts that we've covered together. 


### Challenge: Quick Search

In addition to the advanced search page, this challenge feature will allow users to search for a comic using a single keyword. This keyword could be in any column in the table. 

When the user submits (or presses return or enter, in the case of a search input), they will be brought to a results page where all of the records matching their keyword will be displayed in a table. 

Hint: Try building a SQL statement with multiple `OR` clauses (one for each column). 


### Challenge: Randomised Featured Record

This challenge will have you develop a widget for the index page that showcases a randomly selected comic book from the database. Each time a user visits the site or refreshes the page, a different comic book will be featured. 

For this, you will need to use the `rand()` or 'random' function in conjuntion with the table's primary key (the `id` column).

The `rand()` function accepts a minimum value and a maximum value in its parameters. For example:

```PHP
    // Example: Generate a random integer between 1 and 10
    // $var = rand($min, $max);
    $random_number = rand(1, 10);
```

Here, the minimum value is 1 and maximum value is 10.

If you are to apply this to a random title feature, you would need the lowest primary key in your table (1), and the highest key in your table (i.e. the total number of records you have). Then, you would take whatever number the `rand()` function chooses and select that primary key from your table to display in a widget. 

Hint: You already count the total number of records in your table in your pagination algorithm. Why not pass the variable storing that total `COUNT(*)` into the `rand()` function?


### Challenge: Sort by Table Heading

In this challenge, you will allow the user to sort the table on the index page by clicking one of the column headings (i.e. title, writer, or artist). When this happens, the data will be sorted by that specific column (ex. `ORDER BY writer ASC`). 

To do this, try converting the table headings into links with a query string. If that query string exists, sort the table by that column; otherwise, by default, sort the table by the title. 

Note: Keep in mind that, even after sorting, all of the results must still be paginated!

---

## tl;dr

You will need the following pages:

- header (provided)
- footer (provided)
- browse by [x]
- browse by [y]
- index
- advanced search
- search results
- single record