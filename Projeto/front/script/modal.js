function modal(idModal, idActivator, idDeactivator){

    modal = document.getElementById(idModal);
    
    document.getElementById(idActivator).addEventListener("click", 
        function (){
            modal.style.display = "block";
        }
    );

    document.getElementById(idDeactivator).addEventListener("click", 
        function (){
            modal.style.display = "none";
        }
    );

    modal.addEventListener("click", 
        function(){
            if(event.target == this){
                modal.style.display = "none";
            }
        }
    );

}
