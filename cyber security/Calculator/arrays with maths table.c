#include<stdio.h>

int main()
{
    int a[13];
    int table;

    printf("what table you want to print? ");
    scanf("%d", &table);

    for(int j=0; j<13; j++)
    {
        a[j]= j * table;
    }



    for( int i=0; i<13; i++)
    {
        printf("a[%d]  = %d\n",i ,a[i]);
    }
}
