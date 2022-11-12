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
        <h1 style="text-align:center;">CURD OPERATION USING CODEIGNITER4</h1><a href="<?php echo base_url('/create'); ?>"><button class="addBtn">ADD</button></a>
        <table>
            <tr>
                <th>USERID</th>
                <th>FULL NAME</th>
                <th>EMAIL</th>
                <th>PASSWORD</th>
                <th>STATUS</th>
                <th>CREATED DATE</th>
                <th>UPDATED DATE</th>
                <th>ACTION</th>
            </tr>
            <?php if (count($getAllUsers) > 0) {
                foreach ($getAllUsers as $user) { ?>
                    <tr>
                        <td><?php echo $user['userId']; ?></td>
                        <td><?php echo $user['userFullName']; ?></td>
                        <td><?php echo $user['userEmail']; ?></td>
                        <td><?php echo $user['userPassword']; ?></td>
                        <td><?php echo $user['userStatus']; ?></td>
                        <td><?php echo $user['userCreatedDate']; ?></td>
                        <td>
                            <?php
                            if ($user['userUpdatedDate'] == '') {
                                echo "<h6>NOT UPDATED YET</h6>";
                            } else {
                                echo $user['userUpdatedDate'];
                            }
                            ?>
                        </td>
                        <td>
                            <a href="<?php echo base_url('/update/' . $user['userId']); ?>"><button>UPDATE</button></a>
                            &nbsp; &nbsp;
                            <a href="<?php echo base_url('/delete/' . $user['userId']); ?>"><button>DELETE</button></a>
                        </td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td>NO DATA FOUND</td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
<style>
    table {
        width: 100%;
        font-family: sans-serif;
        font-size: 1.2rem;
        font-weight: bold;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    table,
    tr,
    th,
    td {
        border: solid 0.1rem;
    }

    .addBtn {
        position: relative;
        left: 75vw;
        bottom: 3.3rem;
        width: 8%;
        height: 4vh;

    }
</style>

</html>