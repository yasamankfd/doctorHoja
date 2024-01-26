<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>انتخاب نقش</title>
    <link rel="stylesheet" href="{{url("src/css/paper.css")}}">
    <link rel="stylesheet" href="{{url("build/tailwind.css")}}">
    <link rel="stylesheet" href="{{url("css/font.css")}}">
</head>
<body class="relative font-iran a5">
<section class="sheet padding-5mm">
    <div class="relative">
        <img src="{{url("img/esterahat.jpg")}}" alt="" class="">
        <span class="absolute top-[285px] left-44 text-xs font-extralight">{{$name}}</span>
        <span class="absolute top-[285px] left-9 text-xs font-extralight flex gap-3">{{$date}}</span>
        <span class="absolute top-[320px] left-44 text-xs font-extralight">{{$description}}</span>
        <span class="absolute top-[320px] left-12 text-xs font-extralight flex gap-3">
                5
            </span>
        <span class="absolute top-[355px] left-40 text-xs font-extralight flex gap-3">{{$start_date}}</span>
        <span class="absolute top-[355px] left-72 text-xs font-extralight flex gap-3">{{$end_date}}</span>
        <img src="{{url("img/emsa.png")}}" alt="" class="absolute bottom-[300px] left-24 w-40">
    </div>

</section>
</body>
</html>
