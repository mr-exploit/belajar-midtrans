<!-- footer -->


<!-- Bootstrap core JavaScript-->
<!-- <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

<!-- Core plugin JavaScript-->
<!-- <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script> -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-DGszswRlpR_EVMJ9"></script>
<script>
    document.getElementById('paybutton').onclick = function() {
        // SnapToken acquired from previous step
        console.log("berhasil klik")
        snap.pay('<?= $snapToken ?>', {
            // Optional
            onSuccess: function(result) {
                /* You may add your own js here, this is just example */
                document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            },
            // Optional
            onPending: function(result) {
                /* You may add your own js here, this is just example */
                document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            },
            // Optional
            onError: function(result) {
                /* You may add your own js here, this is just example */
                document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            }
        });
    };
</script>
<script>
    // Ambil semua tombol
    const buttons = document.querySelectorAll('.btn-group-toggle label');

    // Tambahkan event listener untuk setiap tombol
    buttons.forEach(button => {
        button.addEventListener('click', function() {
            // Reset warna latar belakang untuk semua tombol
            buttons.forEach(btn => {
                btn.classList.remove('btn-custom');
            });

            // Tambahkan class untuk warna latar belakang kustom hanya pada tombol yang diklik
            this.classList.add('btn-custom');
        });
    });

    // Buat tanggal hari ini
    const today = new Date();
    const dateButtons = document.getElementById('dateButtons');

    // Loop untuk membuat tombol-tombol tanggal
    for (let i = 0; i < 7; i++) {
        const date = new Date(today);
        date.setDate(today.getDate() + i);
        const formattedDate = `${date.getDate()} ${getMonthName(date.getMonth())}`;
        const dayName = getDayName(date.getDay());

        const label = document.createElement('label');
        label.classList.add('btn', 'btn-oranges', 'active');
        label.innerHTML = `
        <input type="radio" name="options">
        ${dayName}<p>${formattedDate}</p>
    `;

        // Tambahkan event listener ke setiap tombol tanggal
        label.addEventListener('click', function() {
            // Reset warna latar belakang untuk semua tombol tanggal
            const dateLabels = document.querySelectorAll('.btn-group-toggle label');
            dateLabels.forEach(dateLabel => {
                dateLabel.classList.remove('btn-custom');
            });

            // Tambahkan class untuk warna latar belakang kustom hanya pada tombol tanggal yang diklik
            this.classList.add('btn-custom');
        });

        dateButtons.appendChild(label);
    }

    // Fungsi untuk mendapatkan nama bulan dari indeks bulan
    function getMonthName(monthIndex) {
        const monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        return monthNames[monthIndex];
    }

    // Fungsi untuk mendapatkan nama hari dari indeks hari
    function getDayName(dayIndex) {
        const dayNames = ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'];
        return dayNames[dayIndex];
    }
</script>
<script>

</script>
</body>

</html>