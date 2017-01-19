<?php
require_once('footer.php');
?>
<script type="text/javascript">
prue();
  function prue(){
    $.ajax({
      type: "POST",
      url:'../classes/ajaxPosts.php',
      data: { tableDir:'1'},
        dataType: "json",
      success: function(datos){
       alert(datos);


      },
     error: function(error) { console.log(error) }
       

    });
      }
  
</script>