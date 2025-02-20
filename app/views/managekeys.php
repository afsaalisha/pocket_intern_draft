<?php
session_start();
?>
<?php require_once 'layouts/header.php'; ?>
<?php require_once 'layouts/sidebar.php'; ?>

<div class="content skroll">
    <h2 class="title">Generate New Keys</h2>
    <p class="kiz-description">You may create a new key pair for each terminal you have.</p>

    <form method="POST" action="/poshet/generatekey">
        <label for="kizterminal" class="kiz-subtitle">Select which terminal you would like to generate keys for:</label>
        <br>
        <div class="kiz-form">
            <select name="kizterminal" id="kizterminal" class="kiz-dropdown-menu" required>
                <option value="">Select option...</option>
                <option value="Terminal 1">Terminal 1</option>
                <option value="Terminal 2">Terminal 2</option>
            </select>

            <div class="botons">
                <button type="submit" class="kiz-btn-primary">Generate</button>
            </div>
            <div class="botons">
                <a href="/poshet/keys">
                    <button type="button" class="kiz-btn-secondary">Back</button>
                </a>
            </div>


        </div>
    </form>

    <?php if (isset($_SESSION['generated_key'])): ?>
        <!-- <div class="kiz-alert">
            ✅ Key for <strong><?= htmlspecialchars($_SESSION['generated_key']['kizterminal']) ?></strong> has been generated successfully.
        </div> -->
    <?php
        // Clear session key after displaying
        unset($_SESSION['generated_key']);
    endif;
    ?>
</div>

<?php require_once 'layouts/footer.php'; ?>

<!-- scripts go below here -->