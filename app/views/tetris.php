<?php require_once 'layouts/header.php'; ?>
<?php require_once 'layouts/sidebar.php'; ?>

<div class="content gomen">
  <h1 class="title">Terminal</h1>

  <div class="terminal-management">
    <h3>Terminal Slot Management</h2>
    <div class="terminal-form">
      <div class="field-group">
        <label for="terminalNo">Terminal No.</label>
        <input type="text" id="terminalNo" placeholder="000" class="input-box">
      </div>
      <div class="field-group">
        <label for="terminalName">Terminal Name</label>
        <input type="text" id="terminalName" placeholder="Terminal Name" class="input-box">
      </div>
      <div class="field-group">
        <label for="terminalBank">Terminal Bank</label>
        <select id="terminalBank" class="dropdown-menu">
          <option>BIBD - 0000010034340</option>
        </select>
      </div>
      <div class="field-group">
        <label for="branch">Branch</label>
        <select id="branch" class="dropdown-menu">
          <option>ThreeG Media (Kulai)</option>
        </select>
      </div>
      <button class="create-btn">Create New Terminal</button>
    </div>
  </div>

  <?php
  $terminalNo = '001';
  $terminalName = 'Coffee - BADURI';
  $phones = [
      ['phone' => 'Phone 1', 'number' => '+673 734747'],
      ['phone' => 'Phone 2', 'number' => '+673 3851076'],
      ['phone' => 'Phone 3', 'number' => '+673 7232999'],
      ['phone' => 'Phone 4', 'number' => '+673 8100001'],
      ['phone' => 'Phone 5', 'number' => '+673 8100002'],
      ['phone' => 'Phone 6', 'number' => '+673 8227015'],
      ['phone' => 'Phone 7', 'number' => '+673 8100003'],
      ['phone' => 'Phone 8', 'number' => '+673 7209630'],
  ];
  ?>

  <div class="terminal-details">
    <h3>Terminal No: <?php echo $terminalNo; ?> - <?php echo $terminalName; ?> (2020040404749)</h3>
    <div class="phone-table">
      <table>
        <thead>
          <tr>
            <th>Phone</th>
            <th>Number</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($phones as $phone) { ?>
            <tr>
              <td><?php echo $phone['phone']; ?></td>
              <td><?php echo $phone['number']; ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <div class="action-buttons">
      <button class="qr-btn">QR</button>
      <button class="assign-btn">Assign New Phone</button>
    </div>
  </div>
</div>

<?php require_once 'layouts/footer.php'; ?>