<?php 
    include '../function/function.php';
    include 'sidebar.php';
    include 'header.php';
    
    if(isset($_GET['logout'])){
		unset($_SESSION['login']);
        session_destroy();
        header("location: ../../index.php");
        exit();
	}
    
    if(isset($_POST['submit'])){
        $response = applyLeave($_POST['reason'],$_POST['start_date'],$_POST['last_date'],@$_SESSION['user'],@$_POST['assigned_person']);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blitz</title>
    <link rel="stylesheet" href="../../views/css/apply-for-leave.css">
</head>
<body>
    <section>
        
        <div class="profile-container">
            
            <div class="page-content">
                
                    <div class="leave-container">
                        
                        <div>
                            <h3>Apply&nbsp;For&nbsp;Leave</h3>
                        </div>
    
                        <?php if(@$response == "success") : ?>
    
                        <p class="success">Task added successfully</p>
    
                        <?php else: ?>
    
                            <p class="error"><?php echo @$response; ?></p>
    
                        <?php endif ?>
    
                        <form action="" method="POST">
    
                            <div>
                                <label for="">Reason&nbsp;:</label>
                                <textarea name="reason" maxlength="100" resize="none" rows="4" cols="63" value="<?php echo @$_POST['reason']; ?>"></textarea>
                                <?php /* echo $reasonErr; */ ?>   
                            </div>
                            
                            <div>
                                <label for="">Starting&nbsp;Date&nbsp;:</label>
                                <input type="date" id="date" name="start_date" min="<?php date("m/d/y")?>" value="<?php echo @$_POST['start_date']; ?>">
                                <?php /* echo $start_dateErr; */ ?>   
                            </div>    
                            
                            <div>
                                <label for="">Last&nbsp;Date&nbsp;:</label>
                                <input type="date" id="date" name="last_date" min="<?php date("m/d/y")?>" value="<?php echo @$_POST['last_date']; ?>">
                                <?php /* echo $last_dateErr; */ ?>   
                            </div>   
                            
                            <div>
                                <label for="">Assigned&nbsp;Person&nbsp;:</label>
                                <select name="assigned_person">
                                    <option value="none" selected disabled hidden>Select an Option</option>
                                <?php 
                                    $mysqli = connect();
                                    $sql = "SELECT * FROM employee";
                                    $result = mysqli_query($mysqli, $sql);
                            
                                        if($result==TRUE):
                            
                                            $count_rows = mysqli_num_rows($result);
                            
                                            if($count_rows > 0):
                                                while($row = mysqli_fetch_assoc($result)):
                                ?>
                                    <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                                        <?php   endwhile;
                                            endif;
                                        endif;
                                        ?>
                                    </select>
                            </div>
                            
                            <div>
                                <input type="submit" value="Apply&nbsp;Now" class="apply" name="submit">
                                <p id="demo"></p>
                            </div>
    
                        </form>
                    </div>
            </div>


        </div>

    </section>

</body>
<script>
    /* document.getElementById("date").min = new Date().getFullYear() + "-" +  parseInt(new Date().getMonth() + 1 ) + "-" + new Date().getDate()
    
    function leaveHeader(){
        var msg;
        if (confirm("Leave applied successfully!")){
            msg = "Check leave status";
        }
        document.getElementById('demo').innerHTML = msg;
    } */

    function getdata(){
      var txtOne = document.getElementById('assigned_person').value;
      <?php /* 

                                    $mysqli = connect();
                                    $user = $_SESSION['user'];
                                    $sql = ("SELECT * FROM emp_leave ") ;
                        
                                    $result = mysqli_query($mysqli, $sql);
                        
                                    if($result==TRUE):
                        
                                        $count_rows = mysqli_num_rows($result);
                        
                                        if($count_rows > 0):
                                            while($row = mysqli_fetch_assoc($result)):
                                                $id = $row['id'];
                                                $start_date = $row['start_date'];
                                                $last_date = $row['last_date'];
                                                $assigned_person = $row['assigned_person'];
                                                $username = $row['username'];
                                                
                                                if($assigned_person == $username && $username != $_SESSION['user']): 
                                                    echo "Success!";
                                                else:
                                                    echo "On a leave";
                                                endif;
                                            endwhile;
                                        endif;
                                    endif; */
                                ?>
}
</script>
</script>

</html>