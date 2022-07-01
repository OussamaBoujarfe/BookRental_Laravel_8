please run first these commands:
composer update (install first the composer!!)
php artisan migrate
php artisan storage:link
php artisan db:seed
npm install
php artisan serve

Task is to implement a very simple online book rental system (BRS).

There are functions which are open for anonymous users. They can

search for books by author or title,
list books by genre,
view the data sheet of a selected book.
There are two types of users in this BRS: readers and librarians. A registered and authenticated (logged in) reader can

borrow a book,
view his/her active book rentals, and
view the details of a selected book rental.
A librarian can

add, edit or delete a book,
add, edit or delete a genre,
list book rentals,
view the details of a book rental,
change some status on a book rental, like status, deadline, note.


<Oussama Boujarfe>
<HTERUJ>
This solution was submitted and prepared by student named above for the home assignment of the Web engineering course.
I declare that this solution is my own work.
I have not copied or used third party solutions.
I have not passed my solution to my classmates, neither  made it public.
Students’ regulation of Eötvös Loránd University (ELTE Regulations Vol. II. 74/C. § ) states that as long as a student presents another student’s work - or at least the significant part of it - as his/her own performance, it will count as a disciplinary fault. The most serious consequence of a disciplinary fault can be dismissal of the student from the University.
