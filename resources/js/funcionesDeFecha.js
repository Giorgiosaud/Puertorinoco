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
//function fechasExcepcion(date) {
//    var fechas = window.SpecialDates;
    alert(fechas);
    //var diasActivos = window.weekDays;
    //var diaDeSemana = date.getDay();
    //var Mes = date.getMonth();
    //var Dia = date.getDate();
    //var Ano = date.getFullYear();
    //
    //for (i = 0;i < fechas.length;i++) {
    //    fi = fechas[i][0];
    //
    //    if (Dia === fi.getDate() && (Mes === fi.getMonth() && Ano === fi.getFullYear())) {
    //        return[fechas[i][1], fechas[i][2], fechas[i][3]];
    //    }
    //}
    //switch(diaDeSemana) {
    //    case 0:
    //        if (diasActivos[0][1]) {
    //            return[true];
    //        } else {
    //            return[diasActivos[0][1], diasActivos[0][2], diasActivos[0][3]];
    //        }
    //        break;
    //    case 1:
    //        if (diasActivos[1][1]) {
    //            return[true];
    //        } else {
    //            return[diasActivos[1][1], diasActivos[1][2], diasActivos[1][3]];
    //        }
    //        break;
    //    case 2:
    //        if (diasActivos[2][1]) {
    //            return[true];
    //        } else {
    //            return[diasActivos[2][1], diasActivos[2][2], diasActivos[2][3]];
    //        }
    //        break;
    //    case 3:
    //        if (diasActivos[3][1]) {
    //            return[true];
    //        } else {
    //            return[diasActivos[3][1], diasActivos[3][2], diasActivos[3][3]];
    //        }
    //        break;
    //    case 4:
    //        if (diasActivos[4][1]) {
    //            return[true];
    //        } else {
    //            return[diasActivos[4][1], diasActivos[4][2], diasActivos[4][3]];
    //        }
    //        break;
    //    case 5:
    //        if (diasActivos[5][1]) {
    //            return[true];
    //        } else {
    //            return[diasActivos[5][1], diasActivos[5][2], diasActivos[5][3]];
    //        }
    //        break;
    //    case 6:
    //        if (diasActivos[6][1]) {
    //            return[true];
    //        } else {
    //            return[diasActivos[6][1], diasActivos[6][2], diasActivos[6][3]];
    //        }
    //        break;
    //    default:
    //        return[true];
    //        break;
    //}
//}