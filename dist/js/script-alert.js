const flashData = document.querySelector('.flash-data').getAttribute('data-flashdata');
//console.log(flashData);

if(flashData){
    
    if(flashData==='success'){
        Swal.fire({
            //position: 'top-end',
            icon: flashData,
            title: 'Berhasil Memproses Data',
            showConfirmButton: false,
            timer: 1000
            
        })
    } else {
        Swal.fire({
            //position: 'top-end',
            icon: 'error',
            title: 'Gagal Memproses Data',
            showConfirmButton: false,
            timer: 1000
            
        })
    }    
}

