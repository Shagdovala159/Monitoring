<?php


function fetchCamFromDatabase() {
    // Koneksi ke database MySQL Anda
    // Baca file .env
    $env = parse_ini_file('.env');

    // Mendapatkan nilai dari variabel-variabel yang didefinisikan di .env
    $host = $env['DB_HOST'];
    $username = $env['DB_USERNAME'];
    $password = $env['DB_PASSWORD'];
    $database = $env['DB_DATABASE'];

    // Koneksi ke database MySQL Anda
    $koneksi = mysqli_connect($host, $username, $password, $database);

    if (!$koneksi) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }

    // Query untuk mengambil data dari tabel MySQL
    global $query; 
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Error dalam mengambil data: " . mysqli_error($koneksi));
    }

    $data = array();
    $a = 0;
    $b = 0;
    $c = 0;
    $d = 0;

    // Loop untuk menampilkan data dalam format tabel HTML
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['Lokasi'] == 'Camera 1') {
            $a++;
        }
        if ($row['Lokasi'] == 'Camera 2') {
            $b++;
        }
        if ($row['Lokasi'] == 'Camera 3') {
            $c++;
        }
        if ($row['Lokasi'] == 'Camera 4') {
            $d++;
        }
    }
    $data[] = array(
        'cam1' => $a,
        'cam2' => $b,
        'cam3' => $c,
        'cam4' => $d,
    );
    
    // Tutup koneksi database
    mysqli_close($koneksi);

    return $data;
}

function fetchDataFromDatabase() {
    // Koneksi ke database MySQL Anda
    // Baca file .env
    $env = parse_ini_file('.env');

    // Mendapatkan nilai dari variabel-variabel yang didefinisikan di .env
    $host = $env['DB_HOST'];
    $username = $env['DB_USERNAME'];
    $password = $env['DB_PASSWORD'];
    $database = $env['DB_DATABASE'];

    // Koneksi ke database MySQL Anda
    $koneksi = mysqli_connect($host, $username, $password, $database);

    if (!$koneksi) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }

    // Query untuk mengambil data dari tabel MySQL
    global $query;
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Error dalam mengambil data: " . mysqli_error($koneksi));
    }

    $data = array();
    $a = 1;

    // Loop untuk menampilkan data dalam format tabel HTML
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = array(
            'id' => $a,
            'tanggal' => $row['Tanggal'],
            'waktu' => $row['Waktu'],
            'lokasi' => $row['Lokasi'],
            'bukti' => $row['Bukti'],
        );
        ++$a;
    }

    // Tutup koneksi database
    mysqli_close($koneksi);

    return $data;
}

function fetchDataRange($start_date, $end_date) {
    // Koneksi ke database MySQL Anda
    // Baca file .env
    $env = parse_ini_file('.env');

    // Mendapatkan nilai dari variabel-variabel yang didefinisikan di .env
    $host = $env['DB_HOST'];
    $username = $env['DB_USERNAME'];
    $password = $env['DB_PASSWORD'];
    $database = $env['DB_DATABASE'];

    // Koneksi ke database MySQL Anda
    $koneksi = mysqli_connect($host, $username, $password, $database);

    if (!$koneksi) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }

    // Query untuk mengambil data dari tabel MySQL
    $range = "SELECT * FROM data WHERE Tanggal BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC";
    $result = mysqli_query($koneksi, $range);

    if (!$result) {
        die("Error dalam mengambil data: " . mysqli_error($koneksi));
    }

    $data = array();
    $a = 1;

    // Loop untuk menampilkan data dalam format tabel HTML
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = array(
            'id' => $a,
            'tanggal' => $row['Tanggal'],
            'waktu' => $row['Waktu'],
            'lokasi' => $row['Lokasi'],
            'bukti' => $row['Bukti'],
        );
        ++$a;
    }

    // Tutup koneksi database
    mysqli_close($koneksi);

    return $data;
}
function fetchCamRange($start_date, $end_date) {
    // Koneksi ke database MySQL Anda
    // Baca file .env
    $env = parse_ini_file('.env');

    // Mendapatkan nilai dari variabel-variabel yang didefinisikan di .env
    $host = $env['DB_HOST'];
    $username = $env['DB_USERNAME'];
    $password = $env['DB_PASSWORD'];
    $database = $env['DB_DATABASE'];

    // Koneksi ke database MySQL Anda
    $koneksi = mysqli_connect($host, $username, $password, $database);

    if (!$koneksi) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }

    // Query untuk mengambil data dari tabel MySQL
    $range = "SELECT * FROM data WHERE Tanggal BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC";
    $result = mysqli_query($koneksi, $range);

    if (!$result) {
        die("Error dalam mengambil data: " . mysqli_error($koneksi));
    }

    $data = array();
    $a = 0;
    $b = 0;
    $c = 0;
    $d = 0;

    // Loop untuk menampilkan data dalam format tabel HTML
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['Lokasi'] == 'Camera 1') {
            $a++;
        }
        if ($row['Lokasi'] == 'Camera 2') {
            $b++;
        }
        if ($row['Lokasi'] == 'Camera 3') {
            $c++;
        }
        if ($row['Lokasi'] == 'Camera 4') {
            $d++;
        }
    }
    $data[] = array(
        'cam1' => $a,
        'cam2' => $b,
        'cam3' => $c,
        'cam4' => $d,
    );
    
    // Tutup koneksi database
    mysqli_close($koneksi);

    return $data;
}

global $query;
$query = "SELECT * FROM data ORDER BY id DESC";
?>
