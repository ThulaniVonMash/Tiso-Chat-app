# Tiso-Chat-app
Simple Chat application with Google Athentication


Set up Instructions:

One: Database -
Import the MYSQL database called : tiso-db.sql This database contains Two tables: users and message

In the file Tiso/tchat/databaseconn/conn.php is the file where the database connection settings are. By default the databse is set to root with no password

Two: Server- Upload the files onto your local server
Make sure the link looks something like this: http://localhost/Tiso/tchat/chat2/chat.php DO NOT ADD A PORT NUMBER ect. This is because GoolgeAuth is set to expects this as the first page.

Three: On your browswer, navigate to: http://localhost/Tiso/tchat/chat2/chat.php

Four: Register a new user by clicking on Register or login using a Google account
Log in with your new cretentails
Write the first comment.

Five: Naivigate to http://localhost/Tiso/tchat/chat2/chat.php on a different browser and login as a diffent person.
Acknoledgement to Javed Ur Rehman as chat is based on his code
