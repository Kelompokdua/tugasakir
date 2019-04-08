$(function() {
  $.ajax({
    type: "GET",
    url: "http://localhost:81/TugasAkhir/index.php/obat/getAllobat"
  }).done(function(data) {
   

    $("#jsGrid2").jsGrid({
      height: "300px",
      width: "100%",
      filtering: true,
      sorting: true,
      paging: true,
      autoload: true,
      pageSize: 10,
      pageButtonCount: 5,
      deleteConfirm: "Do you really want to delete client?",
      controller: {
        loadData: function(filter) {
          return $.ajax({
            type: "GET",
            url: "obat/getAllobat/",
            data: filter
          });
        },
        insertItem: function(item) {
          return $.ajax({
            type: "POST",
            url: "obat/addobat/",
            data: item
          });
        },
        updateItem: function(item) {
          return $.ajax({
            type: "POST",
            url: "obat/editobat/",
            data: item
          });
        },
        deleteItem: function(item) {
          return $.ajax({
            type: "POST",
            url: "obat/deleteobat/",
            data: item
          });
        }
      },
      fields: [
      {
          name: "nama_obat",
          title: "Nama Obat",
          type: "text",
          width: 150
        },
        {
          name: "jenis_obat",
          title: "Jenis Obat",
          type: "text",
          width: 150
        },
        { type: "control",deleteButton: false,editButton : false,insertButton : false }],
        controller: {
                       loadData:  function(filter) {
                          return $.grep(data, function(item) {
                                     // client-side filtering below (be sure conditions are correct)
                             return(!filter.nama_obat|| item.nama_obat.indexOf(filter.nama_obat) > -1) 
                         && (!filter.jenis_obat|| item.jenis_obat.indexOf(filter.jenis_obat) > -1) 
                });
                  },
               }
    });
  });
});
