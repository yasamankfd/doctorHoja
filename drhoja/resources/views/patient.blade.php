@extends('layouts.admin')
@section('page_title')
    بیماران
@endsection
@section('content')
<div class="col-span-12 md:col-span-7 lg:col-span-8 xl:col-span-9 flex flex-col gap-2 overflow-auto mt-5">
                    <span class="flex items-center justify-between">
                        <span class="flex gap-2">
                            <img src="{{url('/img/icon-patients.svg')}}" alt="" class="w-10">
                            <span class="font-extrabold">بیماران</span>
                        </span>
                    </span>
    <!-- ---------------------- filter ---------------------  -->
    <div class="flex flex-col xl:flex-row gap-2 mt-5">
        <div class="flex flex-row gap-2 flex-1 w-full xl:w-2/3">
            <input type="text" class=" rounded-lg border-none placeholder:text-center text-center w-full placeholder:text-xs placeholder:lg:text-base" placeholder="نام و نام خانوادگی">
            <input type="text" class=" rounded-lg border-none placeholder:text-center text-center w-full placeholder:text-xs placeholder:lg:text-base" placeholder="کدملی">
        </div>
        <div class="flex flex-row gap-2 w-full xl:w-1/3">
            <button class="bg-colorprimary text-white rounded-lg focus:ring-colorthird1 focus:outline-colorthird1 w-full py-3 px-3">استعلام</button>
        </div>

    </div>
    <!-- --------------------------table -------------------  -->
    <div class="mt-2">
        <div class="gap-2 rounded-xl">
            <!-- ---------------------- جدول ویزیت ---------------------  -->
            <table id="forms_datatable" x-data="{ detailrow:false }" class="space-y-3 block">
                <thead class="w-full flex">
                <tr class="flex justify-between items-center w-full bg-white font-extrabold px-1 md:px-5 py-3 rounded-lg hover:shadow-gray-200/50 hover:shadow-lg text-xs lg:text-sm">
                    <td class="border-l w-[20%] sm:w-[10%] text-center">ردیف</td>
                    <td class="w-[60%] md:w-[25%] lg:w-[20%] text-center border-0 sm:border-l">عنوان خدمت</td>
                    <td class="w-[25%] lg:w-[20%] text-center border-l hidden md:block">نام بیمار</td>
                    <td class="w-[25%] lg:w-[20%] text-center border-l hidden md:block">کدملی</td>
                    <td class="w-[25%] lg:w-[20%] text-center hidden sm:block">تاریخ مراجعه</td>
                    <td class="flex w-[20%] lg:w-[15%]  justify-center items-center gap-2 border-r pr-1">
                        <span class="w-full text-center">عملیات</span>
                    </td>
                </tr>
                </thead>
                <tbody x-data="{ detailrow:false }" class="space-y-1 w-full flex flex-col h-[50vh] overflow-y-scroll pb-40 md:pb-10">

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script src="{{url('/js/jquery.dataTables.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            // $('.select2').select2();
            let laravel_datatable;
            filterList();
        });

        function filterList() {
            laravel_datatable = $('#forms_datatable').DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                responsive: true,
                paging: true,
                autoWidth: false,
                "order": [[1, "desc"]],
                ajax:({
                    url : '/listPatient',
                    type : 'GET',
                }),
                columns: [
                    {
                        "data": null, "sortable": false, searchable: false, orderable: false,
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {data: 'title', name: 'title', orderable: true, searchable: true},
                    {data: 'name', name: 'name', orderable: true, searchable: false},
                    {data: 'nationalCode', name: 'nationalCode', orderable: true, searchable: false},
                    {data: 'date', name: 'date', orderable: true, searchable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                "columnDefs": [

                    { className: "border-l w-[20%] sm:w-[10%] text-center", "targets": [ 0 ] },
                    { className: "w-[60%] md:w-[25%] lg:w-[20%] text-center border-0 sm:border-l", "targets": [ 1 ] },
                    { className: "oneLine text-lengh w-[25%] lg:w-[20%] text-center hidden sm:flex flex-col", "targets": [ 2 ] },
                    { className: "oneLine text-lengh w-[25%] lg:w-[20%] text-center hidden sm:flex flex-col", "targets": [ 3 ] },
                    { className: "oneLine w-[20%] sm:w-[30%] lg:w-[15%] flex gap-1 justify-center border-r", "targets": [ 4 ] },

                ],
                language: {
                    "sEmptyTable": "هیچ داده ای در جدول وجود ندارد",
                    "sInfo": "نمایش _START_ تا _END_ از _TOTAL_ رکورد",
                    "sInfoEmpty": "نمایش 0 تا 0 از 0 رکورد",
                    "sInfoFiltered": "(فیلتر شده از _MAX_ رکورد)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ",",
                    "sLengthMenu": "نمایش _MENU_ رکورد",
                    "sLoadingRecords": "در حال بارگزاری...",
                    "sProcessing": "در حال پردازش...",
                    "sSearch": "جستجو:",
                    "sZeroRecords": "رکوردی با این مشخصات پیدا نشد",
                    "oPaginate": {
                        "sFirst": "ابتدا",
                        "sLast": "انتها",
                        "sNext": "بعدی",
                        "sPrevious": "قبلی"
                    },
                    "oAria": {
                        "sSortAscending": ": فعال سازی نمایش به صورت صعودی",
                        "sSortDescending": ": فعال سازی نمایش به صورت نزولی"
                    }
                }
            });

        }


        function add() {
            var form = document.getElementById('add-med');
            var formData = new FormData(form);

            $.ajax({
                url: '/medicine',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    closeModal('add_medicine');
                    resetForm('add_medicine')
                    laravel_datatable.ajax.reload(null, false);

                },
                error: function (res) {
                    alert('show alert')
                    //console.log(res);
                }
            });
        }

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

