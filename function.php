<?php

function numberToWords($num)               // I created a function to hold the whole process.
{

    $ones = array(                        //1.I created an array that has numbers from 0-19 with their corresponding word values.
        '0' => '',
        '1' => 'one',
        '2' => 'two',
        '3' => 'three',
        '4' => 'four',
        '5' => 'five',
        '6' => 'six',
        '7' => 'seven',
        '8' => 'eight',
        '9' => 'nine',
        '10' => 'ten',
        '11' => 'eleven',
        '12' => 'twelve',
        '13' => 'thirteen',
        '14' => 'fourteen',
        '15' => 'fifteen',
        '16' => 'sixteen',
        '17' => 'seventeen',
        '18' => 'eighteen',
        '19' => 'nineteen',
         //'00'=>''
    );

    $tens = array(
        '0' => '',
                                               //2. i created another array of numbers between 0-9 and their corresponding value
        '2' => 'twenty',                      //    when multiplied with  ten.
        '3' => 'thirty',
        '4' => 'fourty',
        '5' => 'fifty',
        '6' => 'sixty',
        '7' => 'seventy',
        '8' => 'eighty',
        '9' => 'ninety'


    );
    $hundred = array(                        //3.I created an array with 'hundred' and 'thousand'  as values.
        'hundred',
        'thousand'
    );
    //$num = 6154;
    $numb = number_format($num, 2);            //4.I changed the format of the number by adding decimal to it and separated  the
    $num_part = explode('.', $numb);           // number using commas. I used the 'number_format' function to achieve that.

    $whole_number = $num_part[0];                         //5. i split the number in two parts using the explode function with dot as the
    $decimal = $num_part[1];                                // delimiter.This creates a two values array with the number

    $whole_number_array = explode(',', $whole_number);     //6.I again split the number that occupies the first position into two parts
    $whole_number_array = array_reverse($whole_number_array);         //with the explode function with comma as the delimiter
    //print_r($whole_number_array);                                   //7.I reversed the position of the values in the new array, with
                                                                      // the 'array_reverse' function so that no matter what number is used
                                                                        //the first position in the array will always have a value.

    $words = "";                                                    //7.I created a variable to hold the value of the word i was creating


    ksort($whole_number_array);                                      //8.I used the 'ksort' function to sort the array in ascending order

    foreach ($whole_number_array as $key => $value) {               //.9. I used the 'foreach loop' to loop through the numbers so that
                                                                     // I can assign a value to them individually.
        $num100 = substr($value, 0, 1);                 //10.I created this variable to find out whether a zero precede the value
        $num101=substr($value,0,2);                    // 11.I created this variable to find out whether two zeros precede the value

        if ($value >= 100) {                                        //12.The value variable holds the number.If it's value is greater than

            $num1 = substr($value, 0, 1);               // or equal to hundred. I took the first number of the value using
            $ones[$num1];                                             //'substring' function, and find its corresponding value in the 'ones' array we created.
            $words .= $ones[$num1] . ' ' . $hundred[0];                //13.I added hundred to that value and stored it in the 'word' variable
            $num2 = substr($value, 1, 2);                //14.I took the next two values with the 'substring' function and stored it in a variable.

            if ($num2 != '0' ) {                                          //15.If the newly stored numbers was greater than zero I added 'and' to the
                $words .= ' and';                                      // 'words' variable .


                if ($num2 < 20 && $num2 >= 10) {                      //16.If the stored number was less than twenty and greater than or equal to ten,
                                                                          // i look for its corresponding value in the 'ones' array.
                    $num8 = $ones[$num2];

                    $words .= ' ' . $num8;                           //17.I then added that value to the 'words ' variable.

                } elseif ($num2 < 10) {                              //18.If the number is less than one ten, I took the value and found its

                    $num30 = substr($num2, 1, 1);         // corresponding value in the 'ones' array.
                    $num31 = $ones[$num30];


                    $words .= ' ' . $num31;                            //19.I then added that corresponding value to the 'words' variable.
                } else {

                    $num3 = substr($num2, 0, 1);          //20.If the value is not in the above category, i took the first number
                                                                        //and found its corresponding value in the 'tens' array.
                    $num4 = $tens[$num3];                               //I then added it to the 'words' variable.
                    $words .= ' ' . $num4;

                    $num5 = substr($num2, 1, 1);             //21.I took the second number in value, found its corresponding
                    $num6 = $ones[$num5];                                 // value from the 'ones' array and added it to 'words' variable.
                    $words .= ' ' . $num6;

                }


            }



            } elseif ($value < 100 && $value >= 20 && $num100!=0 ) {                          //22.However if the value in the array is less than 100 and greater than or equal to 20,
                                                                                              //and it is not preceded by zero I took the first value and found its corresponding value in the 'tens' array.
                $num9 = substr($value, 0, 1);
                //trim($num9,0);
                $num10 = $tens[$num9];                                       //.23 I then added that corresponding value to the 'words' variable.
                $words .= ' ' . $num10;

                $num20 = substr($value, 1, 1);                  //.24. I took the second value and found its corresponding value in the
                $num21 = $ones[$num20];                                     // 'ones' array.
                $words .= ' ' . $num21;                                     //25. I then added it to the 'words' variable.


            } elseif (($value < 20 && $value >= 10) && $num100!=0) {           //26. If the value in the array is less than twenty and greater than or equal to ten and no zero preceedes it, I found the
                $num14 = substr($value, 0, 2);                 // corresponding value in the 'ones' array.

                $num15 = $ones[$num14];
                $words .= '' . $num15;                                   //27. I added that value to the 'words' array.

            } elseif ($value < 10 && $num101!=0) {
                $num66 = substr($value, 0, 1);               //28.However if the value in the array is less than 10 and is not preceded by two zeros,
                                                                              // I took the first value and found its corresponding value in the 'tens' array.
              $num67 = $ones[$num66];
                $words .=  ''. $num67;
            }

        elseif (($value < 100 && $value >= 20) && $num100==0 && $value!='000' ) {           //29.If the value is less than 100 and greater than or equal to 20
            $num9 = substr($value, 1, 1);                                //and it is preceded by a zero or the value is not '000'.I find the corresponding value in the 'tens' array.
            //trim($num9,0);
            $num10 = $tens[$num9];                                                      //30. I then added that corresponding value to the 'words' variable.
            $words .= ' ' .'and '. $num10;

            $num20 = substr($value, 2, 1);                                 //31.. I took the second value and found its corresponding value in the
            $num21 = $ones[$num20];                                                    // 'ones' array.
            $words .= ' ' . $num21;                                                          //32.. I then added it to the 'words' variable.


        }

        elseif (($value < 20 && $value >= 10) && $num100==0 && $value!='000') {           //33. If the value in the array is less than twenty and greater than or equal to 10
            $num14 = substr($value, 1, 2);                                      // and precede by a zero and the value is not'000', I found the corresponding value in the 'ones' array.

            $num15 = $ones[$num14];
            $words .= '' .'and '. $num15;                                                 //34.. I added that value to the 'words' array.

        }

        elseif ($value < 10 && $num101=='00' && $value!='000') {                            //35.If the value is less than ten and preceded by two zeros and the value is not '000',
            $num66 = substr($value, 2, 1);                                     //36.I find the value of the value in the 'ones' array.
            $num67 = $ones[$num66];
            $words .=  ''.'and '. $num67;
        }








        break;
                                                                      //37.i used the break keyword to terminate the 'foreach' loop so
    }                                                                   // that the value in the second position in the array will not go through
                                                                        // the same process.

    if ($num > 999) {                                                   //38.If the number i am transforming is greater than 999,
        $num50 = substr($num, 0, 1);                       // then it is in the thousands. i tested that.
        $num51 = $ones[$num50];
                                                                       //39. If it is in the thousands, i take the  number that occupies
        $words = $num51 . ' ' . $hundred[1] . ' ' . $words;            // the first place and find its corresponding value in the 'ones'
                                                                      // array.
    }                                                                //40. I then add thousand to it and added  it to the 'words' variable
   // echo $words;                                                       // in the front position.


return $words;                                                         //41. Since i have created a function for the process, I return the
                                                                        // 'words' variable so that we can use it later.
}



































?>