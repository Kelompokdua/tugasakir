<html>
   <head>
     <title>Open Data Table</title>
     <script src="https://code.jquery.com/jquery-2.2.4.js"></script>
     <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL('css/style.css') ?>">
     <script src="<?php echo BASE_URL('assets/custom/OpenDataTable.js') ?>"></script>
     <script type="text/javascript">
    $(document).ready(function(){
      $(".OpenDataTable").OpenDataTable({  
        url: "simple_php_datasource.php",
      });
    });
     </script>
   </head>
   <body>
     <table class="OpenDataTable">
          <thead>
             <tr>
                 <th>id obat</th>
                 <th>Name</th>
                 <th>Continent</th>
              </tr>
          </thead>
       <tbody></tbody>
     </table>
   </body>
 </html>