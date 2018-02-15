$(document).ready(function(){  
    function fetch_data()  
    {  
         $.ajax({  
              url:"../model/select.php",  
              method:"POST",  
              success:function(data){  
                   $('#datos').html(data);  
              }  
         });  
    }  
    fetch_data();  
    $(document).on('click', '#btn_add', function(){  
         var location = $('#location').text();  
         var capacity = $('#capacity').text();  
         if(location == '')  
         {  
              alert("Enter a location");  
              return false;  
         }  
         if(capacity == '')  
         {  
              alert("Enter a capacity");  
              return false;  
         }  
         $.ajax({  
              url:"../model/insert.php",  
              method:"POST",  
              data:{location:location, capacity:capacity},  
              dataType:"text",  
              success:function(data)  
              {  
                   alert(data);  
                   fetch_data();  
              }  
         })  
    });  
    function edit_data(location, capacity)  
    {  
         $.ajax({  
              url:"../model/edit.php",  
              method:"POST",  
              data:{location:location, capacity:capacity},  
              dataType:"text",  
              success:function(data){  
                   alert(data);  
              }  
         });  
    }  
    
    $(document).on('blur', '.capacity', function(){  
         var location = $(this).data("id2");  
         var capacity = $(this).text();  
         edit_data(location,capacity, "capacity");  
    }); 

    $(document).on('click', '.btn_delete', function(){  
         var location=$(this).data("id3");  
         if(confirm("Are you sure you want to delete this?"))  
         {  
              $.ajax({  
                   url:"../model/delete.php",  
                   method:"POST",  
                   data:{location:location},
                   dataType:"text",  
                   success:function(data){  
                        alert(data);  
                        fetch_data();  
                   }  
              });  
         }  
    }); 
  
   
}); 