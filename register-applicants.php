<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
include "config.php";
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;
 
 require 'phpmailer/src/Exception.php';
 require 'phpmailer/src/PHPMailer.php';
 require 'phpmailer/src/SMTP.php';


 require_once('vendor/autoload.php');

  $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
  $dotenv->load();



if(isset($_POST["submit"])){
  $mail = new PHPMailer(true);
  $mail->CharSet = 'UTF-8';
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = $_ENV['EMAILADRESS']; // Your gmail
  $mail->Password = $_ENV['EMAILPASSWORD']; // Your gmail app password
  $mail->SMTPSecure = 'ssl';
  $mail->Port = 465;

  $mail->setFrom($_ENV['EMAILADRESS']); // Your gmail

  $mail->addAddress($_POST["email"]);
  

  $mail->isHTML(true);

  $mail->Subject = "Jop Application";

  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $linkedin = $_POST['linkedin'];






  
    $bodyString =<<<HEREA
  
    <!doctype html>
    <html lang="tr">
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <title>Kctek - Qulak Kariyer - Job application form</title>
    
    
    
        <!-- Custom styles for this template -->
        <style>
              .box{
                transition: background-color 200ms cubic-bezier(0,0,0.2,1);
                background-color: #fff;
                border: 1px solid #dadce0;
                border-radius: 8px;
                margin-bottom: 12px;
                padding: 30px;
                page-break-inside: avoid;
                word-wrap: break-word;
                margin-top: 18px;
              }
              
              body{
                background-color: #ede7f6;
                margin: 0;
            
                font-size: 1rem;
                font-weight: 400;
                line-height: 1.5;
                color: #212529;
                text-align: left;
                background-color: rgb(237, 231, 231);
                padding: 6%;
              }

              table{
                table-layout:fixed;
                
                width: 100%;
                margin-bottom: 1rem;
                background-color: transparent;
              
              }
              
              thead::after::before {
                box-sizing: border-box;
              }
              
              .table td, .table th {
                padding: .75rem;
                vertical-align: top;
                border-top: 1px solid #dee2e6;
              }
            
            .row{
                display: flex;
                -ms-flex-wrap: wrap;
                flex-wrap: wrap;
                margin-right: -15px;
                margin-left: -15px;
                
            }
            
            .row:after {
                box-sizing: border-box;
            }
            
            .row::before{
                box-sizing: border-box;
            }
            
            
            
            .my-form{
            
                display: block;
                margin:auto;
            
              }
            
            .col{
              padding-right: 15px;
              padding-left: 15px;
              min-height: 1px;
              width:60vw;
              position: relative;
              max-width: 700px;
            }
            
            .form-control {
                margin-top: 12px;
                display: table;
                width: 93%;
                height: calc(2.25rem + 2px);
                padding: .375rem .75rem;
                font-size: 1rem; 
                line-height: 1.5;
                color: #495057;
                border: 1px solid #ced4da;
                border-radius: .25rem;
                transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
            }
            
            .form-control-file, .form-control-range {
                display: block;
                width: 100%;
                margin-top: 12px;
            }
            
            h1{
                text-align: center;
            }
            
            footer{
                text-align: center;
            }
    </style>
      </head>
    
      <body class="bg-light">
    
        <div class="container">
          <div class="py-5 text-center">
    
            <h1>Job Application Form</h1>
    
          </div>
    
          <div class="row">
    
            
            <div class="col my-form">
    
              <form action="main.php" method="post" enctype="multipart/form-data">
                <div class="box">
                  <div>
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control"  name="name" value="$name" readonly required>
                  </div>
                </div>
    
                  <div class="box">
                    <label for="address">Phone</label>
                    <input type="text" class="form-control" name="phone" value="$phone" readonly required>
                  </div>
    
                <div class="box">
                  <label for="email">Email<span class="text-muted"></span></label>
                  <input type="email" class="form-control" name="email" value="$email" readonly>
                </div>
    
    
                <div class="box">
                  <p>Choose your programming knowledge level<span style="color:red;">*</span></p>
    
                  <div class="container out">
    
                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col"></th>
                        <th scope="col">No Idea</th>
                        <th scope="col">I want to learn</th>
                        <th scope="col">I just used it in a simple projectm</th>
                        <th scope="col">I know and use it</th>
                        <th scope="col">I know very well</th>
                      </tr>
                    </thead>
                    <tbody>
    
    
                 
    
HEREA;

//this variables helps us while listing applicants in list.php
$modalHelper=<<<HEREA
              <div class="box">
              <p>Choose your programming knowledge level<span style="color:red;">*</span></p>

              <div class="container out">

              <table class="table table-bordered table-responsive">
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">No Idea</th>
                    <th scope="col">I want to learn</th>
                    <th scope="col">I just used it in a simple project</th>
                    <th scope="col">I know and use it</th>
                    <th scope="col">I know very well</th>
                  </tr>
                </thead>
                <tbody>

HEREA;
    
                 $progLan= array("Mysql", "Larevel", "Docker", "Html", "Bootstrap", "Swift", "Python", 
                           "MongoDB", "Github", "React", "C#", "Php", "Android", "Css", "VueJs"); 
                          
                  $optionArr = array("option1","option2","option3","option4", "option5");
    

    
                      foreach($progLan as $lan){
                        $var =  $_POST[$lan];

                                                        
                        $bodyString.= '<tr><th scope="row">'.$lan.'</th>';
                        $modalHelper.='<tr><th scope="row">'.$lan.'</th>';
                        //'<td><label class="target" ><input type="radio" name=$lan  checked="checked"></lablel></td>'
                        
                        
                        $part1 = '<td><label class="target" ><input type="radio" name='.$lan ;
                        $part2 ='></label></td>';
                        $check = 'value="option" checked="checked"';
                        $disabled='value="option" disabled';
                        foreach($optionArr as $option){
                          if ($option == $var)
                          {
                             $result = $part1.$check.$part2;
                             $bodyString .= $result;
                             $modalHelper.=$result;                             
                          }
                          else{
                            $result =$part1.$disabled.$part2;
                            $bodyString .= $result;
                            $modalHelper.=$result;
                          }
                        };

  
                      }
             
$modalHelper.=  "</tbody></table></div></div>";
            // Closing connection

$bodyString2 =<<<HEREA
                  </tbody>
                  </table>
                  </div>                     
                </div>
    
    
    
    
                <div class="mb-3 box">
                  <label for="address">LinkedIn Profile</label>
                  <input type="text" class="form-control" name="linkedin" value=$linkedin readonly required>
                </div>
    
              </form>
            </div>
          </div>
          
    
          <footer>
            <p class="mb-1">&copy; 2022-2023 Kctek</p>
          </footer>
    
    
     
    
      </body>
    </html>
   
    HEREA;
      // get the file

      if(isset($_FILES['cv'])){
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["cv"]["name"]);
        $file_ext = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            
        $errors= array();
        $file_name = $_FILES['cv']['name'];
        $file_size = $_FILES['cv']['size'];
        $file_tmp = $_FILES['cv']['tmp_name'];
        $file_type = $_FILES['cv']['type'];
        //$file_ext=strtolower(end(explode('.',$_FILES['cv']['name'])));
        
        $expensions= array("pdf","doc", "docx");
  
        $err_code = 0;
        
        if(in_array($file_ext,$expensions)=== false){
             $errors[]="Please choose correct extensions; pdf, doc,docx";
             $err_code = 1;
        }
        
        if($file_size > 2097152) {
              $errors[]='File can be at most 2 MB';
              $err_code = 2;
        }
        


        if(empty($errors)==true) {
            move_uploaded_file($file_tmp,"uploads/".$file_name); //The folder where you would like your file to be saved
  
            $mail->AddAttachment("uploads/".$file_name);



                $progLan= array("Mysql", "Larevel", "Docker", "Html", "Bootstrap", "Swift", "Python", 
                "MongoDB", "Github", "React", "C#", "Php", "Android", "Css", "VueJs"); 

                $optionArrKey = array("option1"=> "No Idea","option2"=> "I want to learn","option3"=> "I just used it in a simple project",
                  "option4"=> "I know and use it", "option5"=> "I know very well");
                
                // echo $optionArrKey["option5"];
                // 
                $prograLanAs = [];
                // create array for programming language table
                foreach($progLan as $lan){
                  $var =  $_POST[$lan];
                  $prograLanAs +=[$lan => $optionArrKey[$var]];
                }

                $progJson = json_encode($prograLanAs,JSON_UNESCAPED_UNICODE );

                //echo $progJson."\n";
                
                $sql = "INSERT INTO Applicants (fullname, phone, email, program_lang, linkedin,file_name, modal_helper)
                VALUES ('$name', '$phone', '$email', '$progJson', '$linkedin','$file_name','$modalHelper' )";

                if ($baglanti->query($sql) === TRUE) {
                  echo "New record created successfully";
                } else {
                  echo "Error: occured";
                  
                }

                // Closing connection
                $baglanti->connection = null;
              
                $mail->Body = $bodyString.$bodyString2;
            
              $mail->send();
                
              header ("Location: applicants-form.php?err=3");
          
          }else{
    
            print_r($errors);
          
              $myJSON=json_encode($errors);  
              
              header ("Location: applicants-form.php?err=$err_code");
        
          
          }
      }



}

?>