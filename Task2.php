<?php
/*
Необходимо вывести дату ближайшей доставки в формате: "30 ноября". 
Алгоритм следующий: если сегодня времени меньше, чем 20-00, то доставка завтра, если более 20-00,
то послезавтра! Если день доставки попадает на праздничный день, то доставка переносится на 
следующий день после праздника. Праздники записываются в массиве в формате: "месяц-день": '01-01' - 1 января..*/
$holidays = [
    '01-01', '01-02', '03-08', '03-21', '03-22', '03-23', '05-01',
    '05-07', '05-09', '07-06', '08-30', '12-01', '12-16', '12-17'
];




$date = new DateTime('2022-09-18');
date_time_set(
    $date,
    $hour = 19,
    $minute = 59,
    $second = 59,
    $microsecond = 59
);


if ($date->format('H') >= 20) {
    $delivery = $date->add(new DateInterval('P2D'));
} else {
    $delivery = $date->add(new DateInterval('P1D'));
}

while (in_array($delivery->format('m-d'), $holidays)) {
    $delivery = $delivery->add(new DateInterval('P1D'));
}
echo sprintf($delivery->format('d F')) . "<br>";
