<?php require_once 'layouts/header.php'; ?>
<?php require_once 'layouts/sidebar.php'; ?>

<div class="content gomen skroll">
  <h1 class="title">Terminal</h1>

  <div class="tetris-management">
    <h3>Terminal Slot Management</h3>
    <div class="tetris-form">
      <div class="tetris-field-group">
        <label for="tetris-terminalNo">Terminal No.</label>
        <input type="text" id="tetris-terminalNo" placeholder="000" class="tetris-input-box">
      </div>
      <div class="tetris-field-group">
        <label for="tetris-terminalName">Terminal Name</label>
        <input type="text" id="tetris-terminalName" placeholder="Terminal Name" class="tetris-input-box">
      </div>
      <div class="tetris-field-group">
        <label for="tetris-terminalBank">Terminal Bank</label>
        <select id="tetris-terminalBank" class="tetris-dropdown-menu">
          <option value="BIBD">BIBD - 0000010034340</option>
          <option value="BADURI">BADURI - 0200740441749</option>
        </select>
      </div>
      <div class="tetris-field-group">
        <label for="tetris-branch">Branch</label>
        <select id="tetris-branch" class="tetris-dropdown-menu">
          <option value="threeg">ThreeG Media (Kulai)</option>
          <option value="macaroon">Macaroon</option>
        </select>
      </div>
      <button class="tetris-create-btn" id="addTerminal">Create New Terminal</button>
    </div>
  </div>

  <!-- Table View Container -->
<!-- Table View Container -->
<div class="tetris-table-wrapper">
  <table class="tetris-table">
    <thead>
      <tr>
        <th>Terminal ID</th>
        <th>Terminal Name</th>
        <th>Terminal Bank</th>
        <th>Branch</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody id="terminalTableBody">
      <tr>
        <td>001</td>
        <td>Coffee</td>
        <td>BADURI (0200740441749)</td>
        <td>ThreeG Media (Kulai)</td>
        <td><button class="Details">Details</button></td>
      </tr>
      <tr>
        <td>224</td>
        <td>diff_name</td>
        <td>BIBD (00001010034340)</td>
        <td>ThreeG Media (Kulai)</td>
        <td><button class="Details">Details</button></td>
      </tr>
        <tr>
          <td>300</td>
          <td>POS API</td>
          <td>BIBD (00001010034340)</td>
          <td>ThreeG Media (Kulai)</td>
          <td><button class="Details">Details</button></td>
        </tr>
        <tr>
          <td>400</td>
          <td>Event</td>
          <td>BIBD (00001010034340)</td>
          <td>ThreeG Media (Kulai)</td>
          <td><button class="Details">Details</button></td>
        </tr>
    </tbody>
  </table>
</div>

  </div>
</div>

<!-- Hidden Details Section -->
<div id="teame-detailsSection" style="display: none;">
  <h3>Terminal Details</h3>
  <p><strong>Terminal ID:</strong> <span id="teame-detailTerminalId"></span></p>
  <p><strong>Terminal Name:</strong> <span id="teame-detailTerminalName"></span></p>
  <h4>Phone Number List</h4>
  <ul id="teame-phoneNumberList">
    <li>+673 1234567</li>
    <li>+673 7654321</li>
  </ul>
  <button id="teame-generateQR">Generate QR</button>
  <button id="teame-assignPhone">Assign New Phone</button>
  <span id="teame-closeDetails" class="close">&times;</span>

</div>
</div>

<div id="teame-assignPhoneSection" style="display: none;">
  <h3>Assign New Phone</h3>
  <label for="teame-newPhoneInput">Phone Number:</label>
  <input type="text" id="teame-newPhoneInput" class="tetris-input-box" value="+673 " maxlength="12">
  <button id="teame-addPhone">Add</button>
  <button id="teame-backToDetails">Back</button>

</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("terminalTableBody").addEventListener("click", function(event) {
      if (event.target.classList.contains("Details")) {
        let row = event.target.closest("tr");
        document.getElementById("teame-detailTerminalId").textContent = row.cells[0].textContent;
        document.getElementById("teame-detailTerminalName").textContent = row.cells[1].textContent;

        // Hide everything inside .content except the title
        document.querySelectorAll(".content > *:not(.title)").forEach(el => el.style.display = "none");

        // Show details section
        document.getElementById("teame-detailsSection").style.display = "block";
      }
    });

    document.getElementById("teame-closeDetails").addEventListener("click", function() {
      // Show everything inside .content except the details section
      document.querySelectorAll(".content > *:not(.title)").forEach(el => el.style.display = "block");

      // Hide details section
      document.getElementById("teame-detailsSection").style.display = "none";
    });

    document.getElementById("addTerminal").addEventListener("click", function() {
      let terminalNo = document.getElementById("tetris-terminalNo").value.trim();
      let terminalName = document.getElementById("tetris-terminalName").value.trim();
      let terminalBank = document.getElementById("tetris-terminalBank").options[document.getElementById("tetris-terminalBank").selectedIndex].text;
      let branch = document.getElementById("tetris-branch").options[document.getElementById("tetris-branch").selectedIndex].text;

      if (terminalNo === "" || terminalName === "") {
        alert("Please fill in all fields.");
        return;
      }

      let tableBody = document.getElementById("terminalTableBody");
      let newRow = document.createElement("tr");

      newRow.innerHTML = `
      <td>${terminalNo}</td>
      <td>${terminalName}</td>
      <td>${terminalBank}</td>
      <td>${branch}</td>
      <td><button class="Details">Details</button></td>
    `;

      tableBody.appendChild(newRow);

      // Clear input fields after adding
      document.getElementById("tetris-terminalNo").value = "";
      document.getElementById("tetris-terminalName").value = "";
      document.getElementById("tetris-terminalBank").selectedIndex = 0;
      document.getElementById("tetris-branch").selectedIndex = 0;
    });
  });

  document.addEventListener("DOMContentLoaded", function() {
    const detailsSection = document.getElementById("teame-detailsSection");
    const assignPhoneSection = document.getElementById("teame-assignPhoneSection");

    document.getElementById("terminalTableBody").addEventListener("click", function(event) {
      if (event.target.classList.contains("Details")) {
        let row = event.target.closest("tr");
        document.getElementById("teame-detailTerminalId").textContent = row.cells[0].textContent;
        document.getElementById("teame-detailTerminalName").textContent = row.cells[1].textContent;

        // Hide everything except title and show details section
        document.querySelectorAll(".content > *:not(.title)").forEach(el => el.style.display = "none");
        detailsSection.style.display = "block";
      }
    });

    document.getElementById("teame-closeDetails").addEventListener("click", function() {
      document.querySelectorAll(".content > *:not(.title)").forEach(el => el.style.display = "block");
      detailsSection.style.display = "none";
    });

    document.getElementById("teame-assignPhone").addEventListener("click", function() {
      // Hide details and show assign phone page
      detailsSection.style.display = "none";
      assignPhoneSection.style.display = "block";
    });

    document.getElementById("teame-backToDetails").addEventListener("click", function() {
      // Hide assign phone page and show details page
      assignPhoneSection.style.display = "none";
      detailsSection.style.display = "block";
    });

    document.getElementById("teame-addPhone").addEventListener("click", function() {
      let newPhone = document.getElementById("teame-newPhoneInput").value.trim();
      if (newPhone !== "") {
        let phoneList = document.getElementById("teame-phoneNumberList");
        let newLi = document.createElement("li");
        newLi.textContent = newPhone;
        phoneList.appendChild(newLi);

        // Clear input field
        document.getElementById("teame-newPhoneInput").value = "";

        // Go back to details section after adding phone
        assignPhoneSection.style.display = "none";
        detailsSection.style.display = "block";
      }
    });
  });

  document.getElementById("teame-generateQR").addEventListener("click", function() {
    let videoUrl = "https://www.youtube.com/embed/rrngM9DmDfk?autoplay=1&mute=1";
    let videoPopup = window.open(videoUrl, "_blank", "width=800,height=450");
  });

  document.addEventListener("DOMContentLoaded", function() {
    const phoneInput = document.getElementById("teame-newPhoneInput");
    const addPhoneButton = document.getElementById("teame-addPhone");

    function ensurePrefix() {
      if (!phoneInput.value.startsWith("+673 ")) {
        phoneInput.value = "+673 ";
      }
    }

    // Ensure "+673 " is always present and restrict input
    phoneInput.addEventListener("input", function() {
      let digits = phoneInput.value.replace("+673 ", ""); // Remove prefix to get numbers only

      // Restrict to 7 digits max
      if (digits.length > 7) {
        digits = digits.slice(0, 7);
      }

      // Set formatted value
      phoneInput.value = "+673 " + digits;
    });

    // Prevent removing "+673 "
    phoneInput.addEventListener("keydown", function(e) {
      if (phoneInput.selectionStart < 5 && (e.key === "Backspace" || e.key === "Delete")) {
        e.preventDefault();
      }
    });

    // When clicking "Add", validate and reset for next entry
    addPhoneButton.addEventListener("click", function() {
      let digits = phoneInput.value.replace("+673 ", ""); // Get only the digits


      // Ensure "+673 " is there when opening the section
      document.getElementById("teame-assignPhoneSection").addEventListener("transitionstart", ensurePrefix);
    })
  });

  document.addEventListener("DOMContentLoaded", function() {
    const title = document.querySelector(".title");
    const content = document.querySelector(".content");
    const detailsSection = document.getElementById("teame-detailsSection");
    const assignPhoneSection = document.getElementById("teame-assignPhoneSection");

    function moveTitleOutside() {
      if (!document.querySelector(".title-container")) {
        let titleContainer = document.createElement("div");
        titleContainer.classList.add("title-container");
        titleContainer.appendChild(title);
        content.parentNode.insertBefore(titleContainer, content);
      }
    }

    function returnTitleInside() {
      if (document.querySelector(".title-container")) {
        content.insertBefore(title, content.firstChild);
        document.querySelector(".title-container").remove();
      }
    }

    document.getElementById("terminalTableBody").addEventListener("click", function(event) {
      if (event.target.classList.contains("Details")) {
        moveTitleOutside();
        detailsSection.style.display = "block";
      }
    });

    document.getElementById("teame-closeDetails").addEventListener("click", function() {
      returnTitleInside();
      detailsSection.style.display = "none";
    });

    document.getElementById("teame-assignPhone").addEventListener("click", function() {
      moveTitleOutside();
      detailsSection.style.display = "none";
      assignPhoneSection.style.display = "block";
    });

    document.getElementById("teame-backToDetails").addEventListener("click", function() {
      assignPhoneSection.style.display = "none";
      detailsSection.style.display = "block";
    });

    document.getElementById("teame-addPhone").addEventListener("click", function() {
      let newPhone = document.getElementById("teame-newPhoneInput").value.trim();
      if (newPhone !== "") {
        let phoneList = document.getElementById("teame-phoneNumberList");
        let newLi = document.createElement("li");
        newLi.textContent = newPhone;
        phoneList.appendChild(newLi);

        document.getElementById("teame-newPhoneInput").value = "";
        assignPhoneSection.style.display = "none";
        detailsSection.style.display = "block";
      }
    });
  });
</script>

<?php require_once 'layouts/footer.php'; ?>