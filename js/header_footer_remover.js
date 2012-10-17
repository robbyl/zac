/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    oTable = $('#dataTable').dataTable({
        "bJQueryUI": false,
        "bScrollCollapse": false,
        "sScrollY": "auto",
        "bAutoWidth": false,
        "bPaginate": false,
        "sPaginationType": "full_numbers", //full_numbers,two_button
        "bStateSave": true,
        "bInfo": false,
        "bFilter": false,
        "iDisplayLength": 25,
        "bLengthChange": false,
        "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]]
    });
});

