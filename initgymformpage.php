

<?php
/* Template Name: Form1*/
get_header();
include get_template_directory() . '/dbconfig.php';

$query = $db->query("SELECT * FROM _S9Q_countries ORDER BY name ASC");

 $rowCount1 = mysqli_num_rows($query);


 function my_theme_create_new_gym() {
 if (isset($_POST['d73he3gehj4ge6yr']) || wp_verify_nonce($_POST['d73he3gehj4ge6yr'], 'create_gym_form_submit' ))
 {
  $gymName = sanitize_text_field($_POST['gymName']);
  $address1 = sanitize_text_field($_POST['Address1']);
  $country = sanitize_text_field($_POST['country']);
  $state = sanitize_text_field($_POST['state']);
  $city = sanitize_text_field($_POST['city']);
  $email = sanitize_text_field($_POST['email']);
  $phone = sanitize_text_field($_POST['phone']);
  $postcode = sanitize_text_field($_POST['postcode']);

  

  if ($gymName == '') {
    echo "<style type='text/css'>
    #gymName{
      border-color:#fca1a1 !important;
      border-width:3px !important;    }</style>";

      echo "<style>#fillFields {display:block !important}</style>";
  }

  if ($address1 == '') {
    echo "<style type='text/css'>
    #inaddress1{
      border-color:#fca1a1 !important;
      border-width:3px !important;    }</style>";

      echo "<style>#fillFields {display:block !important}</style>";
  }

  if ($country == '0') {
    echo "<style type='text/css'>
    #country{
      border-color:#fca1a1 !important;
      border-width:3px !important;    }</style>";

      echo "<style>#fillFields {display:block !important}</style>";
  }

  if ($state == '0') {
    echo "<style type='text/css'>
    #state{
      border-color:#fca1a1 !important;
      border-width:3px !important;    }</style>";

      echo "<style>#fillFields {display:block !important}</style>";
  }

  if ($city == '0') {
    echo "<style type='text/css'>
    #city{
      border-color:#fca1a1 !important;
      border-width:3px !important;    }</style>";

      echo "<style>#fillFields {display:block !important}</style>";
  }

  if ($postcode == '') {
    echo "<style type='text/css'>
    #postcode{
      border-color:#fca1a1 !important;
      border-width:3px !important;    }</style>";

      echo "<style>#fillFields {display:block !important}</style>";
  }

  if ($email == '') {
    echo "<style type='text/css'>
    #emailin{
      border-color:#fca1a1 !important;
      border-width:3px !important;
    }</style>";

    echo "<style>#fillFields {display:block !important}</style>";
  } else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
     echo "<style>#emailValidMsg {display:block !important}</style>";
  }
  }

  if ($phone == '') {
    echo "<style type='text/css'>
    #phone{
      border-color:#fca1a1 !important;
      border-width:3px !important;
    }</style>";

    echo "<style>#fillFields {display:block !important}</style>";
  }
  
  
 }
}

if ($_POST) {
  my_theme_create_new_gym();
}
 

?>


<body>


<div id = "Step1banner">
        <h2 class = steps>Step 1 of 3</h2>
        <h1 class = main>Location and Contact Details</h1>
    </div>

        <h1 class="titles">Name and Location</h1>
        <div class="center">
        <div Id="emailValidMsg" class="alert alert-danger" role="alert">
        Please use a valid email address
        </div>
        </div>

        <div class="center">
        <div Id="fillFields" class="alert alert-danger" role="alert">
        Please fill required fields
        </div>
        </div>

      <div class="container forms" id ="form1">
      <form name="initgymform" method="post" enctype="multipart/form-data">
      <?php wp_nonce_field( 'create_gym_form_submit', 'd73he3gehj4ge6yr' ); ?>
      <div class="form-group">
          <label for="name">Gym Name</label>
          <input name="gymName" class="form-control" id="gymName" >
        </div>
        <label>Gym Address</label>

        <div class="row">
          <div class="col-sm-6">
        <label for="inaddress1" style="float:left;">Address line 1 </label>
        <input type="text" name="Address1" class="form-control" id="inaddress1" placeholder="Street and building">
      </div>
      <div style="float:left;" class="col-sm-6">
        <label for="inaddress2" style="float:left;">Address Line 2 (optional)</label>
        <input type="text" name="Address2" class="form-control" id="inaddress2" placeholder="Flat number, Suite, Floor, etc">
          </div>
</div>
<div class="row">
          <div class="col-sm-6">
        <label for="country" style="float:left;">Country</label>
        <select name ="country" id="country" class="form-control">
        <option value = "0">Select a country</option>
        <?php 
        if($rowCount1 > 0) {
            while($row = $query->fetch_assoc()) {
              echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
            }
        } else {
          echo '<option value="">Country not availible</option>';
        }
        ?>
        </select>
      </div>
      <div style="float:left;" class="col-sm-6">
        <label for="postcode" style="float:left;">Postcode/Zip code</label>
        <input name="postcode" class="form-control" id="postcode" >
          </div>
</div>
<div class="row">
          <div class="col-sm-6">
        <label for="state" style="float:left;">State/province</label>
        <select name ="state" id="state" class="form-control">
        <option value = "0">Select a state/province</option>
      </select>
      </div>
      <div style="float:left;" class="col-sm-6">
        <label for="city" style="float:left;">City</label>
        <select name ="city" id="city" class="form-control">
        <option value ="0">Select a city</option>
        </select>
          </div>
</div>
     
    </div>

    <h1 class = "titles">Contact Details</h1>

    <div class="container forms"  id= "form2">
    
    <div class="form-group">
          <label for="exampleInputEmail1">Website</label>
          <input type="text" name="website" class="form-control" id="webin" >
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Facebook Group</label>
          <input type="text" type="facebook" class="form-control" id="fbin" >
        </div>
          <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
                <input type="text" name="email" class="form-control" id="emailin" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted"></small>
            </div>
          <div  class="form-group"></div>
            <label for="number">Phone number</label>
            <input id= "phone" type="text" name="phone" class="form-control" id="phonein" >
          </div>
    
    </div>

    <div id="btnsub1d">
    <button id="btnsub1" type="submit" name="gymsub" class="btn">Submit</button>
    </div>
    </form>
    

    <script>


var element1 = document.querySelector("#form1");
  setTimeout(function() {
    element1.style.transform = "translatex(1400px)";
  }, 100);

  var element2 = document.querySelector("#form2");
  setTimeout(function() {
    element2.style.transform = "translatex(1400px)";
  }, 100);

  document.getElementById("btnsub1").onmouseover = function() {

document.getElementById("btnsub1").style.backgroundImage = "linear-gradient(#AD0E2C, black)";

};

document.getElementById("btnsub1").onmouseout = function() {

document.getElementById("btnsub1").style.backgroundImage = "linear-gradient(#0A0A23, #071A4B)";

};

</script>



</body>

<div>

<?php

 

get_footer();

?>

</div>




