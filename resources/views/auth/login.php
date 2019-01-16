<?php
include_once('resources/views/layouts/layout.php');
?>

<style>
.input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}

.icon {
  padding: 10px;
  background: black;
  color: white;
  min-width: 50px;
  text-align: center;
}

.input-field {
  width: 100%;
  padding: 10px;
  outline: none;
}

.input-field:focus {
  border: 2px solid dodgerblue;
}

/* Set a style for the submit button */
.btn {
  background-color: black;
  color: white;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}
</style>

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

      <button type="submit" class="btn">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

  </form>
</div>
<div class="container">
<div class="card">
  <div class="card-body">
    <div class="col-md-10 ">
     <form class="form-horizontal" action="../Pharmacy/register/save" method="POST">
      <fieldset>

        <legend>User Registration </legend>

        <div class="form-group">
          <label class="col-md-4 control-label" for="firstname">First Name</label>  
          <div class="col-md-4">
            <div class="input-group">
             <div class="input-group-addon">
               <i class="fa fa-user"></i>

             </div>
             <input id="firstname" name="firstname" type="text" placeholder="First Name" class="form-control input-md" required>
           </div>

         </div>
       </div>

       <div class="form-group">
        <label class="col-md-4 control-label" for="lastname">Last Name</label>  
        <div class="col-md-4">
          <div class="input-group">
           <div class="input-group-addon">
             <i class="fa fa-user"></i>
           </div>
           <input id="lastname" name="lastname" type="text" placeholder="Last Name" class="form-control input-md" required>
         </div>
       </div>
     </div>

     <div class="form-group">
      <label class="col-md-4 control-label" for="Gender">Gender</label>
      <div class="col-md-4"> 
        <label class="radio-inline" for="Gender-0" >
          <input type="radio" name="gender" id="Gender-0" value="1" >
          Male
        </label> 
        <label class="radio-inline" for="Gender-1" >
          <input type="radio" name="gender" id="Gender-1" value="2"  >
          Female
        </label> 
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="Email Address">Email Address</label>  
      <div class="col-md-4">
        <div class="input-group">
         <div class="input-group-addon">
           <i class="fa fa-envelope"></i>   
         </div>
         <input id="email" name="email" type="email" placeholder="Email Address" class="form-control input-md" required>
       </div>
     </div>
   </div>

   <div class="form-group">
    <label class="col-md-4 control-label" for="pwd">Password</label>  
    <div class="col-md-4">
      <div class="input-group">
       <div class="input-group-addon">
         <i class="fa fa-lock"></i> 
       </div>
       <input id="pwd" name="pwd" type="password" placeholder="Password" class="form-control input-md" required>
     </div>
     <span class="help-block">Use 8 or more characters with a mix of letters, numbers & symbols</span>
   </div>
 </div>

 <div class="form-group">
  <label class="col-md-4 control-label" for="Phone number ">Phone number </label>  
  <div class="col-md-4">
    <div class="input-group">
     <div class="input-group-addon">
       <i class="fa fa-phone"></i>
     </div>
     <input id="Phone number" name="number" type="number" placeholder="Phone number " class="form-control input-md" required>
   </div>
 </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="Date Of Birth">Date Of Birth</label>  
  <div class="col-md-4">
    <div class="input-group">
     <div class="input-group-addon">
       <i class="fa fa-birthday-cake"></i>
     </div>
     <input id="Date Of Birth" name="dob" type="date" placeholder="Date Of Birth" class="form-control input-md" required>
   </div>
   <span class="help-block">Your age must be 18 or above to register</span>
 </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" ></label>  
  <div class="col-md-4">
    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-thumbs-up"></span> Register</button>
  </div>
</div>

</fieldset>
</form>
</div>
</div>
</div>
</div>
<script>
  var modal = document.getElementById('ModalLogin');

  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }

</script>

<?php
include('resources/views/layouts/layout-end.php');
?>

