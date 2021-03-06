<html >

    <head>
        <title>Dynamic Subject Entry</title>
        <link rel="stylesheet" href="http://localhost:8082/FINALPROJECT2/css/C.css" type="text/css">


        <script src="jquery.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){

            $('#dept').on('change',function(){
                var dept = $(this).val();
                if(dept){
                    $.ajax({
                        type:'POST',
                        url:'ajaxData.php',
                        data:'dept='+dept,
                        success:function(html){
                            $('#tea_name').html(html);
                        }
                    }); 
                }else{
                    $('#tea_name').html('<option value="">Select dept first</option>');  
                }
            });


            $('#semester').on('change',function(){
                var semester = $(this).val();
                if(semester){
                    $.ajax({
                        type:'POST',
                        url:'ajaxData.php',
                        data:'semester='+semester,
                        success:function(html){
                            $('#sub_code').html(html);
                            $('#sub_name').html('<option value="">Select sub_code first</option>'); 
                            $('#sub_credit').html('<option value="">Select sub_code first</option>'); 
                        }
                    }); 
                }else{
                    $('#sub_code').html('<option value="">Select semester first</option>');
                    $('#sub_name').html('<option value="">Select sub_code first</option>'); 
                    $('#sub_credit').html('<option value="">Select sub_code first</option>'); 
                }
            });
            
            $('#sub_code').on('change',function(){
                var sub_code = $(this).val();
                if(sub_code){
                    $.ajax({
                        type:'POST',
                        url:'ajaxData.php',
                        data:'sub_code='+sub_code,
                        success:function(html){
                            $('#sub_name').html(html);
                            $('#sub_credit').html(html);
                        }
                    }); 
                }else{
                    $('#sub_name').html('<option value="">Select sub_code first</option>'); 
                    $('#sub_credit').html('<option value="">Select sub_code first</option>'); 
                }
            });
        });
        </script>
    </head>


    <body>

        <div id="page">

            <div class="header">

                <img src="http://localhost:8082/FINALPROJECT2/image/vu.jpg" alt="logo" width="350" height="104" align="left">

                <ul class="nav">
                <br><br>
                    <li style="margin-left:25%;border-left:0px solid #bbb"><a href="#">Home</a></li>
                    <li><a href="student_details.php">Students</a></li>
                    <li><a href="teacher_details.php">Teachers</a></li>
                    <li><a href="subject_details.php">Subjects</a></li>
                    <!-- <li><a href=" ">Report <span >▼</span></a>
                        <ul class="drop">
                            <li><a href="individual_report.php">Individual Report</a></li>
                            <li><a href="overall_attendance_report.php">Overall Report</a></li>
                        </ul>
                    </li> -->

                    <li><a href=" ">Attendance <span >▼</span></a>

                        <ul class="drop">
                            <li><a href="pre_attendance_form.php">Do Attendance</a></li>
                            <li><a href="attendance_details.php">see Attendance</a></li>
                        </ul>

                    </li>

                    
                    <li><a href="logout_admin.php">Logout</a></li>
                </ul>
                
            </div> <!-- header -->



<div class="main">

            <div class="content">


                <div class="text-center">
                    <hr class="team_hr team_hr_left hr_gray"/><span class="span_blog txt_darkgrey txt_orange">Attendance Form</span>
                    <hr class="team_hr team_hr_right hr_gray" />
                </div>  <!-- text-center -->
 
                <br><br><br>
            <center>

                <form action="sea.php" method="post">
                    <div class="row">
                        <div class="form-group">

                        <?php
                        include('dbConfig.php');

                        $query2 = $db->query("SELECT distinct(dept) from teacher");

                        $rowCount = $query2->num_rows;
                        ?>
                        <select name="dept" id="dept" class='form-control2'>
                            <option value="">Select dept</option>
                            <?php
                            if($rowCount > 0){
                                while($row = $query2->fetch_assoc()){ 
                                    echo '<option value="'.$row['dept'].'">'.$row['dept'].'</option>';
                                }
                            }else{
                                echo '<option value="">Dept not available</option>';
                            }
                            ?>
                        </select>
                        </div><br>

                        <div class="form-group">
                        <select name="tea_name" id="tea_name" class='form-control2'>
                            <option value="">Select dept first</option>
                        </select>
                        </div><br>

                        <div class="form-group">
                        <?php
                        //Include database configuration file
                        include('dbConfig.php');
                        
                        //Get all country data
                        $query = $db->query("SELECT distinct(semester) from subject");
                        
                        //Count total number of rows
                        $rowCount = $query->num_rows;
                        ?>
                        <select name="semester" id="semester" class='form-control2'>
                            <option value="">Select Semester</option>
                            <?php
                            if($rowCount > 0){
                                while($row = $query->fetch_assoc()){ 
                                    echo '<option value="'.$row['semester'].'">'.$row['semester'].'</option>';
                                }
                            }else{
                                echo '<option value="">Semester not available</option>';
                            }
                            ?>
                        </select>
                        </div><br>
                        
                        <div class="form-group">
                        <select name="sub_code" id="sub_code" class='form-control2'>
                            <option value="">Select semester first</option>
                        </select>
                        </div><br>
                        
                        <div class="form-group">
                        <select name="sub_name" id="sub_name" class='form-control2'>
                            <option value="">Select sub_code first</option>
                        </select>
                        </div><br>

                        <div class="form-group">
                        <select name="sub_credit" id="sub_credit" class='form-control2'>
                            <option value="">Select sub_code first</option>
                        </select>
                        </div><br>

                        <input class="mini_green_button" type="submit" name="save" value="Submit" />

                    </div>

                </form>
            </center>
    </div> <!-- content -->

