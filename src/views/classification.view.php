
<?php


include 'src/config/database.php';


$categoriesQuery = "SELECT DISTINCT sector_category FROM aip_sector";
$categoriesResult = mysqli_query($conn, $categoriesQuery);



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $aip_code = "1000-000-2-1-01"; 
    $department = $_POST['department_office'];
    $category = $_POST['sector_category'];

  

    $stmt = $conn->prepare("INSERT INTO aip_sector (aip_code, department_office, sector_category) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $aip_code, $department, $category);

    if ($stmt->execute()) {
        echo "<div id='error' class='success-message success-box'>
                    <img src='public/images/checked_green.png' alt='Success Icon' style='width:50px; height:50px; margin-right:5px;'>
                    <p>New record added successfully!</p>
                    </div>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
  
}


?>   

<script>
    // ERROR TIMEOUT
    setTimeout(function() {
        var messageDiv = document.getElementById('error');
        if (messageDiv) {
            messageDiv.style.display = 'none';
        }
    }, 7000);
</script>
<?php include 'public/components/header.php'; ?>
           <div class="hero">
               <div class="page-2-container">
                <div class="table">
                    <div class="table-header">
                        <h1>Annual Investment Program cy 2025 per sector</h1>
                        <h1>(Institutional, Social, Economic, Enviornment)</h1>
                    </div>
                <div class="add-btn">
                    <button onclick="document.getElementById('id01').style.display='block'"><i class="fa-solid fa-plus"></i>Add new</button>
                </div>
              
<!--        -->

        <?php if(mysqli_num_rows($categoriesResult)):?>
            <?php while ($categoryRow = mysqli_fetch_assoc($categoriesResult)): 
                $category = $categoryRow['sector_category'];
            ?>

                <div class="table_view_header">
                    <h2 class="category-header"><?= htmlspecialchars($category); ?></h2>
                    <a href="router.php?page=aip"><i class="fa-solid fa-eye"></i>View</a>
                </div>
               
                <table class="category-table" style="margin-bottom:50px;">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>AIP Code</th>
                            <th>Department/Office</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                    // Step 2: Fetch data for the current category
                    $dataQuery = "SELECT aip_id, aip_code, department_office FROM aip_sector WHERE sector_category = '$category'";
                    $dataResult = mysqli_query($conn, $dataQuery);

                    // Initialize row number counter for the current category
                    $rowNumber = 1;

                    while ($dataRow = mysqli_fetch_assoc($dataResult)):
                    ?>
                        <tr>
                            <td><?= $rowNumber++; ?></td>  <!-- Display the row number and increment it -->
                            <td><?= htmlspecialchars($dataRow['aip_code']); ?></td>
                            <td><?= htmlspecialchars($dataRow['department_office']); ?></td>
                        </tr>
                    <?php endwhile; ?>

                    </tbody>
                </table>

            <?php endwhile; ?>
            <?php else :?>
                <p>No data found</p>
                <?php endif; ?>

<!--     -->
              
               
                </div>
               </div>
            </div>
        </div>
    </div>
    <div id="id01" class="modal">
        <form class="modal-content animate" action="" method="post">
                    <div class="form-col">
                        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn"><i class="fa-solid fa-x"></i></button>
                    </div>
                <div class="form-container">
                    <div class="form-container-header">
                    <h1>Contact Information</h1>
                    <p>We'll never share this information with anyone</p>
                    </div>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="aip-code"><b>AIP CODE</b></label>
                            <input type="text" placeholder="AIP CODE" name="aip_code" value="1000-000-2-1-01" disabled>
                        </div>
                       
                    </div>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="psw"><b>Department/Office</b></label>
                            <input type="text" placeholder="Enter department/office" name="department_office" required><br>
                        </div>
                    </div>
                    <div class="form-row">
                    <div class="form-col">
                        <label for=""><b>Category</b></label>
                            <select name="sector_category" >
                                <option value="Institutional Development Sector">Institutional Development Sector</option>
                                <option value="Social Sector">Social Sector</option>
                                <option value="Economic Sector">Economic Sector</option>
                                <option value="Environment Sector">Environment Sector</option>
                            </select>
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
</body>
<script src="public/js/modal.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
  });
</script>
</html>

