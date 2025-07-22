/*!
 * Start Bootstrap - SB Admin v6.0.2 (https://startbootstrap.com/template/sb-admin)
 * Copyright 2013-2020 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
 */
(function ($) {
  "use strict";

  // Add active state to sidebar nav links
  var path = window.location.href;
  $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function () {
    if (this.href === path) {
      $(this).addClass("active");
    }
  });

  // Toggle the side navigation
  $("#sidebarToggle").on("click", function (e) {
    e.preventDefault();
    $("body").toggleClass("sb-sidenav-toggled");
  });

  // KODE TOGGLE SWITCH DAN FUNGSI BARU DIMULAI DI SINI
  // Di dalam $(document).ready(function () { ... });
  $(document).ready(function () {
    // ... (kode yang sudah ada) ...

    // Fungsionalitas Filter Signal pada Dashboard (index.php)
    $("#FilterTable").on("keyup", function () {
      // PASTIKAN ID INI BENAR
      var filterValue = $(this).val().toLowerCase();

      // Targetkan tabel inputDataTable
      $("#inputDataTable tbody tr").each(function () {
        var $row = $(this);
        var signalName = $row.find("td:first").text().toLowerCase();

        if (signalName.length > 0) {
          // Pastikan baris memiliki nama sinyal
          $row.toggle(signalName.indexOf(filterValue) > -1);
        }
      });
    });

    // Memberikan event listener klik menggunakan event delegation pada body.
    $("body").on("click", ".toggle-switch", function (e) {
      e.stopPropagation(); // Hentikan event agar tidak menyebar ke elemen induk

      var $this = $(this);
      var status = $this.data("status");

      if (status === "off") {
        $this.addClass("on");
        $this.data("status", "on"); // Update data status
      } else {
        $this.removeClass("on");
        $this.data("status", "off"); // Update data status
      }
    });

    // Fungsionalitas tombol "ADD" seluruh data
    $("#addAllDataBtn").on("click", function () {
      console.log("Tombol ADD diklik!");

      var projectName = $("#inputProject").val();
      if (!projectName) {
        alert("Please enter a Project Name.");
        return; // Hentikan eksekusi jika nama project kosong
      }

      var tableData = [];
      $(".table tbody tr").each(function () {
        var rowData = {};
        // Ambil nama sinyal dari sel pertama baris
        var signalName = $(this).find("td:first").text().trim();
        if (signalName) {
          // Hanya proses baris yang memiliki nama sinyal
          rowData.signal = signalName;
          rowData.bays = {};

          // Lewati kolom Signal (td:first)
          // Mengambil dari Bay 1 hingga Bay 11 (slice(1, 12) atau dari index 1 hingga sebelum index 12)
          $(this)
            .find("td")
            .slice(1, 12)
            .each(function (index) {
              var bayNumber = index + 1; // Bay 1, Bay 2, dst.
              var bayValue;

              var $input = $(this).find("input");
              var $toggleSwitch = $(this).find(".toggle-switch");

              if ($input.length > 0) {
                // Jika ini input teks
                bayValue = $input.val();
              } else if ($toggleSwitch.length > 0) {
                // Jika ini toggle switch
                bayValue = $toggleSwitch.data("status"); // 'on' atau 'off'
              } else {
                bayValue = $(this).text().trim(); // Fallback jika ada sel kosong atau teks biasa
              }
              rowData.bays["Bay " + bayNumber] = bayValue;
            });
          tableData.push(rowData);
        }
      });
      console.log("Data to send:", {
        projectName: projectName,
        tableData: tableData,
      }); // Untuk debugging

      // Kirim data ke backend menggunakan AJAX
      $.ajax({
        url: "api/save_data.php", // Pastikan path ini benar relatif terhadap index.php
        method: "POST",
        data: JSON.stringify({
          projectName: projectName,
          tableData: tableData,
        }),
        contentType: "application/json", // Penting untuk memberi tahu server bahwa kita mengirim JSON
        dataType: "json", // Memberitahu jQuery untuk mengharapkan respons JSON
        success: function (response) {
          if (response.success) {
            alert(response.message);
            // Opsional: Reset form atau refresh bagian tabel
            $("#inputProject").val(""); // Clear project name
            // Reset semua toggle ke 'off'
            $(".toggle-switch.on").removeClass("on").data("status", "off");
            // Kosongkan semua input teks di tabel
            $('.table tbody input[type="text"]').val("");

            // Arahkan ke tables.php setelah berhasil menyimpan
            window.location.href = "tables.php";
          } else {
            alert("Error: " + response.message);
            if (response.errors) {
              console.error("Backend errors:", response.errors);
            }
          }
        },
        error: function (xhr, status, error) {
          // Menampilkan respons teks dari server untuk debugging lebih lanjut
          console.error("AJAX Error Status:", status);
          console.error("AJAX Error:", error);
          console.error("Response Text:", xhr.responseText);
          alert(
            "AJAX Error: Could not connect to server or parse response. Check console for details."
          );
        },
      });
    });
  });
  // KODE TOGGLE SWITCH DAN FUNGSI BARU BERAKHIR DI SINI
})(jQuery);
