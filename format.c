#include <stdio.h>
int main(int argc, char** argv)
{
char buff[10];
strncpy(buff,argv[1],10);
printf(buff);
printf("\n");
return 0;
}

//prevent
#include <stdio.h>
int main(int argc, char** argv)
{
char buff[10];
strncpy(buff,argv[1],10);
printf(“%s\n”,buff);
return 0;
}

