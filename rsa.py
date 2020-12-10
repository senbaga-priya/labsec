from decimal import Decimal 
  
def gcd(a,b): 
    if b==0: 
        return a 
    else: 
        return gcd(b,a%b) 
        
p = int(input('Enter the value of p = ')) 
q = int(input('Enter the value of q = ')) 
nos = input('Enter the value of text = ')
nos1=ord(nos)
no=nos1-97
print('no=',no)
n = p*q 
t = (p-1)*(q-1) 

for e in range(2,t): 
    if gcd(e,t)== 1: 
        break 
print("e=",e)   
       
for i in range(1,10): 
    x = 1 + i*t 
    if x % e == 0: 
        d = int(x/e) 
        break
        
ctt = Decimal(0) 
ctt =pow(no,e) 
ct = ctt % n 
  
dtt = Decimal(0) 
dtt = pow(ct,d) 
dt = dtt % n 
  
print('n = '+str(n)+' e = '+str(e)+' t = '+str(t)+' d = '+str(d)+' cipher text = '+str(ct)+' decrypted text = '+str(dt)) 

dt1=dt+97
print('decrypted message = '+chr(dt1)) 