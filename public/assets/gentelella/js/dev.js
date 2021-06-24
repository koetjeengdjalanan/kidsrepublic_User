// Martin

// Dwiki
$(document).ready(function () {
  // Memberikan timer untuk alert muncul dan menghilang
  $("#alert")
    .fadeTo(2000, 500)
    .slideUp(500, function () {
      $("#alert").slideUp(500);
    });

  $("#birthday").ready(function timeFunctionLong(input) {
    setTimeout(function () {
      input.type = "text";
    }, 60000);
  });

  // Menyetting tabel untuk order secara tanggal
  $("#datatable-buttons").dataTable({
    destroy: true,
    order: [[2, "asc"]],
  });
  var first_time = parseInt($("#first_time").val());
  if (first_time == 1) {
    $("#ModalFirstTime").modal("show");
  }
  $("#mayor").hide();
  $("#level").change(function () {
    console.log(this.value);
    switch (this.value) {
      case "2":
        $("#mayor").show();
        break;
      default:
        $("#mayor").hide();
        break;
    }
  });

  $(".buttonNext").click(function () {
    $("wizard_steps").animate({ scrollTop: 0 }, 1000);
    return false;
  });

  $("#add_NonFormalEdu").on("click", addNonFormalEdu);
  $("#remove_NonFormalEdu").on("click", removeNonFormalEdu);

  $("#add_studentRelationship").on("click", addStudentRelationship);
  $("#remove_studentRelationship").on("click", removeStudentRelationship);

  $("#add_studentImmunization").on("click", addStudentImmunization);
  $("#remove_studentImmunization").on("click", removeStudentImmunization);

  $("#add_studentHealthHistory").on("click", addStudentHealthHistory);
  $("#remove_studentHealthHistory").on("click", removeStudentHealthHistory);

  $("#add_studentAllergies").on("click", addStudentAllergies);
  $("#remove_studentAllergies").on("click", removeStudentAllergies);

  $("#add_vehicle").on("click", addVehicle);
  $("#remove_vehicle").on("click", removeVehicle);

  $("#add_relationship_parentQuest").on("click", addRelationshipParentsQuest);
  $("#remove_relationship_parentQuest").on(
    "click",
    removeRelationshipParentsQuest
  );
  // Dropzone.options.userschool = {
  //   acceptedFiles: application / pdf,
  //   maxFilesize: 5, //MB
  // };
});

function addNonFormalEdu() {
  var new_chq_no = parseInt($("#total_nonFormalEdu").val()) + 1;

  var lesson_activities = addInputFieldRow(
    "lesson_activities",
    "Type of Lesson/Activities",
    new_chq_no
  );
  var location = addInputFieldRow(
    "location_nonformal_edu",
    "Location",
    new_chq_no
  );
  var days_week = addInputFieldRow(
    "daysweek_nonformal_edu",
    "Days/Week",
    new_chq_no
  );
  var hours_session = addInputFieldRow(
    "hourssession_nonformal_edu",
    "Hours/Session",
    new_chq_no
  );
  var start_year = addInputFieldRow(
    "startyear_nonformal_edu",
    "Starting Year",
    new_chq_no
  );
  var end_year = addInputFieldRow(
    "endyear_nonformal_edu",
    "Ending Year",
    new_chq_no
  );

  var new_inputs =
    lesson_activities +
    location +
    days_week +
    hours_session +
    start_year +
    end_year;
  $("#col_nonformal_edu").append(new_inputs);
  $("#total_nonFormalEdu").val(new_chq_no);
  displayButtonRemove("remove_NonFormalEdu", true);
}

function removeNonFormalEdu() {
  var last_chq_no = $("#total_nonFormalEdu").val();
  var count = $("#count_nonFormalEdu").val();
  if (last_chq_no > 1) {
    if (last_chq_no - 1 == count) {
      displayButtonRemove("remove_NonFormalEdu");
    }
    $("#lesson_activities_row_" + last_chq_no).remove();
    $("#location_nonformal_edu_row_" + last_chq_no).remove();
    $("#daysweek_nonformal_edu_row_" + last_chq_no).remove();
    $("#hourssession_nonformal_edu_row_" + last_chq_no).remove();
    $("#startyear_nonformal_edu_row_" + last_chq_no).remove();
    $("#endyear_nonformal_edu_row_" + last_chq_no).remove();
    $("#total_nonFormalEdu").val(last_chq_no - 1);
  }
}

function addStudentRelationship() {
  var new_chq_no = parseInt($("#total_studentRelationship").val()) + 1;

  var person_name = addInputFieldRow(
    "person_name",
    "Name as in Birth Certificate",
    new_chq_no
  );
  var person_relationship = addInputFieldRow(
    "person_relationship",
    "Relationship with the Child",
    new_chq_no
  );
  var person_address = addInputFieldRow(
    "person_address",
    "Address",
    new_chq_no
  );
  var person_phone = addInputFieldRow(
    "person_phone",
    "Phone Number",
    new_chq_no
  );
  var person_email = addInputFieldRow("person_email", "Email", new_chq_no);

  var new_inputs =
    person_name +
    person_relationship +
    person_address +
    person_phone +
    person_email;

  $("#col_studentRelationship").append(new_inputs);
  $("#total_studentRelationship").val(new_chq_no);
  displayButtonRemove("remove_studentRelationship", true);
}

function removeStudentRelationship() {
  var last_chq_no = $("#total_studentRelationship").val();
  var count = $("#count_studentRelationship").val();
  if (last_chq_no > 1) {
    if (last_chq_no - 1 == count) {
      displayButtonRemove("remove_studentRelationship");
    }
    $("#person_name_row_" + last_chq_no).remove();
    $("#person_relationship_row_" + last_chq_no).remove();
    $("#person_address_row_" + last_chq_no).remove();
    $("#person_phone_row_" + last_chq_no).remove();
    $("#person_email_row_" + last_chq_no).remove();
    $("#total_studentRelationship").val(last_chq_no - 1);
  }
}

function addStudentImmunization() {
  var new_chq_no = parseInt($("#total_studentImmunization").val()) + 1;

  var immunization_type = addInputFieldRow(
    "new_type_immunization",
    "Type of Immunization",
    new_chq_no
  );
  var immunization_year = addInputFieldRow(
    "new_year_immunization",
    "Year of Immunization",
    new_chq_no
  );

  var new_inputs = immunization_type + immunization_year;

  $("#col_studentImmunization").append(new_inputs);
  $("#total_studentImmunization").val(new_chq_no);
  displayButtonRemove("remove_studentImmunization", true);
}

function removeStudentImmunization() {
  var last_chq_no = $("#total_studentImmunization").val();
  var count = $("#count_studentImmunization").val();
  if (last_chq_no > 1) {
    if (last_chq_no - 1 == count) {
      displayButtonRemove("remove_studentImmunization");
    }
    $("#new_type_immunization_row_" + last_chq_no).remove();
    $("#new_year_immunization_row_" + last_chq_no).remove();
    $("#total_studentImmunization").val(last_chq_no - 1);
  }
}

function addStudentHealthHistory() {
  var new_chq_no = parseInt($("#total_studentHealthHistory").val()) + 1;

  var sickness = addInputFieldRow(
    "new_sickness_history",
    "Sickness/Disorder",
    new_chq_no
  );
  var age = addInputFieldRow("new_age_history", "Age", new_chq_no);
  var prevention_medication = addInputFieldRow(
    "new_prevention_history",
    "Prevention/Medication",
    new_chq_no
  );

  var new_inputs = sickness + age + prevention_medication;

  $("#col_studentHealthHistory").append(new_inputs);
  $("#total_studentHealthHistory").val(new_chq_no);
  displayButtonRemove("remove_studentHealthHistory", true);
}

function removeStudentHealthHistory() {
  var last_chq_no = $("#total_studentHealthHistory").val();
  var count = $("#count_studentHealthHistory").val();
  if (last_chq_no > 1) {
    if (last_chq_no - 1 == count) {
      displayButtonRemove("remove_studentHealthHistory");
    }
    $("#new_sickness_history_row_" + last_chq_no).remove();
    $("#new_age_history_row_" + last_chq_no).remove();
    $("#new_prevention_history_row_" + last_chq_no).remove();
    $("#total_studentHealthHistory").val(last_chq_no - 1);
  }
}

function addStudentAllergies() {
  var new_chq_no = parseInt($("#total_studentAllergies").val()) + 1;

  var allergies = addInputFieldRow(
    "new_allergies",
    "Type of Allergy",
    new_chq_no
  );
  var age = addInputFieldRow("new_age_allergies", "Age", new_chq_no);
  var prevention_medication = addInputFieldRow(
    "new_prevention_allergies",
    "Prevention/Medication",
    new_chq_no
  );

  var new_inputs = allergies + age + prevention_medication;

  $("#col_studentAllergies").append(new_inputs);
  $("#total_studentAllergies").val(new_chq_no);
  displayButtonRemove("remove_studentAllergies", true);
}

function removeStudentAllergies() {
  var last_chq_no = $("#total_studentAllergies").val();
  var count = $("#count_studentAllergies").val();
  if (last_chq_no > 1) {
    if (last_chq_no - 1 == count) {
      displayButtonRemove("remove_studentAllergies");
    }
    $("#new_allergies_row_" + last_chq_no).remove();
    $("#new_age_allergies_row_" + last_chq_no).remove();
    $("#new_prevention_allergies_row_" + last_chq_no).remove();
    $("#total_studentAllergies").val(last_chq_no - 1);
  }
}

function addVehicle() {
  var new_chq_no = parseInt($("#total_vehicle").val()) + 1;
  var no_plat = addInputFieldVehicleRow("no_plat", "No Plat", new_chq_no);
  var pickup_name = addInputFieldVehicleRow(
    "pickup_name",
    "Pick Up Person Name",
    new_chq_no
  );
  var pickup_number = addInputFieldVehicleRow(
    "pickup_number",
    "Pick Up Person Number",
    new_chq_no
  );
  var new_inputs = no_plat + pickup_name + pickup_number;

  $("#col_studentVehicle").append(new_inputs);
  $("#total_vehicle").val(new_chq_no);
  displayButton("add_vehicle", "remove_vehicle");
}

function removeVehicle() {
  var last_chq_no = $("#total_vehicle").val();
  if (last_chq_no > 1) {
    $("#no_plat_row_" + last_chq_no).remove();
    $("#pickup_name_row_" + last_chq_no).remove();
    $("#pickup_number_row_" + last_chq_no).remove();
    $("#total_vehicle").val(last_chq_no - 1);
    displayButton("add_vehicle", "remove_vehicle");
  }
}
function addRelationshipParentsQuest() {
  var new_chq_no = parseInt($("#total_relationship_parentQuest").val()) + 1;
  console.log(new_chq_no);
  console.log('test');

  var person_name = addInputFieldVehicleRow("person_name", "Name", new_chq_no);
  var person_ages = addInputFieldVehicleRow("person_ages", "Ages", new_chq_no);
  var person_relationship = addInputFieldVehicleRow(
    "person_relationship",
    "Relationship to Child",
    new_chq_no
  );

  var new_inputs = person_name + person_ages + person_relationship;

  $("#col_relationship_parentsQuest").append(new_inputs);
  $("#total_relationship_parentQuest").val(new_chq_no);
  displayButtonRemove("remove_relationship_parentQuest", true);
}

function removeRelationshipParentsQuest() {
  var last_chq_no = $("#total_relationship_parentQuest").val();
  var count = $("#count_relationship_parentQuest").val();
  if (last_chq_no > 1) {
    if (last_chq_no - 1 == count) {
      displayButtonRemove("remove_relationship_parentQuest");
    }
    $("#person_name_row_" + last_chq_no).remove();
    $("#person_ages_row_" + last_chq_no).remove();
    $("#person_relationship_row_" + last_chq_no).remove();
    $("#total_relationship_parentQuest").val(last_chq_no - 1);
  }
}

function addInputFieldRow(name, label_name, no) {
  var field =
    "<div class='row' style='width: 100%;' id='" +
    name +
    "_row_" +
    no +
    "'><label class='col-12 col-sm-12 col-md-2 offset-md-2'>" +
    label_name +
    "</label><div class='col-12 col-sm-12 col-md-5'><input type='text' id='" +
    name +
    "_" +
    no +
    "' name='" +
    name +
    "_" +
    no +
    "' class='form-control '></div></div>";
  return field;
}

function addInputFieldVehicleRow(name, label_name, no) {
  var field =
    "<div class='row' style='width: 100%;' id='" +
    name +
    "_row_" +
    no +
    "'><label class='col-12 col-sm-12 col-md-2 offset-md-2'>" +
    label_name +
    "</label><input type='text' id='" +
    name +
    "_" +
    no +
    "' name='" +
    name +
    "_" +
    no +
    "' class='col-12 col-sm-12 col-md-6 form-control ' style='margin-right: 10px;'></div>";
  return field;
}

function displayButton(id_button_add, id_button_remove) {
  var button_add = document.getElementById(id_button_add);
  var button_remove = document.getElementById(id_button_remove);

  if (button_remove.style.display === "none") {
    button_remove.style.display = "block";
    button_add.style.display = "none";
  } else {
    button_remove.style.display = "none";
    button_add.style.display = "block";
  }
}

function displayButtonRemove(id_button_remove, whenAdd = false) {
  var button_remove = document.getElementById(id_button_remove);

  if (whenAdd == true) {
    if (button_remove.style.display === "none") {
      button_remove.style.display = "block";
    }
  } else {
    if (button_remove.style.display === "none") {
      button_remove.style.display = "block";
    } else {
      button_remove.style.display = "none";
    }
  }
}
