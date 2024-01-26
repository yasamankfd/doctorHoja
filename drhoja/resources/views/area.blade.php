@extends('layouts.admin')
@section('page_title')
    نواحی درمان
@endsection
@section('content')

    <div class="col-span-12 md:col-span-7 lg:col-span-8 xl:col-span-9 flex flex-col gap-2 overflow-auto mt-5">
                    <span class="flex items-center justify-between">
                        <span class="flex gap-2">
                            <img src="{{url('/img/icon-patients.svg')}}" alt="" class="w-8 sm:w-10">
                            <span class="font-extrabold">داروها</span>
                        </span>
                    </span>
        <div class="flex flex-col sm:flex-row justify-start gap-2 mt-3 w-full">
            <a onclick="showModal('add_area')" class="min-w-[100px] text-center bg-colorprimary text-white sm:hover:-translate-y-1 transition-transform duration-200 py-3 px-5 rounded-full cursor-pointer text-xs sm:text-sm">افزودن ناحیه</a>
        </div>
        <!-- --------------------------table -------------------  -->
        <div class="mt-2">

            <div class="gap-2 rounded-xl">
                <!-- ---------------------- x-data="{ detailrow:false }"  جدول ویزیت ---------------------  -->
                <table id="area_datatable"  class="space-y-3 block">
                    <thead class="w-full flex">
                    <tr class="flex justify-between items-center w-full bg-white font-extrabold px-1 md:px-5 py-3 rounded-lg hover:shadow-gray-200/50 hover:shadow-lg text-xs lg:text-sm">
                        <td class="border-l w-[20%] sm:w-[10%] text-center">ردیف</td>
                        <td class="w-[60%] md:w-[25%] lg:w-[40%] text-center border-0 sm:border-l">عنوان ناحیه</td>
                        <td class="w-[25%] lg:w-[35%] text-center hidden sm:block">وضعیت</td>
                        <td class="flex w-[20%] lg:w-[15%] justify-center items-center gap-2 border-r pr-1">
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

    <!-- ---------- مودال تعریف عنوان  ------------------  -->
    <div id="add_area" x-transition.duration.500ms class="bg-black/50 hidden backdrop-blur-sm fixed pb-10 top-0 w-full h-screen flex items-center px-5 z-50">
        <div class="bg-white w-full sm:max-w-2xl max-h-[90vh] sm:max-h-full mx-auto p-5 rounded-lg flex flex-col gap-3 overflow-y-auto">
                <span class="flex flex-row justify-between items-center border-b pb-2">
                     <span>تعریف ناحیه درمانی</span>
                     <span onclick="closeModal('add_area')" class="bg-gray-100 p-1 sm:p-2 rounded-md cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                          </svg>
                     </span>
                </span>

            <!-- ردیف دوم  -->
            <span class="flex flex-col sm:flex-row gap-2">
                    <span class="w-full">
                        <span class="pr-5 text-xs">عنوان</span>
                        <form id="add_area_form" method="POST">
                            @csrf
                            <input type="hidden" id="row_id" name="row_id">
                            <input type="text" id="add_area_name" name="add_area_name" class="text-sm font-extralight text-center placeholder:text-right rounded-full border-gray-200 w-full placeholder:font-thin placeholder:text-sm px-5 py-3 focus:border-colorprimary focus:outline-none focus:ring-colorfourth1" placeholder="عنوان را وارد کنید">
                            <div class="form-group mb-3">
                                <label for="cars">وضعیت ناحیه:</label>
                                <select name="add_area_status" id="add_area_status">
                                    <option value="1">فعال</option>
                                    <option value="2">غیر فعال</option>
                                </select>
                            </div>
                        </form>

                    </span>
                </span>
            <div class="flex flex-col sm:flex-row justify-end gap-2 mt-3 w-full">
                <a onclick="add()" class="min-w-[100px] text-center bg-colorprimary text-white sm:hover:-translate-y-1 transition-transform duration-200 py-3 px-5 rounded-full cursor-pointer text-xs sm:text-sm">ثبت</a>
                <a onclick="closeModal('add_area')" class="min-w-[100px] bg-gray-600 text-white sm:hover:-translate-y-1 transition-transform duration-200 py-3 px-5 rounded-full cursor-pointer text-xs sm:text-sm text-center">بازگشت</a>
            </div>
        </div>
    </div>
@include('includes.modal-delete')
@endsection
@section('script')
    <script src="{{url('/js/jquery.dataTables.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            // $('.select2').select2();
            filterList();
        });

        let laravel_datatable;
        function filterList() {
            laravel_datatable = $('#area_datatable').DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                responsive: true,
                paging: true,
                autoWidth: false,
                "order": [[1, "desc"]],
                ajax:({
                    url : '/listArea',
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
                    {data: 'status', name: 'status', orderable: true, searchable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                "columnDefs": [

                    { className: "border-l w-[20%] sm:w-[10%] text-center", "targets": [ 0 ] },
                    { className: "w-[60%] md:w-[25%] lg:w-[40%] text-center border-0 sm:border-l", "targets": [ 1 ] },
                    { className: "oneLine text-lengh w-[25%] lg:w-[35%] text-center hidden sm:block py-2", "targets": [ 2 ] },
                    { className: "oneLine w-[20%] sm:w-[30%] lg:w-[30%] flex gap-1 justify-center border-r", "targets": [ 3 ] },
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


        function editRow(id) {
            let _url            = 'area/' + id;
            let status_elmnt    = document.getElementById("add_area_status");

            $.ajax({
                url: _url,
                type: "GET",
                success: function(response) {
                    console.log(response)
                    if(response) {
                        console.log('response');
                        $('#add_area_name').val(response.title);
                        selectItemByValue(status_elmnt, response.status);

                        $("#row_id").val(response.id);
                        showModal('add_area');
                    }
                }
            });
        }


        function add() {
            var form = document.getElementById('add_area_form');
            var formData = new FormData(form);

            $.ajax({
                url: '/area',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    closeModal('add_area');
                    resetForm('add_area_')
                    laravel_datatable.ajax.reload(null, false);

                },
                error: function (res) {
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
            $('#' + elm + 'form')[0].reset();
        }

        function deleteRow() {
            let id = $('#modal-delete-row').val();
            let _url = 'area/' + id;
            let _token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: _url,
                type: 'DELETE',
                data: {
                    _token: _token
                },
                success: function (response) {
                    //showAlert('اطلاعات با موفقیت حذف شد', 'error');
                    closeModal('modal-delete');

                    laravel_datatable.ajax.reload();
                },
                error: function (response) {
                    if (response.status == 406) {
                        //showAlert('به دلیل ثبت اطلاعات بوسیله این رکورد امکان حذف نمی باشد.', 'error');
                    }
                }
            });
        }


        function selectItemByValue(elmnt, value){
            for(var i=0; i < elmnt.options.length; i++)
            {
                var value = Number(value);
                if(elmnt.options[i].value == value) {
                    elmnt.selectedIndex = i;
                    $(elmnt).prop('selectedIndex', i).change();
                    break;
                }
            }
        }

        function deleteRowModal(id) {
            $('#modal-delete-row').val(id);
            showModal('modal-delete');
        }

        function showAlert(text, type) {
            $('#alert_content_' + type).html(text);
            $('#alert-' + type).removeClass("hidden");
            setTimeout(function () {
                $('#alert-' + type).addClass("hidden");
            }, 3000);
        }
    </script>

@endsection
