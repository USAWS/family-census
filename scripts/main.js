function delete_row(id) {
  var element = "#row_" + id;
  $(element).remove();
  return false;
}

$(document).ready(function() {
  
  $("body").delegate('table tbody tr td input', "change blur", function(e) {
  	var n = $("table tbody tr td input:invalid").length;
    if (n == 0) {
      $('#btn_fm_done').prop("disabled", false);
    } else {
      $('#btn_fm_done').prop("disabled", true);
    }
  });

  var fm_count = 1;

  $('input[name="need_suppliesYN"]').change(function() {
    if (this.value == "Yes") {
      $('#if_supplies_needed').removeClass("hidden").addClass("visible ic").html('<label for="supplies_needed">Please provide a detailed list<span class="red">*</span></label><br><textarea id="supplies_needed" name="supplies_needed" rows="3" minlength="2" maxlength="1024" required="true"></textarea>');
    } else {
      $('#if_supplies_needed').removeClass("visible ic").addClass("hidden").html("");
    }
  });

  $('#btn_add_fm').click(function() {
    var html = '';
    html += '<tr id="row_' + fm_count + '">';
    html += '  <td><button type="button" onclick="delete_row(' + fm_count + ');">X</button></td>';
    html += '  <td><input class="fm" type="text" id="fm_name_' + fm_count + '" name="fm_name_' + fm_count + '"  minlength="2" maxlength="32" required="required"></td>';
    html += '  <td><input class="fm" type="date" id="fm_dob_' + fm_count + '" name="fm_dob_' + fm_count + '" required="required"></td>';
    html += '</tr>';

    tableBody = $("table tbody"); 
    tableBody.append(html);

    fm_count++;
  });

  $('#btn_fm_done').click(function(e) {
    e.preventDefault();
    // check form before continuing

    $("#family_census_form").submit();

  });

});