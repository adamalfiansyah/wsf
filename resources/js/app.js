require('./bootstrap');

document.getElementById('selectFile').onchange = function(){
    document.getElementById('formUpload').submit();
}