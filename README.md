# DATS2410/ITPE2410 Networking and Cloud computing
Semester assignment in Networking and Cloud computing (DATS2410) - spring 2018 at OsloMet.

Created by Axel Bjørnstad, Cecilie Thoresen, Fikret Kadiric & Henry Tran

### Features
 * Register students
 * Edit students
 * Delete students
 * Count total students
 * Create course

### Installation on Ubuntu 16.04

 **Step 1:** 
 In order to display web pages, we are going to employ Nginx. 
 ```
   $ sudo apt-get update
   $ sudo apt-get install nginx
 ```

 **Step 2:** 
Install MySQL to Manage Site Data 
 ```
   $ sudo apt-get install mysql-server
 ```
The MySQL database software is now installed, but its configuration is not exactly complete yet.

To secure the installation, we can run a simple security script that will ask whether we want to modify some insecure defaults. Begin the script by typing:

 ```
   $ mysql_secure_installation
 ```
 You will be asked to enter the password you set for the MySQL root account. You can set this password to be 'possible river winter'. (This is the password used for making a connection from php to database. You can also specify your own password, but then you will need to change the password in database.php to the same as db.)
 
 **Step 3: Install PHP for Processing**
 We have now installed Nginx and MySQL. Since Nginx does not contain native PHP processing like some other web servers, we will need to install php-fpm, which stands for "fastCGI process manager". 
 
 ```
   $ sudo apt-get install php-fpm php-mysql
 ```
 
 **Step 4: Configure Nginx to Use the PHP Processor**
 
 We have all of the required components installed. The only configuration we still need is to tell Nginx to use our PHP processor for dynamic content. 
 
 Open the default Nginx server block config file by typing
 
 ```
   $ sudo nano /etc/nginx/sites-available/default
 ```
 
Find the following line:
```
   index index.html index.htm index.nginx-debian.html;
```
Replace it with (adding index.php):

```
   index index.php index.html index.htm index.nginx-debian.html;
```
The order of index.php, index.html, index.htm, and index.nginx-debian.html determines which one takes precedence and is loaded first by Nginx.

Find the following lines:

```
# pass the PHP scripts to FastCGI server listening on 127.0.0.1:9000
#
#location ~ \.php$ {
#       include snippets/fastcgi-php.conf;
#
#       # With php7.0-cgi alone:
#       fastcgi_pass 127.0.0.1:9000;
#       # With php7.0-fpm:
#       fastcgi_pass unix:/run/php/php7.0-fpm.sock;
#}
```

Uncomment and comment them as follows or just replace the lines above with the lines below:

```
# pass the PHP scripts to FastCGI server listening on 127.0.0.1:9000
#
location ~ \.php$ {
       include snippets/fastcgi-php.conf;

       # With php7.0-cgi alone:
       #fastcgi_pass 127.0.0.1:9000;
       # With php7.0-fpm:
       fastcgi_pass unix:/run/php/php7.0-fpm.sock;
}
```

Now restart php7.0-fpm and nginx:

```
systemctl restart php7.0-fpm
systemctl restart nginx
```

### Live demo at http://dats.vlab.cs.hioa.no:8002/


### Code License
```
    MIT License

    Copyright (c) 2018 Axel Bjørnstad, Cecilie Thoresen, Fikret Kadiric & Henry Tran

    Permission is hereby granted, free of charge, to any person obtaining a copy
    of this software and associated documentation files (the "Software"), to deal
    in the Software without restriction, including without limitation the rights
    to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
    copies of the Software, and to permit persons to whom the Software is
    furnished to do so, subject to the following conditions:

    The above copyright notice and this permission notice shall be included in all
    copies or substantial portions of the Software.

    THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
    IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
    FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
    AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
    LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
    OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
    SOFTWARE.
```
