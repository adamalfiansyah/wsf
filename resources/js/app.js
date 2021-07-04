require('./bootstrap');

const selectFile    = document.getElementById('selectFile')
const formUpload    = document.getElementById('formUpload')
const copyBtn       = document.getElementById('copyBtn')
const copyUrl       = document.getElementById('copyUrl')

if(selectFile) {
    selectFile.onchange = function(){
        formUpload.submit()
    }
}
    
copyBtn.onclick = function(){
    //select text kemudian lakukan copy
    copyUrl.select()
    document.execCommand('copy')
    
    //Copied
    copyBtn.innerHTML = 'Copied'
    copyBtn.classList.remove('btn-outline-secondary')
    copyBtn.classList.add('btn-outline-success')
}