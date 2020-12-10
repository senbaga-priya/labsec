import sys
class Model:
    top_secret=0
    secret=1
    confidential=2
    unclassified=3
users={'CEO':Model.top_secret,'Manager':Model.secret,'Supervisor':Model.confidential,'Employees':Model.unclassified}
sources={'Document A':Model.top_secret,'Document B':Model.top_secret,'Document C':Model.secret,'Document D':Model.secret,'Document E':Model.confidential,'Document F':Model.confidential,'Document G':Model.unclassified}
print("\t\t",end=" ")
permission=[ [ None for i in range(8) ] for j in range(5) ]
j=1
for k,v in sources.items():
    permission[0][j]=k
    j=j+1
i=1
for k,v in users.items():
    permission[i][0]=k
    i=i+1
print()
i=1
j=1
print("Table")
for user,access in users.items():
    #print (user,end="\t\t")
    j=1
    for k,v in sources.items():
        if v>=access:
            per="allow"
        else:
            per="deny"
        #print("i",i)
        #print("j",j)
        permission[i][j]=per
        #print(permission[i][j])
        j=j+1
    i=i+1
    print()
for a in permission:
    for b in a:
        if b is None:
            print("\t",end="\t\t")
        else:
            print(b,end="\t\t")
    print()
#Check for the access level of User
def task(user):    
    if(users[user]==Model.top_secret):
        print("You have Top secret level access")
    if(users[user]==Model.secret):
        print("You have secret level access")
    if(users[user]==Model.confidential):
        print("You have confidential level access")
    if(users[user]==Model.unclassified):
        print("You have unclassified level access")
#Print Bell_Lapadula Model Table for particular user
def Bell_Model(user):
    print("\t\t",end=" ")
    bell_lapadula=[ [ None for i in range(3) ] for j in range(8) ]
    i=1
    for k,v in sources.items():
        bell_lapadula[i][0]=k
        i=i+1
    bell_lapadula[0][1]="Read"
    bell_lapadula[0][2]="Write"
    print()
    print("Bell Lapadula Table")
    print("--------------------")
    user_access=users[user]
    #print("User",user)
    #print("Access",access) 
    i=1
    for subject,level in sources.items():
        if user_access>level:
            bell_lapadula[i][1]="no_read"
        else:
            bell_lapadula[i][1]="read"
        if user_access<level:
            bell_lapadula[i][2]="no_write"
        else:
            bell_lapadula[i][2]="write"
        i=i+1
        
    for a in bell_lapadula:
        for b in a:
            if b is None:
                print("\t\t",end="\t\t\t")
                #print("--------------------")
            else:
                print(b,end="\t\t\t")
                #print("--------------------")
        print()
#Print Biba Model Table for particular User
def Biba_Model(user):
    biba=[ [ None for i in range(3) ] for j in range(8) ]
    i=1
    for k,v in sources.items():
        biba[i][0]=k
        i=i+1
    biba[0][1]="Read"
    biba[0][2]="Write"
    print()
    i=1
    print("Biba Model Table")
    print("-----------------")
    user_access=users[user]
    for subject,level in sources.items():
        if user_access<level:
            biba[i][1]="no_read"
        else:
            biba[i][1]="read"
        if user_access>level:
            biba[i][2]="no_write"
        else:
            biba[i][2]="write"
        i=i+1    
    for a in biba:
        for b in a:
            if b is None:
                print("\t",end="\t\t")
                #print("----------------")
            else:
                print(b,end="\t\t")
                #print("----------------")
        print()
while True:
    print()
    print("Bell Lapadula and Biba Model")
    print("----------------------------")
    print("1. Check User Access")
    print("2. Print Bell Lapadula Model Table for Particular User")
    print("3. Print Biba Model Table for Particular User")
    print("4. Exit")
    choice=int(input("Enter your choice\t"))
    if choice==1:
        user=input("Enter the user\t")
        task(user)
    elif choice==2:
        print("Bell Lapadula Model")
        print("----------------------")
        user=input("Enter the user\t")
        Bell_Model(user)
        while True:
            user_access=users[user]
            print("1. Read")
            print("2. Write")
            print("3. No Operation")
            opt=int(input("Want to read or write?\t"))
            if opt==1:
                document=input("Enter the document\t")
                level=sources[document]
                if user_access>level:
                    print("Permission Denied,.............no_read\t")
                else:
                    #text=input("Enter text to write\t")
                    f = open(document+".txt", "r")
                    print("The content in the document")
                    print("-----------------------------")
                    print(f.read())
            elif opt==2:
                document=input("Enter the document\t")
                level=sources[document]
                if user_access<level:
                    print("Permission Denied,.............no_write\t")
                else:
                    text=input("Enter text to write\t")
                    f = open(document+".txt", "a")
                    f.write(text)
                    f.close()
                    print("File updated successfully")
                    print("---------------------------")
            else:
                break
    elif choice==3:
        print("Biba Model")
        print("-----------------")
        user=input("Enter the user\t")
        Biba_Model(user)
        while True:
            user_access=users[user]
            print("1. Read")
            print("2. Write")
            print("3. No Operation")
            opt=int(input("Want to read or write?\t"))
            if opt==1:
                document=input("Enter the document\t")
                level=sources[document]
                if user_access<level:
                    print("Permission Denied,.............no_read\t")
                else:
                    #text=input("Enter text to write\t")
                    f = open(document+".txt", "r")
                    print("The content in the document")
                    print("-----------------------------")
                    print(f.read())
            elif opt==2:
                document=input("Enter the document\t")
                level=sources[document]
                if user_access>level:
                    print("Permission Denied,.............no_write\t")
                else:
                    text=input("Enter text to write\t")
                    f = open(document+".txt", "a")
                    f.write(text)
                    f.close()
                    print("File updated successfully")
                    print("---------------------------")
            else:
                break
    else:
        sys.exit()

