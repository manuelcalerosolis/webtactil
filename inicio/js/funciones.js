/*Contiene las definiciones de las funciones propias --------------------------
-----------------------------------------------------------------------------*/

function validar(){
        usuario = document.getElementById("usuario").value ;
        if ( usuario == null || usuario.length == 0 || /^\s+$/.test(usuario) ) {
          alert( "Debe introducir un nombre de usuario" ) ;
          return false ;
        }
        return true ;
      }