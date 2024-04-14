  <!-- Footer -->
  <footer class="sticky-footer bg-white">
      <div class="container my-auto">
          <div class="copyright text-center my-auto">
              <span>copyright &copy; Elite Badminton <?= date('Y'); ?></span>
          </div>
      </div>
  </footer>
  <!-- End of Footer -->

  </div>
  <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
              <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
              </div>
          </div>
      </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
  <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-DGszswRlpR_EVMJ9"></script>

  <script>
      // Menambahkan event listener untuk mengubah teks label setelah file dipilih
      document.getElementById('img').addEventListener('change', function() {
          var fileName = this.files[0].name;
          document.getElementById('img-label').textContent = fileName;
      });
  </script>
  <!-- Letakkan di bagian bawah halaman sebelum tag </body> -->
  <script>
      $('#editModal').on('show.bs.modal', function(event) {
          var button = $(event.relatedTarget); // Tombol yang dipilih yang memicu modal
          var id = button.data('id'); // Ekstrak data-id dari atribut data-* tombol
          var nama = button.data('nama');
          var alamat = button.data('alamat');
          var harga = button.data('harga');
          var modal = $(this);
          modal.find('.modal-body #editNama').val(nama);
          modal.find('.modal-body #editAlamat').val(alamat);
          modal.find('.modal-body #editHarga').val(harga);
          modal.find('.modal-body #lapanganId').val(id);
      });

      // Menambahkan event listener untuk mengubah teks label setelah file dipilih
      $('#imgedit').on('change', function() {
          var fileName = $(this).val().split('\\').pop(); // Mengambil nama file dari path lengkap
          $(this).next('.custom-file-label').html(fileName); // Menampilkan nama file pada label
      });

      // Menggunakan jQuery untuk menangani submit form edit
      $('#editForm').on('submit', function(e) {
          e.preventDefault(); // Mencegah pengiriman form

          var formData = new FormData($(this)[0]); // Menggunakan FormData untuk mengambil semua data form, termasuk file
          $.ajax({
              type: 'POST',
              url: '<?= base_url("lapangan/editLapangan/") ?>' + $('#lapanganId').val(),
              data: formData,
              processData: false, // Memproses data FormData tanpa mengubahnya
              contentType: false, // Tidak mengatur tipe konten secara otomatis
              success: function(response) {
                  // Tindakan sukses seperti menutup modal, memberi pesan, atau memuat ulang halaman
                  $('#editModal').modal('hide');
                  window.location.reload(); // Mengganti ini dengan tindakan yang sesuai
              },
              error: function(error) {
                  console.log(error);
                  // Tindakan untuk menangani kesalahan
              }
          });
      });
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
          const monthNames = ['January', 'February', 'Maret', 'April', 'May', 'Juni', 'July', 'Augtus', 'September', 'Octeber', 'November', 'December'];
          return monthNames[monthIndex];
      }

      // Fungsi untuk mendapatkan nama hari dari indeks hari
      function getDayName(dayIndex) {
          const dayNames = ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'];
          return dayNames[dayIndex];
      }
  </script>
  <script>
      document.getElementById('paybutton').onclick = function() {
          // SnapToken acquired from previous step
          console.log("berhasil klik")
          // Ambil nilai yang dipilih oleh pengguna
          const idLapangan = "<?= $lapangan['id']; ?>";
          const userid = "<?= $user['id']; ?>";
          const namalapangan = "<?= $lapangan['nama']; ?>";
          const harga = "<?= $lapangan['harga']; ?>";
          const tanggal = document.querySelector('.btn-custom p').innerText;
          const username = "<?php echo $user['name']; ?>";
          //   console.log("idLapangan", idLapangan);
          //   console.log("userid", userid);
          //   console.log("username", username);
          //   console.log("tanggal", tanggal);
          //   console.log("lapangan", namalapangan);
          //   console.log("harga", harga);

          // Kirim data ke controller menggunakan AJAX

          $.ajax({
              type: "POST",
              url: "<?= base_url('user/process_payment'); ?>",
              data: {
                  idlapangan: idLapangan,
                  harga: harga,
                  namalapangan: namalapangan,
                  tanggal: tanggal,
                  username: username
              },
              dataType: 'json',
              success: function(response) {
                  console.log("cek response", response);
                  // Tangkap snapToken dari respons
                  let snapToken = response.snapToken;
                  snap.pay(snapToken, {
                      // Optional callback functions
                      onSuccess: function(result) {
                          console.log("Pembayaran berhasil:", result);
                          const harga = result.gross_amount;
                          const orderid = result.order_id;
                          const paymenttype = result.payment_type;
                          const transcation_id = result.transaction_id;
                          const transactiontime = result.transaction_time;
                          const va_number = result.va_numbers[0].va_number;
                          const statusmessage = result.status_message;
                          const bank = result.va_numbers[0].bank;
                          const pdf_url = result.pdf_url;
                          $.ajax({
                              type: "POST",
                              url: "<?= base_url('user/add_payment'); ?>",
                              data: {
                                  lapanganid: idLapangan,
                                  harga: harga,
                                  orderId: orderid,
                                  paymenttype: paymenttype,
                                  userName: username,
                                  transcationId: transcation_id,
                                  transactionTime: transactiontime,
                                  status_message: statusmessage,
                                  vaNumber: va_number,
                                  Bank: bank,
                                  UserId: userid,
                                  pdfUrl: pdf_url,
                                  namalapangan: namalapangan,
                                  tanggal: tanggal
                              },
                              dataType: 'json', // Perbaiki nilai dataType menjadi 'json'
                          }).done(function(response) {
                              console.log("response", response);
                              if (response.status == "success") {

                                  console.log("New Lapangan Added!");
                                  // Lakukan apa yang diperlukan setelah berhasil, misalnya, redirect ke halaman history
                                  window.location.href = "<?= base_url('history'); ?>";
                              } else {
                                  // Jika operasi gagal
                                  console.error(response.message);
                              }
                          }).fail(function(xhr, status, error) {
                              // Tangani kesalahan jika permintaan AJAX gagal
                              console.error("AJAX request failed:", error);
                          });
                      },
                      onPending: function(result) {
                          console.log("Pembayaran tertunda:", result);
                          // Lakukan sesuatu saat pembayaran tertunda
                          console.log("Pembayaran berhasil:", result);
                          const harga = result.gross_amount;
                          const orderid = result.order_id;
                          const paymenttype = result.payment_type;
                          const transcation_id = result.transaction_id;
                          const transactiontime = result.transaction_time;
                          const va_number = result.va_numbers[0].va_number;
                          const statusmessage = result.status_message;
                          const bank = result.va_numbers[0].bank;
                          const pdf_url = result.pdf_url;
                          $.ajax({
                              type: "POST",
                              url: "<?= base_url('user/add_payment'); ?>",
                              data: {
                                  lapanganid: idLapangan,
                                  harga: harga,
                                  orderId: orderid,
                                  paymenttype: paymenttype,
                                  userName: username,
                                  transcationId: transcation_id,
                                  transactionTime: transactiontime,
                                  status_message: statusmessage,
                                  vaNumber: va_number,
                                  Bank: bank,
                                  UserId: userid,
                                  pdfUrl: pdf_url,
                                  namalapangan: namalapangan,
                                  tanggal: tanggal
                              },
                              dataType: 'json', // Perbaiki nilai dataType menjadi 'json'
                          }).done(function(response) {
                              console.log("response", response);
                              if (response.status == "success") {

                                  console.log("New Lapangan Added!");
                                  // Lakukan apa yang diperlukan setelah berhasil, misalnya, redirect ke halaman history
                                  window.location.href = "<?= base_url('history'); ?>";
                              } else {
                                  // Jika operasi gagal
                                  console.error(response.message);
                              }
                          }).fail(function(xhr, status, error) {
                              // Tangani kesalahan jika permintaan AJAX gagal
                              console.error("AJAX request failed:", error);
                          });
                      },
                      onError: function(result) {
                          console.error("Terjadi kesalahan pembayaran:", result);
                          // Lakukan sesuatu saat terjadi kesalahan pembayaran
                          console.log("Pembayaran berhasil:", result);
                          const harga = result.gross_amount;
                          const orderid = result.order_id;
                          const paymenttype = result.payment_type;
                          const transcation_id = result.transaction_id;
                          const transactiontime = result.transaction_time;
                          const va_number = result.va_numbers[0].va_number;
                          const statusmessage = result.status_message;
                          const bank = result.va_numbers[0].bank;
                          const pdf_url = result.pdf_url;
                          $.ajax({
                              type: "POST",
                              url: "<?= base_url('user/add_payment'); ?>",
                              data: {
                                  lapanganid: idLapangan,
                                  harga: harga,
                                  orderId: orderid,
                                  paymenttype: paymenttype,
                                  userName: username,
                                  transcationId: transcation_id,
                                  transactionTime: transactiontime,
                                  status_message: statusmessage,
                                  vaNumber: va_number,
                                  Bank: bank,
                                  UserId: userid,
                                  pdfUrl: pdf_url,
                                  namalapangan: namalapangan,
                                  tanggal: tanggal
                              },
                              dataType: 'json', // Perbaiki nilai dataType menjadi 'json'
                          }).done(function(response) {
                              console.log("response", response);
                              if (response.status == "success") {

                                  console.log("New Lapangan Added!");
                                  // Lakukan apa yang diperlukan setelah berhasil, misalnya, redirect ke halaman history
                                  window.location.href = "<?= base_url('history'); ?>";
                              } else {
                                  // Jika operasi gagal
                                  console.error(response.message);
                              }
                          }).fail(function(xhr, status, error) {
                              // Tangani kesalahan jika permintaan AJAX gagal
                              console.error("AJAX request failed:", error);
                          });
                      }
                  });
              },
              error: function(xhr, status, error) {
                  console.error("Gagal melakukan pembayaran:", error);
                  // Lakukan sesuatu saat gagal melakukan pembayaran
              }
          });

      };
  </script>


  </body>

  </html>