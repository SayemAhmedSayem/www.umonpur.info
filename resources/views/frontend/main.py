# This is a sample Python script.

# Press Shift+F10 to execute it or replace it with your code.
# Press Double Shift to search everywhere for classes, files, tool windows, actions, and settings.


def print_hi(name):
    # Use a breakpoint in the code line below to debug your script.
    print(f'Hi, {name}')  # Press Ctrl+F8 to toggle the breakpoint.


# Press the green button in the gutter to run the script.
if __name__ == '__main__':
    print_hi('PyCharm')

# See PyCharm help at https://www.jetbrains.com/help/pycharm/




#Python - Global Variables

x = "awesome"

def myfunc():
  print("Python is " + x)

myfunc()

#Create a variable inside a function, with the same name as the global variable
x = "awesome"

def myfunc():
  x = "fantastic"
  print("Python is " + x)

myfunc()

#If you use the global keyword, the variable belongs to the global scope
def myfunc():
  global x
  x = "fantastic"

myfunc()

print("Python is " + x)

print("Python is " + x)

#
x = "awesome"

def myfunc():
  global x
  x = "fantastic"

myfunc()

print("Python is " + x)

#Getting the Data Type
x = 5
print(type(x))

x = "Hello World"

#display x:
print(x)

#display the data type of x:
print(type(x))

x = 20

#display x:
print(x)

#display the data type of x:
print(type(x))

x = 20.5

#display x:
print(x)

#display the data type of x:
print(type(x))

x = ["apple", "banana", "cherry"]

#display x:
print(x)

#display the data type of x:
print(type(x))

x = {"name" : "John", "age" : 36}

#display x:
print(x)

#display the data type of x:
print(type(x))

#Python Number - There are three numeric types in Python
x = 1    # int
y = 2.8  # float
z = 1j   # complex

print(type(x))
print(type(y))
print(type(z))

#Python Number - Int, or integer, is a whole number, positive or negative, without decimals, of unlimited length
x = 1
y = 35656222554887711
z = -3255522

print(type(x))
print(type(y))
print(type(z))

import random

print(random.randrange(1, 10))


#Specify a Variable Type
x = int(1)   # x will be 1
y = int(2.8) # y will be 2
z = int("3") # z will be

x = float(1)     # x will be 1.0
y = float(2.8)   # y will be 2.8
z = float("3")   # z will be 3.0
w = float("4.2") # w will be 4.2

#Python Casting
x = int(1)
y = int(2.8)
z = int("3")
print(x)
print(y)
print(z)






