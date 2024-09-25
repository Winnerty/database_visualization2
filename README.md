# S2 project by Timofey Karpeev

Here are the steps you should do to be able to run and test my project.
1. Download XAMPP (https://www.apachefriends.org/download.html)
2. Run Apache and MySQL in the XAMPP
3. Go to `localhost/phpmyadmin` and create a DB (for example `s2project1`)
4. Run all of the 12 scripts from `doc/buildUpQueries` on this DB in the right order (from `run1.sql` to `run12.sql`)
5. Move the folder `S2project1_karpeev` from `src` folder and place it in `xampp/htdocs` folder, for XAMPP to see the project
6. In your browser go to `localhost/s2project1_karpeev/index.php` 
7. Login is `admin`, password `epita2024`
8. You are ready to start!

P.S. When adding a new course, you have to enter teacher's EPITA email that already exists in the DB. Otherwise it will not work
