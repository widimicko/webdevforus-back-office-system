$(document).ready(function () {
  if (document.getElementById("dataTable")) {
    $("#dataTable").DataTable();
  }

  if (document.getElementById("dataTableButtons")) {
    $("#dataTableButtons").DataTable({
      dom: "Bflrtip",
      buttons: ["csv", "excel", "pdf", "print", "colvis"],
    });
  }

  if (document.getElementById("select2")) {
    $(document).ready(function () {
        $("#select2").select2();
    });
  }
});
