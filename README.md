# Pick My Course - CMPT 276 Project - 
# Unfortunately shutdown due to new Heroku policies :(

Welcome to the README file for our CMPT 276 project, Pick My Course. Our project aims to help Simon Fraser University students to select their upcoming schedules based on course difficulty, professor rating, and course load. The goal is to make course selection more efficient and reduce the time spent waiting for academic advising appointments.

## Updates for Iteration 2

**Please Note:** Our Demo Video for Iteration 2 can be found in the `resources_text_files` branch and in the `docs` folder located in the `master` branch.

We have deployed Pick My Course on Heroku. You can access the app at the following link: https://pickmycourse-theapp.herokuapp.com

- The CPGA calculator page has been implemented and is accessible from the welcome page after logging in.
- The profile page has been implemented and is also accessible from the welcome page after logging in. Here you can view all of your personal information. You can also access the profile customization page by clicking the "edit" button.

## Iteration 1

**Please Note:** Our Demo Video for Iteration 1 can be found in the `resources_text_files` branch and in the `docs` folder located in the `master` branch.

### Setting up the Database

When creating your database using phpmyadmin, please call it `LoginSystem`. This way it will work with our `configuration.php` file.

Inside the database, create a table called `users`. These are the columns we used for the table:

- `username`
- `id`
- `email`
- `password`
- `major`
- `create_datetime`

### Running Login and Create Account

1. Once a localhost is set up on your computer, open `login.html`.
2. If you already have an existing account, please use your login credentials and press the "login" button. 
3. If you do not have an account, create one by clicking the "Create New Account" button and enter the requested information. Click "Create An Account" to redirect to the login page. Please note: at this point in time, you are able to make 2 different profiles with 1 email. This issue will be addressed in iteration 2.
4. You are now at the welcome page, which will be your homepage for future features.

### Running Forgot Password

1. Once a localhost is set up on your computer, open `login.html`.
2. Click the "Forgot Password?" button.
3. Type in the email associated with your account. 
    - If there is no account associated with the email, an error message will appear saying "fail email". 
    - If there is an account associated with the email, a link will be sent to the email account, and a message will appear saying "success,check your email".
4. Check your email. The email will be from p3cncm@gmail.com. It will contain a link to login and your new username and password.
5. You will now arrive at the welcome page.

