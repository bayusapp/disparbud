function hapus_coa(hash, kode_coa) {
  // alert("Hashnya: " + hash + " | kode coa: " + kode_coa);
  swal({
    title: "Apakah Anda yakin?",
    text: "COA dengan kode " + kode_coa + " akan dihapus",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    buttons: ["Tidak", "Ya"],
  }).then((willDelete) => {
    if (willDelete) {
      alert("hapus");
    }
  });
}

$(document).ready(function () {
  setTimeout(function () {
    $("#coa_pemilik").DataTable({
      bAutoWidth: false,
      columnDefs: [
        { width: "10%", targets: [0], className: "text-center" },
        { width: "20%", targets: [1], className: "text-center" },
        { width: "20%", targets: [3], className: "text-center" },
        { width: "20%", targets: [4], className: "text-center" },
      ],
      oLanguage: {
        sLengthMenu: "Tampil _MENU_ entri",
        sSearch: "Cari",
        sEmptyTable: "Tidak ada data tersedia dalam tabel",
        sInfo: "Menampilkan _START_ hingga _END_ dari _TOTAL_ entri",
        sInfoEmpty: "Menampilkan 0 hingga 0 dari 0 entri",
        oPaginate: {
          sFirst: "Awal",
          sLast: "Terakhir",
          sNext: "Selanjutnya",
          sPrevious: "Sebelumnya",
        },
      },
    });
  });
});
