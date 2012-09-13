

function getContent(filename, filter){
    $.ajax({
        url: filename,
        data: filter,
        type: 'GET',
        dataType: 'html',
        beforeSend: function() {
            $('#listing').html('<div class="message">Loading...</div>');
        },
        success: function(data, textStatus, xhr) {

            $('#listing').html(data);
        },

        error: function(xhr, textStatus, errorThrown) {
            $('#listing').html('<div class="error">Connection lost! Try again</div>');
        }
    });
}

function getPopForm(filename, filter){

    $.ajax({
        url: filename,
        data: filter,
        type: 'GET',
        dataType: 'html',
        beforeSend: function() {
            $('#pop-up').html('<div class="message">Loading...</div>');
        },
        success: function(data, textStatus, xhr) {
            $('body').css('overflow', 'hidden');
            $('#pop-up').html(data).fadeIn('slow');
        },

        error: function(xhr, textStatus, errorThrown) {
            $('#pop-up').html('<div class="error">Connection lost! Try again</div>');
        }
    });
}

// Calculates water consumption.
function consumptions(){

    var curr = document.readings.elements["curr_reading[]"];
    var prev = document.readings.elements["prev_reading[]"];
    var cons = document.readings.elements["cons[]"];

    for(i=0; i<curr.length; i++){

        var diff = curr[i].value - prev[i].value;
        if(diff >= 0){
            cons[i].value = diff;
        } else {
            cons[i].value = "";
        }
    }
}

// Prints specified part of the page
function printPage(id, css){
    var html="<html><head><title></title>";
    html+="<link rel=\"stylesheet\" type=\"text/css\" href=\"" + css + "\"></head><body>";
    html+= document.getElementById(id).innerHTML;
    html+="</body></html>";

    var printWin = window.open('','','left=0,top=0,width=900,height=900,toolbar=0,scrollbars=0,status=0');
    printWin.document.write(html);
    printWin.document.close();
    printWin.focus();
    printWin.print();
    printWin.close();
}

function savePDF(id, css){
    var html="<html><head><title></title>";
    html+="<link rel=\"stylesheet\" type=\"text/css\" href=\"" + css + "\"></head><body>";
    html+= document.getElementById(id).innerHTML;
    html+="</body></html>";

    $('#html').val(html);
    $('#html-form').submit();

}
