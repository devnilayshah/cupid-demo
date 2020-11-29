$(document).ready(function(){
    $('.datepicker').datepicker({
        autoclose: true,
        dateFormat: 'yy-mm-dd',
        changeYear: true,
        changeMonth: true,
        yearRange: "1975:2010"
    });
    $( "#slider-range" ).slider({
        range: true,
        min: 0,
        max: 1000000,
        values: [0,1000000],
        change: function( event, ui ) {
             $("#expected_from").html(ui.values[ 0 ]);
             $("#expected_to").html(ui.values[ 1 ]);
             $("#expected_from_hidden").html(ui.values[ 0 ]);
             $("#expected_to_hidden").html(ui.values[ 1 ]);
        },
    });        
});



//Hide error div
function toggleDiv(id, value) {
    $("." + id).css('display', value);
}