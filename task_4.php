<?php
/*Добавете в края на вашият календар от задача 3 коя е зодията, 
съответстваща на конкретната дата. Това би било още един параметър във функцията ви за 
генериране на календара (например $show_zodiac = true)
Пример:
Март 2023
 П   В   С   Ч   П   С   Н
29   30  1   2   3   4   5
 6   7   8   9  10  11  12
13 (14) 15  16  17  18  19
20  21  22  23  24  25  26
27  28  29  30  31   1   2
Зодия: Риби - (19 Февруари - 20 Март)
*/

function calendar($date, $flag, $days_from_prev_month, $show_zodiac){
    if($flag == 1){
        $time = strtotime($date);
        $month = date('m', $time);
        $year = date('Y', $time);
        $day_of_month = date('d', $time);
        setlocale(LC_TIME, 'bg_BG.UTF-8', 'bulgarian');
        $first_day = mktime(0, 0, 0, $month, 7, $year);
        $day_in_month = date('t', $first_day);
        $last_day = mktime(0, 0, 0, $month + 1, 0, $year);
        $first_day_position = date('w', $first_day);
        $last_day_position = date('w', $last_day);
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
        if($days_from_prev_month){
            $position_to_add = 0;
            switch($last_day_position){
                case 1:
                    $position_to_add = 7;
                    break;
                case 2:
                    $position_to_add = 6;
                    break;    
                case 3:
                    $position_to_add = 5;
                    break;
                case 4:
                    $position_to_add = 4;
                    break;
                case 5:
                    $position_to_add = 3;
                    break;        
                case 6:
                    $position_to_add = 2;
                    break;
                case 7:
                    $position_to_add = 1;
                    break;     
            }
            for($q = 1; $q < $position_to_add; $q++){
                echo date('j', strtotime("+$q day", $last_day)) . "\t";
            }
        }
        echo "\n";
        if($show_zodiac){
            if(($month == 1 && $day_of_month >= 20) || ($month == 2 && $day_of_month < 18)){
             echo "Зодия: Водолей - (20 Януари - 18 Февруари)";
            } if(($month == 2 && $day_of_month >= 18) || ($month == 3 && $day_of_month < 21)){
             echo "Зодия: Риби - (19 Февруари - 20 Март)";
            } if(($month == 3 && $day_of_month > 20) || ($month == 4 && $day_of_month < 21)){
             echo "Зодия: Овен - (21 Март - 19 Април)";
            } if(($month == 4 && $day_of_month > 20) || ($month == 5 && $day_of_month < 22)){
             echo "Зодия: Телец - (20 Април - 20 Май)";
            } if(($month == 5 && $day_of_month > 21) || ($month == 6 && $day_of_month < 22)){
             echo "Зодия: Близнаци - (21 Май - 21 Юни)";
            } if(($month == 6 && $day_of_month > 21) || ($month == 7 && $day_of_month < 22)){
             echo "Зодия: Рак - (22 Юни - 22 Юли)";
            } if(($month == 7 && $day_of_month > 21) || ($month == 8 && $day_of_month < 24)){
             echo "Зодия: Лъв - (23 Юли - 22 Август)";
            } if(($month == 8 && $day_of_month > 23) || ($month == 9 && $day_of_month < 24)){
             echo "Зодия: Дева - (23 Август - 22 Септември)";
            } if(($month == 9 && $day_of_month > 23) || ($month == 10 && $day_of_month < 24)){
             echo "Зодия: Везни - (23 Септември - 23 Октомври)";
            } if(($month == 10 && $day_of_month > 23) || ($month == 11 && $day_of_month < 24)){
             echo "Зодия: Скорпион - (24 Октомври - 22 Ноември)";
            } if(($month == 11 && $day_of_month > 22) || ($month == 12 && $day_of_month < 23)){
             echo "Зодия: Стрелец - (23 Ноември - 21 Декември)";
            } if(($month == 12 && $day_of_month > 22) || ($month == 1 && $day_of_month < 21)){
             echo "Зодия: Козирог - (22 Декември - 19 Януари)";
            } 
        }
    
     } else if($flag == 2) {
            $time = strtotime($date);
            $month = date('m', $time);
            $year = date('Y', $time);
            $day_of_month = date("d", $time);
            setlocale(LC_TIME, 'bg_BG.UTF-8', 'bulgarian');
            $first_day = mktime(0, 0, 0, $month, 1, $year);
            $day_in_month = date('t', $first_day);
            $last_day = mktime(0, 0, 0, $month + 1, 0, $year);
            $first_day_position = date('w', $first_day);
            $last_day_position = date('w', $last_day);
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
            if($days_from_prev_month){
                $position_to_add = 0;
                switch($last_day_position){
                    case 0:
                        $position_to_add = 7;
                        break;
                    case 1:
                        $position_to_add = 6;
                        break;    
                    case 2:
                        $position_to_add = 5;
                        break;
                    case 3:
                        $position_to_add = 4;
                        break;
                    case 4:
                        $position_to_add = 3;
                        break;        
                    case 5:
                        $position_to_add = 2;
                        break;
                    case 6:
                        $position_to_add = 1;
                        break;     
                }
                for($q = 1; $q < $position_to_add; $q++){
                    echo date('j', strtotime("+$q day", $last_day)) . "\t";
                }
            }
            echo "\n";
            if($show_zodiac){
                if(($month == 1 && $day_of_month >= 20) || ($month == 2 && $day_of_month <= 18)){
                 echo "Зодия: Водолей - (20 Януари - 18 Февруари)";
                } if(($month == 2 && $day_of_month >= 19) || ($month == 3 && $day_of_month <= 20)){
                 echo "Зодия: Риби - (19 Февруари - 20 Март)";
                } if(($month == 3 && $day_of_month >= 21) || ($month == 4 && $day_of_month <= 19)){
                 echo "Зодия: Овен - (21 Март - 19 Април)";
                } if(($month == 4 && $day_of_month >= 20) || ($month == 5 && $day_of_month <= 20)){
                 echo "Зодия: Телец - (20 Парил - 20 Май)";
                } if(($month == 5 && $day_of_month >= 21) || ($month == 6 && $day_of_month <= 21)){
                 echo "Зодия: Близнаци - (21 Май - 21 Юни)";
                } if(($month == 6 && $day_of_month >= 22) || ($month == 7 && $day_of_month <= 22)){
                 echo "Зодия: Рак - (22 Юни - 22 Юли)";
                } if(($month == 7 && $day_of_month >= 23) || ($month == 8 && $day_of_month <= 22)){
                 echo "Зодия: Лъв - (23 Юли - 22 Август)";
                } if(($month == 8 && $day_of_month >= 23) || ($month == 9 && $day_of_month <= 22)){
                 echo "Зодия: Дева - (23 Август - 22 Септември)";
                } if(($month == 9 && $day_of_month >= 23) || ($month == 10 && $day_of_month <= 23)){
                 echo "Зодия: Везни - (23 Септември - 23 Октомври)";
                } if(($month == 10 && $day_of_month >= 24) || ($month == 11 && $day_of_month <= 22)){
                 echo "Зодия: Скорпион - (24 Октомври - 22 Ноември)";
                } if(($month == 11 && $day_of_month >= 23) || ($month == 12 && $day_of_month <= 21)){
                 echo "Зодия: Стрелец - (23 Ноември - 21 Декември)";
                } if(($month == 12 && $day_of_month >= 22) || ($month == 1 && $day_of_month <= 19)){
                 echo "Зодия: Козирог - (22 Декември - 19 Януари)";
                } 
            }
        }
    }
    calendar('27-05-2023', 1, true, true);
    echo "\n\n";
    calendar('13-11-2023', 2, true, true);
