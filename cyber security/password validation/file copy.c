#include<stdio.h>

int main()
{
   /* FILE *src, *des;
    char ch;

    src=fopen("newfile.txt","r");
    des=fopen("my doc4.txt","a+");

    if(!src)
    {
        printf("source does not exist\n");
    }
    else
    {
        while((ch=fgetc(src))!=EOF)
        {
            fputc(ch,des);
        }
        fclose(src);
        fclose(des);
        printf("File is copied");
    }*/

    FILE *src, *des;
    char ch;
    char srcf[50],desf[50];
    printf("Enter your source file name with extenstion: ");
    scanf("%s",srcf);
    printf("Enter your destination file name with extenstion: ");
    scanf("%s",desf);

    src=fopen(srcf,"r");
    des=fopen(desf,"w");

    if(!src)
    {
        printf("source does not exist\n");
    }
    else
    {
        while((ch=fgetc(src))!=EOF)
        {
            fputc(ch,des);
        }
        fclose(src);
        fclose(des);
        printf("File is copied");
    }

}
