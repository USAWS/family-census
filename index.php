<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  echo "<pre>";
  print_r($_POST);
  echo "</pre>";
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Family Census</title>
  <link href="https://fonts.googleapis.com/css?family=Alegreya&display=swap" rel="stylesheet"> 
  <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="styles/normalize.css">
  <link rel="stylesheet" type="text/css" href="styles/main.css">
</head>
<body>
  <main>
    <h2>Family Census</h2>
    <h3>Matching the Needs of Familes with Community Services</h3>
    <h5 class="alert">For a medical or security emergency please call 9-1-1. This is not an emergency service.</h5>
    <p style="margin-bottom: 10px;">As the COVID-19 Virus sweeps through our community, we must efficiently match the critical needs of families with available resources. Please fill out the family census form so we can help match the needs of your family with available resources and services in your community.</p>

    <form id="family_census_form"  name="family_census_form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
      <div id="family_information">
        <h4>Family Information</h4>
        <div class="ic" id="c_family_name">
          <label for="family_name">Family Name<span class="red">*</span></label><span class="example">&nbsp;&nbsp;ex: Jones Family</span><br>
          <input type="text" id="family_name" name="family_name" minlength="2" maxlength="64" required>
        </div>

        <div class="ic" id="c_address">
          <label for="address">Address<span class="red">*</span></label><span class="example">&nbsp;&nbsp;Note: write &quot;No Current Address&quot; if applicable</span><br>
          <textarea id="address" name="address" rows="3" minlength="4" maxlength="128" required></textarea>
        </div>

        <div class="ic" id="c_email">
          <label for="email">Email Address<span class="red">*</span></label><br>
          <input type="email" id="email" name="email" minlength="6" maxlength="128" required>
        </div>

        <div class="ic" id="c_phone">
          <label for="phone">Phone, including area code<span class="red">*</span></label><span class="example">&nbsp;&nbsp;ex: (704) 574-9605 ext.5524</span><br>
          <input type="text" id="phone" name="phone" minlength="10" maxlength="32" required>
        </div>
        
        <div class="ic" id="c_referral">
          <label for="referral">Please indicate what organization referred you to this form.<span class="red">*</span></label><br>
          <input type="text" id="referral" name="referral" minlength="2" maxlength="32" required>
        </div>
        
        <div class="ic" id="c_need_suppliesYN">
          <label>Do you have any urgent needs or require immediate supplies?<span class="red">*</span></label><span class="example">&nbsp;&nbsp;ex: food, shelter, diapers</span>
          <div>
            <input type="radio" id="need_suppliesY" name="need_suppliesYN" value="Yes" required><label for="need_suppliesY"> Yes</label>
          </div>
          <div>
            <input type="radio" id="need_suppliesN" name="need_suppliesYN" value="No" required><label for="need_suppliesN"> No</label>
          </div>
          <div id="if_supplies_needed"></div>
        </div>
        
        <div class="ic" id="c_internet_accessYN">
          <label>Do you have internet access at home?<span class="red">*</span></label>
          <div>
            <input type="radio" id="internet_accessY" name="internet_accessYN" value="Yes" required><label for="internet_accessY"> Yes</label>
          </div>
          <div>
            <input type="radio" id="internet_accessN" name="internet_accessYN" value="No" required><label for="internet_accessN"> No</label>
          </div>
        </div>

        <div class="ic" id="c_home_electronics">
          <label id="he_header">Which of the following technology devices do you have at home?</label>
          <div id="he_checkbox_column_1">
            <input type="checkbox" id="he_phone_land_line" name="home_electronics[]" value="phone_land_line"> <label for="he_phone_land_line">Phone (Land Line)</label><br>
            <input type="checkbox" id="he_television" name="home_electronics[]" value="television"> <label for="he_television">Television</label><br>
            <input type="checkbox" id="he_mobile_smartphone" name="home_electronics[]" value="mobile_smartphone"> <label for="he_mobile_smartphone">Mobile / Smartphone</label><br>
            <input type="checkbox" id="he_laptop_computer" name="home_electronics[]" value="laptop_computer"> <label for="he_laptop_computer">Laptop Computer</label>
          </div>
          <div id="he_checkbox_column_2">
            <input type="checkbox" id="he_desktop_computer" name="home_electronics[]" value="desktop_computer"> <label for="he_desktop_computer">Desktop Computer</label><br>
            <input type="checkbox" id="he_tablet_device" name="home_electronics[]" value="tablet_device"> <label for="he_tablet_device">Tablet Device</label><br>
            <input type="checkbox" id="he_game_console" name="home_electronics[]" value="game_console"> <label for="he_game_console">Game Console</label><br>
            <input type="checkbox" id="he_security_home_automation" name="home_electronics[]" value="security_home_automation"> <label for="he_security_home_automation">Security / Home Automation</label>
          </div>
        </div>
        
      </div>

      <div id="family_members">
        <h4>Family Members</h4>
        <p style="margin-bottom: 10px; color: #D8CFD0;">Click the add button and fill in the Name and Date of Birth for each family member whose primary residence is at the address provided. The name and age of each of your family members are used to gather specific age related service needs per individual.</p>
        <div style="text-align: center;"><button id="btn_add_fm" type="button">+ Add</button></div>
        <div class="ic" id="c_family_members">
          <table>
            <thead>
              <tr>
                <th><label>Action</label></th><th><label>Name</label></th><th><label>Date of Birth</label></th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>  
        </div>
        <p style="margin-bottom: 10px; color: #D8CFD0;">Please make sure your family member list is accurrate. Next, you will be asked the specific needs of each person. After you answer these questions, the form will be complete. Thank you.</p>
        <p style="text-align:center"><button type="submit" id="btn_fm_done" name="btn_fm_done" disabled>Confirm &amp; Continue</button></p>
      </div>

    </form>
  </main>
  <footer>
    <p style="text-align: center; background-color: white; color: black; margin: 0; padding: 20px 10px;">This service brought to you and your family by...</p>
    <p style="text-align: center; background-color: white; padding: 0; margin: 0;">
      <a href="https://healcharlotte.org" target="_blank"><img style="vertical-align: text-top; padding-bottom: 1rem; height: 5rem;" src="images/hc-logo.png" alt="Heal Charlotte Logo"></a>
      <img src="images/pixel.gif" style="height: 3rem; vertical-align: text-top; border: 0;" alt="Blank placeholder GIF">
      <a href="https://usawebschool.org" target="_blank"><img style="vertical-align: text-top; height: 4rem;" src="images/usaws-logo.png" alt="USA Web School Logo"></a>
    </p>
  </footer>

  <!-- LOAD jQuery from CDN or load from local scripts folder if CDN unavailable -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/jquery-3.4.1.min.js"><\/script>')</script>
  
  <!-- LOAD jQueryUI from CDN or load from local scripts folder if CDN unavailable -->
  <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script> -->
  <!-- <script>window.jQuery.ui || document.write('<script src="js/jquery-ui-1.12.1.min.js"><\/script>')</script> -->

  <script src="scripts/main.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID.
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-142910708-1', 'auto'); ga('set', 'transport', 'beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
  -->

</body>
</html>