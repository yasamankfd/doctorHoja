@include('includes.header')
@section('page_title')
    ورود
@endsection
<body>
<div class="relative flex flex-row h-screen items-center justify-center font-iran font-extralight px-5">
    <span class="w-full h-screen absolute z-30 bg-black/50 backdrop-blur-sm"></span>
    <img src="{{url('/img/doctor.jpg')}}" alt="" class="w-full h-screen z-10 absolute object-cover">
    <div class="bg-white max-w-3xl w-full md:w-1/2 lg:w-1/3 xl:w-1/4 2xl:w-1/5 z-40 py-4 px-5 rounded-lg flex flex-col gap-8">
            <span class="flex flex-col text-center">
                <span class="font-light text-xl text-center">
                    سامانه مدیریت فرم <span class="font-semibold text-xl">دکتر هُژا</span>
                </span>
                <span class="text-slate-400">دکترعادل هژبریان</span>
            </span>
        <form method="POST"  action="{{ route('login') }}">
            @csrf
            <div class="flex flex-col gap-2">
                <span class="flex flex-col gap-2">
                    <span>نام کاربری:</span>
                    <input type="text" id="username" name="username" class="w-full py-3 border-none bg-slate-100 rounded-lg focus:outline-colorprimary focus:ring-0 text-center placeholder:text-center font-thin text-sm" placeholder="نام کاربری را وارد کنید">
                </span>
                <span class="flex flex-col gap-2">
                        <span>رمزعبور:</span>
                        <input type="password" id="password" name="password" class="w-full py-3 border-none bg-slate-100 rounded-lg focus:outline-colorprimary focus:ring-0 text-center placeholder:text-center font-thin text-sm" placeholder="رمز عبور را وارد کنید">
                </span>
            </div>
            <span class="flex items-center justify-center">
                <button type="submit" class="bg-colorprimary text-white w-36 text-center rounded-lg px-5 py-3 focus:outline-amber-600">ورود</button>
            </span>
        </form>
    </div>
</div>
</body>
</html>
