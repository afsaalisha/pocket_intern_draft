<?php require_once 'layouts/header.php'; ?>
<?php require_once 'layouts/sidebar.php'; ?>

<div class="content goku">
    <h1 class="title">Finances</h1>
    <span class="pepep">Report Emails</span>
    <span class="add-tehe" id="openModal"><i class="fa-solid fa-plus"></i> Add User</span>

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
                <th>No.</th>
                <th>Email</th>
                <th>Branch</th>
                <th>Send Finance Email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>testmail@mail.com</td>
                <td>ThreeG Media (Kiulap)</td>
                <td>            <label class="switch">
                <input type="checkbox">
                <span class="slider"></span>
                </label></td>
            </tr>
            <tr>
                <td>2</td>
                <td>user8@testing.com</td>
                <td>Macaroon</td>
                <td><label class="switch">
                <input type="checkbox">
                <span class="slider"></span>
                </label></td>
            </tr>
            <tr>
                <td>3</td>
                <td>user9@testing.com</td>
                <td>Macaroon</td>
                <td>            <label class="switch">
                <input type="checkbox">
                <span class="slider"></span>
                </label></td>
            </tr>
        </tbody>
    </table>
</div>

<!-- <div class="content skroll">
    <h1 class="title">Finances</h1>
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
            <th>No.</th>
            <th>Email</th>
            <th>Branch</th>
            <th>Send Finance Email</th>
        </tr>
    </thead>
    <tbody id="userTableBody">
        <tr>
            <td>1</td>
            <td>testmail@mail.com</td>
            <td>ThreeG Media (Kiulap)</td>
            <td>
                <button class="deactivate" onclick="toggleActivation(this, this.closest('tr'))">Deactivate</button>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>user8@testing.com</td>
            <td>Macaroon</td>
            <td>
                <button class="activate" onclick="toggleActivation(this, this.closest('tr'))">Activate</button>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>user9@testing.com</td>
            <td>Macaroon</td>
            <td>
                <button class="activate" onclick="toggleActivation(this, this.closest('tr'))">Activate</button>
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

continue here 18-2-2025 -->
<!-- Modal -->
<!-- <div id="userModal" class="modal" style="display:none;">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2>Add User</h2>
        </div>
        <label>Email Address 1</label>
        <input type="text" id="sum"><br>
        <label>Email Address 2</label>
        <input type="email" id="ting"><br>
        <label>Phone Number:</label>
        <input type="text" id="phone"><br>
        <label>Branch:</label>
        <div class="dropdown-wrapper">
            <select id="branch">
                <option value="" disabled selected>Select Branch</option>
                <option value="ThreeG Media (Kiulap)">ThreeG Media (Kiulap)</option>
                <option value="Macaroon">Macaroon</option>
            </select>
        </div>
        <div class="modal-footer">
            <button id="saveUser">Save</button>
        </div>
    </div>
</div>


Permissions Modal -->
<div id="permissionsModal" class="modal" style="display:none;">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close" onclick="closePermissionsModal()">&times;</span>
            <h2>Permissions</h2>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Page</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="checkbox"> Statement</td>
                </tr>
                <tr>
                    <td><input type="checkbox"> Terminal</td>
                </tr>
                <tr>
                    <td><input type="checkbox"> Settings</td>
                </tr>
                <tr>
                    <td><input type="checkbox"> Finance</td>
                </tr>
                <tr>
                    <td><input type="checkbox"> Deals</td>
                </tr>
                <tr>
                    <td><input type="checkbox"> Rent to Own</td>
                </tr>
                <tr>
                    <td><input type="checkbox"> Membership</td>
                </tr>
                <tr>
                    <td><input type="checkbox"> Gifts</td>
                </tr>
            </tbody>
        </table>
        <div class="modal-footer">
            <button class="update-permission">Update permission</button>
        </div>
    </div>
</div>
<?php require_once 'layouts/footer.php'; ?> 

<!-- scripts here -->