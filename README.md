# Group-project
Календар

1. Направете програма за показване на месечен календар по зададена дата.
Входни данни: Дата
Изходни данни: Календар за месеца в табличен вид  където дните от седмицата са представени в колони: П В С Ч П С Н, а дните се показват по подходящ начин като се започне от съответната колона. Внимавайте за дните през месец февруари при високосна година. В началото на календара да се показва месец и година, съответстващи на входната дата. Месецът да се изписва на български език.


2. Разширете календара си по следният начин:
Входни данни: Дата; Флаг, указващ дали първият ден от седмицата е П или Н.
Изходни данни: Променете визуализацията от задача 1 така, че да започва с правилния ден от седмицата. Също оградете текущата дата в скобки.


3. Разширете задачата като добавите още един входен параметър - флаг, който включва или изключва добавянето на дните от края на предходния месец и дните от началото на следващия месец.


4. Добавете в края на вашият календар от задача 3 коя е зодията, съответстваща на конкретната дата. Това би било още един параметър във функцията ви за генериране на календара (например $show_zodiac = true)

Пример:



ВАЖНО ЗА ВСИЧКИ ЗАДАЧИ: 
* Въпреки, че задачите са свързани, използвайте отделни файлове за решенията си. (Например: ex1.php; task 1.php)
* Опитайте се да отделите визуализацията, изчисленията и данните в отделни функции. В главната част на програмата трябва да има нещо като: 

$date = '2023-03-14';
echo build_calendar($date, ...$flags)."\n";

* Ако желаете за улеснение бихте могли да решите задачите в текстов вариант т.е. без HTML
