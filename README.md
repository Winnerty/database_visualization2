# S2 project by Timofey Karpeev

Here are the steps you should do to be able to run and test my project.
1. Download XAMPP (https://www.apachefriends.org/download.html)
2. Run Apache and MySQL in the XAMPP
3. Go to `localhost/phpmyadmin` and create a new DB
4. Run all of the 12 scripts from `doc/buildUpQueries` on this DB in the right order (from `run1.sql` to `run12.sql`)
5. Place the project folder in `xampp/htdocs` folder, for XAMPP to see the project
6. In your browser go to `localhost/"your_folder_name"/index.php` 
7. Login is `admin`, password `epita2024`

P.S. When adding a new course, you have to enter teacher's EPITA email that already exists in the DB. Otherwise it will not work
