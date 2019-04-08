$(function() {
  $.ajax({
    type: "GET",
    url: "http://localhost:81/TugasAkhir/index.php/jees/getAlluser"
  }).done(function(countries) {
    countries.unshift({ id: "0", name: "" });

    $("#jsGrid").jsGrid({
      height: "auto",
      width: "100%",
      filtering: true,
      inserting: true,
      editing: true,
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
            url: "jees/getAlluser/",
            data: filter
          });
        },
        insertItem: function(item) {
          return $.ajax({
            type: "POST",
            url: "jees/adduser/",
            data: item
          });
        },
        updateItem: function(item) {
          return $.ajax({
            type: "POST",
            url: "jees/edituser/",
            data: item
          });
        },
        deleteItem: function(item) {
          return $.ajax({
            type: "POST",
            url: "jees/deleteuser/",
            data: item
          });
        }
      },
      fields: [
      {
          name: "username",
          title: "Username",
          type: "textarea",
          width: 150
        },
        {
          name: "password",
          title: "password",
          type: "text",
          width: 150
        },
        {
          name: "level",
          title: "level",
          type: "text",
          width: 50
        },
        { type: "control" }
      ]
    });
  });
});
