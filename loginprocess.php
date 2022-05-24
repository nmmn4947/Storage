<?php

session_start();

    include 'db.php';
 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $uname=$_POST["uname"];
        $psw=$_POST["psw"];
        
        $conn=new mysqli($server_name,$user_name,$password,$database);
        if ($conn->connect_error) {
                echo "errorororo";
            }
        $sql="SELECT * from email where uname ='$uname'";
        $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $rows=mysqli_fetch_assoc($result);
                    $passwordCK=$rows["Password"];
                    
                    if($psw == $passwordCK){
                        echo "yooo" ;
                        if($rows["Status"] == "Admin"){ 
                        header("Location: http://storage.roong-aroon.ac.th/Admin.php?REEEEE=ADMIN");
                        exit();
                        }else{
                            $ww=$rows['BILL'];

                            $_SESSION['Bill'] = $ww;

                            $nn=$rows['Name'];
                            
                            $_SESSION['Name'] = $nn;

                            $ee=$rows['Email'];
                            
                            $_SESSION['Email'] = $ee;

                                header("Location: http://storage.roong-aroon.ac.th/Face.php?yooooo=USER");
                        }


                    }else{
                        $psc="Password is not corret";
                        header('Location: index.html='.$psc);
                    
                    }

                }else{
                    echo "Don't find E-mail";
                }
                   
    
    }
?>