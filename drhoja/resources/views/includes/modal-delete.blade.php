<!-- ----------مودال درخواست حذف ------------------  -->
<div id="modal-delete"   x-transition.duration.500ms class="bg-black/50 absolute hidden flex top-0 w-full h-screen items-center px-5">
    <div class="bg-white w-full sm:max-w-md mx-auto p-5 rounded-lg flex flex-col gap-3">
        <input type="hidden" id="modal-delete-row">
        <span class="flex justify-between items-center border-b pb-2">
                     <span>درخواست حذف</span>
                     <span onclick="closeModal('modal-delete')" class="bg-gray-100 p-1 sm:p-2 rounded-md cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                          </svg>
                     </span>
                </span>
        <span>
                 آیا از حذف ردیف اطمینان دارید ؟
                </span>

        <div class="flex flex-row justify-end gap-3 mt-3 w-full">
            <a onclick="deleteRow()" class="min-w-[100px] text-center bg-gradient-to-r from-green-400 to-green-500 text-white sm:hover:-translate-y-1 transition-transform duration-200 py-3 px-5 rounded-full cursor-pointer text-xs sm:text-base">بله</a>
            <a onclick="closeModal('modal-delete')" class="min-w-[100px] text-center bg-gradient-to-r from-yellow-300 to-yellow-400 text-yellow-800 sm:hover:-translate-y-1 transition-transform duration-200 py-3 px-5 rounded-full cursor-pointer text-xs sm:text-base">خیر</a>
        </div>
    </div>
</div>
