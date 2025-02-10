#include<stdio.h>


int main()
{
    int i,j,k;
    printf("Enter your desired number here: ");
    scanf ("%d",&i);

    for(j=1; j<=15; j++)
    {
        k=j*i;
        printf("%d x %d = %d\n",j,i,k);
    }


}
