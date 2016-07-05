<html>
<body>
  <div id="content">
    <?php
    require_once("../inc/conx.php"); //change this to your connection file or info
    $contentq = mysqli_query($conx, "SELECT id,post FROM feed LIMIT 3"); //change this to what you're grabbing from the database
    while($contentr = mysqli_fetch_assoc($contentq)) {
      $cnt_id = $contentr['id'];
      $cnt_txt = $contentr['post'];
      echo "$cnt_id: $cnt_txt<br>";
    }
    ?>
  </div>
  <input id="amount" type="hidden" value="3">
  <?php
  $cntq = mysqli_query($conx, "SELECT * FROM feed"); // change this to the table you're grabbing from the database
  $count = mysqli_num_rows($cntq);
  if($count > 3) {
    echo "<div id=\"more_div\"><button onclick=\"loadmore();\">more</button></div>";
  }
  ?>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script>
  function loadmore() {
    var amount = document.getElementById("amount").value;
    var content = document.getElementById("content");
    $.ajax({
      type: 'get',
      url: 'ajax_more.php',
      data: {
        amntcnt:amount
      },
      success: function(more_content) {
        content.innerHTML = content.innerHTML+more_content;
        document.getElementById("amount").value = Number(amount)+3;
      }
    });
    var getcount = new XMLHttpRequest();
    getcount.open("GET", "contamnt.php", true);
    getcount.onreadystatechange = function(){
      if(getcount.readyState == 4)
      if(getcount.status == 200) {
        var numCont = getcount.responseText;
        if(numCont <= Number(amount) + 3) {
          document.getElementById("more_div").innerHTML = "";
        }
      }
      else{
        alert("error");
      }
    };
    getcount.send();
    return false;
  }
  </script>
</body>
</html>
