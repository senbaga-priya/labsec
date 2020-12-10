#include <stdio.h>
#include <string.h>
#define MAX 15
int main(void)
{
int pass;
int x;
char pw[15];
char ip[15];
pass=0;
printf("\n Enter the password : \n");
scanf("%s",&ip);
strcpy(pw, "senba");
x= strncmp(ip,pw,15);
if(x!=0)
{
	printf ("\n Oops!Invalid Password \n");
} 
else
{
	printf ("\n Hurray!Valid Password \n"); 
	pass = 1;
 }
if(pass)
{
	printf ("\n Root privileges are granted to you! \n");
}
 return 0;
}
