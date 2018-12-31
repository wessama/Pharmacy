<?php

include_once('resources/views/layouts/layout.php');

?>




<div id="ModalLogin" class="modal">
  
  <form class="modal-content animate" action="../Pharmacy/login/submit" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('ModalLogin').style.display='none'" class="close" title="Close Modal">&times;</span>
      
      <img src="public/images/logo.png" alt="Roshetety" class="avatar">
    </div>

    <div class="container">
      <label for="email"><b>E-mail</b></label>
      <input type="text" placeholder="Enter Username" id="email" name="email" required>

      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" id="password" name="password" required>
        
      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('ModalLogin');


// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
//&times; is the preferred HTML entity for close icons, rather than the letter "x".

</script>
<?php

include('resources/views/layouts/layout-end.php');

?>

