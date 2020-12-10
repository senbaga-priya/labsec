import java.math.BigInteger;
import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;
 import java.io.*;
import java.util.*;
public class sha {
public static String sha1(String input) {
try {

  MessageDigest md = MessageDigest.getInstance("SHA-1");

byte[] messageDigest = md.digest(input.getBytes());
 BigInteger no = new BigInteger(1, messageDigest); 
 String hashtext = no.toString(16);
while (hashtext.length() < 32) {
hashtext = "0" + hashtext; }
return hashtext; }
catch (NoSuchAlgorithmException e) 
{ throw new RuntimeException(e);
} }
public static String sha224(String input) {
try {
MessageDigest md = MessageDigest.getInstance("SHA-224");
byte[] messageDigest = md.digest(input.getBytes());
 BigInteger no = new BigInteger(1, messageDigest); 
 String hashtext = no.toString(16);
while (hashtext.length() < 32) {
hashtext = "0" + hashtext; }
return hashtext; }
catch (NoSuchAlgorithmException e) { throw new RuntimeException(e);
} }
public static String sha256(String input) {
try {
MessageDigest md = MessageDigest.getInstance("SHA-256");
 byte[] messageDigest = md.digest(input.getBytes()); 
 BigInteger no = new BigInteger(1, messageDigest); String hashtext = no.toString(16);

 while (hashtext.length() < 32) { hashtext = "0" + hashtext;
}
return hashtext; }
catch (NoSuchAlgorithmException e) { throw new RuntimeException(e);
} }
public static String sha384(String input) {
try {
MessageDigest md = MessageDigest.getInstance("SHA-384");
byte[] messageDigest = md.digest(input.getBytes());
 BigInteger no = new BigInteger(1, messageDigest); String hashtext = no.toString(16);
while (hashtext.length() < 32) {
hashtext = "0" + hashtext; }
return hashtext; }
catch (NoSuchAlgorithmException e) { throw new RuntimeException(e);
} }
public static String sha512(String input) {
try {
MessageDigest md = MessageDigest.getInstance("SHA-512");
byte[] messageDigest = md.digest(input.getBytes()); 
BigInteger no = new BigInteger(1, messageDigest); String hashtext = no.toString(16);
while (hashtext.length() < 32) {
hashtext = "0" + hashtext; }
return hashtext;

}
catch (NoSuchAlgorithmException e) {
throw new RuntimeException(e); }
}
public static void main(String args[]) throws NoSuchAlgorithmException {
Scanner sc = new Scanner(System.in); System.out.print("Enter the Message : "); String msg = sc.next();
System.out.println("------------------------------------------------------------------------ ----------------------------------------------------------");
System.out.println("SHA-1 HashCode for " + msg + " : " + sha1(msg));
System.out.println("------------------------------------------------------------------------ ----------------------------------------------------------");
System.out.println("SHA-224 HashCode for " + msg + " : " + sha224(msg));
System.out.println("------------------------------------------------------------------------ ----------------------------------------------------------");
System.out.println("SHA-256 HashCode for " + msg + " : " + sha256(msg));
System.out.println("------------------------------------------------------------------------ ----------------------------------------------------------");
System.out.println("SHA-384 HashCode for " + msg + " : " + sha384(msg));
System.out.println("------------------------------------------------------------------------ ----------------------------------------------------------");
System.out.println("SHA-512 HashCode for " + msg + " : " + sha512(msg));
System.out.println("------------------------------------------------------------------------ ----------------------------------------------------------");
}}