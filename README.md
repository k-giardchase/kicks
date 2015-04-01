###Developers
Kyle Giard-Chase

###Date
March 27, 2015

###Description
An app for shoe stores to list the brands of shoes that they sell and for customers to look up the brands of shoes that stores sell.

You will need to create a database called shoes to use this app.
    In shoes,
    CREATE TABLE stores (id serial PRIMARY KEY, name varchar);
    CREATE TABLE brands (id serial PRIMARY KEY, brand_name varchar);
    CREATE TABLE brands_stores (id serial PRIMARY KEY, store_id int, brand_id int);

To run the tests:
    CREATE DATABASE shoes_test WITH TEMPLATE shoes;

It uses Composer to install:
<a href="https://phpunit.de/" target="_blank">PHPUnit</a>, <a href="http://silex.sensiolabs.org/" target="_blank">Silex</a>, and <a href="http://twig.sensiolabs.org/" target="_blank">Twig</a>.  It also links to a <a href="http://www.bootstrapcdn.com/" target="_blank">Bootstrap</a> CDN for CSS Styling.

To view the app, start the php server in the web folder and then navigate to your root path.

###Copyright (c) 2015 Kyle Giard-Chase

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
