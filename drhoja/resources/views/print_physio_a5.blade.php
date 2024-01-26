<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>انتخاب نقش</title>
    <link rel="stylesheet" href="{{url("src/css/paper.css")}}">
    <link rel="stylesheet" href="{{url("build/tailwind.css")}}">
    <link rel="stylesheet" href="{{url("src/css/font.css")}}">
</head>
<body class="relative font-iran a5 landscape">
<section class="sheet padding-5mm">
    <div class="relative">
        <img src="{{url("img/physio.jpg")}}" alt="" class="">
        <span class="absolute top-[110px] left-[360px] text-[10px] font-extralight">{{$name}}</span>
        <span class="absolute top-[110px] left-28 text-[10px] font-extralight">{{$national_code}}</span>
        @foreach($areas as $area)
            <span class="absolute top-[145px] left-[360px] text-[10px] font-extralight">{{$area->areas->title}}</span>
        @endforeach
        <span class="absolute top-[145px] left-28 text-[10px] font-extralight">{{$num_sessions}}</span>
        <span class="absolute top-[45px] left-16 text-[10px] font-extralight flex gap-2">{{$date}}
            </span>
{{--        @foreach($physio_types as $type)--}}
{{--            <img src="{{url("img/tick.svg")}}" alt="" class="absolute top-[230px] right-[322px] w-3">--}}
{{--        @endforeach--}}

        <img src="{{url("img/tick.svg")}}" alt="" class="absolute @if(in_array(4, $physio_types)) @else hidden @endif top-[230px] right-[322px] w-3">
        <img src="{{url("img/tick.svg")}}" alt="" class="absolute @if(in_array(1, $physio_types)) @else hidden @endif top-[260px] right-[322px] w-3">
        <img src="{{url("img/tick.svg")}}" alt="" class="absolute @if(in_array(10, $physio_types)) @else hidden @endif top-[288px] right-[322px] w-3">
        <img src="{{url("img/tick.svg")}}" alt="" class="absolute @if(in_array(13, $physio_types)) @else hidden @endif top-[318px] right-[322px] w-3">
        <img src="{{url("img/tick.svg")}}" alt="" class="absolute @if(in_array(3, $physio_types)) @else hidden @endif top-[350px] right-[322px] w-3">
        <img src="{{url("img/tick.svg")}}" alt="" class="absolute @if(in_array(6, $physio_types)) @else hidden @endif top-[380px] right-[322px] w-3">

        <img src="{{url("img/tick.svg")}}" alt="" class="absolute @if(in_array(9, $physio_types)) @else hidden @endif top-[230px] left-[230px] w-3">
        <img src="{{url("img/tick.svg")}}" alt="" class="absolute @if(in_array(12, $physio_types)) @else hidden @endif top-[260px] left-[230px] w-3">
        <img src="{{url("img/tick.svg")}}" alt="" class="absolute @if(in_array(5, $physio_types)) @else hidden @endif top-[288px] left-[230px] w-3">
        <img src="{{url("img/tick.svg")}}" alt="" class="absolute @if(in_array(7, $physio_types)) @else hidden @endif top-[318px] left-[230px] w-3">
        <img src="{{url("img/tick.svg")}}" alt="" class="absolute @if(in_array(8, $physio_types)) @else hidden @endif top-[350px] left-[230px] w-3">
        <img src="{{url("img/tick.svg")}}" alt="" class="absolute @if(in_array(11, $physio_types)) @else hidden @endif top-[380px] left-[230px] w-3">
        <p class="absolute bottom-[110px] left-96 text-[10px] text-justify font-extralight">{{$description}}</p>
        <img src="{{url("img/emsa.png")}}" alt="" class="absolute bottom-[70px] left-24 w-40">
    </div>

</section>
</body>
</html>
