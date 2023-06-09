# PHP Backend Framework

This is a PHP application that connects to a MySQL database and provides functionality for managing users, posts, and comments.

## App.js

This file serves as the entry point for the React application and is responsible for rendering the entire user interface. It is exported as the default component of the file.

## index.js

The index.js file serves as the entry point for the React application. It imports the necessary components and renders them to the DOM using ReactDOM.render().

## Components

The components folder contains React components that are used to build the user interface of the application. Each component is responsible for rendering a specific part of the UI.

## Installation

To install this application, you will need to have PHP and MySQL installed on your system. You will also need to create a new database and update the configuration file with your database credentials.

1. Clone this repository to your local machine using the command git clone https://github.com/NicholasStambaugh/PHP-MySQL-Backend.git.
2. Create a new MySQL database for the application using a tool like phpMyAdmin or the MySQL command line interface. You can use the following command to create a new database:

```
CREATE DATABASE dbname;
```
Replace dbname with the name of your database.

3. Update the config.php file in the root directory of the application with your database credentials. You will need to update the following lines:

```
define('DB_HOST', 'localhost');
define('DB_NAME', 'dbname');
define('DB_USER', 'dbuser');
define('DB_PASS', 'dbpass');
```
Replace dbname with the name of your database, dbuser with your MySQL username, and dbpass with your MySQL password.

4. Run the following command to create the necessary database tables:

```
php database.php
```
5. You should now be able to run the application by navigating to the index.php file in your web browser.

## Usage

Once the application is set up and running, you can use it to manage users, posts, and comments. Here are some examples of how to use the application:

### Creating a new user

To create a new user, navigate to the "Create User" page and fill out the form with the user's information.

### Creating a new post

To create a new post, navigate to the "Create Post" page and fill out the form with the post's information.

### Creating a new comment

To create a new comment, navigate to the "Create Comment" page and fill out the form with the comment's information.

### Viewing existing data

You can view existing users, posts, and comments by navigating to the corresponding pages in the application.

### Updating existing data

To update an existing user, post, or comment, navigate to the corresponding page and click the "Edit" button. You can then update the information and save your changes.

### Deleting existing data

To delete an existing user, post, or comment, navigate to the corresponding page and click the "Delete" button. You will be prompted to confirm the deletion before it is completed.
