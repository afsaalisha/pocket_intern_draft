<?php require_once 'layouts/header.php'; ?>
<?php require_once 'layouts/sidebar.php'; ?>

<div class="content skroll">
    <h1 class="stuh-title">Void</h1>
    <div class="tab-menu">
        <a href="/poshet/stement" class="tab" onclick="setActiveTab(event, 'stement')">Statement</a>
        <a href="/poshet/void" class="tab active" onclick="setActiveTab(event, 'void')">Void</a>
    </div>

    <!-- content or something below -->

    <div class="void-table-con">
        <div class="void-table">
            <table>
                <tr>
                    <th>Merchant ID</th>
                    <th>Pin</th>
                    <th class="tengah">Action</th>
                </tr>
                <?php
                // Dummy data from scripts and database
                $data = [
                    ['Will90834', 'test123', '<i class="fa fa-edit"></i>']
                ];
                foreach ($data as $row) {
                    echo '<tr>';
                    foreach ($row as $index => $cell) {
                        if ($index == 2) {
                            echo '<td><button class="void-edit-button">' . $cell . '</button></td>';
                        } else {
                            echo '<td>' . $cell . '</td>';
                        }
                    }
                    echo '</tr>';
                }
                ?>
            </table>
        </div>

        <h2 class="vuh-title">Void History</h2>
        <div class="void-table sideskroll">
            <table>
                <tr>
                    <th>Reference</th>
                    <th>Details</th>
                    <th>Date Time</th>
                    <th>Amount</th>
                    <th>Reason</th>
                    <th>Email</th>
                    <th>Merchant</th>
                </tr>
                <tr>
                    <td>C230905474409</td>
                    <td>Customer Refund</td>
                    <td>2023-09-05 10:21:46</td>
                    <td>0</td>
                    <td>test</td>
                    <td>admin@threegmedia.com</td>
                    <td>Coffee Street Cafe</td>
                </tr>
            </table>
        </div>

        <h2 class="vuh-title">Refund History</h2>
        <div class="void-table">
            <table>
                <tr>
                    <th>Reference</th>
                    <th>Details</th>
                    <th>Date Time</th>
                    <th>Amount</th>
                    <th>Reason</th>
                    <th>Email</th>
                    <th>Merchant</th>
                </tr>
            </table>
        </div>
    </div>

    <!-- content ends here -->

    <div id="voidModalContainer" class="void-modal">
        <div class="void-modal-content">
            <span class="void-close">&times;</span>
            <h2>Confirm Void Pin</h2>
            <label for="voidPinInput">New Void Pin:</label>
            <input type="password" id="voidPinInput">
            <div class="void-modal-buttons">
                <button class="void-cancel-btn">Cancel</button>
                <button class="void-confirm-btn">Confirm</button>
            </div>
        </div>
    </div>

    <?php require_once 'layouts/footer.php'; ?>

    <!-- scripts below here -->

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const voidModal = document.getElementById("voidModalContainer");
            const voidCloseButton = document.querySelector(".void-close");
            const voidCancelButton = document.querySelector(".void-cancel-btn");
            const voidConfirmButton = document.querySelector(".void-confirm-btn");
            const voidPinInput = document.getElementById("voidPinInput");

            // Tried to make it so that the table is populated with data from the database

            // const voidHistoryData = [
            //     ["C230905474409", "Customer Refund", "2023-09-05 10:21:46", "0", "test", "admin@threegmedia.com", "Coffee Street Cafe"]
            // ];
            // const refundHistoryData = [];

            // function populateTable(tableId, data) {
            //     const table = document.getElementById(tableId);
            //     data.forEach(row => {
            //         const tr = document.createElement("tr");
            //         row.forEach(cell => {
            //             const td = document.createElement("td");
            //             td.textContent = cell;
            //             tr.appendChild(td);
            //         });
            //         table.appendChild(tr);
            //     });
            // }

            // populateTable("voidHistoryTable", voidHistoryData);
            // populateTable("refundHistoryTable", refundHistoryData);


            // Identify the specific table cell that contains "Data 1.2"
            let voidPinCell = null;
            document.querySelectorAll("table td").forEach(cell => {
                if (cell.textContent.trim() === "test123") {
                    voidPinCell = cell;
                }
            });

            // Open the modal when an edit button is clicked
            document.querySelectorAll(".void-edit-button").forEach(button => {
                button.addEventListener("click", function() {
                    voidModal.style.display = "block";
                });
            });

            function closeVoidModal() {
                voidModal.style.display = "none";
            }

            voidCloseButton.addEventListener("click", closeVoidModal);
            voidCancelButton.addEventListener("click", closeVoidModal);

            window.addEventListener("click", function(event) {
                if (event.target === voidModal) {
                    closeVoidModal();
                }
            });

            // Confirm and update the PIN in the table
            voidConfirmButton.addEventListener("click", function() {
                const newVoidPin = voidPinInput.value.trim();

                if (newVoidPin !== "" && voidPinCell) {
                    voidPinCell.textContent = newVoidPin; // Update the table cell
                    alert("Void Pin updated successfully!");
                    closeVoidModal();
                } else {
                    alert("Please enter a valid Void Pin.");
                }
            });
        });
    </script>