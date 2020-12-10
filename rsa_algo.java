import java.util.*; 
import java.util.Scanner;
 import java.math.*; 
 import java.io.*;
class rsa_algo
{
public static void main(String args[]) {
Scanner scan=new Scanner(System.in);
int p,q,n,z,e,i;
int d=0;
double c; 
System.out.println("---------------------------------------");
 Scanner sc = new Scanner(System.in); 
 System.out.print("Enter a plaintext character: ");
char ch = sc.next().charAt(0);
int asciivalue = ch;
int original_msg=asciivalue-97;
System.out.println("Encoding characters using 00 to 25..... ");
 System.out.println("Encoded message value is: "+original_msg);
 BigInteger return_msg;
System.out.print("Enter 1st prime number p : "); 
p=scan.nextInt();
System.out.print("Enter 2nd prime number q : "); 
q=scan.nextInt();
n=p*q;
z=(p-1)*(q-1);
System.out.println("Value of z is : "+z); 
for(e=2;e<z;e++)
{
if(gcd(e,z)==1) {
break; }
}
System.out.println("Value of e is : "+e);
 for(i=0;i<=9;i++)
{
int x=1+(i*z); if(x%e==0)
{
d=x/e;
break; }
}
System.out.println("Value of d is : "+d); 
c=(Math.pow(original_msg,e))%n; 
System.out.println("---------------------------------------"); 
System.out.println("Encrypted message is : "+c); 
BigInteger N = BigInteger.valueOf(n);
BigInteger C = BigDecimal.valueOf(c).toBigInteger(); 
return_msg = (C.pow(d)).mod(N); 
System.out.println("Decrypted message is : " +return_msg); 
System.out.println("---------------------------------------");
int b = return_msg.intValue();
int dem=b+97;
char ch1=(char)dem;
System.out.println("Decrypted character is: "+ch1);
}
static int gcd(int e, int z) {
if(e==0)

return z; 
else
return gcd(z%e,e);
} }
