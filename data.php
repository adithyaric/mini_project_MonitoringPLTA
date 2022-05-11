<?php include "koneksi.php";

$return_array = array();

$query = "SELECT * FROM tb_grafik ORDER BY id ASC";

$result = mysqli_query($koneksiMonitoring, $query);

while ($row = mysqli_fetch_array($result)) {
    $id = $row['id'];
    $created_at = $row['created_at'];
    $tegangan = $row['tegangan'];
    $arus_sebelum_bc = $row['arus_sebelum_bc'];
    $arus_sebelum_ca = $row['arus_sebelum_ca'];
    $kecepatan_angin = $row['kecepatan_angin'];
    $intensitas = $row['intensitas_cahaya'];

    $return_array[] = array(
        "created_at" => $created_at,
        "tegangan" => $tegangan,
        "arus_sebelum_bc" => $arus_sebelum_bc,
        "arus_sebelum_ca" => $arus_sebelum_ca,
        "kecepatan_angin" => $kecepatan_angin,
        "intensitas" => $intensitas,
    );
}

// Encoding array in JSON Format
echo json_encode($return_array, JSON_NUMERIC_CHECK);