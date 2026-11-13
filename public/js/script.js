
document.addEventListener('DOMContentLoaded', function () {

    const tombolHapus = document.querySelectorAll('.btn-delete');

    tombolHapus.forEach(function (tombol) {

        tombol.addEventListener('click', function (event) {

            const konfirmasi = confirm(
                'Apakah kamu yakin ingin menghapus barang ini?'
            );

            if (!konfirmasi) {
                event.preventDefault();
            }

        });

    });

});
