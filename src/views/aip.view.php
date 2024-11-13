<?php
// index.php

include 'src/config/database.php';

// Fetch all parents with a single query
$parentsQuery = "SELECT * FROM parent ORDER BY id";
$parentsResult = mysqli_query($conn, $parentsQuery);
$parents = mysqli_fetch_all($parentsResult, MYSQLI_ASSOC);

// Function to fetch children (expected outputs) for a given parent
function getChildren($conn, $parent_id) {
    $childrenQuery = "SELECT * FROM child WHERE parent_id = $parent_id ORDER BY id";
    $childrenResult = mysqli_query($conn, $childrenQuery);
    return mysqli_fetch_all($childrenResult, MYSQLI_ASSOC);
}
?>
 <style>
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
            vertical-align: top;
            font-size: .8rem;

        }
        th {
            background-color: #2c71d8;
            color: white;
            font-size: .9rem;
        }
    </style>
    
<link rel="stylesheet" href="public/css/table.css">
       <div class="hero">
            <div class="aip_header_container">
                <div class="aip-header">
                    <h1>CY 2025 Annual Investment Program (AIP) <br>By Program/Project/Activity by Sector</h1>
                </div>
                <div class="second_header_container">
                    <div class="side-header">
                        <p>Province/City/Municipality/Barangay: CEBU CITY</p>
                        <div class="check-box">
                            <input type="checkbox">
                            <p>No climate Change Expenditure (Please tick the box if your LGU does not have any climate change expenditure.)</p>
                        </div>
                    </div>
                    <div class="add-btn aip-add-btn">
                    <button onclick="window.location.href='router.php?page=add-aip'"><i class="fa-solid fa-plus"></i>Add new</button>
                </div>
                </div>
            </div>
            <div class="aip-table">
            <table>
                <thead>
                <tr>
                    <th>AIP Ref <br>Code</th>
                    <th>Program/Project/Activity <br>Description</th>
                    <th>Implementing <br>Office/<br>Department</th>
                    <th colspan="2">Schedule of <br>Implementation</th>
                    <th>Expected Outputs</th>
                    <th>Funding <br>Source</th>
                    <th colspan="3">Amount</th>
                    <th>TOTAL <br>(8+9+10)</th>
                    <th colspan="2">Amount of Climate <br>Change Expenditures</th>
                    <th>CC <br>Typology <br>Code</th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Starting <br>Date</th>
                    <th>Completion <br>Date</th>
                    <th></th>
                    <th></th>
                    <th>Personal Services</th>
                    <th>Maintenance and <br>Other Operating <br>Expenses</th>
                    <th>Capital Outlay</th>
                    <th></th>
                    <th>Climate <br>Change <br>Adaptation</th>
                    <th>Climate <br>Change <br>Mitigation</th>
                    <th></th>
                </tr>
                <tr>
                    <th>(1)</th>
                    <th>(2)</th>
                    <th>(3)</th>
                    <th>(4)</th>
                    <th>(5)</th>
                    <th>(6)</th>
                    <th>(7)</th>
                    <th>(8)</th>
                    <th>(9)</th>
                    <th>(10)</th>
                    <th>(11)</th>
                    <th>(12)</th>
                    <th>(13)</th>
                    <th>(14)</th>
                </tr>
            </thead>
        <tbody>
            <?php foreach ($parents as $parent): 
                $children = getChildren($conn, $parent['id']);
                $childCount = count($children); // Count expected outputs for rowspan
                $rowspan = $childCount > 0 ? $childCount : 1; // Set rowspan to at least 1 if no children
            ?>
                <?php foreach ($children as $index => $child): ?>
                    <tr>
                        <?php if ($index === 0): ?>
                            <!-- Parent columns with rowspan based on the number of expected outputs -->
                            <td rowspan="<?php echo $rowspan; ?>"><?php echo htmlspecialchars($parent['aip_ref_code']); ?></td>
                            <td rowspan="<?php echo $rowspan; ?>"><?php echo htmlspecialchars($parent['description']); ?></td>
                            <td rowspan="<?php echo $rowspan; ?>"><?php echo htmlspecialchars($parent['implementing_office']); ?></td>
                            <td rowspan="<?php echo $rowspan; ?>">
                                <?php echo date("M. Y", strtotime($parent['start_date'])); ?>
                            </td>
                            <td rowspan="<?php echo $rowspan; ?>">
                                <?php echo date("M. Y", strtotime($parent['end_date'])); ?>
                            </td>
                        <?php endif; ?>

                        <!-- Child columns -->
                        <td>
                            <?php 
                                echo !empty($child['description']) ? htmlspecialchars($child['description']) : '-';
                            ?>
                        </td>
                        <td>
                            <?php 
                                echo !empty($child['funding_source']) ? htmlspecialchars($child['funding_source']) : '-';
                            ?>
                        </td>
                        <td>
                            <?php 
                                echo number_format($child['personal_services'] ?? 0, 2);
                            ?>
                        </td>
                        <td>
                            <?php 
                                echo number_format($child['maintenance_expenses'] ?? 0, 2);
                            ?>
                        </td>
                        <td>
                            <?php 
                                echo number_format($child['capital_outlay'] ?? 0, 2);
                            ?>
                        </td>
                        <td>
                            <?php 
                                // Calculate TOTAL (8+9+10)
                                $total = ($child['personal_services'] ?? 0) + ($child['maintenance_expenses'] ?? 0) + ($child['capital_outlay'] ?? 0);
                                echo number_format($total, 2);
                            ?>
                        </td>
                        <td>
                            <?php 
                                echo number_format($child['climate_adaptation'] ?? 0, 2);
                            ?>
                        </td>
                        <td>
                            <?php 
                                echo number_format($child['climate_mitigation'] ?? 0, 2);
                            ?>
                        </td>
                        <td>
                            <?php 
                                echo !empty($child['cc_typology_code']) ? htmlspecialchars($child['cc_typology_code']) : '-';
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>

                <?php 
                    // If a parent has no children, display the parent row alone
                    if ($childCount == 0) { 
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($parent['aip_ref_code']); ?></td>
                        <td><?php echo htmlspecialchars($parent['description']); ?></td>
                        <td><?php echo htmlspecialchars($parent['implementing_office']); ?></td>
                        <td><?php echo date("M. Y", strtotime($parent['start_date'])); ?></td>
                        <td><?php echo date("M. Y", strtotime($parent['end_date'])); ?></td>
                        <td>-</td>
                        <td>-</td>
                        <td>0.00</td>
                        <td>0.00</td>
                        <td>0.00</td>
                        <td>0.00</td>
                        <td>0.00</td>
                        <td>0.00</td>
                        <td>-</td>
                    </tr>
                <?php } ?>
            <?php endforeach; ?>
        </tbody>
    </table>
            </div>
        </div>
    </div>
</div>
<script src="public/js/modal.js"></script>