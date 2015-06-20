#Right Triangle

x = int(raw_input("Rows- "))
x = x + 1
for i in range (0,x):
    for j in range (0,i):
        print "X",
    print ""

#Square

x = int(raw_input("Rows- "))
y = int(raw_input("Columns- "))
for i in range (0,x):
    for j in range (0,y):
        print "X",
    print ""

#Upside Down Right Triangle

x = int(raw_input("Rows- "))
for i in range (x, 0, -1):
    for j in range(0,i):
        print "X",
    print ""
    
#Empty Square

Rows = int(raw_input("Rows- "))
Columns = int(raw_input("Columns- "))

for i in range(Rows - 1):
    if i == 0:
        for j in range(Columns):
            print "X",
        print " "
    if i == Rows - 2:
        for l in range(Columns):
            print "X",
        print " "
    else: 
        for m in range(Columns - 1):
            if m == 0:
                print "X",
            if m == Columns - 2:
                print "X"
            else:
                print " ",
        
#Upside Down Isosceles Triangle

x = int(raw_input("Rows- ")) + 1
a = -1 + (2 * x)
s = " "
for i in range(0,x):
    a = a - 2
    s = s + "  "
    print s,
    for j in range(0,a):
        print "X",
    print ""

#Upside Down Empty Isosceles Triangle

import sys

x = int(raw_input("Rows- ")) 
a = -1 + (2 * x)
s = ""
b = 1 + (x - 1) * 2
a_1 = x - 1 
for i in range(0,x):
    if i == 0:
        for j in range(0,b):
            sys.stdout.write('X'),
        print ""
    elif i == a_1:
        s = s + " "
        print s + "X"
    else:
        a = a - 2        
        print s,
        print "X",
        for j in range(0,a-2):
            sys.stdout.write(' '),
        sys.stdout.write('X'),    
        print ""
        s = s + " "
        
#Pine Tree

userInput = raw_input("Rows- ")
spaces = int(userInput) * 2 / 3 - 1
numberOfX = 1
trunk = int(userInput) * 2 / 3
trunkSize = int(userInput) / 2
trunkSpaces = int(userInput) / 3

if int(userInput) == 5:
    trunkSize = trunkSize + 1
    
for i in range(int(userInput)):
    if i < int(trunk):
        for k in range(spaces):
            print " ",
        for j in range(numberOfX):
            print "X",
        numberOfX = int(numberOfX) + 2
        spaces = int(spaces) - 1
        print " "
    else:
        for l in range(trunkSpaces):
            print " ",
        for m in range(trunkSize):
            print "X",
        print " "
        
#X

