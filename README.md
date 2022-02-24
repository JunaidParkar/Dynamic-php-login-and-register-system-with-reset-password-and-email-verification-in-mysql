Folders and its contents:

1. assets
    All the images and all used in projects

2. css
    contains all css files used in this project

3. database_update
    containes all the files that will verify gmail, reset password, etc (all functions used to update database data)

4. dp
    contains the profice picture of every user

5. js
    contains all the javaScript files used in this project

6. php
    containes all important php files




Files and its working:

1. chatui.html
    contains the platform ui where user will chat

2. index.php
    contains the signup and signin form

3. register_mail_conf.html
    age which will show user to check gmail inbox for verification

4. reset_password.html
    page whick will ask username to enter their registered email to reset password

5. verify_mail.php
    page that will update the status of user to activated (means user has verified his/her gmail account and now ready to chat)

6. reset_password.php
    page that will reset the password

7. config.php
    which creates connection of database from this project




Mail:

1. mail.php can be used to sent mail

2. https://jp1234ja.000webhostapp.com/?regid=[unique registration id from database]&stats=deactivated&msg=[message you want to show in mail (must include anchor with link of page in it) example: "<html><head></head><body><p><h1>hello </h1><a href='[page where you want to redirect after clicking on anchor in mail]?regid=[Registration id of user]'>click here</a></p></body></html>;]&link=[page link that will be be shown to check gmail inbox]&to=[gmail account of username]&sub=[subject of mail]

3. All the info written in "[]" should be followed properly

4. Initially you can't sent mail unless and untill you host mail.php to a hosting which provides php mail function eg: 000webhost by hostinger




MYSQL:

1. It contains 8 columns i.e  ['id' , 'registration_id' , 'uid' , 'username' , 'password' , 'email' , 'dp' , 'status']

2. Default values:
        a. id [set to auto increment]
        b. dp [path of any default profile pic]
        c. status [det value to deactivated y default]

3. Name of table used 'users'

4. Initially changing registration id function in not working but will fix in later update



PASSWORDS: 

1. Password are stored by the secured hasing method

2. BCRYPT method of hashing is used by us