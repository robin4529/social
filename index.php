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
            $skill= $_POST ['skill'];
            $bio= $_POST ['bio'];

            if(empty($name)|| empty($skill)|| empty($bio)){
                $msg= validate('All fields are Require','warning');
            }else{
                $file_name = move($file =$_FILES['photo'], 'teams/');

                    $user_data=[
                        'name' => $name,
                        'skill' => $skill,
                        'bio'   => $bio,
                        'photo' =>  $file_name
                    ];
                    $users =json_encode($user_data);

                    setcookie('users',$users, time() +(60 * 60 * 60 *24 * 365));
                   
                $msg= validate('Team Member added successfully','success');
            }
            //file Managment System//
             


             

        }
            ?>
           <div class="container-fluid">
               <div class="row">
                   <div class="col-md-3">
                       <div class="shadow">
                       <div class="card">
                            <div class="card-header">
                                <h2>Created An account</h2>
                                <?php
                                    if(isset($msg)){
                                        echo $msg;
                                    }
                                ?>
                               </div>
                            <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input value="<?php old('name') ?>" type="text" class="form-control"  name="name">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="">skill</label>
                                        <input value="<?php old('skill') ?>" type="text" class="form-control"  name="skill">
                                    </div>
                                        <div class="form-group">
                                            <label for="">bio</label>
                                           <textarea value="<?php old('bio') ?>" class="form-control" name="bio" id=""></textarea>
                                         </div>
                                        <div class="form-group">
                                           <img id="load" src="" alt="">
                                            <input style="display: none;"  name="photo" class="form-control" id="photo" type="file">
                                            <label for="photo"><img class="upload" src="assets/img/images.png" alt=""></label>
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
                    <div class="col-md-9 ">
                        <?php 
                          $all_users =$_COOKIE['users'];
                                   $data =json_decode( $all_users, false);
                           
                        ?>
                        
                        <div class="card team">
                            <div class="card-body">
                                <img class="img" src="teams/<?php echo $data-> photo; ?>">
                                <h3><?php echo $data ->name; ?></h3>
                                <h5><?php echo $data -> skill; ?></h5>
                                <p><?php echo $data ->bio; ?></p>
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
<script src="assets/js/custom.js"></script>
</body>
</html>