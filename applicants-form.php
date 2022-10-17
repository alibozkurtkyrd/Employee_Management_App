<!doctype html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Kctek - Qulak Kariyer - Job application form</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/checkout/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>



    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="/images/logo.png" alt="logo">
            <h1>Job Application Form</h1>

        </div>
        <?php 
            
              $errors = array (
                  1 => "Choose correct extensions: pdf, doc or docx",
                  2 => "File can be at most 2 MB"
              );

              $error_id = isset($_GET['err']) ? (int)$_GET['err'] : 0;
              
              if ($error_id ==1) {
                  //echo $errors[$error_id];
                  
                  echo
                     "
                    <script>
                      
                    swal('Ooops!', '.$errors[1]', 'error');
                      
                    
                    </script>
                     ";
                     
              }

              elseif($error_id ==2){
                    echo
                        "
                      <script>
                        
                      swal('Ooops!', '.$errors[2]', 'error');
                        
                      
                      </script>
                        ";
                        
              }

              elseif($error_id ==3){
                      echo
                          "
                        <script>
                          
                        swal('Thanks!', 'Your form has been sent successfully', 'success');
                          
                        
                        </script>
                        ";

                        
              }


        ?>
        <div class="row">


            <div class="col-md-8 order-md-1 my-form">

                <form action="register-applicants.php" method="post" id="my-form" enctype="multipart/form-data">
                    <div class="mb-3 box">
                        <div>
                            <label for="name">Full Name<span style="color:red;">*</span></label>
                            <input type="text" class="form-control" name="name" placeholder="Enter.." required>
                            <div class="invalid-feedback">
                                name is required.
                            </div>
                        </div>
                    </div>


                    <div class="form-group box">
                        <label for="exampleFormControlFile1">Upload your CV (pdf or docx)<span style="color:red;">*</span></label>
                        <input type="file" class="form-control-file" name="cv" required>
                    </div>

                    <div class="mb-3 box">
                        <label for="address">Phone<span style="color:red;">*</span></label>
                        <input type="text" class="form-control" name="phone" placeholder="Enter.." required>
                        <div class="invalid-feedback">
                            Please enter your phone Number.
                        </div>
                    </div>

                    <div class="mb-3 box">
                        <label for="email">Email<span style="color:red;">*</span> <span
                                class="text-muted"></span></label>
                        <input type="email" class="form-control" name="email" placeholder="test@example.com">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>

                    <hr class="mb-4">



                    <div class="box">
                        <p>Choose your programming knowledge level<span
                                style="color:red;">*</span></p>

                        <div class="container out">

                            <table class="table table-borderless">
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





                                    <?php $progLan= array("Mysql", "Larevel", "Docker", "Html", "Bootstrap", "Swift", "Python", 
                       "MongoDB", "Github", "React", "C#", "Php", "Android", "Css", "VueJs"); 
                      

                  foreach($progLan as $lan){

                   
                    echo <<<EOT

                            
                            <tr>
                              <th scope="row">$lan</th>
                              <td><label class="target" ><input type="radio" name=$lan id="MysqlRadio1" value="option1" checked="checked"></lablel></td>
                              <td><label class="target" ><input type="radio" name=$lan id="MysqlRadio2" value="option2"></lablel></td>
                              <td><label class="target" ><input type="radio" name=$lan id="MysqlRadio3" value="option3"></lablel></td>
                              <td><label class="target" ><input type="radio" name=$lan id="MysqlRadio4" value="option4"></lablel></td>
                              <td><label class="target" ><input type="radio" name=$lan id="MysqlRadio5" value="option5"></lablel></td>
                            </tr>
                            
 
                          

                        EOT;;
                     };
                
             
             ?>
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <hr class="mb-4">

                    <div class="mb-3 box">
                        <label for="address">LinkedIn Profile<span
                                style="color:red;">*</span></label>
                        <input type="text" class="form-control" name="linkedin" placeholder="Enter.." required>
                        <div class="invalid-feedback">
                            Please enter your phone Number.
                        </div>
                    </div>

                    <hr class="mb-4">


                    <button class="btn btn-primary btn-lg btn-block" name="submit" id="btn-submit"
                        type="submit">Submit</button>
                </form>
            </div>
        </div>


        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">&copy; 2022-2023 Kctek</p>
        </footer>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>


        <script type="text/javascript">
        $("#btn-submit").click(function() {
            setTimeout(function() {
                document.getElementById("btn-submit").disabled = true;
            }, 1)
        })
        // function handleForm() {
        //     document.getElementById("btn-submit").disabled = true;

        // }

        setTimeout(function() {
            document.getElementById("btn-submit").disabled = false;
        }, 6000);

        </script>


</body>

</html>