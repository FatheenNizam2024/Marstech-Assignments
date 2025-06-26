class multifunction():
    def ODDEVEN():

        Num = int(input("Enter the number: "))

        if(Num%2 == 0):
            print("Even Number")
        else:
            print("Odd Number")
        

    def BMIFUN():

        BMI=float(input("Enter the BMI index:"))

        if BMI < 18.5:
            print("Under Weight")
        elif 18.5 <= BMI < 25:
            print("Normal Weight")
        elif 25<= BMI <= 30.5:
            print("OverWeight")
        elif 30.6<= BMI <= 35:
            print("very overweight")
        elif 35<= BMI <=40:
            print("Obese")
        else:
            print("Extremely Obese")
