#include <stdio.h>
#include <string.h>
#define MAX 15
int main(void)
{
struct 
{
	char buff[15];
	int pass;
}
key;
key.pass=0;
printf("\n Enter the password : \n"); 
gets(key.buff);
if(strcmp(key.buff, "senba"))
{
	printf ("\n Oops!Invalid Password \n");
} 
else
{
	printf ("\n Hurray!Valid Password \n"); 
	key.pass = 1;
}    
if(key.pass)
{
	printf ("\n Root privileges are granted to you! \n");
} 
return 0;
}
