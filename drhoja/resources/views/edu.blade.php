@extends('layouts.admin')
@section('page_title')
    آموزش ها
@endsection
@section('content')
    <!-- ------------ menu top --------------- -->
    <div class="mt-5 flex flex-row flex-wrap gap-2 items-center justify-center w-full">
        <button onclick="javascript:(function() {  window.open('artroz'); })()" class="bg-white min-w-[192px] w-60 text-colorthird1 cursor-pointer flex flex-row gap-1 items-center justify-between p-3 rounded-2xl font-extrabold hover:-translate-y-1 duration-150 ease-linear">
            <span>آرتروز زانو</span>
            <img src="{{url("img/arttoz-pic.jpg")}}" alt="" class="w-28 h-24 object-cover rounded-xl">
        </button>
        <button  class="bg-white min-w-[192px] w-60 text-colorthird1 cursor-pointer flex flex-row gap-1 items-center justify-between p-3 rounded-2xl font-extrabold hover:-translate-y-1 duration-150 ease-linear">
            <span>کندرومالسی</span>
            <img src="{{url("img/kondero-pic.jpg")}}" alt="" class="w-28 h-24 object-cover rounded-xl">
        </button>
        <button  class="bg-white min-w-[192px] w-60 text-colorthird1 cursor-pointer flex flex-row gap-1 items-center justify-between p-3 rounded-2xl font-extrabold hover:-translate-y-1 duration-150 ease-linear">
            <span>کف پای صاف</span>
            <img src="{{url("img/paysaf-pic.jpg")}}" alt="" class="w-28 h-24 object-cover rounded-xl">
        </button>
        <button  class="bg-white min-w-[192px] w-60 text-colorthird1 cursor-pointer flex flex-row gap-1 items-center justify-between p-3 rounded-2xl font-extrabold hover:-translate-y-1 duration-150 ease-linear">
            <span>خارپاشنه</span>
            <img src="{{url("img/pashneh-pic.jpg")}}" alt="" class="w-28 h-24 object-cover rounded-xl">
        </button>
    </div>
@endsection
@section('script')

    <script>

        function closeModal(modal) {

            $('#' + modal).addClass("hidden");
        }

        function showModal(modal) {
            $('#' + modal).removeClass('hidden');
        }

        function resetForm(elm) {
            $('#' + elm + 'Form')[0].reset();
        }

    </script>
@endsection

