import java.util.Scanner;
import java.util.*;
class AffineCipher
{ 
   static String encryptMessage(char[] msg,int a, int b)  
    { 
       String cipher = ""; 
        for (int i = 0; i < msg.length; i++) 
        {
            if (msg[i] != ' ')  
            { 
                cipher = cipher 
                        + (char) ((((a * (msg[i] - 'A')) + b) % 26) + 'A'); 
            } else            { 
                cipher += msg[i]; 
            } 
        } 
        return cipher; 
    } 
    static String decryptCipher(String cipher,int a,int b)  
    { 
        String msg = ""; 
        int a_inv = 0; 
        int flag = 0; 
        for (int i = 0; i < 26; i++)  
        { 
            flag = (a * i) % 26; 
            if (flag == 1)  
            { 
                a_inv = i; 
            } 
        } 
        for (int i = 0; i < cipher.length(); i++)  
        { 
                 if (cipher.charAt(i) != ' ')  
            { 
                msg = msg + (char) (((a_inv *  
                        ((cipher.charAt(i) + 'A' - b)) % 26)) + 'A'); 
            }  
            else 
            { 
                msg += cipher.charAt(i); 
            } 
        } 
        return msg; 
    } 
     public static void main(String[] args)  
    { 
        Scanner sc = new Scanner(System.in);
        System.out.print("Enter the Message : ");
        String msg = sc.next();
        Scanner scan= new Scanner(System.in);    
        System.out.print("Enter key A : ");  
        int a= scan.nextInt();  
        System.out.print("Enter key B : ");  
        int b= scan.nextInt();  
        String cipherText = encryptMessage(msg.toCharArray(),a,b); 
        System.out.println("Encrypted Message is : " + cipherText); 
        System.out.println("Decrypted Message is : " + decryptCipher(cipherText,a,b)); 
    } 
} 