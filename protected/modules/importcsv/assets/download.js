$(document).ready(function() {
    var button = $('input#importStep1'), interval;
    
    $.ajax_upload(button, {
        action : '/importcsv/default/upload',
        name : 'myfile',
        onSubmit : function(file, ext) {
            $("div#importCsvFirstStepResult").text('Loading...');
            this.disable();
        },
        onComplete : function(file, response) {
            this.enable();
            $("input#fileName").val(file);
            $("div#importCsvFirstStepResult").html(response);
        }
    });
});

function toSecondStep() {
       $("div#importCsvSecondStep").show(500);
       $("div#importCsvFirstStep").hide(500);
}

function toThirdStep(content) {
       $("div#importCsvThirdStep").html(content);
       $("div#importCsvThirdStep").show(500);
       $("div#importCsvSecondStep").hide(500);
}