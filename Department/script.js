

function selectAllOptions() {
    // Get the "All" checkbox
    var allCheckbox = document.getElementById("all");

    // Get all the checkboxes excluding the "All" checkbox
    var checkboxes = document.querySelectorAll('.section_selector input[type="checkbox"]:not(#all)');

    // Set the state of other checkboxes based on the "All" checkbox
    checkboxes.forEach(function (checkbox) {
        checkbox.checked = allCheckbox.checked;
    });
}

function validateForm() {
    var startDate = document.getElementById("startDate").value;
    var endDate = document.getElementById("endDate").value;

    var startDateTime = new Date(startDate).getTime();
    var endDateTime = new Date(endDate).getTime();
    if (startDateTime >= endDateTime) {
        alert("Start date must be before end date");
        return false;
    } // Prevent form submission
    else {
        document.getElementById("dateError").innerHTML = "";
        return true; // Allow form submission
    }
}

function validateFormForReport() {
    // Get current date
    // var currentDate = new Date();

    // Get start and end date values
    var startDate = document.getElementById("startDate").value;
    var endDate = document.getElementById("endDate").value;

    // Parse dates to compare
    var startDateTime = new Date(startDate).getTime();
    var endDateTime = new Date(endDate).getTime();
    // var currentDateTime = currentDate.getTime();

    // Check if start date is before end date
    if (startDateTime >= endDateTime) {
        alert("Start date must be before end date");
        return false;
    }// Prevent form submission
    // } else if (endDateTime > currentDateTime) {
    //     alert("End date cannot be greater than current date");
    //     return false; // Prevent form submission
    // } 
    else {
        // Clear error messages
        document.getElementById("dateError").innerHTML = "";
        return true; // Allow form submission
    }
}

const dashboardBtn = document.getElementById("dashboard-btn");
const dashboard = document.getElementById("dashboard");
const form1 = document.getElementById("form-1");
const form2 = document.getElementById("form-2");
const form3 = document.getElementById("form-3");
const form4 = document.getElementById("form-4");
const form5 = document.getElementById("form-5");
const form6 = document.getElementById("form-6");
const form7 = document.getElementById("form-7");
const form8 = document.getElementById("form-8");
const form9 = document.getElementById("form-9");
const form10 = document.getElementById("form-10");
const form11 = document.getElementById("form-11");
const form12 = document.getElementById("form-12");
const form13 = document.getElementById("form-13");
const form14 = document.getElementById("form-14");
const form15 = document.getElementById("form-15");
const table1 = document.getElementById("table-1");
const table2 = document.getElementById("table-2");
const table3 = document.getElementById("table-3");
const table4 = document.getElementById("table-4");
const table5 = document.getElementById("table-5");
const table6 = document.getElementById("table-6");
const table7 = document.getElementById("table-7");
const table8 = document.getElementById("table-8");
const table9 = document.getElementById("table-9");
const table10 = document.getElementById("table-10");
const table11 = document.getElementById("table-11");
const table12 = document.getElementById("table-12");
const table13 = document.getElementById("table-13");
const table14 = document.getElementById("table-14");
const table15 = document.getElementById("table-15");
const addData = document.getElementById("add-data");
const viewData = document.getElementById("view-data");
const sublistTable = document.getElementById("view-data-list");
const sublistFrom = document.getElementById("add-data-list");
const reportBtn = document.getElementById("report-btn");
const report = document.getElementById("report");






dashboardBtn.addEventListener("click", function () {
    console.log("click hua?")
    dashboard.style.display = "block";
    form1.style.display = "none";
    form2.style.display = "none";
    form3.style.display = "none";
    form4.style.display = "none";
    form5.style.display = "none";
    form6.style.display = "none";
    form7.style.display = "none";
    form8.style.display = "none";
    form9.style.display = "none";
    form10.style.display = "none";
    form11.style.display = "none";
    form12.style.display = "none";
    form13.style.display = "none";
    form14.style.display = "none";
    form15.style.display = "none";
    table1.style.display = "none";
    table2.style.display = "none";
    table3.style.display = "none";
    table4.style.display = "none";
    table5.style.display = "none";
    table6.style.display = "none";
    table7.style.display = "none";
    table8.style.display = "none";
    table9.style.display = "none";
    table10.style.display = "none";
    table11.style.display = "none";
    table12.style.display = "none";
    table13.style.display = "none";
    table14.style.display = "none";
    table15.style.display = "none";
    report.style.display = "none";

    dashboardBtn.classList.add('active');
    reportBtn.classList.remove('active');
    viewData.classList.remove("active");
    addData.classList.remove("active");

    sublistFrom.style.display = 'none';
    sublistTable.style.display = 'none';
    report.style.display - 'none';
});

viewData.addEventListener("click", function () {
    sublistTable.style.display = sublistTable.style.display === "none" ? "block" : "none";
    sublistFrom.style.display = "none";

    dashboardBtn.classList.remove('active');
    reportBtn.classList.remove('active');
    viewData.classList.add("active");
    addData.classList.remove("active");
});

addData.addEventListener("click", function () {
    sublistTable.style.display = "none";
    sublistFrom.style.display = sublistFrom.style.display === "none" ? "block" : "none";

    dashboardBtn.classList.remove('active');
    reportBtn.classList.remove('active');
    viewData.classList.remove("active");
    addData.classList.add("active");
});

const showForm = (form) => {
    dashboard.style.display = "none";
    form1.style.display = "none";
    form2.style.display = "none";
    form3.style.display = "none";
    form4.style.display = "none";
    form5.style.display = "none";
    form6.style.display = "none";
    form7.style.display = "none";
    form8.style.display = "none";
    form9.style.display = "none";
    form10.style.display = "none";
    form11.style.display = "none";
    form12.style.display = "none";
    form13.style.display = "none";
    form14.style.display = "none";
    form15.style.display = "none";
    table1.style.display = "none";
    table2.style.display = "none";
    table3.style.display = "none";
    table4.style.display = "none";
    table5.style.display = "none";
    table6.style.display = "none";
    table7.style.display = "none";
    table8.style.display = "none";
    table9.style.display = "none";
    table10.style.display = "none";
    table11.style.display = "none";
    table12.style.display = "none";
    table13.style.display = "none";
    table14.style.display = "none";
    table15.style.display = "none";
    report.style.display = "none";
    form.style.display = "block";
};

document.getElementById("form-1-btn").addEventListener("click", () => showForm(form1));
document.getElementById("form-2-btn").addEventListener("click", () => showForm(form2));
document.getElementById("form-3-btn").addEventListener("click", () => showForm(form3));
document.getElementById("form-4-btn").addEventListener("click", () => showForm(form4));
document.getElementById("form-5-btn").addEventListener("click", () => showForm(form5));
document.getElementById("form-6-btn").addEventListener("click", () => showForm(form6));
document.getElementById("form-7-btn").addEventListener("click", () => showForm(form7));
document.getElementById("form-8-btn").addEventListener("click", () => showForm(form8));
document.getElementById("form-9-btn").addEventListener("click", () => showForm(form9));
document.getElementById("form-10-btn").addEventListener("click", () => showForm(form10));
document.getElementById("form-11-btn").addEventListener("click", () => showForm(form11));
document.getElementById("form-12-btn").addEventListener("click", () => showForm(form12));
document.getElementById("form-13-btn").addEventListener("click", () => showForm(form13));
document.getElementById("form-14-btn").addEventListener("click", () => showForm(form14));
document.getElementById("form-15-btn").addEventListener("click", () => showForm(form15));


const showTable = (table) => {
    dashboard.style.display = "none";
    form1.style.display = "none";
    form2.style.display = "none";
    form3.style.display = "none";
    form4.style.display = "none";
    form5.style.display = "none";
    form6.style.display = "none";
    form7.style.display = "none";
    form8.style.display = "none";
    form9.style.display = "none";
    form10.style.display = "none";
    form11.style.display = "none";
    form12.style.display = "none";
    form13.style.display = "none";
    form14.style.display = "none";
    form15.style.display = "none";
    table1.style.display = "none";
    table2.style.display = "none";
    table3.style.display = "none";
    table4.style.display = "none";
    table5.style.display = "none";
    table6.style.display = "none";
    table7.style.display = "none";
    table8.style.display = "none";
    table9.style.display = "none";
    table10.style.display = "none";
    table11.style.display = "none";
    table12.style.display = "none";
    table13.style.display = "none";
    table14.style.display = "none";
    table15.style.display = "none";
    report.style.display = "none";
    table.style.display = "block";

    console.log("ye table show hona chahiye--", table);
};

document.getElementById("table-1-btn").addEventListener("click", () => showTable(table1));
document.getElementById("table-2-btn").addEventListener("click", () => showTable(table2));
document.getElementById("table-3-btn").addEventListener("click", () => showTable(table3));
document.getElementById("table-4-btn").addEventListener("click", () => showTable(table4));
document.getElementById("table-5-btn").addEventListener("click", () => showTable(table5));
document.getElementById("table-6-btn").addEventListener("click", () => showTable(table6));
document.getElementById("table-7-btn").addEventListener("click", () => showTable(table7));
document.getElementById("table-8-btn").addEventListener("click", () => showTable(table8));
document.getElementById("table-9-btn").addEventListener("click", () => showTable(table9));
document.getElementById("table-10-btn").addEventListener("click", () => showTable(table10));
document.getElementById("table-11-btn").addEventListener("click", () => showTable(table11));
document.getElementById("table-12-btn").addEventListener("click", () => showTable(table12));
document.getElementById("table-13-btn").addEventListener("click", () => showTable(table13));
document.getElementById("table-14-btn").addEventListener("click", () => showTable(table14));
document.getElementById("table-15-btn").addEventListener("click", () => showTable(table15));


reportBtn.addEventListener("click", function () {
    dashboard.style.display = "none";
    form1.style.display = "none";
    form2.style.display = "none";
    form3.style.display = "none";
    form4.style.display = "none";
    form5.style.display = "none";
    form6.style.display = "none";
    form7.style.display = "none";
    form8.style.display = "none";
    form9.style.display = "none";
    form10.style.display = "none";
    form11.style.display = "none";
    form12.style.display = "none";
    form13.style.display = "none";
    form14.style.display = "none";
    form15.style.display = "none";
    table1.style.display = "none";
    table2.style.display = "none";
    table3.style.display = "none";
    table4.style.display = "none";
    table5.style.display = "none";
    table6.style.display = "none";
    table7.style.display = "none";
    table8.style.display = "none";
    table9.style.display = "none";
    table10.style.display = "none";
    table11.style.display = "none";
    table12.style.display = "none";
    table13.style.display = "none";
    table14.style.display = "none";
    table15.style.display = "none";
    report.style.display = "block";

    dashboardBtn.classList.remove('active');
    reportBtn.classList.add('active');
    viewData.classList.remove("active");
    addData.classList.remove("active");

    sublistFrom.style.display = 'none';
    sublistTable.style.display = 'none';

});

// table data showing
$(document).ready(function () {
    $('#student_achievements').DataTable({
        //disable sorting on last column
        "columnDefs": [
            { "orderable": false, "targets": 7 }
        ],
        language: {
            //customize pagination prev and next buttons: use arrows instead of words
            'paginate': {
                'previous': '<span class="fa fa-chevron-left"></span>',
                'next': '<span class="fa fa-chevron-right"></span>'
            },
            //customize number of elements to be displayed
            "lengthMenu": 'Display <select class="form-control input-sm">' +
                '<option value="5">5</option>' +
                '<option value="10">10</option>' +
                '<option value="20">20</option>' +
                '<option value="30">30</option>' +
                '<option value="-1">All</option>' +
                '</select> results'
        }
    })
});

$(document).ready(function () {
    $('#faculty_qualification').DataTable({
        //disable sorting on last column
        "columnDefs": [
            { "orderable": false, "targets": 5 }
        ],
        language: {
            //customize pagination prev and next buttons: use arrows instead of words
            'paginate': {
                'previous': '<span class="fa fa-chevron-left"></span>',
                'next': '<span class="fa fa-chevron-right"></span>'
            },
            //customize number of elements to be displayed
            "lengthMenu": 'Display <select class="form-control input-sm">' +
                '<option value="5">5</option>' +
                '<option value="10">10</option>' +
                '<option value="20">20</option>' +
                '<option value="30">30</option>' +
                '<option value="-1">All</option>' +
                '</select> results'
        }
    })
});

$(document).ready(function () {
    $('#community_services').DataTable({
        //disable sorting on last column
        "columnDefs": [
            { "orderable": false, "targets": 4 }
        ],
        language: {
            //customize pagination prev and next buttons: use arrows instead of words
            'paginate': {
                'previous': '<span class="fa fa-chevron-left"></span>',
                'next': '<span class="fa fa-chevron-right"></span>'
            },
            //customize number of elements to be displayed
            "lengthMenu": 'Display <select class="form-control input-sm">' +
                '<option value="5">5</option>' +
                '<option value="10">10</option>' +
                '<option value="20">20</option>' +
                '<option value="30">30</option>' +
                '<option value="-1">All</option>' +
                '</select> results'
        }
    })
});

$(document).ready(function () {
    $('#conferences').DataTable({
        //disable sorting on last column
        "columnDefs": [
            { "orderable": false, "targets": 5 }
        ],
        language: {
            //customize pagination prev and next buttons: use arrows instead of words
            'paginate': {
                'previous': '<span class="fa fa-chevron-left"></span>',
                'next': '<span class="fa fa-chevron-right"></span>'
            },
            //customize number of elements to be displayed
            "lengthMenu": 'Display <select class="form-control input-sm">' +
                '<option value="5">5</option>' +
                '<option value="10">10</option>' +
                '<option value="20">20</option>' +
                '<option value="30">30</option>' +
                '<option value="-1">All</option>' +
                '</select> results'
        }
    })
});

$(document).ready(function () {
    $('#conferences_attened').DataTable({
        //disable sorting on last column
        "columnDefs": [
            { "orderable": false, "targets": 5 }
        ],
        language: {
            //customize pagination prev and next buttons: use arrows instead of words
            'paginate': {
                'previous': '<span class="fa fa-chevron-left"></span>',
                'next': '<span class="fa fa-chevron-right"></span>'
            },
            //customize number of elements to be displayed
            "lengthMenu": 'Display <select class="form-control input-sm">' +
                '<option value="5">5</option>' +
                '<option value="10">10</option>' +
                '<option value="20">20</option>' +
                '<option value="30">30</option>' +
                '<option value="-1">All</option>' +
                '</select> results'
        }
    })
});


$(document).ready(function () {
    $('#expert_lectures').DataTable({
        //disable sorting on last column
        "columnDefs": [
            { "orderable": false, "targets": 6 }
        ],
        language: {
            //customize pagination prev and next buttons: use arrows instead of words
            'paginate': {
                'previous': '<span class="fa fa-chevron-left"></span>',
                'next': '<span class="fa fa-chevron-right"></span>'
            },
            //customize number of elements to be displayed
            "lengthMenu": 'Display <select class="form-control input-sm">' +
                '<option value="5">5</option>' +
                '<option value="10">10</option>' +
                '<option value="20">20</option>' +
                '<option value="30">30</option>' +
                '<option value="-1">All</option>' +
                '</select> results'
        }
    })
});

$(document).ready(function () {
    $('#expert_lecturesinvited').DataTable({
        //disable sorting on last column
        "columnDefs": [
            { "orderable": false, "targets": 5 }
        ],
        language: {
            //customize pagination prev and next buttons: use arrows instead of words
            'paginate': {
                'previous': '<span class="fa fa-chevron-left"></span>',
                'next': '<span class="fa fa-chevron-right"></span>'
            },
            //customize number of elements to be displayed
            "lengthMenu": 'Display <select class="form-control input-sm">' +
                '<option value="5">5</option>' +
                '<option value="10">10</option>' +
                '<option value="20">20</option>' +
                '<option value="30">30</option>' +
                '<option value="-1">All</option>' +
                '</select> results'
        }
    })
});

$(document).ready(function () {
    $('#consultancy').DataTable({
        //disable sorting on last column
        "columnDefs": [
            { "orderable": false, "targets": 6 }
        ],
        language: {
            //customize pagination prev and next buttons: use arrows instead of words
            'paginate': {
                'previous': '<span class="fa fa-chevron-left"></span>',
                'next': '<span class="fa fa-chevron-right"></span>'
            },
            //customize number of elements to be displayed
            "lengthMenu": 'Display <select class="form-control input-sm">' +
                '<option value="5">5</option>' +
                '<option value="10">10</option>' +
                '<option value="20">20</option>' +
                '<option value="30">30</option>' +
                '<option value="-1">All</option>' +
                '</select> results'
        }
    })
});

$(document).ready(function () {
    $('#patents').DataTable({
        //disable sorting on last column
        "columnDefs": [
            { "orderable": false, "targets": 4 }
        ],
        language: {
            //customize pagination prev and next buttons: use arrows instead of words
            'paginate': {
                'previous': '<span class="fa fa-chevron-left"></span>',
                'next': '<span class="fa fa-chevron-right"></span>'
            },
            //customize number of elements to be displayed
            "lengthMenu": 'Display <select class="form-control input-sm">' +
                '<option value="5">5</option>' +
                '<option value="10">10</option>' +
                '<option value="20">20</option>' +
                '<option value="30">30</option>' +
                '<option value="-1">All</option>' +
                '</select> results'
        }
    })
});

$(document).ready(function () {
    $('#journal1').DataTable({
        //disable sorting on last column
        "columnDefs": [
            { "orderable": false, "targets": 5 }
        ],
        language: {
            //customize pagination prev and next buttons: use arrows instead of words
            'paginate': {
                'previous': '<span class="fa fa-chevron-left"></span>',
                'next': '<span class="fa fa-chevron-right"></span>'
            },
            //customize number of elements to be displayed
            "lengthMenu": 'Display <select class="form-control input-sm">' +
                '<option value="5">5</option>' +
                '<option value="10">10</option>' +
                '<option value="20">20</option>' +
                '<option value="30">30</option>' +
                '<option value="-1">All</option>' +
                '</select> results'
        }
    })
});


$(document).ready(function () {
    $('#nationalconference1').DataTable({
        //disable sorting on last column
        "columnDefs": [
            { "orderable": false, "targets": 5 }
        ],
        language: {
            //customize pagination prev and next buttons: use arrows instead of words
            'paginate': {
                'previous': '<span class="fa fa-chevron-left"></span>',
                'next': '<span class="fa fa-chevron-right"></span>'
            },
            //customize number of elements to be displayed
            "lengthMenu": 'Display <select class="form-control input-sm">' +
                '<option value="5">5</option>' +
                '<option value="10">10</option>' +
                '<option value="20">20</option>' +
                '<option value="30">30</option>' +
                '<option value="-1">All</option>' +
                '</select> results'
        }
    })
});

$(document).ready(function () {
    $('#workshop1').DataTable({
        //disable sorting on last column
        "columnDefs": [
            { "orderable": false, "targets": 5 }
        ],
        language: {
            //customize pagination prev and next buttons: use arrows instead of words
            'paginate': {
                'previous': '<span class="fa fa-chevron-left"></span>',
                'next': '<span class="fa fa-chevron-right"></span>'
            },
            //customize number of elements to be displayed
            "lengthMenu": 'Display <select class="form-control input-sm">' +
                '<option value="5">5</option>' +
                '<option value="10">10</option>' +
                '<option value="20">20</option>' +
                '<option value="30">30</option>' +
                '<option value="-1">All</option>' +
                '</select> results'
        }
    })
});

$(document).ready(function () {
    $('#internationalconference').DataTable({
        //disable sorting on last column
        "columnDefs": [
            { "orderable": false, "targets": 5 }
        ],
        language: {
            //customize pagination prev and next buttons: use arrows instead of words
            'paginate': {
                'previous': '<span class="fa fa-chevron-left"></span>',
                'next': '<span class="fa fa-chevron-right"></span>'
            },
            //customize number of elements to be displayed
            "lengthMenu": 'Display <select class="form-control input-sm">' +
                '<option value="5">5</option>' +
                '<option value="10">10</option>' +
                '<option value="20">20</option>' +
                '<option value="30">30</option>' +
                '<option value="-1">All</option>' +
                '</select> results'
        }
    })
});


$(document).ready(function () {
    $('#funded').DataTable({
        //disable sorting on last column
        "columnDefs": [
            { "orderable": false, "targets": 7 }
        ],
        language: {
            //customize pagination prev and next buttons: use arrows instead of words
            'paginate': {
                'previous': '<span class="fa fa-chevron-left"></span>',
                'next': '<span class="fa fa-chevron-right"></span>'
            },
            //customize number of elements to be displayed
            "lengthMenu": 'Display <select class="form-control input-sm">' +
                '<option value="5">5</option>' +
                '<option value="10">10</option>' +
                '<option value="20">20</option>' +
                '<option value="30">30</option>' +
                '<option value="-1">All</option>' +
                '</select> results'
        }
    })
});

$(document).ready(function () {
    $('#other_services').DataTable({
        //disable sorting on last column
        "columnDefs": [
            { "orderable": false, "targets": 4 }
        ],
        language: {
            //customize pagination prev and next buttons: use arrows instead of words
            'paginate': {
                'previous': '<span class="fa fa-chevron-left"></span>',
                'next': '<span class="fa fa-chevron-right"></span>'
            },
            //customize number of elements to be displayed
            "lengthMenu": 'Display <select class="form-control input-sm">' +
                '<option value="5">5</option>' +
                '<option value="10">10</option>' +
                '<option value="20">20</option>' +
                '<option value="30">30</option>' +
                '<option value="-1">All</option>' +
                '</select> results'
        }
    })
});



function populateFormWithData(form, formName, dataId) {
    // Check if the form element exists
    if (form) {
        fetch(`./forms/fetchFormData.php?formName=${formName}&dataId=${dataId}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json();
            })
            .then(data => {
                console.log("data ye aaya aage se-->>", data)
                // Loop through each field in the data and populate the corresponding form field
                Object.keys(data).forEach(fieldName => {
                    const fieldValue = data[fieldName];
                    // Find the form field by name attribute
                    const field = form.querySelector(`[name="${fieldName}"]`);
                    if (field) {
                        // Populate the field value
                        field.value = fieldValue;
                    } else {
                        console.error(`Form field "${fieldName}" not found in the form.`);
                    }
                });
            })
    } else {
        console.error("Form element not found in the document.");
    }
}



function handleEditClick(event) {

    var id = event.currentTarget.getAttribute("data-id");
    console.log("id--", id);

    // Check if id is not null or undefined before redirecting
    if (id !== null && id !== undefined) {
        // Redirect to the edit page with the community service title as a parameter
        var idParts = id.split(":");
        if (idParts.length === 3) {
            var formName = idParts[0];
            var formId = idParts[1];
            var dataId = idParts[2];

            const form = document.getElementById(formId);

            showForm(form);
            populateFormWithData(form, formName, dataId);
        }
    } else {
        // Handle the case where id is null or undefined
        console.error("Invalid id for editing");
        // You may want to display an alert or handle the error in a way that suits your application
    }
}

function handleDeleteClick(id, table) {

    // window.alert("status button clicked with ID: " + id);
    fetch('../api/api.php', {
        method: 'POST',
        body: JSON.stringify({
            id: id,
            action: 'delete',
            table: table,
            column: 'Id'
        })
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            window.alert(data.message);

            // Reload the page after successful deletion
            location.reload();
        })
        .catch(error => {
            window.alert('Error: ' + error.message);
            // console.error('Error:', error);
            // window.alert('check console');
        });
    // location.reload();
}


document.addEventListener('DOMContentLoaded', function () {
    var editButtons = document.querySelectorAll(".edit_btn");

    editButtons.forEach(function (button) {
        button.addEventListener("click", handleEditClick);
    });
});