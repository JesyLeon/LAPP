$('button').click(function() {
 
    //add new row
     
     
    var fila=     
    '<tr><td><input type="text" name="id_crud[]"></td>'+
    '<td><input type="text" name="location[]"></td>'+     
             '<td><input type="text" name="capacity[]"></td>';
          
     
    //add row at the table
     
    $('.table').append(fila);
     
     
     
    });
    