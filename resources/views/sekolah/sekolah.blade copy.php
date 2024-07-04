<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Sekolah</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Data Sekolah di Indonesia</h1>
        <button id="fetchData" class="btn btn-primary mb-4">Fetch Data Sekolah</button>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Sekolah</th>
                    <th>Alamat</th>
                    <th>Provinsi</th>
                    <th>Kabupaten/Kota</th>
                    <th>Kecamatan</th>
                </tr>
            </thead>
            <tbody id="sekolahData">

            </tbody>
        </table>
    </div>

    <script>
        document.getElementById('fetchData').addEventListener('click', function() {
    fetch('/fetch-sekolah')
        .then(response => response.json())
        .then(data => {
            let sekolahData = document.getElementById('sekolahData');
            sekolahData.innerHTML = '';
            data.dataSekolah.forEach((sekolah, index) => {
                sekolahData.innerHTML += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${sekolah.sekolah}</td>
                        <td>${sekolah.alamat_jalan}</td>
                        <td>${sekolah.propinsi}</td>
                        <td>${sekolah.kabupaten_kota}</td>
                        <td>${sekolah.kecamatan}</td>
                    </tr>
                `;
            });
        });
});

    </script>
</body>
</html>
