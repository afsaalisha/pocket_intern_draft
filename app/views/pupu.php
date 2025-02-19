<?php require_once 'layouts/header.php'; ?>
<?php require_once 'layouts/sidebar.php'; ?>

<div class="content">
    <h1 class="title">Generate New Payment Links</h1>
    <p class="description">Here you can manage your payment links, view details, and add new links easily.</p>

    <div class="payment-container">
    <h2>Select a Terminal</h2>
    <form method="POST" action="pans">
    <label for="terminal" class="gahlabel">Choose a Terminal:</label>
    <select id="terminal" name="terminal" class="terminal-dropdown">
        <option>Coffee</option>
        <option>Tea</option>
        <option>Juice</option>
    </select>

    <h2>Enter Redirect Link</h2>
    <label for="redirect" class="gahlabel">Redirect URL:</label>
    <div class="redirect-input-container">
        <input type="text" id="https" class="https-input" value="https://" readonly>
        <input type="text" id="redirect" name="redirect" class="redirect-input" placeholder="example.com" required>
    </div>

    <div class="button-group">
        <button type="submit" class="btn btn-generate">Generate Link</button>
        <button type="button" class="btn btn-back" onclick="window.history.back()">Go Back</button>
    </div>
</form>
</div>
<script>
    
</script>
