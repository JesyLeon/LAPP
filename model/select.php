<?php  
 $connect = mysqli_connect("localhost", "root", "", "lapp");  
 $output = '';  
 $sql = "SELECT * FROM crud";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     
                     <th width="20%">Location</th>  
                     <th width="20%">Capacity</th>  
                     <th width="5%">Action</th>  
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                      
                     <td class="location" data-id1="'.$row["location"].'" contenteditable>'.$row["location"].'</td>  
                     <td class="capacity" data-id2="'.$row["location"].'" contenteditable>'.$row["capacity"].'</td>  
                     <td><button type="button" name="delete_btn" data-id3="'.$row["location"].'" class="btn btn-xs btn-danger btn_delete">X</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                  
                <td id="location" contenteditable></td>  
                <td id="capacity" contenteditable></td>  
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>  
      ';  
 }  
 else  
 {  
      $output .= '<tr>  
                          <td colspan="4">Data not Found</td>  
                     </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output; 
 ?>