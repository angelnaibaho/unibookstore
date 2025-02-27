$(document).ready(function () {
  $("#searchBox").on("keyup", function () {
    var search = $(this).val().trim(); // Ambil input dan hapus spasi awal/akhir
    console.log("User mengetik: " + search); // Debugging

    if (search !== "") {
      $.ajax({
        url: "search.php",
        method: "POST",
        data: { query: search },
        success: function (data) {
          console.log("Response dari server:", data); // Debugging
          $("#bookList").html(data);
        },
        error: function (xhr, status, error) {
          console.error("AJAX Error:", status, error);
        },
      });
    } else {
      location.reload(); // Jika input kosong, reload daftar buku awal
    }
  });
});
