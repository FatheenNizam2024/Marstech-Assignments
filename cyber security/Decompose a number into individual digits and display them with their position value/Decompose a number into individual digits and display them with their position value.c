#include <stdio.h>

void decomposeNumber(int number) {
    //int position = 1; // Position value starts from 1
    int k = 1;
    int digit;

    // Loop until the number becomes 0
    while (number > 0) {
        // Get the last digit
        digit = number % 10;


        // Display the digit and its position
        printf("No of %ds = %d\n", k, digit);
        k = k * 10;
        // Move to the next position
        //position++;

        // Remove the last digit from the number
        number /= 10;
    }
}

int main() {
    int input;

    printf("Input = ");
    scanf("%d", &input);

    // Call the function to decompose the number
    decomposeNumber(input);

    return 0;
}
