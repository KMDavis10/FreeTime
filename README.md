# FreeTime
Repository for the Free Time Calculator project.

1. Setting up the environment for the project:
  You'll need a local host software in order to view the Calculator.
  https://www.apachefriends.org/index.html 
  After installing the software, you'll need to paste the files into the "htdocs" folder in whatever directory you saved xampp in. 
  You'll need to type "http://localhost/Test2.php" in order to get it started.
  
2. https://github.com/KMDavis10/FreeTime 

3. The program works as follows:
  Calculating Free Time: 
  - Enter in the name of each professor whose class you want to know about, the course prefix, the course level, and whether
    or not the course counts as major credit. 
    - The default number of classes is 4; you can leave classes blank if you have less than that. At present, there is no
      way to add more classes than 4.
  - Enter in the total hours that you spend doing other activities (work, sports, & clubs)
    - if you do not have one or any of the above activities, they can be left blank or you can hit "no" for the text box to
      disappear.
  - Click "calculate" and you will see the results.
    - they are listed with the difficulty level shown for each class
      - if a professor was left blank/does not exist in the database, the user will be alerted and it will calculate without
        the professor's difficulty information
      - if a course prefix is left blank, then the user will be alerted that it will be calculated as an unknown course without
        the course's difficulty information
  - From the results page, the user can:
    - Go back to the homepage
    - Indicate that they wish to add a professor to the database
Entering a professor into the database:
  - From the results page, the user clicks "Add a professor?"
  - From there, the user enters in the professor's name, their helpfulness, clarity and easiness levels (out of 5) and hits 
    submit. None of these fields can be left blank.
  - A message will show up indicating that the professor was successfully added to the database, and from there, the user
    can go back to the homepage.
    

FUTURE PLANS:
 - Web scraper to get the professor names & their difficulty levels, rather than reading from a text file
 - Put up on server so it does not need to be used in a local host environment
