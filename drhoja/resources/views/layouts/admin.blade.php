@include('includes.header')

<body class="bg-colorsecondry1 font-iran">
<div class="flex">
    @php( $currentUrl = Request::segment(1) )
    @php($menu_class_value = 'bg-white text-colorsecondry')

    <div x-data="{ home:true , form:false, edu:false, patients:false, users:false ,meds:false , types:false , areas:false}" class="hidden sm:flex flex-col gap-3 bg-white min-h-screen h-full p-5 overflow-y-auto">

        <a href="{{url('/dashboard')}}" @if($currentUrl == 'dashboard') x-data="{ home:true }" @else x-data="{ home:false }" @endif  :class="home ? 'bg-colorprimary text-white' : 'bg-colorsecondry1 text-colorthird1' " class="cursor-pointer flex flex-col gap-1 items-center justify-center w-32 h-24 rounded-2xl text-sm hover:-translate-y-1 duration-150 ease-linear">
            <img x-show="!home" src="{{url('/img/icon-home.svg')}}" alt="" class="w-10">
            <img x-show="home" src="{{url('/img/icon-home-white.svg')}}" alt="" class="w-10">
            <span>صفحه اصلی</span>
        </a>
        <a href="{{url('information-base')}}" @if($currentUrl == 'information-base' || $currentUrl == 'medicine' || $currentUrl == 'type' || $currentUrl == 'area') x-data="{ information:true }" @else x-data="{ information:false }" @endif  :class="information ? 'bg-colorprimary text-white' : 'bg-colorsecondry1 text-colorthird1' " class="cursor-pointer flex flex-col gap-1 items-center justify-center w-32 h-24 rounded-2xl text-sm hover:-translate-y-1 duration-150 ease-linear">
            <img x-show="!information" src="{{url('/img/icon-information.svg')}}" alt="" class="w-10">
            <img x-show="information" src="{{url('/img/icon-information-white.svg')}}" alt="" class="w-10">
            <span>اطلاعات پایه</span>
        </a>
        <a @click="home=true, form=false, edu=false, patients=false, users=false" :class="home ? 'bg-colorprimary text-white' : 'bg-colorsecondry1 text-colorthird1' " class="cursor-pointer flex flex-col gap-1 items-center justify-center w-32 h-24 rounded-2xl text-sm hover:-translate-y-1 duration-150 ease-linear">
            <img x-show="!home" src="{{url('/img/icon-home.svg')}}" alt="" class="w-10">
            <img x-show="home" src="{{url('/img/icon-home-white.svg')}}" alt="" class="w-10">
            <span>صفحه اصلی</span>
        </a>
        <a href="{{url('forms')}}" @click="home=false, form=true, edu=false, patients=false, users=false ,meds:false , types:false , areas:false" :class="form ? 'bg-colorprimary text-white' : 'bg-colorsecondry1 text-colorthird1' " class="cursor-pointer flex flex-col gap-1 items-center justify-center w-32 h-24 rounded-2xl text-sm hover:-translate-y-1 duration-150 ease-linear">
            <img x-show="!form" src="{{url('/img/icon-form.svg')}}" alt="" class="w-10">
            <img x-show="form" src="{{url('/img/icon-form-white.svg')}}" alt="" class="w-10">
            <span>فرم ها</span>
        </a>
        <a href="{{url('medicine')}}" @click="home=false, form=false, edu=false, patients=false, users=false ,meds:true , types:false , areas:false" :class="form ? 'bg-colorprimary text-white' : 'bg-colorsecondry1 text-colorthird1' " class="cursor-pointer flex flex-col gap-1 items-center justify-center w-32 h-24 rounded-2xl text-sm hover:-translate-y-1 duration-150 ease-linear">
            <img x-show="!form" src="{{url('/img/icon-form.svg')}}" alt="" class="w-10">
            <img x-show="form" src="{{url('/img/icon-form-white.svg')}}" alt="" class="w-10">
            <span>داروها</span>
        </a>
        <a href="{{url('type')}}" @click="home=false, form=false, edu=false, patients=false, users=false ,meds:false , types:true , areas:false" :class="form ? 'bg-colorprimary text-white' : 'bg-colorsecondry1 text-colorthird1' " class="cursor-pointer flex flex-col gap-1 items-center justify-center w-32 h-24 rounded-2xl text-sm hover:-translate-y-1 duration-150 ease-linear">
            <img x-show="!form" src="{{url('/img/icon-form.svg')}}" alt="" class="w-10">
            <img x-show="form" src="{{url('/img/icon-form-white.svg')}}" alt="" class="w-10">
            <span>آیتم های درمان</span>
        </a>
        <a href="{{url('area')}}" @click="home=false, form=false, edu=false, patients=false, users=false ,meds:false , types:false , areas:true" :class="form ? 'bg-colorprimary text-white' : 'bg-colorsecondry1 text-colorthird1' " class="cursor-pointer flex flex-col gap-1 items-center justify-center w-32 h-24 rounded-2xl text-sm hover:-translate-y-1 duration-150 ease-linear">
            <img x-show="!form" src="{{url('/img/icon-form.svg')}}" alt="" class="w-10">
            <img x-show="form" src="{{url('/img/icon-form-white.svg')}}" alt="" class="w-10">
            <span>نواحی درمان</span>
        </a>
        <a href="{{url('edu')}}" @click="home=false, form=false, edu=true, patients=false, users=false meds:false , types:false , areas:true" :class="edu ? 'bg-colorprimary text-white' : 'bg-colorsecondry1 text-colorthird1' " class="cursor-pointer flex flex-col gap-1 items-center justify-center w-32 h-24 rounded-2xl text-sm hover:-translate-y-1 duration-150 ease-linear">
            <img x-show="!edu" src="{{url('/img/icon-edu.svg')}}" alt="" class="w-10">
            <img x-show="edu" src="{{url('/img/icon-edu-white.svg')}}" alt="" class="w-10">
            <span>آموزش</span>
        </a>
        <a href="{{url('patient')}}" @click="home=false, form=false, edu=false, patients=true, users=false meds:false , types:false , areas:true" :class="patients ? 'bg-colorprimary text-white' : 'bg-colorsecondry1 text-colorthird1' " class="cursor-pointer flex flex-col gap-1 items-center justify-center w-32 h-24 rounded-2xl text-sm hover:-translate-y-1 duration-150 ease-linear">
            <img x-show="!patients" src="{{url('/img/icon-patients.svg')}}" alt="" class="w-10">
            <img x-show="patients" src="{{url('/img/icon-patients-white.svg')}}" alt="" class="w-10">
            <span>بیماران</span>
        </a>
        <a href="{{url('users')}}" @click="home=false, form=false, edu=false, patients=false, users=true meds:false , types:false , areas:true" :class="users ? 'bg-colorprimary text-white' : 'bg-colorsecondry1 text-colorthird1' " class="cursor-pointer flex flex-col gap-1 items-center justify-center w-32 h-24 rounded-2xl text-sm hover:-translate-y-1 duration-150 ease-linear">
            <img x-show="!users" src="{{url('/img/icon-users.svg')}}" alt="" class="w-9">
            <img x-show="users" src="{{url('/img/icon-users-white.svg')}}" alt="" class="w-9">
            <span>کاربران</span>
        </a>
        <a href="{{route('logout')}}" class="bg-colorsecondry1 text-colorthird1 cursor-pointer flex flex-col gap-1 items-center justify-center w-32 h-24 rounded-2xl text-sm hover:-translate-y-1 duration-150 ease-linear">
            <img src="{{url('/img/icon-exit.svg')}}" alt="" class="w-9">
            <span>خروج</span>
        </a>
    </div>
    <div class="py-3 flex-1 w-full px-5 overflow-auto">
        <!-- ------------ menu top --------------- -->
        <nav class="w-full font-light">
            <div class="bg-white rounded-xl p-4 flex justify-between items-center">
                <a  href="" class=" p-1 md:px-3 rounded-lg flex md:hidden">
                    <img src="{{url('/img/burger.svg')}}" alt="" class="block md:hidden w-4">
                </a>
                <span class="font-extrabold text-xs lg:text-base">
                        محمدجواد عبدالهی <span class="font-light">خوش آمدید...</span>
                    </span>
                <span class="flex items-center gap-2">
                        <span>|</span>
                        <a href="{{route('logout')}}" class="bg-colorthird1 p-2 md:px-3 rounded-lg flex">
                            <span class="text-white font-extralight text-sm hidden md:block">خروج</span>
                            <img src="{{url('/img/icon-exit-white.svg')}}" alt="" class="block md:hidden w-3">
                        </a>
                    </span>

            </div>                <!-- ------------------ body store -------------------  -->
@yield('content')
        </nav>
    </div>
</div>
<script src="{{url('/js/jquery.min.js')}}"></script>
<script src="{{url('/js/select-searchable.js')}}"></script>
<script src="{{url('/js/search-item.js')}}"></script>
<script src="{{url('/js/multiselect-dropdown.js')}}"></script>
<script src="{{url('/js/menutoggle.js')}}"></script>
<script src="{{url('/js/select2.min.js')}}"></script>
<script src="{{url('/js/menu-toggle.js')}}"></script>
<script src="{{url('/js/app.js')}}"></script>

@yield('script')

</body>
</html>
