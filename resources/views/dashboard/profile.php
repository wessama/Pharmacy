<?php

include_once('resources/views/layouts/layout.php');

?>		
<title>User profile </title>
</head>

<body>
  <div class="container">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-10 ">
            <form class="form-horizontal">
              <fieldset>
                <legend>User profile </legend>

                <div class="form-group">
                  <label class="col-md-4 control-label" for="Full name">Full name</label>  
                  <div class="col-md-4">
                    <input id="Full name" name="Full name" type="text" class="form-control input-md" value="<?php echo $data[0]['name']; ?>" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label" for="Date Of Birth">Date Of Birth</label>  
                  <div class="col-md-4">
                   <input id="dob" name="dob" type="text" class="form-control input-md" value="<?php echo $data[0]['DOB']; ?>" readonly>
                 </div>
               </div>


               <div class="form-group">
                <label class="col-md-4 control-label" for="Phone number ">Phone number </label>  
                <div class="col-md-4">
                 <input id="number" name="number" type="number" class="form-control input-md" value="<?php echo $data[0]['Number']; ?>"readonly>
               </div>
             </div>

             <!-- Text input-->
             <div class="form-group">
              <label class="col-md-4 control-label" for="Email Address">Email Address</label>  
              <div class="col-md-4">
               <input id="email" name="email" type="email" class="form-control input-md" value="<?php echo $data[0]['email']; ?>"readonly>
             </div>
           </div>

         </fieldset>
       </form>
     </div>
     <div class="col-md-2 hidden-xs">
      <img src="<?php echo $data[0]['avatar'];?>" alt="userimg" style="border: 1px solid #ddd; border-radius: 4px; padding: 5px; width: 150px;" >
    </div>


  </div>
  </div>
</div>
</div>

<?php

include('resources/views/layouts/layout-end.php');

?>
