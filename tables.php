<?php
session_start(); // Biarkan ini di sini
require 'function.php'; // Ini juga memanggil session_start() di dalamnya

if (!isset($_SESSION['log']) || $_SESSION['log'] !== 'True') {
  header('Location: login.php');
  exit();
}

// Tangkap nama proyek dari URL, jika ada
$selected_project_name = $_GET['project'] ?? null; // Variabel ini perlu didefinisikan di awal

// Query dasar untuk mengambil data
$query = "SELECT project_name, signal_name, bay_1, bay_2, bay_3, bay_4, bay_5, bay_6, bay_7, bay_8, bay_9, bay_10, bay_11 FROM projects_data";

// Tambahkan kondisi WHERE jika ada proyek yang dipilih
if ($selected_project_name) {
  // Gunakan prepared statement untuk keamanan
  $query .= " WHERE project_name = ?";
  $stmt = mysqli_prepare($conn, $query . " ORDER BY id DESC");
  mysqli_stmt_bind_param($stmt, "s", $selected_project_name);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  mysqli_stmt_close($stmt); // Tutup statement setelah digunakan
} else {
  // Jika tidak ada proyek yang dipilih, tampilkan semua atau redirect ke halaman pilih proyek
  $query .= " ORDER BY id DESC";
  $result = mysqli_query($conn, $query);
}

if (!$result) {
  die("Query gagal: " . mysqli_error($conn));
}

$data_from_db = [];
while ($row = mysqli_fetch_assoc($result)) {
  $data_from_db[] = $row;
}

// Logika untuk mendapatkan nilai E01 dari baris "Signal" untuk proyek yang TAMPIL SAAT INI
$bay_headers_from_db = array_fill(1, 11, ''); // Default kosong
if (!empty($data_from_db)) {
  foreach ($data_from_db as $data_row) {
    if ($data_row['signal_name'] === 'Signal') {
      for ($i = 1; $i <= 11; $i++) {
        $bay_headers_from_db[$i] = $data_row['bay_' . $i];
      }
      break; // Setelah ditemukan, keluar dari loop
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Tables - Siemens Admin</title>
  <link href="css/styles.css" rel="stylesheet" />
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"
    crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
  <div id="layoutSidenav_content">
    <main>
      <div class="container-fluid">
        <h1 class="mt-4">Tables
          <?php if ($selected_project_name): ?>
            - <?php echo htmlspecialchars($selected_project_name); ?>
          <?php endif; ?>
        </h1>
        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
          <li class="breadcrumb-item active">Tables
            <?php if ($selected_project_name): ?>
              - <?php echo htmlspecialchars($selected_project_name); ?>
            <?php endif; ?>
          </li>
        </ol>

      </div>
    </main>
  </div>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Tables - Siemens Admin</title>
  <link href="css/styles.css" rel="stylesheet" />
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"
    crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Siemens Indonesia</a>
    <button
      class="btn btn-link btn-sm order-1 order-lg-0"
      id="sidebarToggle"
      href="#">
      <i class="fas fa-bars"></i>
    </button>
    <form
      class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input
          class="form-control"
          type="text"
          placeholder="Search for..."
          aria-label="Search"
          aria-describedby="basic-addon2" />
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown">
        <a
          class="nav-link dropdown-toggle"
          id="userDropdown"
          href="#"
          role="button"
          data-toggle="dropdown"
          aria-haspopup="true"
          aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
        <div
          class="dropdown-menu dropdown-menu-right"
          aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Settings</a>
          <a class="dropdown-item" href="#">Activity Log</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="login.php">Logout</a>
        </div>
      </li>
    </ul>
  </nav>

  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="index.php">
              <div class="sb-nav-link-icon">
                <i class="fas fa-tachometer-alt"></i>
              </div>
              Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Interface</div>
            <a
              class="nav-link collapsed"
              href="#"
              data-toggle="collapse"
              data-target="#collapseLayouts"
              aria-expanded="false"
              aria-controls="collapseLayouts">
              <div class="sb-nav-link-icon">
                <i class="fas fa-columns"></i>
              </div>
              Layouts
            </a>
            <div
              class="collapse"
              id="collapseLayouts"
              aria-labelledby="headingOne"
              data-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="layout-static.html">Static Navigation</a>
                <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
              </nav>
            </div>
            <a
              class="nav-link collapsed"
              href="#"
              data-toggle="collapse"
              data-target="#collapsePages"
              aria-expanded="false"
              aria-controls="collapsePages">
              <div class="sb-nav-link-icon">
                <i class="fas fa-book-open"></i>
              </div>
              Pages
            </a>
            <div
              class="collapse"
              id="collapsePages"
              aria-labelledby="headingTwo"
              data-parent="#sidenavAccordion">
              <nav
                class="sb-sidenav-menu-nested nav accordion"
                id="sidenavAccordionPages">
                <a
                  class="nav-link collapsed"
                  href="#"
                  data-toggle="collapse"
                  data-target="#pagesCollapseAuth"
                  aria-expanded="false"
                  aria-controls="pagesCollapseAuth">
                  Authentication
                </a>
                <div
                  class="collapse"
                  id="pagesCollapseAuth"
                  aria-labelledby="headingOne"
                  data-parent="#sidenavAccordionPages">
                  <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="login.php">Login</a>
                    <a class="nav-link" href="register.html">Register</a>
                    <a class="nav-link" href="password.html">Forgot Password</a>
                  </nav>
                </div>
                <a
                  class="nav-link collapsed"
                  href="#"
                  data-toggle="collapse"
                  data-target="#pagesCollapseError"
                  aria-expanded="false"
                  aria-controls="collapsePagesError">
                  Error
                </a>
                <div
                  class="collapse"
                  id="pagesCollapseError"
                  aria-labelledby="headingOne"
                  data-parent="#sidenavAccordionPages">
                  <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="401.html">401 Page</a>
                    <a class="nav-link" href="404.html">404 Page</a>
                    <a class="nav-link" href="500.html">500 Page</a>
                  </nav>
                </div>
              </nav>
            </div>
            <div class="sb-sidenav-menu-heading">Addons</div>
            <a class="nav-link" href="charts.html">
              <div class="sb-nav-link-icon">
                <i class="fas fa-chart-area"></i>
              </div>
              Charts
            </a>
            <a class="nav-link active" href="tables.php">
              <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
              Tables
            </a>
          </div>
        </div>
        <div class="sb-sidenav-footer">
          <div class="small">Logged in as:</div>
          Start Bootstrap
        </div>
      </nav>
    </div>

    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid">
          <h1 class="mt-4">Tables
            <?php if ($selected_project_name): ?>
              - <?php echo htmlspecialchars($selected_project_name); ?>
            <?php endif; ?>
          </h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Tables
              <?php if ($selected_project_name): ?>
                - <?php echo htmlspecialchars($selected_project_name); ?>
              <?php endif; ?>
            </li>
          </ol>

          <div class="mb-3">
            <label for="projectSelector" class="form-label">Pilih Proyek:</label>
            <select id="projectSelector" class="form-control" onchange="if(this.value) window.location.href='tables.php?project=' + this.value;">
              <option value="">-- Tampilkan Semua Proyek --</option>
              <?php
              // Ambil semua nama proyek unik dari database
              $project_query = "SELECT DISTINCT project_name FROM projects_data ORDER BY project_name ASC";
              $project_result = mysqli_query($conn, $project_query);
              if ($project_result) {
                while ($p_row = mysqli_fetch_assoc($project_result)) {
                  $p_name = htmlspecialchars($p_row['project_name']);
                  $selected = ($p_name === $selected_project_name) ? 'selected' : '';
                  echo "<option value='{$p_name}' {$selected}>{$p_name}</option>";
                }
              }
              ?>
            </select>
          </div>
          <div class="card mb-4">
            <div class="card-header">
              <div class="d-flex justify-content-between align-items-center">
                <div class="mr-auto">
                  <i class="fas fa-table mr-1"></i>
                  Data Export
                </div>
                <div class="form-inline">
                  <input
                    type="text"
                    class="form-control form-control-sm mr-2"
                    id="tableSearch"
                    placeholder="Search..." />
                  <button
                    class="btn btn-warning btn-sm"
                    id="exportToExcelBtn">
                    Export To Excel
                  </button>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table
                  class="table table-bordered"
                  id="customTable"
                  width="100%"
                  cellspacing="0">
                  <thead>
                    <tr>
                      <th rowspan="2">Project Name</th>
                      <th rowspan="2">Signal</th>
                      <th colspan="11" class="text-center">Bay</th>
                    </tr>
                    <tr>
                      <?php for ($i = 1; $i <= 11; $i++): ?>
                        <th>
                          <?php
                          // Ambil nilai dari database untuk E01 atau default ke "E0N" jika kosong
                          $display_e = empty($bay_headers_from_db[$i]) ? 'E' . sprintf("%02d", $i) : htmlspecialchars($bay_headers_from_db[$i]);
                          echo $display_e; // Hanya echo nilai E01
                          ?>
                        </th>
                      <?php endfor; ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (!empty($data_from_db)): ?>
                      <?php foreach ($data_from_db as $row): ?>
                        <?php if ($row['signal_name'] !== 'Signal'): // Lewati baris 'Signal' dari tampilan data 
                        ?>
                          <tr>
                            <td><?php echo htmlspecialchars($row['project_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['signal_name']); ?></td>
                            <?php for ($i = 1; $i <= 11; $i++): ?>
                              <?php $bay_value = $row['bay_' . $i]; ?>
                              <td>
                                <?php
                                if ($bay_value === 'on'):
                                  echo 'X'; // Menampilkan 'X' untuk dicentang
                                elseif ($bay_value === 'off'):
                                  echo '-'; // Menampilkan '-' untuk tidak dicentang
                                elseif (empty($bay_value) || $bay_value === '0'):
                                  echo '-'; // Tampilkan '-' untuk nilai yang kosong atau nol
                                else:
                                  echo htmlspecialchars($bay_value); // Ini akan menampilkan nilai lain (seperti "E01" yang masuk ke sel data)
                                endif;
                                ?>
                              </td>
                            <?php endfor; ?>
                          </tr>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    <?php else: ?>
                      <tr>
                        <td colspan="13" class="text-center">No data available. Please add data from the Dashboard.</td>
                      </tr>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </main>
      <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
          <div
            class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Website 2025</div>
            <div>
              <a href="#">Privacy Policy</a>
              &middot;
              <a href="#">Terms &amp; Conditions</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script
    src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>
  <script>
    // JavaScript untuk fungsi pencarian tabel (opsional)
    $(document).ready(function() {
      $("#tableSearch").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#customTable tbody tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
      });

      // Fungsionalitas Export To Excel (sederhana, hanya mengambil data HTML)
      $("#exportToExcelBtn").on("click", function() {
        var table = document.getElementById("customTable");
        var html = table.outerHTML;
        var url = "data:application/vnd.ms-excel," + encodeURIComponent(html);
        var a = document.createElement("a");
        a.href = url;
        a.download = "Tables_Data.xls";
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
      });
    });
  </script>
</body>

</html>