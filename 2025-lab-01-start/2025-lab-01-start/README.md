# Lab 01: PHP Fundamentals & Basic Input

This Lab is worth 10% of your overall grade.

Please see Moodle for submission details and the final due date.

---

## Final Grade Calulator

Your task is to create a final grade calculator for any course your user may be taking. The following points outline the requirements and proceedural flow for the program.

1. When the user loads the page, they should be greeted with a message that explains what the calculator does. 

2. They should then be prompted to enter the number of assignments they've completed so far.

    _Hint: Because this is a separate form, try using a different method than the second form (ex. GET vs. POST)._

3. After submititng this form, a second form should be generated. In it, the user will fill out the grade they received and the overall weight for each assignment. 

    _Hint: If you use GET and then POST, make sure not to lose your query string. You can ensure this by making sure that the `action` attribute in your form includes the query string at the end._

    ```PHP
        <form method="POST" action="index.php?num-assignments=<?php echo $num_assignments; ?>">
    ```

    _Another way you can make sure that you do not lose the data you need from the first form is by using a hidden input that retains the value you need._

    ```PHP
        <input type="hidden" id="keep-num-assignments" name="keep-num-assignments" value="<?php echo $_POST['num-assignments']; ?>" />
    ```

4. The user will then have the option to input their desired final grade. If the sum of the weight of the completed assignments is less than 100%, you must calculate what average they need to achieve in their final assessments to get their desired final grade.

    _Note: Because this is optional, if the user leaves this empty, do not calculate the average they need to achieve in order earn their desired final grade._

5. When the user submits the second form, print out their results in a user-friendly string. It should be displayed in a way that makes sense in the context of a complete sentence, not as raw number outputs.

    - The first line should be their overall current average in the course.

    - The second line, which is optional, should be what overall grade they need to achieve in their final assessments in order to earn their desired grade.

### Back-end Requirements

You must use proper PHP naming conventions for all of your variable names.

So long as the user is on the same page as the form, the values they entered should be retained by each input field.

_Hint: Try storing their input as a variable and, if it's set, echo it out into the `value` attribute._

You may choose to write this program in a single file and page; alternatively, you may have a processing and / or results page. If you choose to have a results page, make sure that the user is able to return to the index in order to start again.

You must use basic error checking. For example, if the user is entering a percentage, it should be a value between 0 - 100. 

### Front-end Requirements

This application must be presented in an aesthetically-pleasing and user-friendly manner. The final website must be responsive and render properly on mobile devices as well as larger screens.

You may use a front-end framework such as Bootstrap, Tailwind, or Holiday instead of writing custom CSS.

You must meet basic HTML requirements, such as having a document title and `<meta>` charset and viewport tags in the `<head>`.

---

## Formula for Current Course Average

Because each assessment the user has may be weighted differently, remember that you must calculate a _weighted average_, not a simple average.

The weighted grade is equal to the sum of the product of the weights (w) in percent (%) times the grade (g):

```PHP
    $WG = ($w1 * $g1) + ($w2 * $g2) + ($w3 * $g3) + ...
```

Where:

    WG = Weighted Grade
    w1 = Weight of First Assignment (in decimal form)
    g1 = Grade Earned on First Assignment
    
    etc.

_Hint: This can be calculated in a loop where the product is added to a running total._

---

## Formula for Desired Grades

```PHP
    // Note: These variables must be properly named as per proper PHP naming conventions. 
    $F = ($G - ((1 - $w) * $C)) / $w;
```

LaTeX Rendering (view in preview panel): 

$$\displaystyle F = \frac{ G - ((1 - w) \cdot C) }{w}$$

Where:

    F = Required grade in the user's remaining assessments
    G = Grade the user wants for the class (out of 100)
    w = Weight of the remaining assessments (in decimal form, not percentage form)
    C = The user's current grade (out of 100)

---

## Input / Output Tests

Use the following test cases to check the accuracy of your calculator. When marking, your instructor will use similar test cases.

### Test Case 1

This student wants to get 80% or higher in their course.

#### Input

```
    Number of Assignments Completed: 3

    Assignment 1 Grade: 50
    Assignment 1 Weight: 25

    Assignment 2 Grade: 65
    Assignment 2 Weight: 25

    Assignment 3 Grade: 70
    Assignment 3 Weight: 25

    Desired Final Grade: 80
```

#### Output

```
    Current Class Average: 61.67%

    Required Grade on Remaining Assessments: 135%
```

Because the required grade is higher than 100%, this means that it's mathematically impossible for the user to finish the course with a final grade of 80%.

### Test Case 2

This student only wants to pass the course (i.e. get 50%).

#### Input

```
    Number of Assignments Completed: 4

    Assignment 1 Grade: 45
    Assignment 1 Weight: 10

    Assignment 2 Grade: 78
    Assignment 2 Weight: 15

    Assignment 3 Grade: 60
    Assignment 3 Weight: 20

    Assignment 4 Grade: 64
    Assignment 4 Weight: 15

    Desired Final Grade: 50
```

#### Output

```
    Current Class Average: 63.00%

    Required Grade on Remaining Assessments: 30.50%
```

This student has 40% remaining. This means that they must hand something in and get at least an average of 30.5% in order to pass.