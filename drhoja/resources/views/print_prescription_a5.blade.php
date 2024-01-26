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
<body class="relative font-iran a5 landscape">
<section class="sheet padding-5mm">
    <div class="relative">
        <img src="{{url("img/noskheh.jpg")}}" alt="" class="">
        <span class="absolute top-[110px] left-[360px] text-[10px] font-extralight">{{$name}}</span>
        <span class="absolute top-[110px] left-28 text-[10px] font-extralight">{{$nCode}}</span>
        <span class="absolute top-[45px] left-16 text-[10px] font-extralight flex gap-2">{{$date}}
{{--                <span>15</span>--}}
{{--                <span>07</span>--}}
{{--                <span>1402</span>--}}
            </span>
        @foreach($medicines as $med)
            <p class="absolute top-[160px] left-96 text-xs font-extralight">{{$med->medicines->title}}</p>
        @endforeach
        <img src="{{url("img/emsa.png")}}" alt="" class="absolute bottom-[90px] left-24 w-40">
    </div>

</section>
</body>
</html>
