<?php
// Pastikan tidak ada spasi kosong, baris baru, atau karakter lain sebelum tag pembuka PHP ini.

// Hapus baris-baris ini setelah debugging selesai di lingkungan produksi
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Pastikan path ke function.php sudah benar (naik satu level direktori)
require '../function.php';

header('Content-Type: application/json'); // Penting: Memberi tahu browser bahwa respons adalah JSON

$response = ['success' => false, 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data POST mentah (raw JSON)
    $json_data = file_get_contents('php://input');
    $data = json_decode($json_data, true);

    // Periksa apakah parsing JSON berhasil
    if (json_last_error() !== JSON_ERROR_NONE) {
        $response['message'] = 'JSON tidak valid diterima. Error: ' . json_last_error_msg();
        echo json_encode($response);
        exit();
    }

    $projectName = $data['projectName'] ?? '';
    $tableData = $data['tableData'] ?? [];

    if (empty($projectName)) {
        $response['message'] = 'Nama Proyek wajib diisi.';
        echo json_encode($response);
        exit();
    }

    if (empty($tableData)) {
        $response['message'] = 'Tidak ada data tabel yang diterima.';
        echo json_encode($response);
        exit();
    }

    $all_inserts_successful = true; // Flag untuk melacak keberhasilan semua insert

    foreach ($tableData as $rowData) {
        $signalName = $rowData['signal'] ?? '';

        if (empty($signalName)) {
            // Lewati baris tanpa nama sinyal atau tangani sebagai kesalahan jika diperlukan
            continue;
        }

        $bayValues = [];
        for ($i = 1; $i <= 11; $i++) {
            $bayKey = 'Bay ' . $i;
            $bayValues[$i] = $rowData['bays'][$bayKey] ?? '';
        }

        // Gunakan prepared statement untuk mencegah injeksi SQL
        $stmt = mysqli_prepare($conn, "INSERT INTO projects_data (project_name, signal_name, bay_1, bay_2, bay_3, bay_4, bay_5, bay_6, bay_7, bay_8, bay_9, bay_10, bay_11) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        if ($stmt) {
            // "sssssssssssss" mengikat 13 parameter sebagai string
            mysqli_stmt_bind_param(
                $stmt,
                "sssssssssssss",
                $projectName,
                $signalName,
                $bayValues[1],
                $bayValues[2],
                $bayValues[3],
                $bayValues[4],
                $bayValues[5],
                $bayValues[6],
                $bayValues[7],
                $bayValues[8],
                $bayValues[9],
                $bayValues[10],
                $bayValues[11]
            );

            if (!mysqli_stmt_execute($stmt)) {
                $response['success'] = false;
                $response['message'] = 'Error saat menyisipkan data untuk sinyal ' . $signalName . ': ' . mysqli_error($conn);
                $all_inserts_successful = false;
                break; // Berhenti pada kesalahan pertama
            }
            mysqli_stmt_close($stmt);
        } else {
            $response['success'] = false;
            $response['message'] = 'Persiapan pernyataan database gagal: ' . mysqli_error($conn);
            $all_inserts_successful = false;
            break; // Berhenti pada kesalahan pertama
        }
    }

    if ($all_inserts_successful) {
        $response['success'] = true;
        $response['message'] = 'Semua data berhasil ditambahkan!';
    }
} else {
    $response['message'] = 'Metode permintaan tidak valid.';
}

echo json_encode($response);
// Penting: Pastikan tidak ada spasi kosong, baris baru, atau karakter lain setelah tag penutup PHP ini.
// Atau, untuk keamanan lebih baik, hilangkan tag penutup PHP jika file hanya berisi kode PHP.
