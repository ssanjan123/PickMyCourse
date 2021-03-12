This is the README file for our CMPT 276 project, called Pick My Course. Pick My Course helps Simon Fraser University students to select their upcoming schedules based on course diffculty, professor rating, and course load. The aim of our project is to help SFU students be more efficient in their course selection, while also reducing the time spent waiting for an academic advising appointment. 

*** UPDATES FOR ITERATION 2: ***

*** Please Note: Our Demo Video for Iteration 2 can be found in resources_text_files branch and in the docs folder located in master. ***

We have deployed Pick My Course on Heroku. Here is the link: https://pickmycourse-theapp.herokuapp.com

The CPGA calculator page has been implemented and is accessible from the welcome page after logging in. 

The profile page has been implemented and is also accessible from the welcome page after logging in. Here you can view all of your personal information. The profile customization page is accessible from here by clicking on the edit button. This is where you can change your information. 






*** Iteration 1 ***

*** Please Note: Our Demo Video for Iteration 1 can be found in resources_text_files branch and in the docs folder located in master. ***

To test our code: 

When creating your database using phpmyadmin, please call it LoginSystem. This way it will work with our configuration.php file.

Inside the database: 
1. Create a table called users. 
2. These are the columns we used for the table. Please name your columns the same. Column names are as follow:     username     id     email     password     major     create_datetime. 


Running Login In and Create Account:

Once a localhost is set up on your computer follow these steps:

1. Open login.html
2. 
    a) If you already have an existing account, please use your login credentials. Please press the "login" button.
    b) If there is not login password, create your account by clicking the "Create New Account" button. Enter the information requested, and click "Create An Account". This will redirect you to the login page. Please enter your login credentials, and press the "login" button.
        Please note: at this point in time, you are able to make 2 different profiles with 1 email. This issue will be looked after in iteration 2.
3. You are now at the welcome page. This will be your homepage for when we implement future features. 




Running Forgot Password:

Once a localhost is set up on your computer follow these steps:

1. Open login.html 
2. Please click the "Forgot Password?" button.
3. Please type in the email associated with your account. 
    a) If there no account associated with the email, an error message will appear saying "fail email".
    b) If there is an account associated with the email, a link will be sent to the email account, and a message will appear saying "success,check your email". 
4. Please check your email. The email will be from p3cncm@gmail.com. It will tell you to "Please click here to login." When clicking "here" it will send you to the login page. The email will also show your username and the changed password. You can use the username and the password in the email to login successfully. 
5. You will now arrive at the welcome page. This will be your homepage for when we implement future features.







