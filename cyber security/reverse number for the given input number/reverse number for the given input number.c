#include<stdio.h>

void reversenumber(int number)
{
    //int position = 1;
    int num;
    printf("output = ");

    while(number > 0)
    {
        num = number % 10;
        printf("%d", num);

        //position++;
        number /= 10;
        //    or
        //number = number / 10;

    }


}

int main()
{
    int input;
    printf("Enter your number here: ");
    scanf("%d",&input);
    reversenumber(input);
}
