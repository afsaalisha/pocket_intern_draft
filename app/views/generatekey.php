<?php
// Start session if needed
session_start();

// Function to generate a random API key
function generateApiKey()
{
    return bin2hex(random_bytes(16)); // Generates a 32-character random key
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $terminal = $_POST['terminal'] ?? 'Unknown Terminal';
    $newKey = generateApiKey();

    // Store in session or database (for now, using session)
    $_SESSION['generated_key'] = [
        'terminal' => $terminal,
        'key' => $newKey
    ];
}
?>
<?php require_once 'layouts/header.php'; ?>
<?php require_once 'layouts/sidebar.php'; ?>

<div class="content skroll">
    <h1 class="title">Generate New Key</h1>

    <?php if (isset($_SESSION['generated_key'])): ?>
        <p class="kiz-subtitle">Terminal: <strong><?= htmlspecialchars($_SESSION['generated_key']['terminal']) ?></strong></p>
        <p class="kiz-description">Your new API key is:</p>
        <div class="kiz-key-box">
            <code><?= htmlspecialchars($_SESSION['generated_key']['key']) ?></code>
        </div>
        <p class="kiz-warning">⚠️ Please copy and store this key safely. You will not be able to retrieve it again.</p>
    <?php else: ?>
        <p class="kiz-error">No key generated. Please go back and try again.</p>
    <?php endif; ?>

    <a href="/poshet/keys" class="kiz-btn-primary">Back to Manage Keys</a>
</div>


<?php require_once 'layouts/footer.php'; ?>

<!-- scripts go below here -->