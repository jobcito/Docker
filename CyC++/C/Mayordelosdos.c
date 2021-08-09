/*Procesos Industriales
Convenio I.E. General Santander – Universidad de Pamplona

Ejemplos de Programas Sencillos en C
with 6 comments

EJEMPLO No. 1: PROGRAMA QUE LEE DOS NÚMEROS Y ESCRIBE EL MAYOR DE LOS DOS.*/

#include <stdio.h>
int main()
{
    int x, y;
    printf("Escribe el primer número: ");
    scanf("%d",&x);
    printf("Escribe el segundo número:");
    scanf("%d",&y);
    if (x > y)
        printf("El mayor es: %d",x);

    else
        if ( y > x )
            printf("El mayor es: %d",y);
         else
            printf("Son iguales");
}