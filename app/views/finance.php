<?php require_once 'layouts/header.php'; ?>
<?php require_once 'layouts/sidebar.php'; ?>

<div class="content goku skroll">
    <h1 class="title">Finances</h1>
    <span class="finans-pepep">Report Emails</span>
    <!-- <span class="addinans" id="finansModal"><i class="fa-solid fa-plus"></i> Add User</span> -->

    <div class="finans-table-controls">
        <label class="grah">Show
            <select>
                <option>10</option>
                <option>25</option>
                <option>50</option>
            </select> Entries
        </label>
        <span class="addinans" id="finansModal"><i class="fa-solid fa-plus"></i> Add User</span>
        <input type="text" placeholder="Search..." class="search">
    </div>
    <div class="finans-table-container">
        <table class="finans-table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Email</th>
                    <th>Branch</th>
                    <th class="tengah">Send Finance Email</th>
                </tr>
            </thead>
            <tbody id="userMeja">
                <tr>
                    <td>1</td>
                    <td>testmail@mail.com</td>
                    <td>ThreeG Media (Kiulap)</td>
                    <td class="tengah">
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider"></span>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>user8@testing.com</td>
                    <td>Macaroon</td>
                    <td class="tengah">
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider"></span>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>user9@testing.com</td>
                    <td>Macaroon</td>
                    <td class="tengah">
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider"></span>
                        </label>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- <div class="table-footer">
        <span id="entryCount">Showing entries...</span> -->
    <div class="finans-table-footer">
        <span>Showing 1 to 3 of 3 entries</span>
        <div class="finans-pagination">
            <button>Previous</button>
            <span>1</span>
            <button class="babanana">Next</button>
        </div>
    </div>
</div>



<!-- Modal -->
<div id="finansUser" class="modal" style="display:none;">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2>Add User</h2>
        </div>
        <label>Email Address</label>
        <input type="text" id="eMail"><br>
        <label>Branch:</label>
        <div class="dropdown-wrapper">
            <select id="branchFinans">
                <option value="" disabled selected>Select Branch</option>
                <option value="ThreeG Media (Kiulap)">ThreeG Media (Kiulap)</option>
                <option value="Macaroon">Macaroon</option>
            </select>
        </div>
        <div class="modal-footer">
            <button id="finansSaveUser">Save</button>
        </div>
    </div>
</div>


<?php require_once 'layouts/footer.php'; ?>

<!-- scripts here -->

<script>
    // Function to update entry count in the table footer
    function updateEntryCount() {
        const tableBody = document.getElementById('userMeja');
        const totalEntries = tableBody.getElementsByTagName('tr').length;
        document.querySelector('.finans-table-footer span').textContent = `Showing 1 to ${totalEntries} of ${totalEntries} entries`;
    }

    // function updateEntryCount() {
    //     const tableBody = document.getElementById('userMeja');
    //     const totalEntries = tableBody.getElementsByTagName('tr').length;
    //     document.getElementById('entryCount').textContent = `Showing 1 to ${totalEntries} of ${totalEntries} entries`;
    // }

    // Open modal and clear fields
    document.getElementById('finansModal').addEventListener('click', function() {
        document.getElementById('finansUser').style.display = 'block';

        // Clear all input fields when opening modal
        document.getElementById('eMail').value = '';
        document.getElementById('branchFinans').value = ''; // Reset dropdown
    });

    // Close modal and reset fields
    document.querySelector('.close').addEventListener('click', function() {
        document.getElementById('finansUser').style.display = 'none';

        // Clear all input fields when closing modal
        document.getElementById('eMail').value = '';
        document.getElementById('branchFinans').value = ''; // Reset dropdown
    });

    // Save user and add to table
    document.getElementById('finansSaveUser').addEventListener('click', function() {
        const eMail = document.getElementById('eMail').value.trim();
        const branchFinansDropdown = document.getElementById('branchFinans');
        const branchFinans = branchFinansDropdown.value; // Get selected branch value

        // Validate fields
        if (eMail && branchFinans) {
            const tableBody = document.getElementById('userMeja');
            const rowCount = tableBody.getElementsByTagName('tr').length + 1; // Auto-increment No. column

            const newRow = document.createElement('tr');
            newRow.innerHTML = `
            <td>${rowCount}</td> 
            <td>${eMail}</td>
            <td>${branchFinans}</td>
            <td>
                <label class="switch">
                    <input type="checkbox">
                    <span class="slider"></span>
                </label>
            </td>
        `;
            tableBody.appendChild(newRow);

            // Update entry count
            updateEntryCount();

            // Show success toast for adding user
            showFinansToast('User successfully added!');

            // Close modal
            document.getElementById('finansUser').style.display = 'none';

            // Clear fields after saving
            document.getElementById('eMail').value = '';
            branchFinansDropdown.selectedIndex = 0; // Reset dropdown
        } else {
            alert('Please fill in all fields correctly.');
        }
    });

    // Function to show a success toast
    function showFinansToast(message) {
        let toast = document.createElement('div');
        toast.className = 'finans-toast show';
        toast.innerHTML = `
        <div>
            <div class="toast-header">DONE</div>
            <div class="toast-body">${message}</div>
        </div>
        <button class="close-btn">&times;</button>
    `;

        document.body.appendChild(toast);

        // Close button event
        toast.querySelector('.close-btn').addEventListener('click', () => {
            toast.classList.add('hide');
            setTimeout(() => document.body.removeChild(toast), 500);
        });

        // Remove toast after 3 seconds
        setTimeout(() => {
            toast.classList.add('hide');
            setTimeout(() => document.body.removeChild(toast), 500);
        }, 3000);
    }


    // Add event listener to all toggle switches
    document.addEventListener('change', function(event) {
        if (event.target.matches('.switch input[type="checkbox"]')) {
            if (event.target.checked) {
                showFinansToast('Finance email notifications enabled!');
            } else {
                showFinansToast("Successfully disabled!");
            }
        }
    });

    // Function to fix the "Add User" button in place
    function fixAddButton() {
        const button = document.querySelector(".add-tehe"); // Select the correct button

        if (button) {
            button.style.position = "fixed"; // Ensure it remains fixed
            button.style.top = "10%"; // Keep it at 15% from the top
            button.style.right = "-12px"; // Keep it at the right position
            button.style.zIndex = "1000"; // Ensure it stays above other elements
        }
    }

    // Call fixAddButton initially
    fixAddButton();

    // Observe DOM changes to ensure button remains in place
    const observer = new MutationObserver(() => fixAddButton());
    observer.observe(document.body, {
        childList: true,
        subtree: true
    });
</script>