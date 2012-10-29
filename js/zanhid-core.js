
function getContent(filename, filter) {
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

function getPopForm(filename, filter) {

    $('#pop-up').children().remove();
    
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
function consumptions() {

    var curr = document.readings.elements["curr_reading[]"];
    var prev = document.readings.elements["prev_reading[]"];
    var cons = document.readings.elements["cons[]"];

    for (i = 0; i < curr.length; i++) {

        var diff = curr[i].value - prev[i].value;
        if (diff >= 0) {
            cons[i].value = diff;
        } else {
            cons[i].value = "";
        }
    }
}

// Prints specified part of the page
function printPage(id, css) {
    var html = "<!doctype html><html><head><title></title>";
    html += "<link rel=\"stylesheet\" type=\"text/css\" href=\"" + css + "\">";
    html += "</head><body>";
    html += document.getElementById(id).innerHTML;
    html += "</body></html>";

    var printWin = window.open('', '', 'left=0,top=0,width=1060,height=900,toolbar=no,scrollbars=no,status=no');
    printWin.document.write(html);
    printWin.document.close();
    printWin.focus();
    printWin.print();
    printWin.close();
}

function printTable(url) {

    var printWin = window.open(url, '', 'left=0,top=0,width=1060,height=900,toolbar=no,scrollbars=no,status=no');
    printWin.focus();
//printWin.print();
//printWin.close();
}


function savePDF(id, css) {
    var html = "<!doctype html><html><head><title></title>";
    html += "<link rel=\"stylesheet\" type=\"text/css\" href=\"" + css + "\"></head><body>";
    html += document.getElementById(id).innerHTML;
    html += "</body></html>";

    $('#html').val(html);
    $('#html-form').submit();

}

// Displaying customer or applicant more details

function moreDetails() {
    var type = $('#cust-appnt').val();
    var number = $('#number').val();

    $.ajax({
        url: 'cust_appnt_details.php',
        type: 'POST',
        data: {
            type: type,
            number: number
        },
        dataType: 'html',
        beforeSend: function() {
            //            $('#cust-appnt-details').html('<div class="message">Loading...</div>');
            $('#cust-appnt-details').html('<div class="loading"></div>');
        },
        success: function(data) {

            $('#cust-appnt-details').html(data);
            $('#total').html('Tsh 85,990.84');
        },
        error: function() {
            $('#cust-appnt-details').html('Failed');
        }
    });
}

// Navigate to a given link
function nav(url) {
    document.location.href = url;
}
