
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

// Atofill Person's desingnation
function getCompletedDisignation(filename, id) {
    $.ajax({
        url: filename,
        data: { person_id: id},
        type: 'POST',
        dataType: 'html',
        beforeSend: function() {
            $('#completed-designation').html('Loading...');
        },
        success: function(data, textStatus, xhr) {

            $('#completed-designation').html(data);
        },
        error: function(xhr, textStatus, errorThrown) {
            $('#completed-designation').html('Error getting content');
        }
    });
}

function getVerifiedDisignation(filename, id) {
    $.ajax({
        url: filename,
        data: { person_id: id},
        type: 'POST',
        dataType: 'html',
        beforeSend: function() {
            $('#verified-designation').html('Loading...');
        },
        success: function(data, textStatus, xhr) {

            $('#verified-designation').html(data);
        },
        error: function(xhr, textStatus, errorThrown) {
            $('#verified-designation').html('Error getting content');
        }
    });
}

// Displaying organisation more details
function organisationDetails(filename, id, formId) {

    $.ajax({
        url: filename,
        data: { org_id: id, form_id: formId},
        type: 'POST',
        dataType: 'json',
        beforeSend: function() {
            $('input[name=phy_addr], input[name=post_addr], input[name=focal_per], input[name=focal_fax], input[name=focal_email], input[name=focal_tel]').val('Loading...');
        },
        success: function(data, textStatus, xhr) {

            $('input[name=phy_addr]').val(data.PhysicalAddress);
            $('input[name=post_addr]').val(data.PostalAddress);
            $('#district').val(data.DistrictCode).attr('selected','selected');
            $('input[name=focal_per]').val(data.zhamos_person);
            $('input[name=focal_tel]').val(data.Phone);
            $('input[name=focal_fax]').val(data.Fax);
            $('input[name=focal_email]').val(data.Email);
            $('input[name=org_date]').val(data.StartedOperating);
            $('.org_person').html(data.selection);
            $('#completed .select').val(data.CompletedByPersonID).attr('selected','selected');
            $('#approved .select').val(data.ApprovedByPersonID).attr('selected','selected');
        }
    });
}

// Displaying school more details
function schoolDetails(filename, id) {

    $.ajax({
        url: filename,
        data: { org_id: id},
        type: 'POST',
        dataType: 'json',
        success: function(data, textStatus, xhr) {

            $('input[name=phy_addr]').val(data.PhysicalAddress);
            $('input[name=post_addr]').val(data.PostalAddress);
            $('#district').val(data.DistrictCode).attr('selected','selected');
            $('input[name=focal_per]').val(data.zhamos_person);
            $('input[name=focal_tel]').val(data.Phone);
            $('input[name=focal_fax]').val(data.Fax);
            $('input[name=focal_email]').val(data.Email);
            $('.org_person').html(data.selection);
        }
    });
}

// Displaying school more details
function ministryDetails(filename, id) {

    $.ajax({
        url: filename,
        data: { org_id: id},
        type: 'POST',
        dataType: 'json',
        success: function(data, textStatus, xhr) {

            $('input[name=phy_addr]').val(data.PhysicalAddress);
            $('input[name=post_addr]').val(data.PostalAddress);
            $('#district').val(data.DistrictCode).attr('selected','selected');
            $('input[name=focal_per]').val(data.zhamos_person);
            $('input[name=focal_tel]').val(data.Phone);
            $('input[name=focal_fax]').val(data.Fax);
            $('input[name=focal_email]').val(data.Email);
            $('.org_person').html(data.selection);
        }
    });
}

// Displaying school more details
function shehiaDetails(filename, id) {

    $.ajax({
        url: filename,
        data: { org_id: id},
        type: 'POST',
        dataType: 'json',
        success: function(data, textStatus, xhr) {

            $('input[name=phy_addr]').val(data.PhysicalAddress);
            $('input[name=post_addr]').val(data.PostalAddress);
            $('#district').val(data.DistrictCode).attr('selected','selected');
            $('input[name=focal_per]').val(data.zhamos_person);
            $('input[name=focal_tel]').val(data.Phone);
            $('input[name=focal_fax]').val(data.Fax);
            $('input[name=focal_email]').val(data.Email);
            $('.org_person').html(data.selection);
        }
    });
}


function makeBackup(filename, filter) {

    $.ajax({
        url: filename,
        data: filter,
        type: 'GET',
        dataType: 'html',
        beforeSend: function() {
            $('#backup-info').html('<div class="message">Backingup... please be patient this  may take several minutes</div>');
        },
        success: function(data, textStatus, xhr) {

            $('#backup-info').html(data);
        },
        error: function(xhr, textStatus, errorThrown) {
            $('#backup-info').html('<div class="error">Connection lost! Try again</div>');
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

// Navigate to a given link
function nav(url) {
    document.location.href = url;
}
