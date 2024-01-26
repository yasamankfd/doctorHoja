@extends('layouts.admin')
@section('page_title')
    اطلاعات پایه
@endsection
@section('content')
    <!-- ------------ menu top --------------- -->
    <div class="mt-5 flex flex-row flex-wrap gap-2 items-center justify-center w-full">
        <a href="{{url('medicine')}}"
           class="bg-white min-w-[192px] w-48 text-colorthird1 cursor-pointer flex flex-col gap-1 items-center p-5 rounded-2xl font-extrabold hover:-translate-y-1 duration-150 ease-linear">
            <img src="{{url('/img/icon-noskhe.svg')}}" alt="" class="w-10">
            <span>داروها</span>
        </a>
{{--        <a href="{{url('type')}}"--}}
{{--           class="bg-white w-48 text-colorthird1 cursor-pointer flex flex-col gap-1 items-center p-5 rounded-2xl font-extrabold hover:-translate-y-1 duration-150 ease-linear">--}}
{{--            <img src="{{url('/img/icon-phyzio.svg')}}" alt="" class="w-10">--}}
{{--            <span>آیتم های درمان</span>--}}
{{--        </a>--}}
        <a href="{{url('area')}}"
           class="bg-white w-48 text-colorthird1 cursor-pointer flex flex-col gap-1 items-center p-5 rounded-2xl font-extrabold hover:-translate-y-1 duration-150 ease-linear">
            <img src="{{url('/img/icon-pay.svg')}}" alt="" class="w-10">
            <span>نواحی درمان</span>
        </a>
    </div>
    </div>
    </div>

@endsection
@section('script')
    <script src="{{url('/js/main.js')}}"></script>
@endsection

