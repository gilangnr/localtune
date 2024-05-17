<?php 
// Koneksi Database
$conn = mysqli_connect("localhost", "root", "", "cloud");

// Registrasi akun
function registrasi($data){
    global $conn;
    $username = strtolower(stripcslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)){
        echo "
        <script>
            alert('Username sudah terdaftar');
        </script>";
        return false;
    }


    // cek konfirmasi password
    if($password !== $password2){
        echo "
        <script>
            alert('Passwordnya berbeda');
        </script>";
        return false;
    }

    // enskripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // masukan ke database
    mysqli_query($conn, "INSERT INTO user (id, username, password, role) VALUES('', '$username', '$password', 'user')");


    return mysqli_affected_rows($conn);

}

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row; 
    }
    return $rows;
}

function filterAndSearch($genre, $keyword){
    $genreCondition = ($genre !== "all") ? "genre = '$genre' AND" : ""; // Jika genre bukan 'all', tambahkan kondisi genre ke query
    $query = "SELECT * FROM data_music WHERE $genreCondition (title LIKE '%$keyword%' OR band LIKE '%$keyword%')";
    return query($query);
}


function tambah($data){
    global $conn;

    $band = htmlspecialchars($data["band"]);
    $title = htmlspecialchars($data["title"]);
    $genre = htmlspecialchars($data["genre"]);

    // gambar
    $photo = uploadPhoto();
    if(!$photo){
        return false;
    }

    // musik
    $song = uploadSong();
    if(!$song){
        return false;
    }

    $query = "INSERT INTO data_music VALUES ('', '$band', '$title', '$genre', '$photo', '$song')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function uploadPhoto(){
    $namaFile = $_FILES['photo']['name'];
    $ukuranFile = $_FILES['photo']['size'];
    $error = $_FILES['photo']['error'];
    $tmpName = $_FILES['photo']['tmp_name'];

     // cek upload gambar
     if($error === 4) {
        echo "<script> alert('Pilih Gambar Terlebih Dahulu'); </script>";
        return false;
    }
    // cek ekstensi
    $ekstentiGambarValid = ['jpg', 'png', 'jpeg'];
    $ekstentiGambar = explode('.', $namaFile);
    $ekstentiGambar = strtolower(end($ekstentiGambar));
    if(!in_array($ekstentiGambar, $ekstentiGambarValid)){
        echo "<script> alert('Yang anda upload bukan Gambar'); </script>";
        return false;
    }
    // cek ukuran
    if($ukuranFile > 1000000){
        echo "<script> alert('ukuran gambar terlalu besar'); </script>";
        return false;
    }
    // lolos cek
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstentiGambar;
    move_uploaded_file($tmpName, '../img/band/' . $namaFileBaru);

    return $namaFileBaru;
}

function uploadSong(){
    $namaFile = $_FILES['song']['name'];
    $ukuranFile = $_FILES['song']['size'];
    $error = $_FILES['song']['error'];
    $tmpName = $_FILES['song']['tmp_name'];

     // cek upload musik
     if($error === 4) {
        echo "<script> alert('Pilih Musik Terlebih Dahulu'); </script>";
        return false;
    }
    // cek ekstensi
    $ekstentiMusikValid = ['mp3', 'm4a', 'wav'];
    $ekstentiMusik = explode('.', $namaFile);
    $ekstentiMusik = strtolower(end($ekstentiMusik));
    if(!in_array($ekstentiMusik, $ekstentiMusikValid)){
        echo "<script> alert('Yang anda upload bukan Gambar'); </script>";
        return false;
    }
    // generate nama baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstentiMusik;
    move_uploaded_file($tmpName, '../musik/' . $namaFileBaru);

    return $namaFileBaru;
}

function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM data_music WHERE id_music = $id");
    return mysqli_affected_rows($conn);
}
?>