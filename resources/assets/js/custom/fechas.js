function fechasEspeciales(fechaAComparar){
    var fechas=window.fechasEspeciales;
    var resultado=[];
    for (i=0;i<fechas.length;i++){
        if(fechaAComparar==new Date(window.fechasEspeciales[i].fecha.date)){
            for( var property in window.fechasEspeciales[i].Embarcaciones ) {
                if(window.fechasEspeciales[i].Embarcaciones[property]==1){
                    return [true,window.fechasEspeciales[i].clase,window.fechasEspeciales[i].descripcion];
                }
            }
            return [false,window.fechasEspeciales[i].clase,window.fechasEspeciales[i].descripcion];
        }
    }
}
alert(fechas);
