<?php include_once "autoload.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php project</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
<?php
        if(isset ($_POST['add'])){
            $name=$_POST['name'];
            $email= $_POST ['email'];
            $cell = $_POST ['cell'];
            $username = $_POST ['uname'];
            $Age= $_POST ['Age'];
            $agree= '';
           
            if(isset($_POST['agree'])){
                $agree= $_POST['agree'];
            }
            $gender= '';
             if(isset($_POST['gender'])){
                $gender= $_POST['gender'];
             }
             $location= '';
             if(isset($_POST['location'])){
                $location=$_POST['location'];
             }
               
            
           

            

            $validation_status = true;

           
            if(empty($name)||empty($email)||empty($cell)||empty($username)|| empty($Age))
           {
            $msg[] = validate('All fields are Require');
            $validation_status = false;

           }if(empty($gender) && $gender!='gender'){
            $msg[] = validate('Select your gender');
            $validation_status = false;

           }if(agecheck($Age) ==false){

            $msg[]= validate("You are under Age",'warning');
            $validation=false;
        }
           if( filter_var($email, FILTER_VALIDATE_EMAIL) ==false)
           {
            $msg[] = validate('Invaild email address','warning');
            $validation_status =false;

           }if (instemail($email, ['nsu.edu.bd']) ==false)
           {
                $msg[] =  validate ('Your isnt Valid Email to sign in');
                $validation_status = false;

           
        }if ( $agree!='agree')
        {
             $msg[] =  validate ('You should agree first');
             $validation_status = false;

        }if (empty($location) && $location!='location')
        {
             $msg[] =  validate ('select your location');
             $validation_status = false;

        }if( $validation_status == true){
               $msg[]= validate('Congraculation youre successfully sign in','success');
                formclean();
           }
        }
        
    
       //form validitation
        ?>
<div class="container">
                <div class="row justify-content-center mt-5">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h2>Created An account</h2>
                                <?php
                                    if(isset($msg)){
                                        foreach($msg as $m){
                                            echo $m ; }
                                    }
                                ?>
                               </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input  value="<?php old('name') ?>" type="text" class="form-control"  name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="">E-Mail</label>
                                        <input value="<?php old('email') ?>" type="text" class="form-control" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Cell</label>
                                        <input value="<?php old('cell') ?>" type="text" class="form-control"  name="cell">
                                    </div>
                                    <div class="form-group">
                                        <label for="">User Name</label>
                                        <input value="<?php old('uname') ?>" type="text" class="form-control"  name="uname">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Age</label>
                                        <input value="<?php agecheck('Age') ?>" type="text" class="form-control"  name="Age">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Gender</label></br>
                                        <input value="male" type="radio" id="Male" name="gender">
                                        <label for="male">Male</label>
                                        <input value="male" type="radio" id="Female" name="gender">
                                        <label for="female">female</label>
                                    </div>
                                        <div class="form-gropu">
                                            <label for="">Location :</label>
                                            <select  class="form-control" name="location" id="">
                                            <option value="">-select-</option>
                                                <option value="Dhanmondhi">Dhanmondhi</option>
                                                <option value="Jatrabrai">Jatrabrai</option>
                                                <option value="Mirpur">Mirpur</option>
                                                <option value="Mohammadpur">Mohammadpur</option>
                                            </select>
                                            <br>
                                     </div>
                                        <div class="form-group">
                                            <input name="agree" value="agree" type="checkbox" id="agree">
                                            <label for="Agree">I agree all of terms & conditon</label>

                                        </div>
                                            <div class="form-group">
                                        <p class="text-center">
                                        <input type="submit" class="btn btn-primary" name="add" value="Sign Up">
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                                </br>
                                </br>


<script src="assets/js/jquery-3.2.1.slim.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>