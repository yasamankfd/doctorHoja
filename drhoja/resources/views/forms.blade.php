
@extends('layouts.admin')
@section('CDNs')
    <link rel="stylesheet" href="{{url('persian_datepicker/css/jalalidatepicker.min.css')}}">
    <script type="text/javascript" src="{{url('persian_datepicker/js/jalalidatepicker.min.js')}}"></script>
@endsection
@section('page_title')
    فرم ها
@endsection
@section('content')
        <!-- ------------ menu top --------------- -->
        <div class="mt-5 flex flex-row flex-wrap gap-2 items-center justify-center w-full">
            <button onclick="showModal('modal_prescription')" class="bg-white min-w-[192px] w-48 text-colorthird1 cursor-pointer flex flex-col gap-1 items-center p-5 rounded-2xl font-extrabold hover:-translate-y-1 duration-150 ease-linear">
                <img src="{{url('/img/icon-noskhe.svg')}}" alt="" class="w-10">
                <span>نسخه بیمار</span>
            </button>
            <button onclick="showModal('modal_physio')" class="bg-white w-48 text-colorthird1 cursor-pointer flex flex-col gap-1 items-center p-5 rounded-2xl font-extrabold hover:-translate-y-1 duration-150 ease-linear">
                <img src="{{url('/img/icon-phyzio.svg')}}" alt="" class="w-10">
                <span>ارجاع فیزیوتراپی</span>
            </button>
            <button onclick="showModal('modal_payment')" class="bg-white w-48 text-colorthird1 cursor-pointer flex flex-col gap-1 items-center p-5 rounded-2xl font-extrabold hover:-translate-y-1 duration-150 ease-linear">
                <img src="{{url('/img/icon-pay.svg')}}" alt="" class="w-10">
                <span>پرداخت وجه</span>
            </button>
            <button onclick="showModal('modal_sick')" class="bg-white w-48 text-colorthird1 cursor-pointer flex flex-col gap-1 items-center p-5 rounded-2xl font-extrabold hover:-translate-y-1 duration-150 ease-linear">
                <img src="{{url('/img/icon-estelaji.svg')}}" alt="" class="w-10">
                <span>گواهی استعلاجی</span>
            </button>
            <button  disabled  class="opacity-50 bg-white w-48 text-colorthird1 cursor-pointer flex flex-col gap-1 items-center p-5 rounded-2xl font-extrabold hover:-translate-y-1 duration-150 ease-linear">
                <img src="{{url('/img/icon-tracking.svg')}}" alt="" class="w-10">
                <span>رسید کدرهگیری</span>
            </button>
            <button onclick="showModal('modal_reception')" class="bg-white w-48 text-colorthird1 cursor-pointer flex flex-col gap-1 items-center p-5 rounded-2xl font-extrabold hover:-translate-y-1 duration-150 ease-linear">
                <img src="{{url('/img/icon-paziresh.svg')}}" alt="" class="w-10">
                <span>رسید پذیرش</span>
            </button>
        </div>
    </div>
    </div>

    <!-- ---------- مودال ارجاع فیزیوتراپی  ------------------  -->
    <div id="modal_physio" class="bg-black/50 hidden  backdrop-blur-sm fixed pb-10 top-0 w-full h-screen flex items-center px-5 z-10">
        <div class="bg-white w-full sm:max-w-4xl max-h-[70vh] sm:max-h-full mx-auto p-5 rounded-3xl flex flex-col gap-3 overflow-y-auto">
            <span class="flex flex-row justify-between items-center border-b pb-2">
                 <span>ارجاع فیزیوتراپی</span>
                 <span onclick="closeModal('modal_physio')" class="bg-gray-100 p-1 sm:p-2 rounded-md cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                      </svg>
                 </span>
            </span>

            <form id="modal_physio_Form" method="POST" type="">
                @csrf
                <input id="modal_physio_patient_id" name="modal_physio_patient_id">
                <span class="flex flex-col ">
                    <span class="flex flex-col sm:flex-row gap-2 w-full py-2">
                        <span class="w-full">
                            <span class="pr-5 text-xs">کدملی</span>
                            <input type="number" name="modal_physio_nationalCode" id="modal_physio_nationalCode" class="bg-slate-50 text-sm font-extralight text-center placeholder:text-right rounded-full border-slate-300 w-full placeholder:font-thin placeholder:text-sm px-5 py-3 focus:border-colorhoorshid3 focus:outline-none focus:ring-colorprimary" placeholder="کدملی">
                        </span>
                        <span class="w-full">
                            <span class="pr-5 text-xs">نام بیمار</span>
                            <input type="text" name="modal_physio_name" id="modal_physio_name" class="bg-slate-50 text-sm font-extralight text-center placeholder:text-right rounded-full border-slate-300 w-full placeholder:font-thin placeholder:text-sm px-5 py-3 focus:border-colorhoorshid3 focus:outline-none focus:ring-colorprimary" placeholder="نام بیمار">
                        </span>
                        <span class="w-full">
                            <span class="pr-5 text-xs">شماره تماس</span>
                            <input type="number" name="modal_physio_phone" id="modal_physio_phone" class="bg-slate-50 text-sm font-extralight text-center placeholder:text-right rounded-full border-slate-300 w-full placeholder:font-thin placeholder:text-sm px-5 py-3 focus:border-colorhoorshid3 focus:outline-none focus:ring-colorprimary" placeholder="شماره تماس">
                        </span>
                    </span>

                </span>
                <span class="flex flex-col ">
                    <span class="flex flex-col sm:flex-row gap-2 w-full py-2">
                        <span class="w-full">
                            <span class="pr-5 text-xs">انتخاب ناحیه</span>
                            <select class="border rounded" name="modal_physio_areas[]" id="modal_physio_areas" multiple multiselect-search="true" multiselect-select-all="true" multiselect-max-items="2" >
                                @foreach($areas as $area)
                                    <option value="{{ $area->id }}">{{ $area->title }}</option>  //works well
                                @endforeach
                            </select>
                        </span>
                        <span class="w-full">
                            <span class="pr-5 text-xs">تعداد جلسات</span>
                            <input type="text" id="modal_physio_num_sessions" name="modal_physio_num_sessions" class="bg-slate-50 text-sm font-extralight text-center placeholder:text-right rounded-full border-slate-300 w-full placeholder:font-thin placeholder:text-sm px-5 py-3 focus:border-colorhoorshid3 focus:outline-none focus:ring-colorprimary" placeholder="تعداد جلسات">
                        </span>
                        <span class="w-full">
                            <span class="pr-5 text-xs">تاریخ</span>
                            <input data-jdp type="text" id="modal_physio_date" name="modal_physio_date" class="bg-slate-50 text-sm font-extralight text-center placeholder:text-right rounded-full border-slate-300 w-full placeholder:font-thin placeholder:text-sm px-5 py-3 focus:border-colorhoorshid3 focus:outline-none focus:ring-colorprimary" placeholder="تاریخ">
                            <script type="text/javascript">jalaliDatepicker.startWatch();</script>
                        </span>
                    </span>

                </span>
                <span class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3  gap-y-5 gap-x-10">
                @foreach($types as $type)
                        <span class="flex justify-between items-center">
                        <input type="checkbox" id="type_{{$type->id}}" name="modal_physio_types[]" value="{{$type->id}}" class="rounded-md bg-colorsecondry1 w-5 h-5 border-0 text-colorsecondry2 cursor-pointer">
                        <label for="Shock Wave" class="cursor-pointer">{{ $type->title }}</label>
                    </span>
                    @endforeach
            </span>
                <span class="">
                <span class="w-full">
                    <span class="pr-5 text-xs">توضیحات</span>
                        <textarea name="modal_physio_description" id="modal_physio_description" cols="30" rows="3" class="bg-slate-50 text-sm font-extralight text-right placeholder:text-right rounded-xl border-slate-300 w-full placeholder:font-thin placeholder:text-sm px-5 py-3 focus:border-colorhoorshid3 focus:outline-none focus:ring-colorprimary" placeholder="توضیحات لازم را در این قسمت وارد کنید"></textarea>
                </span>
            </span>
            </form>

            <div class="flex flex-col sm:flex-row justify-end gap-2 mt-3 w-full">
                <button onclick="checkCode('modal_physio')" class="min-w-[100px] text-center bg-colorthird2 text-white focus:outline-cyan-600 sm:hover:-translate-y-1 transition-transform duration-200 py-3 px-5 rounded-full cursor-pointer text-xs sm:text-sm">بررسی کدملی</button>
                <button onclick="add_physio_certificate('printPhysioA5')" class="min-w-[100px] text-center bg-colorprimary text-white focus:outline-blue-600 sm:hover:-translate-y-1 transition-transform duration-200 py-3 px-5 rounded-full cursor-pointer text-xs sm:text-sm">تایید و چاپ</button>
                <button onclick="closeModal('modal_physio')" class="min-w-[100px] bg-colorthird1 text-white focus:outline-gray-700 sm:hover:-translate-y-1 transition-transform duration-200 py-3 px-5 rounded-full cursor-pointer text-xs sm:text-sm text-center">بازگشت</button>

            </div>
        </div>
    </div>

    <!-- ---------- مودال نسخه بیمار   ------------------  -->
    <div id="modal_prescription" class="bg-black/50 hidden backdrop-blur-sm fixed pb-10 top-0 w-full h-screen flex items-center px-5 z-10">
        <div class="bg-white w-full sm:max-w-4xl max-h-[70vh] sm:max-h-full mx-auto p-5 rounded-3xl flex flex-col gap-3 overflow-y-auto">
            <span class="flex flex-row justify-between items-center border-b pb-2">
                <span>نسخه بیمار</span>
                <span onclick="closeModal('modal_prescription')" class="bg-gray-100 p-1 sm:p-2 rounded-md cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </span>
            </span>
            <form id="modal_prescription_Form" method="POST">
                @csrf
                <span class="flex flex-col ">
                <span class="flex flex-col sm:flex-row gap-2 w-full py-2">
                    <span class="w-full">
                        <span class="pr-5 text-xs">کدملی</span>
                        <input type="number" id="modal_prescription_nationalCode" name="modal_prescription_nationalCode" class="bg-slate-50 text-sm font-extralight text-center placeholder:text-right rounded-full border-slate-300 w-full placeholder:font-thin placeholder:text-sm px-5 py-3 focus:border-colorhoorshid3 focus:outline-none focus:ring-colorprimary" placeholder="کدملی">
                    </span>
                    <span class="w-full">
                        <span class="pr-5 text-xs">نام بیمار</span>
                        <input type="hidden" name="modal_prescription_patient_id" id="modal_prescription_patient_id">
                        <input type="text" id="modal_prescription_name" name="modal_prescription_name" class="bg-slate-50 text-sm font-extralight text-center placeholder:text-right rounded-full border-slate-300 w-full placeholder:font-thin placeholder:text-sm px-5 py-3 focus:border-colorhoorshid3 focus:outline-none focus:ring-colorprimary" placeholder="نام بیمار">
                    </span>
                    <span class="w-full">
                        <span class="pr-5 text-xs">شماره تماس</span>
                        <input type="number" id="modal_prescription_phone" name="modal_prescription_phone" class="bg-slate-50 text-sm font-extralight text-center placeholder:text-right rounded-full border-slate-300 w-full placeholder:font-thin placeholder:text-sm px-5 py-3 focus:border-colorhoorshid3 focus:outline-none focus:ring-colorprimary" placeholder="شماره تماس">
                    </span>
                </span>
            </span>
                <span class="flex flex-col ">
                <span class="flex flex-col sm:flex-row gap-2 w-full py-2">

                    <span class="w-full">
                        <span class="pr-5 text-xs">تاریخ</span>
                        <input data-jdp type="text" id="modal_prescription_date" name="modal_prescription_date" class="bg-slate-50 text-sm font-extralight text-center placeholder:text-right rounded-full border-slate-300 w-full placeholder:font-thin placeholder:text-sm px-5 py-3 focus:border-colorhoorshid3 focus:outline-none focus:ring-colorprimary" placeholder="تاریخ">
                    </span>
                </span>
            </span>
                <span class="pr-5 text-xs">انتخاب داروها</span>
                <select class="border rounded" name="modal_prescription_medicines[]" id="modal_prescription_medicines" multiple multiselect-search="true" multiselect-select-all="true" multiselect-max-items="2" >
                    @foreach($medicines as $med)
                        <option value="{{ $med->id }}">{{ $med->title }}</option>  //works well
                    @endforeach
                </select>
                <span class="">
                <span class="w-full">
                    <span class="pr-5 text-xs">توضیحات</span>
                    <textarea name="modal_prescription_description" id="modal_prescription_description" cols="30" rows="8" class="bg-slate-50 text-sm font-extralight text-right placeholder:text-right rounded-xl border-slate-300 w-full placeholder:font-thin placeholder:text-sm px-5 py-3 focus:border-colorhoorshid3 focus:outline-none focus:ring-colorprimary" placeholder="توضیحات لازم را در این قسمت وارد کنید"></textarea>
                </span>
            </span>

            </form>

            <div class="flex flex-col sm:flex-row justify-end gap-2 mt-3 w-full">
                <button onclick="checkCode('modal_prescription')" class="min-w-[100px] text-center bg-colorthird2 text-white focus:outline-cyan-600 sm:hover:-translate-y-1 transition-transform duration-200 py-3 px-5 rounded-full cursor-pointer text-xs sm:text-sm">بررسی کدملی</button>
                <button onclick="add_prescription_certificate('printPrescriptionA5')" class="min-w-[100px] text-center bg-colorprimary text-white focus:outline-blue-600 sm:hover:-translate-y-1 transition-transform duration-200 py-3 px-5 rounded-full cursor-pointer text-xs sm:text-sm">تایید و چاپ</button>
                <button onclick="closeModal('modal_prescription')" class="min-w-[100px] bg-colorthird1 text-white focus:outline-gray-700 sm:hover:-translate-y-1 transition-transform duration-200 py-3 px-5 rounded-full cursor-pointer text-xs sm:text-sm text-center">بازگشت</button>
            </div>
        </div>
    </div>

    <!-- ---------- مودال پرداخت وجه    ------------------  -->
    <div id="modal_payment" class="bg-black/50 hidden backdrop-blur-sm fixed pb-10 top-0 w-full h-screen flex items-center px-5 z-10">
        <div class="bg-white w-full sm:max-w-4xl max-h-[70vh] sm:max-h-full mx-auto p-5 rounded-3xl flex flex-col gap-3 overflow-y-auto">
            <span class="flex flex-row justify-between items-center border-b pb-2">
                <span>رسید پرداخت وجه</span>
                <span onclick="closeModal('modal_payment')" class="bg-gray-100 p-1 sm:p-2 rounded-md cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </span>
            </span>
            <form id="modal_payment_Form" method="POST">
                @csrf
                <input type="hidden" id="modal_payment_patient_id" name="modal_payment _patient_id">

                <span class="flex flex-col ">
                <span class="flex flex-col sm:flex-row gap-2 w-full py-2">
                    <span class="w-full">
                        <span class="pr-5 text-xs">کد ملی بیمار</span>
                        <input id="modal_payment_nationalCode" type="text" name="modal_payment_nationalCode" class="bg-slate-50 text-sm font-extralight text-center placeholder:text-right rounded-full border-slate-300 w-full placeholder:font-thin placeholder:text-sm px-5 py-3 focus:border-colorhoorshid3 focus:outline-none focus:ring-colorprimary" placeholder="کدملی بیمار">
                    </span>
                    <span class="w-full">
                        <span class="pr-5 text-xs">نام بیمار</span>
                        <input id="modal_payment_name" type="text" name="modal_payment_name" class="bg-slate-50 text-sm font-extralight text-center placeholder:text-right rounded-full border-slate-300 w-full placeholder:font-thin placeholder:text-sm px-5 py-3 focus:border-colorhoorshid3 focus:outline-none focus:ring-colorprimary" placeholder="نام بیمار">
                    </span>
                    <span class="w-full">
                        <span class="pr-5 text-xs">شماره تماس</span>
                        <input type="number" id="modal_payment_phone" name="modal_payment_phone" class="bg-slate-50 text-sm font-extralight text-center placeholder:text-right rounded-full border-slate-300 w-full placeholder:font-thin placeholder:text-sm px-5 py-3 focus:border-colorhoorshid3 focus:outline-none focus:ring-colorprimary" placeholder="شماره تماس">
                    </span>
                    <span class="w-full">
                        <span class="pr-5 text-xs">شماره</span>
                        <input type="number" id="modal_payment_number" name="modal_payment_number" class="bg-slate-50 text-sm font-extralight text-center placeholder:text-right rounded-full border-slate-300 w-full placeholder:font-thin placeholder:text-sm px-5 py-3 focus:border-colorhoorshid3 focus:outline-none focus:ring-colorprimary" placeholder="شماره">
                    </span>
                </span>
                <span class="flex flex-col sm:flex-row gap-2 w-full py-2">
                    <span class="w-full">
                        <span class="pr-5 text-xs">مبلغ</span>
                        <input type="number" id="modal_payment_amount" name="modal_payment_amount" class="bg-slate-50 text-sm font-extralight text-center placeholder:text-right rounded-full border-slate-300 w-full placeholder:font-thin placeholder:text-sm px-5 py-3 focus:border-colorhoorshid3 focus:outline-none focus:ring-colorprimary" placeholder="مبلغ">
                    </span>
                    <span class="w-full">
                        <span class="pr-5 text-xs">تاریخ</span>
                        <input data-jdp type="text" id="modal_payment_date" name="modal_payment_date" class="bg-slate-50 text-sm font-extralight text-center placeholder:text-right rounded-full border-slate-300 w-full placeholder:font-thin placeholder:text-sm px-5 py-3 focus:border-colorhoorshid3 focus:outline-none focus:ring-colorprimary" placeholder="تاریخ">
                        <script type="text/javascript">jalaliDatepicker.startWatch();</script>
                    </span>
                </span>
            </span>
                <span class="">
                <span class="w-full">
                    <span class="pr-5 text-xs">بابت</span>
                    <textarea id="modal_payment_description" name="modal_payment_description" cols="30" rows="4" class="bg-slate-50 text-sm font-extralight text-right placeholder:text-right rounded-xl border-slate-300 w-full placeholder:font-thin placeholder:text-sm px-5 py-3 focus:border-colorhoorshid3 focus:outline-none focus:ring-colorprimary" placeholder="شرح پرداخت را در این قسمت وارد کنید"></textarea>
                </span>
            </span>
            </form>

            <div class="flex flex-col sm:flex-row justify-end gap-2 mt-3 w-full">
                <button onclick="checkCode('modal_payment')" class="min-w-[100px] text-center bg-colorthird2 text-white focus:outline-cyan-600 sm:hover:-translate-y-1 transition-transform duration-200 py-3 px-5 rounded-full cursor-pointer text-xs sm:text-sm">بررسی کدملی</button>
                <button onclick="add_payment('printPaymentA5')" class="min-w-[100px] text-center bg-colorprimary text-white focus:outline-blue-600 sm:hover:-translate-y-1 transition-transform duration-200 py-3 px-5 rounded-full cursor-pointer text-xs sm:text-sm">تایید و چاپ</button>
                <button onclick="closeModal('modal_payment')" class="min-w-[100px] bg-colorthird1 text-white focus:outline-gray-700 sm:hover:-translate-y-1 transition-transform duration-200 py-3 px-5 rounded-full cursor-pointer text-xs sm:text-sm text-center">بازگشت</button>
            </div>
        </div>
    </div>

    <!-- ---------- مودال رسید پذیرش   ------------------  -->
    <div id="modal_reception" class="bg-black/50 hidden backdrop-blur-sm fixed pb-10 top-0 w-full h-screen flex items-center px-5 z-10">
        <div class="bg-white w-full sm:max-w-4xl max-h-[70vh] sm:max-h-full mx-auto p-5 rounded-3xl flex flex-col gap-3 overflow-y-auto">
                            <span class="flex flex-row justify-between items-center border-b pb-2">
                                 <span>رسید پذیرش</span>
                                 <span onclick="closeModal('modal_reception')" class="bg-gray-100 p-1 sm:p-2 rounded-md cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                      </svg>
                                 </span>
                            </span>

            <span class="flex flex-col ">
                                    <span class="flex flex-col sm:flex-row gap-2 w-full py-2">
                                        <span class="w-full">
                                            <span class="pr-5 text-xs">نام بیمار</span>
                                            <input type="text" id="modal_reception_name" name="modal_reception_name" class="bg-slate-50 text-sm font-extralight text-center placeholder:text-right rounded-full border-slate-300 w-full placeholder:font-thin placeholder:text-sm px-5 py-3 focus:border-colorhoorshid3 focus:outline-none focus:ring-colorprimary" placeholder="نام بیمار">
                                        </span>
                                        <span class="w-full">
                                            <span class="pr-5 text-xs">شماره تماس</span>
                                            <input type="number" id="modal_reception_phone" name="modal_reception_phone" class="bg-slate-50 text-sm font-extralight text-center placeholder:text-right rounded-full border-slate-300 w-full placeholder:font-thin placeholder:text-sm px-5 py-3 focus:border-colorhoorshid3 focus:outline-none focus:ring-colorprimary" placeholder="شماره تماس">
                                        </span>
                                    </span>
                                    <span class="flex flex-col sm:flex-row gap-2 w-full py-2">
                                        <span class="w-full">
                                            <span class="pr-5 text-xs">شماره ویزیت</span>
                                            <input type="number" id="modal_reception_number" name="modal_reception_number" class="bg-slate-50 text-sm font-extralight text-center placeholder:text-right rounded-full border-slate-300 w-full placeholder:font-thin placeholder:text-sm px-5 py-3 focus:border-colorhoorshid3 focus:outline-none focus:ring-colorprimary" placeholder="شماره ویزیت">
                                        </span>
                                        <span class="w-full">
                                            <span class="pr-5 text-xs">تاریخ</span>
                                            <input type="date" id="modal_reception_date" name="modal_reception_date" class="bg-slate-50 text-sm font-extralight text-center placeholder:text-right rounded-full border-slate-300 w-full placeholder:font-thin placeholder:text-sm px-5 py-3 focus:border-colorhoorshid3 focus:outline-none focus:ring-colorprimary" placeholder="تعداد جلسات">
                                        </span>
                                    </span>

                                </span>
            <span class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3  gap-y-5 gap-x-10">
                                    <span class="flex justify-between items-center">
                                        <label for="mosalah" class="cursor-pointer">نیروهای مسلح</label>
                                        <input type="checkbox" id="mosalah" class="rounded-md bg-colorsecondry1 w-5 h-5 border-0 text-colorsecondry2 cursor-pointer">
                                    </span>
                                    <span class="flex justify-between items-center">
                                        <label for="salamat" class="cursor-pointer">بیمه سلامت</label>
                                        <input type="checkbox" id="salamat" class="rounded-md bg-colorsecondry1 w-5 h-5 border-0 text-colorsecondry2 cursor-pointer">
                                    </span>
                                    <span class="flex justify-between items-center">
                                        <label for="ghanoni" class="cursor-pointer">نامه پزشکی قانونی</label>
                                        <input type="checkbox" id="ghanoni" class="rounded-md bg-colorsecondry1 w-5 h-5 border-0 text-colorsecondry2 cursor-pointer">
                                    </span>
                                    <span class="flex justify-between items-center">
                                        <label for="sayer" class="cursor-pointer">سایر بیمه ها</label>
                                        <input type="checkbox" id="sayer" class="rounded-md bg-colorsecondry1 w-5 h-5 border-0 text-colorsecondry2 cursor-pointer">
                                    </span>
                                    <span class="flex justify-between items-center">
                                        <label for="taamin" class="cursor-pointer">بیمه تامین اجتماعی</label>
                                        <input type="checkbox" id="taamin" class="rounded-md bg-colorsecondry1 w-5 h-5 border-0 text-colorsecondry2 cursor-pointer">
                                    </span>
                                    <span class="flex justify-between items-center">
                                        <label for="azad" class="cursor-pointer">آزاد</label>
                                        <input type="checkbox" id="azad" class="rounded-md bg-colorsecondry1 w-5 h-5 border-0 text-colorsecondry2 cursor-pointer">
                                    </span>
                                </span>
            <div class="flex flex-col sm:flex-row justify-end gap-2 mt-3 w-full">
                <button class="min-w-[100px] text-center bg-colorthird2 text-white focus:outline-cyan-600 sm:hover:-translate-y-1 transition-transform duration-200 py-3 px-5 rounded-full cursor-pointer text-xs sm:text-sm">دانلود فرم</button>
                <button class="min-w-[100px] text-center bg-colorprimary text-white focus:outline-blue-600 sm:hover:-translate-y-1 transition-transform duration-200 py-3 px-5 rounded-full cursor-pointer text-xs sm:text-sm">تایید و چاپ</button>
                <button onclick="closeModal('modal_reception')" class="min-w-[100px] bg-colorthird1 text-white focus:outline-gray-700 sm:hover:-translate-y-1 transition-transform duration-200 py-3 px-5 rounded-full cursor-pointer text-xs sm:text-sm text-center">بازگشت</button>

            </div>
        </div>
    </div>

    <!-- ---------- مودال گواهی استراحت   ------------------  -->
    <div id="modal_sick" class="bg-black/50 hidden backdrop-blur-sm fixed pb-10 top-0 w-full h-screen flex items-center px-5 z-10">
        <div class="bg-white w-full sm:max-w-4xl max-h-[70vh] sm:max-h-full mx-auto p-5 rounded-3xl flex flex-col gap-3 overflow-y-auto">
            <span class="flex flex-row justify-between items-center border-b pb-2">
                 <span>گواهی استراحت</span>
                    <span onclick="closeModal('modal_sick')" class="bg-gray-100 p-1 sm:p-2 rounded-md cursor-pointer">
                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                       <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                   </svg>
                 </span>
            </span>
            <form id="modal_sick_Form" type="POST">
                @csrf
            <span class="flex flex-col ">
                <span class="flex flex-col sm:flex-row gap-2 w-full py-2">
                    <span class="w-full">
                        <span class="pr-5 text-xs">کد ملی</span>
                        <input type="text" id="modal_sick_nationalCode" name="modal_sick_nationalCode" class="bg-slate-50 text-sm font-extralight text-center placeholder:text-right rounded-full border-slate-300 w-full placeholder:font-thin placeholder:text-sm px-5 py-3 focus:border-colorhoorshid3 focus:outline-none focus:ring-colorprimary" placeholder="کد ملی">
                    </span>
                    <input type="hidden" id="modal_sick_patient_id" name="modal_sick_patient_id">
                    <span class="w-full">
                        <span class="pr-5 text-xs">نام بیمار</span>
                        <input type="text" id="modal_sick_name" name="modal_sick_name" class="bg-slate-50 text-sm font-extralight text-center placeholder:text-right rounded-full border-slate-300 w-full placeholder:font-thin placeholder:text-sm px-5 py-3 focus:border-colorhoorshid3 focus:outline-none focus:ring-colorprimary" placeholder="نام بیمار">
                    </span>
                    <span class="w-full">
                        <span class="pr-5 text-xs">شماره تماس</span>
                        <input type="number" id="modal_sick_phone" name="modal_sick_phone" class="bg-slate-50 text-sm font-extralight text-center placeholder:text-right rounded-full border-slate-300 w-full placeholder:font-thin placeholder:text-sm px-5 py-3 focus:border-colorhoorshid3 focus:outline-none focus:ring-colorprimary" placeholder="شماره تماس">
                    </span>

                </span>
                <span class="flex flex-col sm:flex-row gap-2 w-full py-2">
                    <span class="w-full">
                        <span class="pr-5 text-xs">دلیل</span>
                        <input type="text" id="modal_sick_description" name="modal_sick_description" class="bg-slate-50 text-sm font-extralight text-center placeholder:text-right rounded-full border-slate-300 w-full placeholder:font-thin placeholder:text-sm px-5 py-3 focus:border-colorhoorshid3 focus:outline-none focus:ring-colorprimary" placeholder="دلیل استراحت را بنویسید">
                    </span>
                    <span class="w-full">
                        <span class="pr-5 text-xs">تاریخ</span>
                        <input data-jdp type="text" id="modal_sick_date" name="modal_sick_date" class="bg-slate-50 text-sm font-extralight text-center placeholder:text-right rounded-full border-slate-300 w-full placeholder:font-thin placeholder:text-sm px-5 py-3 focus:border-colorhoorshid3 focus:outline-none focus:ring-colorprimary" placeholder="تاریخ">
                        <script type="text/javascript">jalaliDatepicker.startWatch();</script>
                    </span>
                </span>
                <span class="flex flex-col sm:flex-row gap-2 w-full py-2">
                    <span class="w-full">
                        <span class="pr-5 text-xs">از تاریخ</span>
                        <input data-jdp type="text" id="modal_sick_sdate" name="modal_sick_sdate" class="bg-slate-50 text-sm font-extralight text-center placeholder:text-right rounded-full border-slate-300 w-full placeholder:font-thin placeholder:text-sm px-5 py-3 focus:border-colorhoorshid3 focus:outline-none focus:ring-colorprimary" placeholder="تاریخ شروع">
                        <script type="text/javascript">jalaliDatepicker.startWatch();</script>

                    </span>
                    <span class="w-full">
                        <span class="pr-5 text-xs">تا تاریخ</span>
                        <input data-jdp type="text" id="modal_sick_edate" name="modal_sick_edate" class="bg-slate-50 text-sm font-extralight text-center placeholder:text-right rounded-full border-slate-300 w-full placeholder:font-thin placeholder:text-sm px-5 py-3 focus:border-colorhoorshid3 focus:outline-none focus:ring-colorprimary" placeholder="تاریخ پایان">
                        <script type="text/javascript">jalaliDatepicker.startWatch();</script>

                    </span>
                </span>

            </span>
            </form>
            <div class="flex flex-col sm:flex-row justify-end gap-2 mt-3 w-full">
                <button onclick="checkCode('modal_sick')" class="min-w-[100px] text-center bg-colorthird2 text-white focus:outline-cyan-600 sm:hover:-translate-y-1 transition-transform duration-200 py-3 px-5 rounded-full cursor-pointer text-xs sm:text-sm">بررسی کدملی</button>
                <button onclick="add_sick_certificate('printSickA5')" class="min-w-[100px] text-center bg-colorprimary text-white focus:outline-blue-600 sm:hover:-translate-y-1 transition-transform duration-200 py-3 px-5 rounded-full cursor-pointer text-xs sm:text-sm">تایید و چاپ</button>
                <button onclick="closeModal('modal_sick')" class="min-w-[100px] bg-colorthird1 text-white focus:outline-gray-700 sm:hover:-translate-y-1 transition-transform duration-200 py-3 px-5 rounded-full cursor-pointer text-xs sm:text-sm text-center">بازگشت</button>
            </div>
        </div>
    </div>
        @include('alert.alert-error')
        @include('alert.alert-warning')
        @include('alert.alert-success')
@endsection
@section('script')
    <script type="text/javascript" src="{{url('persian_datepicker/js/jalalidatepicker.min.js')}}"></script>
    <script src="{{url('/js/main.js')}}"></script>
    <script src="{{url('/js/forms.js')}}"></script>
@endsection

