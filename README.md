# Title: CRUD Becode Class
Creating a CRUD system to store student, teacher and class information in the database and requesting this information in a nice designed system.

- Repository: `crud_class`
- Demo: http://class.yarrut.com/
- Language: HTML, CSS, PHP, SQL, TAILWIND


## PURPOSE
Learn to make, request and write to a database while creating a fictive APP for the student, teachers and classes of becode.

## FUNCTIONALITIES
- MVC pattern
- Three pages, student, teacher and classes. Each of them has an overview,  create and a detailed information page.
- Able to update and delete a student, teacher or class.
- Able to delete a student, teacher or class also from the overview page as well as the detailed page.  
- A Teacher can't be deleted while connected to a class.
- A Class can't be deleted when assigned to a teacher or student.
- All three pages on the detail page has clickable links.
- All must-have requirements have met
- Error handling, by catching null SQL returns.

## THE PROJECT ITSELF
Day 1:
- Created the MVP pattern.
- Created the controller and model for student.
- requested all the students info and displayed it to the html view.
- Made it able to creat new students.
- working on making the students updateable.
- Discovered tailwind css and tried to style everything with tailwind.

Day 2:
- Created functionality to update and delete a student.
- rewrote a bunch of code to made it more fitting in the MVP pattern after talked to sicco.
- styled the students pages more before using this one as template for the other pages.
- Tried to redirect a page back to the first page after deletion of a student, but couldn't get it to work right away. To be continued.
- Started with creating the other models and model controllers for teacher.

Day 3:
- Wasted more time trying to redirect to the first page after deletion of a student or the others. Could NOT get it working, I am really confused why not, I must be overlooking something.
    But for now I will postpone this function, as it is not required, but a nice to have from my part
- Created the other pages based on the students pages.
- created extra classes and SQL requests for the teachers pages.
- styled the app more with tailwind css, trying to get the @apply working, but no success.

Day 4:
- Finished the teacher pages and working on the class pages.
- creating more classes and SQL requests for the class page.
- styled the app more to perfection as I think it's also important (I'm pretty fast in doing this so no worries, did not waste much time on this)
- created all the links from the details paged to the other details pages.
- fixed errors

Day 5:
- Finishing the project
- Double check if everything works, if there are any errors
- Try to break the app
- update the readme and do a extensive reflection.


#REFLECTION
Note: The way I constructed my classes and SQL request (with a lot of joins) is not very flexible and not quite efficient in sense of scalability.
I discovered that when I deleted a class of teacher, my left join would not work anymore. In some cases when a teacher has a class, but has been deleted, this SQL request will return NULL.
In the teacher loader and how I set it up, my function is then trying to create an object from a class with these parameters that are NOT available. Of course, you could try to catch the error and write code to workaround, 
but you will end up writing more code and catching it on multiple places which is of course not aim.

Also I placed multiple classes and loaders in 1 file. (Tom actually recommended this, and me and Jonas believed him because he has more experience in this)
But it turns out (Talked to sicco and got feedback) that it's not good. 

So to summarise my big mistakes on this project:
- NOT separating class and loaders
- Creating too much classes and too much request in SQL
- The controllers have too much code.

Note to self to take to the next project:
- Create separated classes
- use the extend classes function
- move more functions from the controller to the loader and only call them in the controller. (this way you can call any function from any loader on any controller file, which makes it much more efficient.)
- merging the SQL request in php and use write function to filter and find the correct info.
-> this will make it more scalable and flexible for future addons. 
    

