#include <stdio.h>

#define MAX 100
#define INF 1000000000

int main(void) {
    int grafo[MAX][MAX];
    int distancia[MAX];
    int visitado[MAX];
    int n, origen;
    int i, j, paso, u, minimo;

    printf("ALGORITMO DE DIJKSTRA\n");
    printf("Cantidad de vertices: ");
    scanf("%d", &n);

    if (n < 1 || n > MAX) {
        printf("Cantidad no valida.\n");
        return 1;
    }

    printf("Ingrese la matriz de adyacencia:\n");
    printf("Use 0 si no existe una arista directa.\n");

    for (i = 0; i < n; i++) {
        for (j = 0; j < n; j++) {
            scanf("%d", &grafo[i][j]);

            if (grafo[i][j] < 0) {
                printf("No se permiten pesos negativos.\n");
                return 1;
            }
        }
    }

    printf("Vertice de origen (1 a %d): ", n);
    scanf("%d", &origen);

    if (origen < 1 || origen > n) {
        printf("Vertice de origen no valido.\n");
        return 1;
    }

    origen--;

    for (i = 0; i < n; i++) {
        distancia[i] = INF;
        visitado[i] = 0;
    }

    distancia[origen] = 0;

    for (paso = 0; paso < n; paso++) {
        u = -1;
        minimo = INF;

        for (i = 0; i < n; i++) {
            if (!visitado[i] && distancia[i] < minimo) {
                minimo = distancia[i];
                u = i;
            }
        }

        if (u == -1) {
            break;
        }

        visitado[u] = 1;

        for (j = 0; j < n; j++) {
            if (!visitado[j] &&
                grafo[u][j] > 0 &&
                distancia[u] <= INF - grafo[u][j]) {

                if (distancia[u] + grafo[u][j]
                    < distancia[j]) {
                    distancia[j] =
                        distancia[u] + grafo[u][j];
                }
            }
        }
    }

    printf("\nDistancias minimas desde el vertice %d:\n",
           origen + 1);

    for (i = 0; i < n; i++) {
        if (distancia[i] == INF) {
            printf("Vertice %d: Inalcanzable\n", i + 1);
        } else {
            printf("Vertice %d: %d\n",
                   i + 1, distancia[i]);
        }
    }

    return 0;
}
