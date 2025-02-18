<?php require_once 'layouts/header.php'; ?>
<?php require_once 'layouts/sidebar.php'; ?>

<div class="content gonten skroll">
    <h1 class="title">Integration</h1>

    <!-- body -->

    <div class="intetecards">
        <div class="cardo">
            <h2>General Information</h2>
            <div class="row">
                <div class="intetecolumn">
                    <!-- General Information content here -->
                    <?php
                    // Dummy data for now
                    $brandName = "Coffee Street Cafe";
                    $merchantID = "406988355";
                    ?>
                    <h3>Brand/Business Name</h3>
                    <p><?php echo $brandName; ?></p>
                    <br>
                    <h3>Merchant ID</h3>
                    <p><?php echo $merchantID; ?></p>
                </div>
            </div>
        </div>
        <div class="cardo">
            <h2>Terminals Information</h2>
            <div class="apath">
                <table>
                    <thead>
                        <tr>
                            <th>Terminal No.</th>
                            <th>Terminal Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 1; $i <= 10; $i++): ?>
                            <tr>
                                <td>Terminal <?php echo $i; ?></td>
                                <td>Terminal Name <?php echo $i; ?></td>
                            </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?php require_once 'layouts/footer.php'; ?>

<!-- scripts down here -->