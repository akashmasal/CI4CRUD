<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <?php 
        $session = \Config\Services::session();
        if($session->getFlashdata('message')){
            echo "<h4>".$session->getFlashdata('message')."</h4>";
        }
        else{
            echo "<h4>".$session->getFlashdata('message')."</h4>";
        }
        ?>

        <h1>User Update Form <a href="<?php echo base_url('/read');?>"><button>BACK</button></a></h1>
        <form action="<?php echo base_url('/edit/'.$getUserDataById['userId']);?>" method="post">
            <table>
                <tr>
                    <th><label for="username">Username :</label></th>
                    <td><input type="text" value="<?php echo $getUserDataById['userFullName'];?>" name="username"></td>
                </tr>
                <tr>
                    <th><label for="email">Email :</label></th>
                    <td><input type="email" value="<?php echo $getUserDataById['userEmail'];?>" name="email"></td>
                </tr>
                <tr>
                    <th><label for="password">Password :</label></th>
                    <td><input type="password" value="<?php echo $getUserDataById['userPassword'];?>" name="password"></td>
                </tr>
                <tr>
                    <th><label for="status">Status :</label></th>
                    <td><input type="text" value="<?php echo $getUserDataById['userStatus'];?>" name="status"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="UPDATE"></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>