class myfunction():
    def Subfields():
        print("Sub-fields in AI are:\nMachine Learning\nNeural Networks\nVision\nRobotics\nSpeech Processing\nNatural Language Processing")

    def OddEven():
        Num = int(input("Enter a Number:"))
        if(Num%2==0):
            print(Num,"is Even Number")
        else:
            print(Num,"Odd Number")

    def Elegible():
        Age = int(input("Enter your Age:"))
        if(Age>=25):
            print("Eligible")
        else:
            print("Not Eligible")

    def percentage():
        Sub1 = int(input("Subject 1="))
        Sub2 = int(input("Subject 2="))
        Sub3 = int(input("Subject 3="))
        Sub4 = int(input("Subject 4="))
        Sub5 = int(input("Subject 5="))
        Total = Sub1+Sub2+Sub3+Sub4+Sub5
        Percentage = Total/500*100
        print("Total=",Total)
        print("Percentage=",Percentage)