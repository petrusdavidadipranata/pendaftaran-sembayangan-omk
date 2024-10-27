<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    header('Content-Type: application/json'); // Menetapkan header JSON
    
    $nama = $_POST['nama'];
    $stasi = $_POST['stasi'];
    $pesan = $_POST['pesan'];

    // URL Google Apps Script
    $url = "https://script.google.com/macros/s/AKfycbzDxXxcbEoYyBj6dmWpPkSZgGM9BmapWaOEWThw3pvDqKRlxiz11uFVAFjigzgTMIQKYA/exec";

    $data = [
        'nama' => $nama,
        'stasi' => $stasi,
        'pesan' => $pesan,
    ];

    // Inisialisasi CURL
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($http_code === 302 && $response) {
        echo json_encode([
            'success' => true,
            'message' => 'Data berhasil dikirim!'
        ]);
    } else {
        echo json_encode([
            'success' => true,
            'message' => 'Data gagal dikirim'. $response,
            'href' => './success.php',
        ]);
    }
    exit; // Hentikan proses PHP agar HTML tidak dieksekusi setelah respons JSON
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Pendaftaran Sembayangan OMK</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #4a00e0, #8e2de2);
        }

        .my-confirm-button {
            background-color: #43cea2 !important; /* Warna hijau untuk konfirmasi */
            color: black !important;
        }
        .my-deny-button {
            background-color: #6a11cb !important; 
            color: white !important;
        }

        .form-container {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            padding: 1rem;
        }

        .title-section {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: #ffffff;
            border-radius: 15px;
        }

        .input-group {
            border: 2px solid #6a11cb;
            transition: border-color 0.3s;
        }

        .input-group:focus-within {
            border-color: #2575fc;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .input-group input{
            border: 1px;
            outline: none;
            padding: 0.8rem 1rem;
            font-size: 1rem;
            transition: background-color 0.3s;
        }

        .submit-btn {
            background: linear-gradient(to right, #43cea2, #185a9d);
            color: #ffffff;
            transition: transform 0.2s ease-in-out;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body class="flex items-center min-h-screen">
    <div class="container mx-auto max-w-lg p-4">
        <div class="form-container p-6 sm:p-8">
            <div class="title-section p-4 text-center mb-8">
                <h2 class="text-2xl sm:text-xl  font-semibold mb-2">Form Pendaftaran Sembayangan OMK</h2>
                <hr>
                <p class="text-sm sm:text-base mt-2">"Bersinar di Dunia: Menjadi Terang Kristus bagi Sesama"</p>
            </div>
            <form id="pendaftaranForm" method="POST" class="space-y-4 sm:space-y-6">
                <div class="input-group rounded-lg p-4 sm:p-6 mb-4 shadow-sm">
                    <label for="nama" class="block text-gray-700 font-medium mb-1">Nama Lengkap:</label>
                    <input type="text" class="form-control w-full p-2 rounded outline focus:outline-none" id="nama" name="nama" placeholder="Masukkan nama di sini..." required>
                </div>
                <div class="input-group rounded-lg p-4 sm:p-6 mb-4 shadow-sm">
                    <label for="stasi" class="block text-gray-700 font-medium mb-1">Asal Stasi:</label>
                    <select name="stasi" id="stasi" class="form-select w-full p-2 rounded focus:outline-none" required>
                        <option value="" disabled selected>Pilih Stasi</option>
                        <option value="Jojog">Jojog</option>
                        <option value="Tulusrejo">Tulusrejo</option>
                        <option value="Batanghari">Batanghari</option>
                        <option value="Balekencono">Balekencono</option>
                        <option value="Selorejo">Selorejo</option>
                        <option value="Sambikarto">Sambikarto</option>
                        <option value="Glagah">Glagah</option>
                    </select>
                </div>
                <div class="input-group rounded-lg p-4 sm:p-6 mb-4 shadow-sm">
                    <label class="block text-gray-700 font-medium mb-1" for="pesan">Pesan:</label>
                    <textarea class="form-control w-full p-2 rounded focus:outline" name="pesan" id="pesan" rows="3" placeholder="Apakah kamu mempunyai pesan yang ingin disampaikan untuk acara ini?..."></textarea>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg shadow-inner mb-6">
                    <h4 class="text-gray-800 font-semibold">*Reminder Note</h4>
                    <ul class="list-disc pl-5 text-gray-600">
                        <li>Tumbler</li>
                        <li>Pakaian ganti (Outbound)</li>
                        <li>Obat - obatan pribadi</li>
                        <li>Alat mandi</li>
                    </ul>
                </div>
                <button type="submit" class="submit-btn w-full py-3 rounded-lg font-medium">Kirim</button>
            </form>
            <p class="mt-10 text-center text-gray-400 text-sm">Copyright &copy; 2023 OMK Santo Martinus. All rights reserved.</p>
        </div>
    </div>

    <script>
        window.addEventListener('load', () => {
            Swal.fire({
                title: 'Selamat Datang Bestie!',
                text: 'Tolong di isi dengan benar ya bestie!!',
                icon: 'success',
                confirmButtonText: 'Lanjutkan'
            }).then(() => {
                // Setelah Welcome, tampilkan konfirmasi musik
                Swal.fire({
                    title: 'Putar Musik?',
                    text: 'Apakah bestiku ingin mendengarkan musik selama pendaftaran?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Putar',
                    cancelButtonText: 'Tidak'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: 'Pilih Musik',
                            text: 'Silakan pilih musik apa yang ingin bestiku dengarkan.',
                            icon: 'question',
                            showDenyButton: true,
                            showCancelButton: false,
                            confirmButtonText: 'Jaran Goyang',
                            denyButtonText: 'OMK Remix',
                            cancelButtonText: '',
                            customClass: {
                                confirmButton: 'my-confirm-button', // Tambah warna khusus untuk tombol konfirmasi
                                denyButton: 'my-deny-button',       // Tambah warna khusus untuk tombol penolakan
                                cancelButton: 'my-cancel-button'    // Tambah warna khusus untuk tombol batal
                            }
                        }).then((result) => {
                            let audio;

                            if (result.isConfirmed) {
                                // Pilihan Musik 1
                                audio = new Audio('./audio/[ Karaoke ] Nella Kharisma - Jaran Goyang.mp3');
                            } else if (result.isDenied) {
                                // Pilihan Musik 2
                                audio = new Audio('./audio/OMK REMIX (KARAOKE LIRIK).mp3');
                            }
                            // Memutar musik jika ada pilihan yang valid
                            if (audio) {
                                audio.loop = true; // Loop musik
                                audio.play().catch(error => console.error('Gagal memutar musik:', error));
                            }
                        });
                    }
                });

            });
        });
        const form = document.getElementById('pendaftaranForm');
        form.addEventListener('submit', (event) => {
            event.preventDefault();
            Swal.fire({
                title: 'Sedang diproses...',
                text: 'Mohon tunggu sebentar.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            const formData = new FormData(form);
            fetch('', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                Swal.close();
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses!',
                        text: data.message,
                        confirmButtonText: 'OK'
                    }).then(() => {
                        form.reset();
                        window.location.href = './success.php'
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: data.message,
                        confirmButtonText: 'Coba Lagi!'
                    })
                }
            })
            .catch(error => {
                console.error('Error!', error);
                Swal.close();
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'Terjadi kesalahan!',
                    confirmButtonText: 'Coba Lagi'
                });
            });
        });
    </script>
</body>

</html>
