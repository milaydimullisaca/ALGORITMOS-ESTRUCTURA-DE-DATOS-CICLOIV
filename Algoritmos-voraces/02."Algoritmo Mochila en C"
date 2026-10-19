#include <stdio.h>
#include <stdlib.h>

#define MAX 1000

typedef struct {
    int id;
    double peso;
    double valor;
    double relacion;
} Objeto;

int comparar(const void *a, const void *b) {
    const Objeto *x = (const Objeto *)a;
    const Objeto *y = (const Objeto *)b;

    if (x->relacion < y->relacion) {
        return 1;
    }

    if (x->relacion > y->relacion) {
        return -1;
    }

    return 0;
}

int main(void) {
    Objeto objetos[MAX];
    int n, i;
    double capacidad, restante;
    double fraccion, valorTotal = 0.0;

    printf("MOCHILA FRACCIONARIA\n");
    printf("Cantidad de objetos: ");
    scanf("%d", &n);

    if (n < 1 || n > MAX) {
        printf("Cantidad no valida.\n");
        return 1;
    }

    printf("Capacidad de la mochila: ");
    scanf("%lf", &capacidad);

    if (capacidad < 0) {
        printf("Capacidad no valida.\n");
        return 1;
    }

    for (i = 0; i < n; i++) {
        objetos[i].id = i + 1;

        printf("Peso del objeto %d: ", i + 1);
        scanf("%lf", &objetos[i].peso);

        printf("Valor del objeto %d: ", i + 1);
        scanf("%lf", &objetos[i].valor);

        if (objetos[i].peso <= 0 ||
            objetos[i].valor < 0) {
            printf("Peso o valor no valido.\n");
            return 1;
        }

        objetos[i].relacion =
            objetos[i].valor / objetos[i].peso;
    }

    qsort(objetos, n, sizeof(Objeto), comparar);

    restante = capacidad;

    printf("\nSeleccion de objetos:\n");

    for (i = 0; i < n && restante > 0; i++) {
        if (objetos[i].peso <= restante) {
            fraccion = 1.0;
        } else {
            fraccion = restante / objetos[i].peso;
        }

        valorTotal += objetos[i].valor * fraccion;
        restante -= objetos[i].peso * fraccion;

        printf("Objeto %d: %.2f%%\n",
               objetos[i].id, fraccion * 100.0);
    }

    printf("\nCapacidad utilizada: %.2f\n",
           capacidad - restante);

    printf("Valor total maximo: %.2f\n", valorTotal);

    return 0;
}
