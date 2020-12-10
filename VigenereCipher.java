import java.util.*;
public class VigenereCipher
{
    public static String encrypt(String text, final String key)
    {
        String res = "";
        text = text.toUpperCase();
        for (int i = 0, j = 0; i < text.length(); i++)
        {
            char c = text.charAt(i);
            if (c < 'A' || c > 'Z')
                continue;
            res += (char) ((c + key.charAt(j) - 2 * 'A') % 26 + 'A');
            j = ++j % key.length();
        }
        return res;
    }
    public static String decrypt(String text, final String key)
    {
        String res = "";
        text = text.toUpperCase();
        for (int i = 0, j = 0; i < text.length(); i++)
        {
            char c = text.charAt(i);
            if (c < 'A' || c > 'Z')
                continue;
            res += (char) ((c - key.charAt(j) + 26) % 26 + 'A');
            j = ++j % key.length();
        }
        return res;
    }
 
    public static void main(String[] args)
    {
        String message;
        String key;
        System.out.print("Enter the Message :");
        Scanner sc=new Scanner(System.in);
        message=sc.nextLine();
        System.out.print("Enter the key :");
        Scanner scan=new Scanner(System.in);
        key=scan.nextLine();       
        String encryptedMsg = encrypt(message, key);
        System.out.println("Encrypted message is : " + encryptedMsg);
        System.out.println("Decrypted message is : " + decrypt(encryptedMsg, key));
    }
}


