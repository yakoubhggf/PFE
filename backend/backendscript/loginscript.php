<?php
    if(!isset($_SESSION))
        session_start();
    include '../database/database.php';
    if(isset($_POST['login'])){
        if($_POST['email']=='yakoubhamdane48@gmail.com' && $_POST['motdepasse']=='yakoub23'){
            $script=<<<Script
            <script>
            window.location.href='../../frontend/website/AdminPage/dashboard/admin.php'
            </script>
        Script;
        echo $script;
        }
        else {$sqlQuery=<<<Query
        SELECT * FROM client WHERE adressEmail='{$_POST['email']}' AND motDePass='{$_POST['motdepasse']}'
        Query;
        $sql=$db->prepare($sqlQuery);
        $sql->execute();
        if($sql->rowCount()!==1){
            $script=<<<Script
                <script>
                    window.alert('either your email or password are invalid')
                    window.location.href='../../frontend/website/loginPage/login.php';
                </script>
            Script;
            echo $script;
        }
        else{
            foreach($sql->fetch() as $key =>$value){
                $_SESSION[$key]=$value;
            }
            $script=<<<Script
            <script>
            window.history.go(-2);
            </script>
        Script;
        echo $script;
        }
    }
        
    }
?>