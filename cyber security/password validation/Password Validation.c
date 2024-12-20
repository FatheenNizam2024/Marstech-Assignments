#include<stdio.h>
#include<string.h>

int check_password(char *password);

int main()
{
    char password[100];
    int strong = 0;
    do
    {
      printf("Enter your password here:");
      scanf("%s",password);
      strong = check_password(password);
    }
    while(!strong);
    return 0;
}
int check_password(char *password)

{
    int found_number = 0;
    int found_length = 0;
    int found_Alphabet = 0;
    int found_alphabet = 0;
    int last_digit = -2;
    int i=8;
    int j=0;
    int length = 0;
    int found_symbol = 0;
    int q=0;
    while(password[length]!='\0')
    {
        length++;
    }
    if(length>=8)
    {
        found_length=1;
    }
    while (password[j] != '\0')
    {
        if(password[j]>='0' && password[j]<='9')
            {
                int num = password[j] - '0';
                if(found_number == 0 || (num!= last_digit + 1 && num!= last_digit - 1))
                {
                  found_number++;
                  last_digit = num;
                }

            }
            //*password++;
        if(password[j]>='A' && password[j]<='Z')
            {
                found_Alphabet++;
            }
           // *password++;
        if(password[j]>='a' && password[j]<='z')
            {
                found_alphabet++;
            }
        if(password[j]>='!' && password[j]<='/' || password[j]>=':' && password[j]<='@' || password[j]>='[' && password[j]<='`' || password[j]>='{' && password[j]<='~' )
            {
                found_symbol++;
            }

        /*if(found_length && found_number>=3 && found_Alphabet>=1 && found_1_Alphabet>=3 && found_2_Alphabet>=1)
        {
            break;

        }*/

        j++;
    }

   if(found_length && found_number>=7 && found_Alphabet>=6 && found_alphabet>=7 && found_symbol>=6)
    {
       int a=9;
       printf("strongest password, Ranked %d\n",a);
       return 1;
    }
    else if(found_length && found_number>=5 && found_Alphabet>=4 && found_alphabet>=5 && found_symbol>=4)
    {
        int b=7;
       printf("Your password is strong, Ranked %d\n",b);
       return 1;
    }
    else if(found_length && found_number>=4 && found_Alphabet>=3 && found_alphabet>=4 && found_symbol>=3)
    {
        int c=5;
       printf("Your password is medium, Ranked %d\n",c);
       return 1;
    }
    else if(found_length && found_number>=3 && found_Alphabet>=3 && found_alphabet>=3 && found_symbol>=3)
    {
        int d=3;
       printf("Your password is average , Ranked %d\n",d);
       return 1;
    }
    else if(found_length && found_number>=2 && found_Alphabet>=2 && found_alphabet>=2 && found_symbol>=2)
    {
        int e=1;
       printf("Your password is weak, Ranked %d\n",e);
       return 1;
    }

    else
    {
        int f=0;
       printf("Your password is weakest, please re-enter\n, Ranked %d\n",f);
       return 0;
    }
}


