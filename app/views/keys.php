<?php require_once 'layouts/header.php'; ?>
<?php require_once 'layouts/sidebar.php'; ?>

<div class="kiz-content skroll">
    <h1 class="title">Manage Keys</h1>
    <p class="kiz-subtitle">View and generate your own API keys</p>
    <p class="kiz-description">Manage the API keys and salt for web payment integration usage</p>

    <div class="kiz-api-header">
        <a href="/poshet/managekeys"><button class="kiz-btn">Generate New Keys</button></a>
    </div>

    <table class="kiz-api-table">
        <thead>
            <tr>
                <th>Terminal</th>
                <th>API Salt</th>
                <th>API Key</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $keys = [
                ['Coffee', 'p83917lHw9773HHEup646mvf5...', '4uYvKNj...'],
                ['Cococart', 'o83917lHw1773TYHup646mvf5...', 'jGLifisj...'],
                ['Blanja', 'd83917lHw9771THEup646mvf5...', 'zj6eGSVG...'],
                ['Spotify API', 'c83917lHw9713HTEup646mvf5...', 'sT5FFiYVU...'],
                ['Payment_Link', 'k83917lHw9173HHTup646mvf5...', '2ANOmfYwu...'],
                ['Takeapp API', 'm83917lHw9173HKWup046mvf5...', 'kyBrxjXZ0...'],
                ['POS API', 'r83989lHw9173UQEup646mvP5...', 'MqB18i46...'],
                ['Chatdaddy API', 'c83917lHw9173EMEup646mvf5...', 'EYHoVJwfA...'],
            ];

            foreach ($keys as $key) {
                echo "<tr>
                        <td>{$key[0]}</td>
                        <td>{$key[1]}</td>
                        <td>{$key[2]}</td>
                        <td>
                            <a href=\"/poshet/liatkey\"><button class='kiz-btn-view'><i class='fa fa-eye'></i> View</button></a>
                        </td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>
</div>


<?php require_once 'layouts/footer.php'; ?>

<!-- scripts go below here -->