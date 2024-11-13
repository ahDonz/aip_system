          
<?php
include 'src/config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $aip_ref_code = mysqli_real_escape_string($conn, $_POST['aip_ref_code']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $implementing_office = mysqli_real_escape_string($conn, $_POST['implementing_office']);
    $start_date = mysqli_real_escape_string($conn, $_POST['start_date']);
    $end_date = mysqli_real_escape_string($conn, $_POST['end_date']);

    $parentQuery = "INSERT INTO parent (aip_ref_code, description, implementing_office, start_date, end_date)
                    VALUES ('$aip_ref_code', '$description', '$implementing_office', '$start_date', '$end_date')";
    if (mysqli_query($conn, $parentQuery)) {
        header("Location:router.php?page=aip");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<?php include 'public/components/header.php'?>
          <div class="hero">
                        <form class="" action="" method="post">
                                    <div class="form-container">
                                        <div class="form-container-header">
                                        <h1>Annual Investment Program  (AIP) Submission</h1>
            <p>Please fill out the details below for the Annual Program Plan. This information will be securely managed and not shared externally.</p>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-col">
                                                <label for="aip-code"><b>AIP REF CODE</b></label>
                                                <input type="text" placeholder="AIP CODE" name="aip_ref_code"  required>
                                            </div>
                                        
                                        </div>
                                        <h4 class="form_sub_header">AIP Information</h4>
                                        <div class="form-row">
                                            <div class="form-col">
                                            <label>Program/Project/Activity Description:</label>
                                            <input type="text" name="description" placeholder="Enter program/activity" required><br><br>
                                            </div>
                                            <div class="form-col">
                                            <label>Implementing Office/Department:</label>
                                            <input type="text" name="implementing_office" placeholder="Enter implementing/office" required><br><br>
                                            </div>
                                        </div>
                                        <h4 class="form_sub_header">Schedule of Implementation</h4>
                                        <div class="form-row">
                                            <div class="form-col">
                                            <label>Start Date:</label>
                                            <input type="date" name="start_date" ><br><br>
                                            </div>
                                            <div class="form-col">
                                            <label>End Date:</label>
                                            <input type="date" name="end_date" ><br><br>
                                            </div>
                                        </div>
                                    
                                        <div class="form-row">
                                            <div class="form-col">
                                                <button type="submit">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                        </form>
            </div>
        </div>
    </div>
</body>
</html>