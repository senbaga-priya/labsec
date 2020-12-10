

import java.math.*;
import java.util.*;
import java.security.*;
import java.io.*;
public class elgam
{
    public static void main(String[] args) throws IOException
    {
        BigInteger p, e1, e2,r, d, plaintext;
        System.out.println("Enter prime number p");
		Scanner s=new Scanner(System.in);
		Scanner sc=new Scanner(System.in);
 		p=s.nextBigInteger();

		System.out.println("Enter private key d");
		d=s.nextBigInteger();

		System.out.println("Enter public  key1 e1");
		e1=s.nextBigInteger();

		System.out.println("Enter random number r");
		r=s.nextBigInteger();

        e2 = e1.modPow(d, p);
        
		System.out.println("public  key is (e1,e2,p):"+e1+","+e2+","+p);
		System.out.println("Private key d:"+d);
		System.out.println("Performing Encryption");
		
        System.out.println("Enter plaintext character");
        System.out.println("Encoding characters using 00 to 25..... ");

        char ch = sc.next().charAt(0);
		int asciivalue = ch;
		int val =asciivalue-97;
		plaintext= BigInteger.valueOf(val);
		System.out.println("Plaintext character value is = " + plaintext);

       // plaintext = s.nextBigInteger();
        
        BigInteger c1 = e1.modPow(r, p);
        BigInteger c2 = plaintext.multiply(e2.modPow(r, p)).mod(p);
        
       	System.out.println("Ciphertext is (c1,c2):"+c1+","+c2);
        System.out.println("Performing Decryption");	
        BigInteger x = c1.modPow(d, p);
        BigInteger y = x.modInverse(p);
        BigInteger dec_msg = y.multiply(c2).mod(p);

        System.out.println("Plaintext = " + dec_msg);
        int b = dec_msg.intValue();
		int dem=b+97;
		char ch1=(char)dem;
		System.out.println("Decrypted character is: "+ch1);

    }
}