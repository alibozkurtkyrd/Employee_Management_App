# Employee_Management_App
It's a php web development app 

---
These system divided into ***3*** modules;


1. Admin Module
   - Admin can add,edit and delete the employee.

2. Applicant Module
    - we send *“job applicant form”* to job candidate. After the candidate fills in and submits the form, the completed form is sent to the applicant by **e-mail**.
These forms are uploaded to the system and the candidate evaluation process begins. Employees can comment on the candidate and vote whether to be hired or not.

3. Leave Module

    -  Employees can request *“daily”* or *"more than one day"* leave. These leave requests can **only** be evaluated by admin



## Features
 - Login and logout
 - Manage employees (Add, edit and delete).
 - Sending email to specific job applicant
 - Make reports (export to Excel and PDF).
 - Search
 - Pagination            

## Used tools
 
 - PHP - communication and operations with Employees SQL database
 - MySQL - database manipulation
 - jQuery -  visual aspects
 - Bootstrap - styles framework
 - git - project version controller
 - VS Code - code editor 
     
## Plugins/Packages
 - Adminlte
 - PHPMailer
 - Ajax
 - JS Sweet Alert
 - JS Bootbox.js 
 - Jquery DataTables 
 - JQuery bootstrap-switch.min.js
 - JQuery DatePicker

## Running this web application
  
 - make sure you already have xampp or wamp installed if you are on windows machine, mamp for mac , and lamp for linux.
clone this repository to your local machine or just download the zip.

 - rename “.env.example” to “.env” and add your database and mail driver credentials.

     ***NOTE***: The "EMAILPASSWORD" variable in the ".env.example" file is not the password for your gmail account. You need to get a password to send
          mail. One of the option  to get the password from your gmail account is use “2 step verification”. For more information  watch videos below;
           
         - [vidoe1](https://youtu.be/9tD8lA9foxw).
         - [vidoe2](https://youtu.be/Mj6Du3X5fXQ).

## Admin Credentials
   - *Email:* baris@manco.com
   - *Password:* baris

