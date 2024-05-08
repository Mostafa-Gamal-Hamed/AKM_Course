///// JQuery Start

//// Add Financial Accounts

/// Show Manager Or Tutor
$(document).ready(function () {
    $("#managerButton").click(function (e) {
        $("#managerAccount").toggle(500);
        $("#tutorAccount").hide(500);
    });
    $("#tutorButton").click(function (e) {
        $("#tutorAccount").toggle(500);
        $("#managerAccount").hide(500);
    });
});

/// manager

// Get Amount
$(document).ready(function () {
    $("#yuan, #currency").on("keyup", function () {
        calculate();
    });
    function calculate() {
        var yuan = parseFloat($("#yuan").val()) || 0;
        var currency = parseFloat($("#currency").val()) || 0;

        var total = yuan * currency;

        $("#amount").val(total);
    }
    calculate();
});
// Get The rest
$(document).ready(function () {
    $("#amount, #salary, #expenses").on("keyup", function () {
        calculate();
    });
    function calculate() {
        var amount = parseFloat($("#amount").val()) || 0;
        var salary = parseFloat($("#salary").val()) || 0;
        var expenses = parseFloat($("#expenses").val()) || 0;

        var total = amount - salary - expenses;
        var manager = total / 3;

        $("#rest").val(total);

        // Get manager salary
        $("#amr").val(manager);
        $("#khaled").val(manager);
        $("#mostafa").val(manager);
    }
    calculate();
});

/// tutor
$(document).ready(function () {
    $("#Kpis, #tutorSalary, #Deduction, #Additional").on("keyup", function () {
        calculate();
    });
    function calculate() {
        var kpis = parseFloat($("#Kpis").val()) || 0;
        var salary = parseFloat($("#tutorSalary").val()) || 0;
        var deduc = parseFloat($("#Deduction").val()) || 0;
        var add = parseFloat($("#Additional").val()) || 0;

        var total = kpis + salary - deduc + add;

        $("#Total").val(total);
    }
    calculate();
});

// validation
$(document).ready(function() {
    function isNumeric(value) {
        return !isNaN(parseFloat(value)) && isFinite(value);
    }

    function validateInputs() {
        $('.numeric-input').each(function() {
            if (!isNumeric($(this).val())) {
                $(this).css('border','2px solid red');
            } else {
                $(this).css('border','2px solid green');
            }
        });
    }

    $('.numeric-input').on('keyup', function() {
        validateInputs();
    });
});


//// Curriculums
$(document).ready(function () {
    $("#addCurriculum").click(function (e) {
        $("#curriculumForm").toggle(500);
    });
});


//// Add Tutor
$(document).ready(function() {
    $("#image").on("change", function(event) {
        var fileInput = event.target;
        var file = fileInput.files[0];

        if (file) {
            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function() {
                var dataURL = reader.result;
                $("#imagePreview").attr("src", dataURL);
                $("#imagePreview").css("display", "block");
            };
        } else {
            $("#imagePreview").attr("src", "");
            $("#imagePreview").css("display", "none");
        }
    })
});


///// JavaScript Start

// Catch data
var tutor = document.getElementById("Tutor");
var tutorError = document.getElementById("TutorError");

var yearMonth = document.getElementById("tutorYearMonth");
var yearMonthError = document.getElementById("tutorYearMonthError");

var Week = document.getElementById("tutorWeek");
var WeekError = document.getElementById("tutorWeekError");

var days = document.getElementById("Days");
var daysError = document.getElementById("DaysError");

var kpis = document.getElementById("Kpis");
var kpisError = document.getElementById("KpisError");

var salary = document.getElementById("tutorSalary");
var salaryError = document.getElementById("tutorSalaryError");

var deduction = document.getElementById("Deduction");
var deductionError = document.getElementById("DeductionError");

var additional = document.getElementById("Additional");
var additionalError = document.getElementById("AdditionalError");

/// Add Financial Accounts

// tutor

// Tutor Name
tutor.addEventListener("change", function () {
    const inputValue = tutor.value;
    const regex = /\d/;

    // Check if has less than 3 char or has a number
    if (regex.test(inputValue)) {
        tutor.style.border = "2px solid red";
        tutorError.innerHTML = "Only Letters";
        tutorError.style.color = "red";
    } else if(inputValue < 3) {
        tutor.style.border = "2px solid red";
        tutorError.innerHTML = "The name must be 3 characters or more";
        tutorError.style.color = "red";
    } else {
        tutor.style.border = "2px solid green";
        tutorError.innerHTML = "";
    }
});

// Year & Month
yearMonth.addEventListener("input", function() {
    const inputValue = yearMonth.value;

    // Check if date or not
    if (isValidDate(inputValue)) {
        yearMonth.style.border = "2px solid green";
        yearMonthError.innerHTML = "";
    } else {
        yearMonth.style.border = "2px solid red";
        yearMonthError.innerHTML = "This is not date";
        yearMonthError.style.color = "red";
    }
});
function isValidDate(dateString) {
    let date = new Date(dateString);
    return !isNaN(date.getTime());
}

// Week
Week.addEventListener("change", function () {
    const inputValue = Week.value;
    if (isNaN(inputValue)) {
        Week.style.border = "2px solid red";
        WeekError.innerHTML = "Only Numbers";
        WeekError.style.color = "red";
    } else if (inputValue > 4) {
        Week.style.border = "2px solid red";
        WeekError.innerHTML = "It's more than 4 Week";
        WeekError.style.color = "red";
    } else {
        Week.style.border = "2px solid green";
        WeekError.innerHTML = "";
    }
});

// Days
days.addEventListener("keyup", function () {
    const inputValue = days.value;
    if (isNaN(inputValue)) {
        days.style.border = "2px solid red";
        daysError.innerHTML = "Only Numbers";
        daysError.style.color = "red";
    } else if (inputValue > 7) {
        days.style.border = "2px solid red";
        daysError.innerHTML = "It's more than 7 days";
        daysError.style.color = "red";
    } else {
        days.style.border = "2px solid green";
        daysError.innerHTML = "";
    }
});

// Kpis
kpis.addEventListener("keyup", function () {
    const inputValue = kpis.value;
    if (isNaN(inputValue)) {
        kpis.style.border = "2px solid red";
        kpisError.innerHTML = "Only Numbers";
        kpisError.style.color = "red";
    } else {
        kpis.style.border = "2px solid green";
        kpisError.innerHTML = "";
    }
});

// Salary
salary.addEventListener("keyup", function () {
    const inputValue = salary.value;
    if (isNaN(inputValue)) {
        salary.style.border = "2px solid red";
        salaryError.innerHTML = "Only Numbers";
        salaryError.style.color = "red";
    } else {
        salary.style.border = "2px solid green";
        salaryError.innerHTML = "";
    }
});

// Deduction
deduction.addEventListener("keyup", function () {
    const inputValue = deduction.value;
    if (isNaN(inputValue)) {
        deduction.style.border = "2px solid red";
        deductionError.innerHTML = "Only Numbers";
        deductionError.style.color = "red";
    } else {
        deduction.style.border = "2px solid green";
        deductionError.innerHTML = "";
    }
});

// Additional
additional.addEventListener("keyup", function () {
    const inputValue = additional.value;
    if (isNaN(inputValue)) {
        additional.style.border = "2px solid red";
        additionalError.innerHTML = "Only Numbers";
        additionalError.style.color = "red";
    } else {
        additional.style.border = "2px solid green";
        additionalError.innerHTML = "";
    }
});
