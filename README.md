##Developer
Kyle Giard-Chase

##Date
March 27 2015

##Description
An app for shoe stores to list the brands of shoes that they sell and for customers to look up the brands of shoes that stores sell.


##Technologies Used
PHP <br>
<a href='http://www.postgresql.org/'>PostgreSQL</a> <br>
<a href='https://developers.google.com/speed/libraries/'>jQuery</a> <br>
<a href='http://getbootstrap.com/'>Bootstrap </a>for styling <br>
It uses <a href='https://getcomposer.org/'>Composer</a> to install:
<li>
<a href='http://silex.sensiolabs.org/'>Silex</a>
</li>
<li><a href='http://twig.sensiolabs.org/'>Twig</a></li>
<li><a href='https://phpunit.de/'>PHPUnit</a></li>

##Use and Editing
To view the app,<br>
1. Open your command shell, and clone the repository into your home folder using the command `git clone https://github.com/k-giardchase/kicks.git`<br>
2. Import the database into PostgreSQL. See the Database section to do so.<br>
3. In the top level of the project folder, run `composer install`<br>
4. Start a php server by changing directories into the web folder `cd web`
and start your server `php -S localhost:8000`<br>
5. Open your browser and navigate to your root path: `localhost:8000`

##DATABASE
1. Create a new database `CREATE DATABASE shoes;`<br>
2. Connect to the database `\c shoes;`<br>
3. In your command shell, and in the top level of your home directory, import the database `\i shoes.sql`<br>
4. If you would like to edit the app and make use of the test database, `CREATE DATABASE shoes_test WITH TEMPLATE shoes`<br>
5. NOTE: If the database fails to import (see above), you may manually create it using the following commands:<br>
```sql
CREATE DATABASE shoes;
 \c shoes
CREATE TABLE stores (id serial PRIMARY KEY, name varchar);
CREATE TABLE brands (id serial PRIMARY KEY, brand_name varchar);
CREATE TABLE brands_stores (id serial PRIMARY KEY, brand_id int, store_id int);
CREATE DATABASE shoes_test WITH TEMPLATE shoes;
```

##Copyright (c) 2015 Kyle Giard-Chase
Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
