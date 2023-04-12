<?php
/*Разширете задачата като добавите още един входен параметър - 
флаг, който включва или изключва добавянето на дните от края на предходния месец и 
дните от началото на следващия месец.
Пример:
Март 2023
 П   В   С   Ч   П   С   Н
29   30  1   2   3   4   5
 6   7   8   9  10  11  12
13 (14) 15  16  17  18  19
20  21  22  23  24  25  26
27  28  29  30  31   1   2
*/
//flag = 1 седмицата започва от понеделник
//flag = 2 седмицата започва от неделя
function calendar($date, $flag, $days_from_prev_month){
    if($flag == 1){
        $time = strtotime($date);
        $month = date('m', $time);
        $year = date('Y', $time);
        setlocale(LC_TIME, 'bg_BG.UTF-8', 'bulgarian');
        $first_day = mktime(0, 0, 0, $month, 7, $year);
        $day_in_month = date('t', $first_day);
        $last_day = mktime(0, 0, 0, $month + 1, 0, $year);
        $first_day_position = date('w', $first_day);
        $row = 1;
        switch(date('m', $time)){
            case 1:
                echo "Януари";
                break;
            case 2:
                echo "Февруари";
                break;
            case 3:
                echo "Март";
                break;
            case 4:
                echo "Април";
                break;
            case 5:
                echo "Май";
                break;
            case 6:
                echo "Юни";
                break;
            case 7:
                echo "Юли";
                break;
            case 8:
                echo "Август";
                break;
            case 9:
                echo "Септември";
                break;
            case 10:
                echo "Октомври";
                break;
            case 11:
                echo "Ноември";
                break;
            case 12:
                echo "Декември";
                break;                        
        }
        echo " " . date('Y', $time);
        echo "\n";
        echo "П\tВ\tС\tЧ\tП\tС\tН\n";
        if($days_from_prev_month){
            for($i = $first_day_position; $i >= 1; $i--){
                $first_day_1 = mktime(0, 0, 0, $month, 1, $year);
                echo date('j', strtotime("-$i day", $first_day_1)) . "\t";
            }
        } else {
            for($i = 1; $i <= $first_day_position; $i++){
                echo "\t";
        }
        
        }
        for($day = 1; $day <= $day_in_month; $day++){
            if(($day + $first_day_position - 1) % 7 == 0 && $day != 1){
                echo "\n";
                $row++;
            }
            if(date('d', $time) != $day){
                echo "$day\t";
            } else  {
                echo "($day)\t";
            }
        }
        while(($day + $first_day_position) <= $row * 7){
            echo "\t";
            $day++;
        }
        echo "\n";
        } else if($flag == 2) {
            $time = strtotime($date);
            $month = date('m', $time);
            $year = date('Y', $time);
            $current_day = date("d", $time);
            setlocale(LC_TIME, 'bg_BG.UTF-8', 'bulgarian');
            $first_day = mktime(0, 0, 0, $month, 1, $year);
            $day_in_month = date('t', $first_day);
            $last_day = mktime(0, 0, 0, $month + 1, 0, $year);
            $first_day_position = date('w', $first_day);
            $row = 1;
            switch(date('m', $time)){
                case 1:
                    echo "Януари";
                    break;
                case 2:
                    echo "Февруари";
                    break;
                case 3:
                    echo "Март";
                    break;
                case 4:
                    echo "Април";
                    break;
                case 5:
                    echo "Май";
                    break;
                case 6:
                    echo "Юни";
                    break;
                case 7:
                    echo "Юли";
                    break;
                case 8:
                    echo "Август";
                    break;
                case 9:
                    echo "Септември";
                    break;
                case 10:
                    echo "Октомври";
                    break;
                case 11:
                    echo "Ноември";
                    break;
                case 12:
                    echo "Декември";
                break;                        
            }
            echo " " . date('Y', $time);
            echo "\n";
            echo "Н\tП\tВ\tС\tЧ\tП\tС\n";
            if($days_from_prev_month){
                for($i = $first_day_position; $i >= 1; $i--){
                    $first_day_1 = mktime(0, 0, 0, $month, 1, $year);
                    echo date('j', strtotime("-$i day", $first_day_1)) . "\t";
                }
            } else {
                for($i = 1; $i <= $first_day_position; $i++){
                    echo "\t";
                }
            }
            for($day = 1; $day <= $day_in_month; $day++){
                if(($day + $first_day_position - 1) % 7 == 0 && $day != 1){
                    echo "\n";
                    $row++;
                } 
                if(date('d', $time) != $day){
                    echo "$day\t";
                } else  {
                    echo "($day)\t";
                }
                
            }
            while(($day + $first_day_position) <= $row * 7){
                echo "\t";
                $day++;
            }
            echo "\n";
        }
        
    }
    calendar('04-03-2023', 1, true);
    echo "\n\n";
    calendar('23-03-2023', 2, false);