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
                    ['Data 1.1', 'Data 1.2', '<i class="fa fa-edit"></i>']
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
                    ['Data 2.1', 'Data 2.2', '<i class="fa fa-edit"></i>']
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
                    ['Data 3.1', 'Data 3.2', '<i class="fa fa-edit"></i>']
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
    </div>

    <!-- content ends here -->

    <div class="big-card" style="border-radius: 30px; overflow: hidden; position:relative;">
        <img src="/poshet/public/images/imag.jpg" alt="Big Card Image" style="width: 100%; height: 900px; opacity: 0.5;">
    </div>

    <?php require_once 'layouts/footer.php'; ?>

    <!-- style below here, but moved to external css -->

    <!-- scripts below here -->