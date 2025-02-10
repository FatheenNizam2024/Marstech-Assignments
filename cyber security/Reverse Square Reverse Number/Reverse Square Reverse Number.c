#include<stdio.h>

int reversenumber(int number)
{
    //int position = 1;
    int num = 0;
    //printf("output = ");

    while(number > 0)
    {
        num = num * 10 + (number % 10);
        number /= 10;
        //printf("%d", num);

    }

    return num;

}

void checkRSRN(int number)
{
    int originalnumber = reversenumber(number);
    int originalsquare;
    int reversesquare;
    int reversenumbersquare;
    originalsquare = number * number;
    reversesquare = reversenumber(originalsquare);
    reversenumbersquare = originalnumber*originalnumber;

    if(reversesquare == reversenumbersquare)
    {
        printf("output = %d is a reverse square number\n", number);
    }
    else
    {
        printf("output = %d is not a reverse square number\n", number);
    }


}

int main()
{
    int i;
    //printf("Enter your number here: ");
    //scanf("%d",&input);
    for(i=1;i<=50;i++)
    {
        checkRSRN(i);
    }
    return 0;


}
