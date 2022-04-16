# Project Todolist Test Php follows MVC
# TODO
TODO application lets you create, edit, delete your task list in calendar
# Description
Home work
![alt text](https://i.ibb.co/w02v14h/Screenshot-from-2022-04-15-14-52-12.png)
![alt text](https://i.ibb.co/qBw4XCR/Screenshot-from-2022-04-15-14-54-49.png)

Create work
![alt text](https://i.ibb.co/SvcnBK8/Screenshot-from-2022-04-15-14-53-34.png)

# Installing
Clone project
```
git clone https://github.com/nghia787312/todolist-mvc-php.git
```
Go to project folder
```
cd todolist-mvc-php
```
Run composer in cmd /terminal
```
composer install
```
Import file sql to mysql
```
folder/todo_list.sql
```
Config database
```
folder/database/config.php
```

# Deployment
Configuring a xampp web server for root directory
You can change Apaches httpd.conf by clicking (in xampp control panel) apache/conf/httpd.conf and adjust the entries for DocumentRoot and the corresponding Directory todolist-mvc-php

# Test
Run command ./vendor/bin/phpunit

# Built With
This application is build with PHP and Javascript. I use PHP OOP, MVC design, jQuery for Javascript, MySQL for database.
Calendar third-party library : https://fullcalendar.io/
