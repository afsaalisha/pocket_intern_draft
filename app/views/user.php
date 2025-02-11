<?php require_once 'layouts/header.php'; ?>
<?php require_once 'layouts/sidebar.php'; ?>

<div class="content">
    <div class="breadcrumb">
        <span>Settings</span> > <span class="active">Branch User Accounts</span>
    </div>
    <h1 class="title">Settings</h1>
    <div class="tab-menu">
        <a href="/poshet/home" class="tab" onclick="setActiveTab(event, 'home')">Rent To Own Settings</a>
        <a href="/poshet/user" class="tab active" onclick="setActiveTab(event, 'user')">Branch User Accounts</a>
        <span class="add-user"><i class="fa-solid fa-plus"></i> Add User</span>
    </div>

    <div class="table-controls">
        <label class="grah">Show 
            <select>
                <option>10</option>
                <option>25</option>
                <option>50</option>
            </select> Entries
        </label>
        <input type="text" placeholder="Search..." class="search"> 
    </div>
    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Type</th>
                <th>Branch</th>
                <th>Active?</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>bogurt</td>
                <td>testmail@mail.com</td>
                <td>8765432</td>
                <td>Branch Employee</td>
                <td>ThreeG Media (Kiulap)</td>
                <td class="active-status">Yes</td>
                <td>
                    <button class="permissions">Permissions</button>
                    <button class="deactivate" onclick="toggleActivation(this, this.closest('tr'))">Deactivate</button>
                </td>
            </tr>
            <tr>
                <td>Test Adding User</td>
                <td>user8@testing.com</td>
                <td>8152007</td>
                <td>Branch Employee</td>
                <td>Macaroon</td>
                <td class="active-status">No</td>
                <td>
                    <button class="permissions">Permissions</button>
                    <button class="activate" onclick="toggleActivation(this, this.closest('tr'))">Activate</button>
                </td>
            </tr>
            <tr>
                <td>Test User</td>
                <td>user9@testing.com</td>
                <td>8152007</td>
                <td>Branch Employee</td>
                <td>Macaroon</td>
                <td class="active-status">No</td>
                <td>
                    <button class="permissions">Permissions</button>
                    <button class="activate" onclick="toggleActivation(this, this.closest('tr'))">Activate</button>
                </td>
            </tr>
            <tr>
                <td>test_user</td>
                <td>test_user@3gm</td>
                <td>8009000</td>
                <td>Branch Employee</td>
                <td>ThreeG Media (Kiulap)</td>
                <td class="active-status">Yes</td>
                <td>
                    <button class="permissions">Permissions</button>
                    <button class="deactivate" onclick="toggleActivation(this, this.closest('tr'))">Deactivate</button>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="table-footer">
        <span>Showing 1 to 4 of 4 entries</span>
        <div class="pagination">
            <button>Previous</button>
            <span>1</span>
            <button class="babanana">Next</button>
        </div>
    </div>
</div>

<?php require_once 'layouts/footer.php'; ?>

<script>
    function toggleActivation(button, row) {
        const statusCell = row.querySelector('.active-status');
        
        if (button.classList.contains('activate')) {
            button.classList.remove('activate');
            button.classList.add('deactivate');
            button.textContent = 'Deactivate';
            statusCell.textContent = 'Yes';
        } else {
            button.classList.remove('deactivate');
            button.classList.add('activate');
            button.textContent = 'Activate';
            statusCell.textContent = 'No';
        }
    }
</script>
