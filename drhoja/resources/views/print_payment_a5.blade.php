<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>انتخاب نقش</title>
    <link rel="stylesheet" href="{{url("css/paper.css")}}">
    <link rel="stylesheet" href="{{url("build/tailwind.css")}}">
    <link rel="stylesheet" href="{{url("css/font.css")}}">
</head>
<body class="relative font-iran a5">
<section class="sheet padding-5mm">
    <div class="relative">
        <img src="{{url("img/pay.jpg")}}" alt="" class="">
        <span class="absolute top-[205px] left-52 text-xs font-extralight">{{$payment->number}}</span>
        <span class="absolute top-[240px] left-52 text-xs font-extralight flex gap-3">
              {{$date}}
            </span>
        <span class="absolute top-[330px] left-44 text-xs font-extralight">{{$payment->amount}}</span>
        <span class="absolute top-[405px] right-16 text-xs font-extralight pl-20 leading-[50px]">{{$payment->description}}</span>
        <p class="absolute bottom-[245px] right-44 text-sm text-justify font-extralight">{{$name}}</p>
        <img src="{{url("img/emsa.png")}}" alt="" class="absolute bottom-[115px] left-24 w-40">
    </div>

</section>
</body>
</html>
