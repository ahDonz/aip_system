          
<?php
include 'src/config/database.php';

$parentsQuery = "SELECT * FROM parent ORDER BY id";
$parentsResult = mysqli_query($conn, $parentsQuery);
$parents = mysqli_fetch_all($parentsResult, MYSQLI_ASSOC);

// Insert child data after parent selection
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $parent_id = mysqli_real_escape_string($conn, $_POST['parent_id']);
    $child_description = mysqli_real_escape_string($conn, $_POST['child_description']);
    $funding_source = mysqli_real_escape_string($conn, $_POST['funding_source']);
    $personal_services = mysqli_real_escape_string($conn, $_POST['personal_services']);
    $maintenance_expenses = mysqli_real_escape_string($conn, $_POST['maintenance_expenses']);
    $capital_outlay = mysqli_real_escape_string($conn, $_POST['capital_outlay']);
    $climate_adaptation = mysqli_real_escape_string($conn, $_POST['climate_adaptation']);
    $climate_mitigation = mysqli_real_escape_string($conn, $_POST['climate_mitigation']);
    $cc_typology_code = mysqli_real_escape_string($conn, $_POST['cc_typology_code']);

    $childQuery = "INSERT INTO child (parent_id, description, funding_source, personal_services, maintenance_expenses, capital_outlay, climate_adaptation, climate_mitigation, cc_typology_code)
                   VALUES ('$parent_id', '$child_description', '$funding_source', '$personal_services', '$maintenance_expenses', '$capital_outlay', '$climate_adaptation', '$climate_mitigation', '$cc_typology_code')";

    if (mysqli_query($conn, $childQuery)) {
        header("Location:router.php?page=aip");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<?php include 'public/components/header.php'; ?>
          <div class="hero">
         
                        <form class="" action="" method="post">
                                    <div class="form-children">
                                        <div class="form-container-header">
                                        <h1>Annual Investment Program (AIP) Submission</h1>
                                        <p>Please fill out the details below for the Annual Program Plan. This information will be securely managed and not shared externally.</p>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-col">
                                            <label for="parent_id">Parent ID:</label>
                                            <select name="parent_id" id="parent_id" required>
                                                <option value="">Select Parent</option>
                                                <?php foreach ($parents as $parent): ?>
                                                    <option value="<?php echo $parent['id']; ?>"><?php echo $parent['aip_ref_code'] . ' - ' . $parent['description']; ?></option>
                                                <?php endforeach; ?>
                                            </select><br><br>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-col">
                                                <label>Expected Output Description:</label>
                                                <input type="text" name="child_description" placeholder="Enter expected output"  ><br><br>
                                            </div>
                                            <div class="form-col">
                                                <label>Funding Source:</label>
                                                <input type="text" name="funding_source"  placeholder="Enter funding source" ><br><br>
                                            </div>
                                        </div>
                                        <h4 class="form_sub_header">Amount</h4>
                                        <div class="form-row">
                                            <div class="form-col">
                                                <label>Personal Services:</label>
                                                <input type="number" name="personal_services" placeholder="Enter personal services" step="0.01" ><br><br>
                                            </div>
                                            <div class="form-col">
                                                <label>Maintenance and Operating Expenses:</label>
                                                <input type="number" name="maintenance_expenses" placeholder="Enter Maintenance and Operating Expenses"  step="0.01" ><br><br>
                                            </div>
                                            <div class="form-col">
                                                <label>Capital Outlay:</label>
                                                <input type="number" name="capital_outlay" placeholder="Enter Capital Outlay" step="0.01" ><br><br>
                                            </div>
                                        </div>
                                        <h4 class="form_sub_header">Amount of Climate Change Expenditures</h4>
                                        <div class="form-row">
                                            <div class="form-col">
                                                <label>Climate Change Adaptation:</label>
                                                <input type="number" name="climate_adaptation" placeholder="Enter Climate Change Adaptation" step="0.01" ><br><br>
                                            </div>
                                            <div class="form-col">
                                                <label>Climate Change Mitigation:</label> 
                                                <input type="number" name="climate_mitigation"  placeholder="Enter Climate Change Mitigation" step="0.01" ><br><br>
                                            </div>
                                            <div class="form-col">
                                                <label>CC Typology Code:</label>
                                                <input type="text" name="cc_typology_code" placeholder="Enter CC Typology Code"><br><br>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-col">
                                            <button type="submit" id="add-child">Submit</button><br><br>
                                            </div>
                                        </div>
                                    </div>
                        </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('add-child').addEventListener('click', function() {
            var childRow = document.querySelector('.child-row').cloneNode(true);
            document.getElementById('children').appendChild(childRow);
        });
    </script>
</body>
</html>