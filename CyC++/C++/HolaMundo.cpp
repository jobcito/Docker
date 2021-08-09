 // Aquí generalmente se suele indicar qué se quiere con el programa a hacer
 // Programa que muestra 'Hola mundo' por pantalla y finaliza

 // Aquí se sitúan todas las librerias que se vayan a usar con #include,
//  que se verá posteriormente
 // Las librerias del sistema son las siguientes
#include <iostream>

 // Función main
 // Recibe: void
 // Devuelve: int
 // Función principal, encargada de mostrar "Hola Mundo",por pantalla

 int main(void)
 {
   // Este tipo de líneas de código que comienzan por '//' son comentarios
   // El compilador los omite, y sirven para ayudar a otros programadores o 
   // a uno mismo en caso de volver a revisar el código
   // Es una práctica sana poner comentarios donde se necesiten,

   std::cout << "Hola Mundo, con C++" << std::endl;

 // Mostrar por std::cout el mensaje Hola Mundo y comienza una nueva línea

   return 0;

 // se devuelve un 0.
   //que en este caso quiere decir que la salida se ha efectuado con éxito.
 }