$(document).ready(function() {
    var id, option;
    option = 4;
        
    dataTable = $('#dataTable').DataTable({  
        "ajax":{            
            "url": "inc/crud.php", 
            "method": 'POST', 
            "data":{option:option}, 
            "dataSrc":""
        },
        "columns":[
            {"data": "id"},
            {"data": null,"render": function (data, type, full, meta) {
                return meta.row + 1;
                }},
            {"data": "value1"},
            {"data": "value2"},
            {"data": "value3"},
            {"data": "value4"},
            {"data": "value5"},
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEdit'><i class='fas fa-pen'></i></button><button class='btn btn-danger btnBorrar'><i class='fas fa-trash'></i></button></div></div>"}
        ],
        "language": {
            "url": "assets/datatables/russian.json"
        },
        columnDefs: [
            { targets: [ 0 ],
              className: "hide"
            }
          ],
          "dom": 'lBfrtip',
          lengthMenu: [
              [10, 25, 50, -1],
              ['10', '25', '50', 'Все']
          ],
          buttons: [{
              extend: 'excel',
              className: 'btn btn-success btn-sm',
              text: '<i class="fas fa-file-excel fa-lg"></i>',
              title: '',
              exportOptions: {
                columns: [2, 3, 4, 5, 6]
            }
          }, ]

    }); 

    var str; 
    
    $('#addForms').submit(function(e){                         
        e.preventDefault(); 
        value1 = $.trim($('#value1').val());    
        value2 = $.trim($('#value2').val());
        value3 = $.trim($('#value3').val());    
        value4 = $.trim($('#value4').val());    
        value5 = $.trim($('#value5').val());                           
            $.ajax({
              url: "inc/crud.php",
              type: "POST",
              datatype:"json",    
              data:  {id:id, value1:value1, value2:value2, value3:value3, value4:value4, value5:value5 ,option:option},    
/*               success: function(data) {
                dataTable.ajax.reload(null, false);
               } */
            });			        
        $('#modalCrud').modal('hide');											     			
    });
    
    $("#addBtn").click(function(){
        option = 1;    
        id=null;
        $("#addForms").trigger("reset");
        $(".modal-header").css( "background-color", "#17a2b8");
        $(".modal-header").css( "color", "white" );
        $(".modal-title").text("Создать новую запись");
        $('#modalCrud').modal('show');	    
    });
            
    $(document).on("click", ".btnEdit", function(){		        
        option = 2;
        str = $(this).closest("tr");	        
        id = parseInt(str.find('td:eq(0)').text());             
        value1 = str.find('td:eq(2)').text();
        value2 = str.find('td:eq(3)').text();
        value3 = str.find('td:eq(4)').text();
        value4 = str.find('td:eq(5)').text();
        value5 = str.find('td:eq(6)').text();
        $("#value1").val(value1);
        $("#value2").val(value2);
        $("#value3").val(value3);
        $("#value4").val(value4);
        $("#value5").val(value5);
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Изменить запись");		
        $('#modalCrud').modal('show');		   
    });
    
    $(document).on("click", ".btnBorrar", function(){
        str = $(this);           
        id = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;
        value1 = $(this).closest('tr').find('td:eq(2)').text();
        value2 = $(this).closest('tr').find('td:eq(3)').text();
        value3 = $(this).closest('tr').find('td:eq(4)').text();
        value4 = $(this).closest('tr').find('td:eq(5)').text();
        value5 = $(this).closest('tr').find('td:eq(6)').text();
        option = 3;  
        var answer = confirm("Вы действительно хотите удалить запись ?");                
        if (answer) {            
            $.ajax({
              url: "inc/crud.php",
              type: "POST",
              datatype:"json",    
              data:  {id:id, value1:value1, value2:value2, value3:value3, value4:value4, value5:value5, option:option},    
/*               success: function() {
                dataTable.row(str.parents('tr')).remove().draw();
                dataTable.ajax.reload(null, false)                 
               } */
            });	
        }
     });
    
});    

window.onbeforeunload = function () {
    $.ajax({
        url: "inc/user/offline.php",
    });
};

setInterval( function () {
    dataTable.ajax.reload(null, false);
}, 1000 ); 

Mousetrap.bind('ctrl+q', function (e) {
    $('#addBtn').click()
});