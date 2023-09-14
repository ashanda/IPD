// Cstom Scripts Here
$(document).ready(function () {
    $('#dataTable').DataTable();
    $('.select2').select2();

});

function toggleDisplay() {
    var element = document.getElementById('dropdown');
    if (element.style.display === 'none') {
        element.style.display = 'block';
    } else {
        element.style.display = 'none';
    }
    // alert("clicked");
}
function rightsboff() {
    var rgsb = document.getElementById('rgsb');
    var rsbtnon = document.getElementById('rsbtnon');
    rgsb.style.display = 'none';
    rsbtnon.style.display = 'block';
}
function rightsbon() {
    var rgsb = document.getElementById('rgsb');
    var rsbtnon = document.getElementById('rsbtnon');
    rgsb.style.display = 'block';
    rsbtnon.style.display = 'none';
}


