<?php require_once 'layouts/header.php'; ?>
<?php require_once 'layouts/sidebar.php'; ?>

<div class="content">
    <h1 class="title">Void</h1>
    <div class="tab-menu">
        <a href="/poshet/stement" class="tab" onclick="setActiveTab(event, 'stement')">Statement</a>
        <a href="/poshet/void" class="tab active" onclick="setActiveTab(event, 'void')">Void</a>
    </div>

    <!-- something -->

    <div class="big-card" style="margin-left: 40px; border-radius: 30px; overflow: hidden;">
        <img src="/poshet/public/images/imag.jpg" alt="Big Card Image" style="width: 100%; height: 500px;">
    </div>

    <?php require_once 'layouts/footer.php'; ?>