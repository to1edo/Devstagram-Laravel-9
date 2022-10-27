import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

if(document.getElementById("dropzone")) {
    
    const dropzone = new Dropzone(".dropzone", {
        dictDefaultMessage: "Sube aquí tu imagen",
        acceptedFiles: ".png,.jpg,.jpeg,.gif",
        addRemoveLinks: true,
        dictRemoveFile: "Borrar archivo",
        maxFiles: 1,
        uploadMultiple: false,

        init: function(){
            if(document.querySelector('input[name="imagen"]').value.trim()){
                
                const imagenPublicada = {};
                imagenPublicada.size = 1000;
                imagenPublicada.name = document.querySelector('input[name="imagen"]').value;
                
                this.options.addedfile.call(this, imagenPublicada);
                this.options.thumbnail.call(this,imagenPublicada,`/uploads/${imagenPublicada.name}`);

                imagenPublicada.previewElement.classList.add('dz-success','dz-complete');
            }
        }

    });

    // dropzone.on("addedfile", file => {
    //     console.log("A file has been added");
    // });

    dropzone.on('success',(file,response)=>{
        document.querySelector('input[name="imagen"]').value = response.imagen;
    }) 

    
    // dropzone.on('error',(file,message)=>{
    //     console.log(message);
    // }) 

    
    dropzone.on("removedfile",()=>{
        document.querySelector('input[name="imagen"]').value = '';
    }) 
}

