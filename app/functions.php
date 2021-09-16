<?php

    //boostrap project function//

    function validate($msg, $type ='danger'){
        return "<p class=\" alert alert-{$type}\">{$msg}!<button class=\"close\" data-dismiss=\"alert\">&times;</button></p>";


    }

    //email validation check//

    function instemail(string $email,  array $mails){

        //last part of email//
        $mail_arr =explode('@', $email);
        $last = end ($mail_arr);

         if(in_array($last, $mails)){
            return true;
        }else{
            return false;
        }
    }
    //age condition//
    function agecheck($Age){
        if($Age>=18){
            return true;
        } return false;
        // end age check//

    }
    //old data store//
    function old($name){
        if(isset($_POST[$name])){
            echo $_POST[$name];
        }else{
            echo "";
        }
    }
    //form clear//
    function formclean(){
        $_POST="";
    }
    //Files Management system function//

    function move($file){
       
        $file_name = time()."_". rand()."_". $file['name'];
         $file_tmp  = $file ['tmp_name'];
       $file_size  = $file ['size'];


         move_uploaded_file( $file_tmp ,"teams/" . $file_name );
         return $file_name;
        }

?>