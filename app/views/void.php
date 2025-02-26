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

    <div id="voidToast" class="void-toast">
        <span class="toast-header">Success</span>
        <span>Void Pin updated successfully!</span>
        <button class="close-btn" onclick="closeVoidToast()">&times;</button>
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
            const voidToast = document.getElementById("voidToast");

            let voidPinCell = null;
            document.querySelectorAll("table td").forEach(cell => {
                if (cell.textContent.trim() === "test123") {
                    voidPinCell = cell;
                }
            });

            document.querySelectorAll(".void-edit-button").forEach(button => {
                button.addEventListener("click", function() {
                    voidModal.style.display = "block";
                    voidPinInput.focus(); // Focus input when modal opens
                });
            });

            function closeVoidModal() {
                voidModal.style.display = "none";
                voidPinInput.value = ""; // Clear input on close
            }

            function showVoidToast() {
                voidToast.classList.add("show");
                setTimeout(() => {
                    voidToast.classList.add("hide");
                    setTimeout(() => {
                        voidToast.classList.remove("show", "hide");
                    }, 500);
                }, 3000);
            }

            function closeVoidToast() {
                voidToast.classList.add("hide");
                setTimeout(() => {
                    voidToast.classList.remove("show", "hide");
                }, 500);
            }

            // Confirm with Enter key
            voidPinInput.addEventListener("keypress", function(event) {
                if (event.key === "Enter") {
                    voidConfirmButton.click(); // Trigger confirm button
                }
            });

            // Close modal with Escape key
            window.addEventListener("keydown", function(event) {
                if (event.key === "Escape") {
                    closeVoidModal();
                }
            });

            // Close modal when clicking outside of it
            window.addEventListener("click", function(event) {
                if (event.target === voidModal) {
                    closeVoidModal();
                }
            });

            // Confirm button functionality
            voidConfirmButton.addEventListener("click", function() {
                const newVoidPin = voidPinInput.value.trim();

                if (newVoidPin !== "" && voidPinCell) {
                    voidPinCell.textContent = newVoidPin;
                    showVoidToast();
                    closeVoidModal();
                } else {
                    alert("Please enter a valid Void Pin.");
                }
            });

            // Close modal when clicking cancel or close button
            voidCloseButton.addEventListener("click", closeVoidModal);
            voidCancelButton.addEventListener("click", closeVoidModal);
        });
    </script>