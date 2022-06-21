Setup procedure:

1. Download and install xampp from the following link (It is an extremely simple to use pocket server with mysql. I recommend you install it at default location): https://www.apachefriends.org/

2. Run Xampp Control Panel and click start buttons right of the "Apache" and "MySql"

Now to setup the website: 
3. Open file explorer and navigate to the htdocs folder, full path: C:\xampp\htdocs\

4. In this folder create a new folder and name it something. (I recomend it's the name of the app with no space bars or special characters ex: SIS3_PHP )

5. In this new folder with the path that should look like this: C:\xampp\htdocs\SIS3_PHP , clone this git repository.

Now for the database: 
6. Open the xampp control panel again and copy the port that is in the same line as Apache. (Usually 80)

7. Open a browser and type localhost:80 (Replace 80 with yours if it is different)

8. Xampp dashboard will open. Navigete to phpMyAdmin on the top right.

9. Now on the left most side click the little "New" text with a plus sign in front of a database icon on the left of it.

10. Name it "sis3_php" (Very imporatant as our website will connect to this exact db using the name)

11. Click on the new databse, then click on the "Import" button at the top side nav bar, then click "Browse...".

12. Open the "sis3_php.sql" file in the git repository. (path: C:\xampp\htdocs\SIS3_PHP)

13. Click Go button on the right most side of the page.

Display: 
14. Finally to see the website open "localhost:80/SIS3_PHP" in a browser. (Here mind the name of your folder in the htdocs folder and the port from xampp control panel.)

15. Now open your git repository folder with some editor and you are all set. Happy hacking!
