# Projet Mon Blog

## CONTEXT

This is my first project using PHP.
This project is about building a personnal blog where users are able to create an account, login and comment posts. The app implements an administration interface where the admin is able to validate/delete users comments before they are published. Users are also able to contact the admin via a contact form, the message and infomrations are sent by email to the admin.
I built this entire app using PHP aswell as Twig for the template rendering. I also used a bootstrap template for the design.

## INSTALLATION

To install the dependencies of the project run the following command : `composer install`.

### Environment variables

Create a .env file in the public directory in order to create the following environment variable needed to run the app:
    DB_PASSWORD which is the password of the database.

### Database 

Import the monblog.sql dump in a local database so the app runs correctly.

### Virtual Host

For the routing system to work properly, setup a virtual host that has the following configuration :

    DocumentRoot "[Insert here the path of the public directory]"
    ServerName monblog.ha
    DirectoryIndex index.php
    <Directory "[Insert here the path of the public directory]">
        AllowOverride All
        Order Allow,Deny
        Allow from All
    </Directory> 

From here you can visit the site on "monblog.ha".

