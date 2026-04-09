<style>
    /* 1. إجبار الجدول على العرض الثابت */
    .view_table {
        table-layout: fixed !important;
        width: 100% !important;
        font-size: 11px !important;
    }

    /* 2. تصغير الحشوات تماماً */
    .view_table td,
    .view_table th {
        padding: 2px !important;
        overflow: hidden;
    }


    /* 3. تصغير حقول الإدخال */
    .view_table input.form-control {
        padding: 1px 2px !important;
        height: 24px !important;
        font-size: 11px !important;
        text-align: center;
        border-radius: 2px;
    }

    /* 4. تحديد عرض الأعمدة (سيعمل الآن بسبب fixed layout) */
    .col-id {
        width: 30px !important;
    }

    .supplier {
        width: 110px !important;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        /* وضع نقاط في حال كان الاسم طويلاً */

    }

    .inp {
        width: 50px !important;
    }

    /* خلايا إدخال الأرقام */
    .col-action {
        width: 70px !important;
    }

    .view_table th {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        /* وضع نقاط في حال كان الاسم طويلاً */
        font-size: 9px !important;
    }

    .buffalo-row {
        background-color: #fdf2e9 !important;
        /* لون برتقالي فاتح جداً أو أي لون تفضله */
    }

    /* تنسيق خلية المورد لجعل الأيقونة في طرف والاسم في طرف */
    .supplier-cell-content {
        display: flex;
        align-items: center;
        justify-content: space-between;
        /* يضع الاسم في جهة والأيقونة في الجهة الأخرى */
        width: 100%;
        direction: rtl;
        /* لضمان الترتيب الصحيح */
    }

    .supplier-name {
        flex-grow: 1;
        text-align: right;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .add-sub-row,
    .remove-sub-row {
        cursor: pointer;
        font-size: 18px;
        transition: transform 0.2s;
        margin-right: 8px;
        /* مسافة بسيطة من الاسم */
    }

    .add-sub-row:hover {
        transform: scale(1.2);
    }

    .remove-sub-row:hover {
        transform: scale(1.2);
    }

    /* لون السطر المضاف */
    .buffalo-row {
        background-color: #fff9f4 !important;
        /* لون هادئ جداً */
        border-right: 6px solid #ffab00;
        /* علامة جانبية تميز السطر */

    }

    .supplier-name-sub {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #6610f2;
        font-weight: 600;
        /* إزاحة من البداية (يمين في العربي، يسار في الإنجليزي) */
        margin-inline-start: 15px;
    }

    .supplier-name-sub i {
        font-size: 1.2rem;
        color: #adb5bd;
        /* لضمان أن السهم يشير دائماً "للداخل" تجاه النص */
        vertical-align: middle;
    }

    /* تمييز السطر المضاف بصرياً */
    .buffalo-row {
        background-color: rgba(102, 16, 242, 0.02) !important;
    }

    /* ربط بصري عبر الحدود */
    td[rowspan] {
        border-inline-start: 4px solid #6610f2 !important;
        /* خط ملون في جهة بداية السطر */
        background-color: #fff !important;
    }
</style>
@foreach($suppliers as $supplier)
<tr data-car="{{$supplier -> car_id}}" class="main-row" data-supplier="{{$supplier -> id}}">
    <td class="text-center" hidden="hidden">{{$loop -> index + 1}}</td>
    <td class="text-center supplier">
        <div class="supplier-cell-content">
            @if($supplier->car_id == 0)
            <span class="supplier-name" title="{{$supplier->name}}">{{$supplier->name}}</span>
            <i class='bx bx-plus-circle text-success add-sub-row' title="إضافة سطر جاموسي"
                data-supplier-name="{{$supplier->name}}"></i>
            @else
            <a href="{{route('car_meals' , ['supplier_id' => $supplier->id , 'startDate' => $startDate])}}"
                target="_blank">
                <span class="text-info">{{$supplier->name}}</span>
            </a>
            @endif
        </div>
        <input type="hidden" value="{{$supplier->id}}" name="supplier_id[]" />
    </td>
    @foreach ($period as $date)
    <td class="text-center inp">
        <input type="number" step="any" name="mbovine_weight[]" data-type="0" data-field="0"
            data-car="{{$supplier -> car_id}}" class="form-control" style="color: #6610f2"
            data-date="{{ \Carbon\Carbon::parse($date)->format('Y-m-d') }}" data-supplier="{{ $supplier->id }}"
            @if(optional($meal)->state === 1) disabled @endif />
    </td>

    <td class="text-center inp">
        <input type="number" step="any" name="ebovine_weight[]" data-type="1" data-field="0"
            data-car="{{$supplier -> car_id}}" class="form-control"
            data-date="{{ \Carbon\Carbon::parse($date)->format('Y-m-d') }}" data-supplier="{{ $supplier -> id }}"
            @if(optional($meal)->state === 1) disabled @endif style="color:
        #71dd37"/>
    </td>

    @endforeach

    <td class="text-center col-action">
        <input type="text" step="any" name="total_bovine_weight[]" data-car="{{$supplier -> car_id}}"
            class="form-control" data-date="{{ \Carbon\Carbon::parse($date)->format('Y-m-d') }}"
            data-supplier="{{ $supplier -> id }}" readonly @if(optional($meal)->state === 1) disabled @endif/>
    </td>


    <td class="text-center inp">
        <input type="number" step="any" name="bovine_price[]" data-field="2" data-type="3"
            data-car="{{$supplier -> car_id}}" class="form-control"
            data-date="{{ \Carbon\Carbon::parse($date)->format('Y-m-d') }}" data-supplier="{{ $supplier -> id }}"
            value="{{$supplier -> bovine_price}}" @if($supplier -> car_id > 0)
        readonly @endif
        @if(optional($meal)->state === 1) disabled @endif/>
    </td>


    <td class="text-center col-action">
        <input type="text" step="any" name="total_money[]" data-car="{{$supplier -> car_id}}" class="form-control"
            data-date="{{ \Carbon\Carbon::parse($date)->format('Y-m-d') }}" data-supplier="{{ $supplier -> id }}"
            readonly @if(optional($meal)->state === 1)
        disabled @endif/>
    </td>
    <td class="text-center">
        @if($supplier -> car_id == 0)

        <i class='bx bxs-cloud-upload text-primary postBtn' data-toggle="tooltip" data-placement="top"
            title="{{__('main.post_action')}}" data-supplier="{{$supplier -> id}}"
            data-supplier_name="{{$supplier -> name}}" style="font-size: 25px ; cursor: pointer"></i>

        <i class='bx bx-show text-primary viewBtn' data-toggle="tooltip" data-placement="top"
            title="{{__('main.view_action')}}" data-supplier="{{ $supplier -> id }}"
            style="font-size: 25px ; cursor: pointer"></i>
        @endif



    </td>


</tr>


@endforeach
{{-- TOTAL ROW --}}
<tr style="background:#f1f1f1; font-weight:bold;">
    <td class="text-center">الإجمالي</td>

    @foreach ($period as $date)
    {{-- total mbovine --}}
    <td class="text-center">
        <input type="text" class="form-control total-mbovine text-primary"
            data-date="{{ \Carbon\Carbon::parse($date)->format('Y-m-d') }}" readonly>
    </td>

    {{-- total mbuffalo --}}
    <td class="text-center" hidden>
        <input type="text" class="form-control total-mbuffalo"
            data-date="{{ \Carbon\Carbon::parse($date)->format('Y-m-d') }}" readonly>
    </td>

    {{-- total ebovine --}}
    <td class="text-center">
        <input type="text" class="form-control total-ebovine"
            data-date="{{ \Carbon\Carbon::parse($date)->format('Y-m-d') }}" readonly>
    </td>

    {{-- total ebuffalo --}}
    <td class="text-center" hidden>
        <input type="text" class="form-control total-ebuffalo"
            data-date="{{ \Carbon\Carbon::parse($date)->format('Y-m-d') }}" readonly>
    </td>
    @endforeach

    {{-- Total bovine weight --}}
    <td class="text-center">

        <input type="text" class="form-control total-bovine-weight" readonly>
    </td>

    {{-- Total buffalo weight --}}
    <td class="text-center" hidden>
        <input type="text" class="form-control total-buffalo-weight" readonly>
    </td>

    {{-- Total money --}}


    <td>

    </td>

    <td class="text-center">
        <input type="text" class="form-control total-money" readonly>
    </td>

    <td></td>
</tr>



<div id="loading-overlay">
    <div class="loader"></div>
    <div class="loading-text">{{__('main.milk_loading')}}</div>
</div>

<div id="closing-overlay">
    <div class="loader"></div>
    <div class="loading-text">{{__('main.closing_loading')}}</div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {

$(document).on('click', '.add-sub-row', function() {
    const $originalRow = $(this).closest('tr');
    const supplierName = $(this).data('supplier-name');

    // منع إضافة أكثر من سطر إضافي واحد
    if ($originalRow.next().hasClass('buffalo-row')) {
        toastr.warning('يوجد سطر إضافي بالفعل لهذا المورد');
        return;
    }

    // --- التعديل: تحديد اتجاه السهم حسب لغة الصفحة ---
    // نفحص اتجاه الصفحة (RTL للعربي أو LTR للإنجليزي)
    const isRTL = $('html').attr('dir') === 'rtl' || $('body').css('direction') === 'rtl';
    const subIcon = isRTL ? 'bx-subdirectory-left' : 'bx-subdirectory-right';
    const marginClass = isRTL ? 'margin-right:15px;' : 'margin-left:15px;';
    // ----------------------------------------------

    Swal.fire({
        title: 'إضافة سطر جاموسي؟',
        text: `سيتم دمج الحساب المالي للمورد: ${supplierName}`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'نعم، أضف',
        cancelButtonText: 'تراجع'
    }).then((result) => {
        if (result.isConfirmed) {
            // 1. استنساخ السطر الأصلي
            const $newRow = $originalRow.clone();
            $newRow.addClass('buffalo-row').removeAttr('data-car');

            // 2. دمج خلية الإجمالي (Total Money) وخلية الأكشن (Actions)
            // نطبق rowspan على الخلية في السطر الأصلي لتشمل السطر الجديد
            $originalRow.find('td:has(input[name="total_money[]"]), td:last-child')
                        .attr('rowspan', '2')
                        .css('vertical-align', 'middle');

            // 3. حذف الخلايا المقابلة من السطر الجديد (لأن الـ rowspan سيشغل مكانها)
            $newRow.find('td:has(input[name="total_money[]"]), td:last-child').remove();

            // 4. تحويل أسماء الحقول إلى Buffalo وتصفير القيم
            $newRow.find('input').each(function() {
                let name = $(this).attr('name');
                if (name) {
                    // تبديل كلمة bovine بـ buffalo في الـ name
                    let newName = name.replace('bovine', 'buffalo');
                    $(this).attr('name', newName);
                }

                // تغيير نوع الحقل ليكون 1 (كود الجاموسي لديك)
                if ($(this).attr('data-field') === "0") {
                    $(this).attr('data-field', "1");
                }

                $(this).val(''); // تصفير القيمة المنسوخة

            });

            // 5. تعديل اسم المورد والشكل مع السهم المتكيف
            const $nameCell = $newRow.find('.supplier-cell-content');
            $nameCell.html(`
                <span class="supplier-name" style="${marginClass} color:#6610f2; display: inline-flex; align-items: center; gap: 5px;">
                    <i class='bx ${subIcon}'></i>
                    <span>جاموسي</span>
                </span>
                <i class='bx bx-minus-circle text-danger remove-sub-row'
                   style="cursor:pointer; display:none"
                   title="حذف السطر"
                   data-parent-name="${supplierName}"></i>
            `);

            // 6. إضافة السطر الجديد في مكانه الصحيح
            $newRow.insertAfter($originalRow);
            attachEvents();

            calculateTotals();
            // تحديث الإجماليات
            calculateTotals();

            toastr.success('تم إضافة سطر الجاموسي ودمج الحساب');
        }
    });
});

// تعديل وظيفة الحذف لإعادة الجدول لحالته الطبيعية
$(document).on('click', '.remove-sub-row', function() {
    const $rowToRemove = $(this).closest('tr');
    const $originalRow = $rowToRemove.prev();

    Swal.fire({
        title: 'حذف السطر؟',
        text: 'سيتم حذف جميع وجبات الجاموسي المدخلة لهذا المورد',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'نعم، احذف'
    }).then((result) => {
        if (result.isConfirmed) {

            $originalRow.find('td').attr('rowspan', '1');


        }
    });
});







        loadMilkMealData($('#wid').val());
        //    calculateTotals();

        $('.postBtn').on('click', function () {

            const row = $(this).closest('tr');

            // Get the data-id attribute value
            const supplier_id = $(this).data('supplier');
            const supplier_name = $(this).data('supplier_name');
            Swal.fire({
                title: 'ترحيل و إقفال الأسبوع',
                text:  `هل انت متأكد من ترحيل و إقفال وجبات الأسبوع الخاصة ب ${supplier_name}` ,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'نعم , متأكد',
                cancelButtonText: 'لا , تراجع'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Proceed with deletion or any other logic
                    let id = Number($('#wid').val());
                    if(id > 0){
                        supplierMealsCaryOver(supplier_id , row);
                    } else {
                        toastr.warning('عفوا لا يوجد وجبات لترحيلها');
                    }

                }
            });

        });

        $('.viewBtn').on('click', function (){

            const supplier_id = $(this).data('supplier');
            const wid = $('#wid').val();
            const start = $('#start').val();


            const $row = $(this).closest('tr'); // find the row for this button
            const $bovineInput = $row.find('input[name="bovine_price[]"]');




            if(wid > 0) {
                if($bovineInput.prop('disabled')){
                    let url = "{{ route('weakMealDetails', ['id' => '__id__', 'supplier_id' => '__supplier__' ,
                     'start' => '__start__']) }}";
                    url = url.replace('__id__', wid);
                    url = url.replace('__supplier__', supplier_id);
                    url = url.replace('__start__', start);
                    document.location.href = url;
                } else {
                    toastr.warning('يجب ترحيل البيانات أولا');
                }

            } else {
                toastr.warning('عفوا لا يوجد بيانات محفوظة');
            }
        });


    });

    function attachEvents(){
        const isMobile = /Mobi|Android|iPhone|iPad|iPod/i.test(navigator.userAgent);
        const inputs = document.querySelectorAll('input[type="number"]');
        inputs.forEach((input, index) => {

            $(input).off('keydown blur');

            const handleSave = function () {
                this.dispatchEvent(new Event('change'));
                console.log('pressed');

                const value = this.value;
                const date = this.dataset.date;
                const supplier = this.dataset.supplier;
                const inputName = this.name;
                const type = this.dataset.type;
                const field = this.dataset.field;




                const bovinePriceSelector = `input[data-type="3"][data-field="2"][data-supplier="${supplier}"][name="bovine_price[]"]`;
                const bovineInput = document.querySelector(bovinePriceSelector);

                const buffaloPriceSelector = `input[data-type="3"][data-field="3"][data-supplier="${supplier}"][name="buffalo_price[]"]`;
                const buffaloInput = document.querySelector(buffaloPriceSelector);

                let bovinePrice = bovineInput ? bovineInput.value : 0;
                let buffaloPrice = buffaloInput ? buffaloInput.value : 0;

                console.log(buffaloPrice);

                postDailyValue(date, value, supplier, field, type, bovinePrice, buffaloPrice , this);
            };


            if (!isMobile) {
                input.addEventListener('keydown', function (e) {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        const input = this; // the current input element

                        // ✅ Skip if input is empty
                        if (!input.value.trim()) {

                            return;
                        }

                        // ✅ Format value to 2 decimal places
                        let number = parseFloat(input.value);
                        if (!isNaN(number)) {
                            // input.value = number.toFixed(2);
                            let number = parseFloat(input.value);
                            if (!isNaN(number)) {
                                if (Number.isInteger(number)) {
                                    input.value = number; // رقم صحيح بدون .00
                                } else {
                                    input.value = number.toFixed(2); // كسر مع خانتين
                                }
                            }
                        }

                        handleSave.call(this);
                        const currentCell = this.closest('td') || this.closest('.cell');
                        const currentRow = currentCell.closest('tr');
                        const cellIndex = Array.from(currentRow.children).indexOf(currentCell);
                        const nextRow = currentRow.nextElementSibling;

                        if (nextRow) {
                            const nextInput = nextRow.children[cellIndex]?.querySelector('input[type="number"]');
                            if (nextInput) {
                                setTimeout(() => {
                                    nextInput.focus();
                                    nextInput.select();
                                }, 10);
                            }
                        }
                    }
                });
            }

            if (isMobile) {
                input.addEventListener('blur', function () {
                    if (this.value.trim() !== '') {

                        const input = this; // the current input element

                        // ✅ Format value to 2 decimal places
                        let number = parseFloat(input.value);
                        if (!isNaN(number)) {
                            //input.value = number.toFixed(2);
                            let number = parseFloat(input.value);
                            if (!isNaN(number)) {
                                if (Number.isInteger(number)) {
                                    input.value = number; // رقم صحيح بدون .00
                                } else {
                                    input.value = number.toFixed(2); // كسر مع خانتين
                                }
                            }
                        }

                        handleSave.call(this);
                    }
                });
            }



        });
    }

    function postDailyValue(date, val, supplier, field, type , bovinePrice , buffaloPrice , inputEl) {

        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const start = $('#start').val();
        const end = $('#end').val();

        const body = {
            value: val,
            field: field,
            date: date,
            supplier: supplier,
            start: start,
            end: end,
            type: type,
            bovinePrice: bovinePrice ,
            buffaloPrice: buffaloPrice
        };

        fetch("{{ route('postMeal') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify(body)
        })
            .then(response => response.json())
            .then(data => {

                if (data.status === 'warning') {
                    // Display warning toast
                    toastr.warning(data.message);
                    inputEl.value = '' ;

                } else if(data.status == 'success') {
                    // continue normal behavior
                    toastr.success(data.message);

                    $('#wid').val(data.wId);

                    calculateRowTotals();
                } else {
                    toastr.error(data.message);
                   // console.log(data.debug);
                    inputEl.value = '' ;
                }

            })
            .catch(error => {
                console.error('AJAX error:', error);

                // ❌ Show error toast
                toastr.error('Failed to save value.', 'Error');
            });
    }


function loadMilkMealData(weaklyMealId) {
    fetch(`/weakMeals/${weaklyMealId}`)
        .then(response => response.json())
        .then(data => {
            var meals = data.meals;
            var prices = data.prices;
            var totals = data.totals;

            meals.forEach(record => {
                const date = record.date.split(' ')[0];
                const type = record.type;
                const supplierId = record.supplier_id;
                const state = record.state;
                const car_id = record.car_id;

                // --- الخطوة السحرية: إضافة سطر الجاموسي تلقائياً لو فيه وزن ---

               if (parseFloat(record.buffalo_weight) > 0) {
                    injectBuffaloRow(supplierId);
                }

                // تسكين بيانات البقري (Field 0)
                const bovineInput = document.querySelector(`input[data-date="${date}"][data-type="${type}"][data-field="0"][data-supplier="${supplierId}"]`);
                if (bovineInput) {
                    bovineInput.value = formatNumberSmart(record.bovine_weight);
                    bovineInput.readOnly = (record.isManufactured == 1);
                }

                // تسكين بيانات الجاموسي (Field 1) - دلوقتي الـ Selector هيلاقيه لأنه اتضاف فوق
                const buffaloInput = document.querySelector(`input[data-date="${date}"][data-type="${type}"][data-field="1"][data-supplier="${supplierId}"]`);
                if (buffaloInput) {
                    buffaloInput.value = formatNumberSmart(record.buffalo_weight);
                    buffaloInput.readOnly = (record.isManufactured == 1);
                }

                // معالجة الأسعار والإجماليات
                const bovinePriceInp = document.querySelector(`input[data-type="3"][data-field="2"][data-supplier="${supplierId}"][name="bovine_price[]"]`);
                const buffaloPriceInp = document.querySelector(`input[data-type="3"][data-field="3"][data-supplier="${supplierId}"][name="buffalo_price[]"]`);
                const moneyTotalInput = document.querySelector(`input[data-supplier="${supplierId}"][name="total_money[]"]`);

                if (bovinePriceInp) {
                    bovinePriceInp.value = (car_id == 0) ? formatNumberSmart(record.bovine_price) : formatNumberSmart(prices[supplierId]);
                }
                if (buffaloPriceInp) {
                    buffaloPriceInp.value = (car_id == 0) ? formatNumberSmart(record.buffalo_price) : formatNumberSmart(prices[supplierId]);
                }

                if (moneyTotalInput && car_id != 0) {
                    moneyTotalInput.value = formatNumberSmart(totals[supplierId]);
                }

                // حالة القفل (Disable) لو الريكورد معتمد
                const supplierInputs = document.querySelectorAll(`input[data-supplier="${supplierId}"]`);
                supplierInputs.forEach(input => {
                    input.disabled = (state === 1);
                });

                const postBtn = document.querySelector(`.postBtn[data-supplier="${supplierId}"]`);
                if (postBtn) {
                    postBtn.style.display = (state === 1) ? 'none' : '';
                }
            });

            calculateRowTotals();

            attachEvents();
        })
        .catch(err => console.error('Error:', err))
        .finally(() => {
            calculateTotals();
        });
}

function injectBuffaloRow(supplierId) {
    // 1. تحديد السطر الأصلي
    const $originalRow = $(`tr.main-row[data-supplier="${supplierId}"]`);

    // منع التكرار
    if ($originalRow.next().hasClass('buffalo-row') || $originalRow.length === 0) {
        return;
    }

    // 2. استنساخ السطر الأصلي (نفس منطق الزرار اليدوي)
    const $newRow = $originalRow.clone();
    $newRow.addClass('buffalo-row').removeAttr('data-car');

    // 3. ضبط الـ Rowspan للخلايا المشتركة في السطر الأصلي
    $originalRow.find('td:has(input[name="total_money[]"]), td:last-child')
                .attr('rowspan', '2')
                .css('vertical-align', 'middle');

    // 4. حذف الخلايا الزائدة من السطر الجديد
    $newRow.find('td:has(input[name="total_money[]"]), td:last-child').remove();

    // 5. تحويل الحقول لـ Buffalo وتصفيرها
    const isRTL = $('html').attr('dir') === 'rtl' || $('body').css('direction') === 'rtl';
    const subIcon = isRTL ? 'bx-subdirectory-left' : 'bx-subdirectory-right';
    const marginClass = isRTL ? 'margin-right:15px;' : 'margin-left:15px;';

    $newRow.find('input').each(function() {
        let name = $(this).attr('name');
        if (name) {
            $(this).attr('name', name.replace('bovine', 'buffalo'));
        }
        if (name && name.includes('price')) {
        // لو الحقل ده بتاع سعر، نخليه 3
        $(this).attr('data-field', "3");
    } else if ($(this).attr('data-field') === "0") {
        // لو حقل وزن (كان 0 في البقري) نخليه 1 في الجاموسي
        $(this).attr('data-field', "1");
    }
        $(this).val(''); // بنصفره عشان loadMilkMealData هي اللي هتملاه
    });

    // 6. شكل خلية الاسم (أيقونة الجاموسي)
    const $nameCell = $newRow.find('.supplier-cell-content');
    $nameCell.html(`
        <span class="supplier-name" style="${marginClass} color:#6610f2; display: inline-flex; align-items: center; gap: 5px;">
            <i class='bx ${subIcon}'></i>
            <span>جاموسي</span>
        </span>
        <i class='bx bx-minus-circle text-danger remove-sub-row' style="cursor:pointer; display:none"  title="حذف"></i>
    `);



    // 7. حقن السطر في الجدول
    $newRow.insertAfter($originalRow);


}
    function calculateRowTotals() {
        const rows = document.querySelectorAll('table tbody tr'); // Adjust the selector if needed

        rows.forEach(row => {
            const inputs = row.querySelectorAll('input');
            const carId = row.getAttribute('data-car');

            let totalBovine = 0;
            let totalBuffalo = 0;

            inputs.forEach(input => {
                const field = input.getAttribute('data-field');
                const car_id = input.getAttribute('data-car');
                const value = parseFloat(input.value);
             //   console.log('car_id' , car_id);
                if (isNaN(value)) return;

                if (field === "0") {
                    totalBovine += value;
                } else if (field === "1") {
                    totalBuffalo += value;
                }
            });


            const totalBovineInput = row.querySelector('input[name="total_bovine_weight[]"]');
            const totalBuffaloInput = row.querySelector('input[name="total_buffalo_weight[]"]');


            const priceBovineInput = row.querySelector('input[name="bovine_price[]"]');
            const priceBuffaloInput = row.querySelector('input[name="buffalo_price[]"]');

            const moneyTotalInput = row.querySelector('input[name="total_money[]"]');

            let bovinePrice = 0 ;
            let buffaloPrice = 0 ;

            if (totalBovineInput) totalBovineInput.value = formatNumberSmart(totalBovine) ;
            if (totalBuffaloInput) totalBuffaloInput.value = formatNumberSmart(totalBuffalo);

            if(priceBovineInput)  bovinePrice = priceBovineInput.value ;
            if(priceBuffaloInput)  buffaloPrice = priceBuffaloInput.value ;
          //  console.log((totalBuffalo * buffaloPrice) + (totalBovine * bovinePrice));
            if(!row.classList.contains('buffalo-row')){
            if(carId === "0"){
                if (moneyTotalInput){
                   moneyTotalInput.value = formatNumberSmart(((totalBuffalo * buffaloPrice) + (totalBovine * bovinePrice)));
                }
            }
        } else {
                    const prevRow = row.previousElementSibling;
                    const prevMoneyInput = prevRow.querySelector('input[name="total_money[]"]');
                    const prevMoneyValue = prevMoneyInput ? parseFloat(prevMoneyInput.value) || 0 : 0;
                    const currentBuffaloTotal = totalBuffalo * buffaloPrice;
                    prevMoneyInput.value = formatNumberSmart(prevMoneyValue + currentBuffaloTotal);
        }

        });
    }


    function supplierMealsCaryOver(supplier_id , row) {
        const overlay = document.getElementById('closing-overlay');

        // Show the overlay
        overlay.style.display = 'flex';

        // Ensure overlay stays for at least 3 seconds
        const minDuration = 3000;
        const startTime = Date.now();

        const wid = $('#wid').val();
        let responseData = null;

        fetch(`/supplierMealsCarryOver/${wid}/${supplier_id}`)
            .then(response => response.json())
            .then(data => {
                responseData = data;

                if (data.status === 'warning') {
                    toastr.warning(data.message);
                } else if (data.status !== 'success') {
                    toastr.error(data.message);
                  //  console.log(data.debug);
                }
                // If success, we delay the SweetAlert until after overlay is hidden
            })
            .catch(err => {
                console.error('Error loading milk meal data:', err);
            })
            .finally(() => {
                const elapsed = Date.now() - startTime;
                const remaining = minDuration - elapsed;

                setTimeout(() => {
                    // Hide the overlay
                    overlay.style.display = 'none';
                    const inputs = row.find('input');          // Find all inputs in that row

                    inputs.prop('disabled', true);

                     const $nextRow = row.next();
                     if($nextRow.length > 0){
                        if($nextRow.hasClass('buffalo-row')){
                             const nextInputs = $nextRow.find('input');
                             nextInputs.prop('disabled', true);
                        }
                     }

                    const postButton = row.find('.postBtn');
                 //   console.log(postButton);

                    if (postButton) {
                        postButton.hide();
                    }



                    // Now show the SweetAlert only if success
                    if (responseData?.status === 'success') {
                        Swal.fire({
                            title: 'تم الترحيل بنجاح',
                            text: 'يمكنك استعراض الوجبات بدون تعديل',
                            icon: 'success',
                            showCancelButton: true,
                            confirmButtonText: 'نعم , افهم ذلك',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                const wid = $('#wid').val();
                                const start = $('#start').val();

                                let url = "{{ route('weakMealDetails', ['id' => '__id__', 'supplier_id' => '__supplier__' ,
                     'start' => '__start__']) }}";
                                url = url.replace('__id__', wid);
                                url = url.replace('__supplier__', supplier_id);
                                url = url.replace('__start__', start);
                                document.location.href = url;
                            }
                        });
                    }

                }, Math.max(remaining, 0));
            });
    }


    function calculateTotals() {

        let dateTotals = {}; // totals per date
        let grandBovine = 0;
        let grandBuffalo = 0;
        let grandMoney = 0;

        // Pass 1: collect all values ONCE
        $('input[data-date]').each(function () {
            let date = $(this).data('date');
            let name = this.name;
            let val = parseFloat(this.value) || 0;

            if (!dateTotals[date]) {
                dateTotals[date] = {
                    mbovine: 0,
                    mbuffalo: 0,
                    ebovine: 0,
                    ebuffalo: 0
                };
            }

            if (name === "mbovine_weight[]") dateTotals[date].mbovine += val;
            if (name === "mbuffalo_weight[]") dateTotals[date].mbuffalo += val;
            if (name === "ebovine_weight[]") dateTotals[date].ebovine += val;
            if (name === "ebuffalo_weight[]") dateTotals[date].ebuffalo += val;
        });

        // Pass 2: Fill total row per date (very light)
        for (let date in dateTotals) {
            $('.total-mbovine[data-date="'+date+'"]').val(formatNumberSmart(dateTotals[date].mbovine));
            $('.total-mbuffalo[data-date="'+date+'"]').val(formatNumberSmart(dateTotals[date].mbuffalo));
            $('.total-ebovine[data-date="'+date+'"]').val(formatNumberSmart(dateTotals[date].ebovine));
            $('.total-ebuffalo[data-date="'+date+'"]').val(formatNumberSmart(dateTotals[date].ebuffalo));
        }

        // Pass 3: Global row totals
        $('input[name="total_bovine_weight[]"]').each(function(){
            grandBovine += parseFloat(this.value) || 0;
        });
        $('input[name="total_buffalo_weight[]"]').each(function(){
            grandBuffalo += parseFloat(this.value) || 0;
        });
        $('input[name="total_money[]"]').each(function(){
            grandMoney += parseFloat(this.value) || 0;
        });

        $('.total-bovine-weight').val(formatNumberSmart(grandBovine));
        $('.total-buffalo-weight').val(formatNumberSmart(grandBuffalo));
        $('.total-money').val(formatNumberSmart(grandMoney));
    }


    //  شغّل الحساب عند الكتابة بأي خانة
    $(document).on("input", "input", function () {
        calculateTotals();
    });

    function formatNumberSmart(val) {
        let num = parseFloat(val);
        if (isNaN(num)) return '';
        // إذا كان رقم صحيح ارجعه بدون أصفار، إذا كان كسر ارجعه بخانتين
        return Number.isInteger(num) ? num : num.toFixed(2);
    }

</script>
