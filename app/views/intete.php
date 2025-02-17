<?php require_once 'layouts/header.php'; ?>
<?php require_once 'layouts/sidebar.php'; ?>

<div class="content skroll">
    <h1 class="title">Integration</h1>
</div>

<!-- body -->

<div class="cards" style="display: flex; flex-direction: column; align-items: center; padding-left: 260px; margin-top: 100px; width: 90%; gap: 20px;">
    <div class="card" style="width: 90%;">
        <h2 style="background-color: rgba(255, 127, 0, 0.1);">General Information</h2>
        <div class="row">
            <div class="column">
                <!-- General Information content here -->
            </div>
        </div>
    </div>
    <div class="card" style="width: 90%;">
        <h2 style="background-color: rgba(255, 127, 0, 0.1);">Terminals Information</h2>
        <div class="row">
            <div class="column">
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