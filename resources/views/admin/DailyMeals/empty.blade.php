
    @foreach($suppliers as $supplier)
        <tr>
            <td class="text-center">{{$loop -> index + 1}}</td>
            <td class="text-center">{{$supplier -> name}}
                <input type="hidden" value="{{$supplier -> id}}" id="supplier_id" name="supplier_id[]"/>
            </td>
            @foreach ($period as $date)
                <td class="text-center ">
                    <input type="number" step="any" name="mbovine_weight[]" data-type="0" data-field="0"
                           class="form-control" style="color: #6610f2"
                           data-date="{{ $date }}" data-supplier="{{ $supplier->id }}"
                           @if(optional($meal)->state === 1) disabled @endif />
                </td>
                <td class="text-center" hidden="hidden">
                    <input type="number" step="any" name="mbuffalo_weight[]" data-type="0" data-field="1"
                           class="form-control" data-date="{{ $date }}" data-supplier="{{ $supplier -> id }}"
                           @if(optional($meal)->state === 1) disabled @endif/>
                </td>
                <td class="text-center">
                    <input type="number" step="any" name="ebovine_weight[]" data-type="1" data-field="0"
                           class="form-control" data-date="{{ $date }}" data-supplier="{{ $supplier -> id }}"
                           @if(optional($meal)->state === 1) disabled @endif style="color: #71dd37"/>
                </td>
                <td class="text-center" hidden="hidden">
                    <input type="number" step="any" name="ebuffalo_weight[]" data-type="1" data-field="1"
                           class="form-control" data-date="{{ $date }}" data-supplier="{{ $supplier -> id }}"
                           @if(optional($meal)->state === 1) disabled @endif/>
                </td>
            @endforeach

            <td class="text-center">
                <input type="text" step="any" name="total_bovine_weight[]"
                       class="form-control" data-date="{{ $date }}" data-supplier="{{ $supplier -> id }}" readonly
                       @if(optional($meal)->state === 1) disabled @endif/>
            </td>
            <td class="text-center" hidden="hidden">
                <input type="text" step="any" name="total_buffalo_weight[]"
                       class="form-control" data-date="{{ $date }}" data-supplier="{{ $supplier -> id }}" readonly
                       @if(optional($meal)->state === 1) disabled @endif/>
            </td>

            <td class="text-center">
                <input type="number" step="any" name="bovine_price[]" data-field ="2" data-type="3"
                       class="form-control" data-date="{{ $date }}" data-supplier="{{ $supplier -> id }}"
                value="{{$supplier -> bovine_price}}"
                       @if(optional($meal)->state === 1) disabled @endif/>
            </td>
            <td class="text-center" hidden="hidden">
                <input type="number" step="any" name="buffalo_price[]" data-field ="3" data-type="3"
                       class="form-control" data-date="{{ $date }}" data-supplier="{{ $supplier -> id }}"
                       value="{{$supplier -> buffalo_price}}"
                       @if(optional($meal)->state === 1) disabled @endif/>
            </td>

            <td class="text-center">
                <input type="text" step="any" name="total_money[]"
                       class="form-control" data-date="{{ $date }}" data-supplier="{{ $supplier -> id }}" readonly
                       @if(optional($meal)->state === 1) disabled @endif/>
            </td>
            <td class="text-center">


                <i class='bx bxs-cloud-upload text-primary postBtn' data-toggle="tooltip" data-placement="top" title="{{__('main.post_action')}}"
                   data-supplier="{{$supplier -> id}}" data-supplier_name="{{$supplier -> name}}" style="font-size: 25px ; cursor: pointer"></i>

                       <i class='bx bx-show text-primary viewBtn' data-toggle="tooltip" data-placement="top" title="{{__('main.view_action')}}"
                          data-supplier="{{ $supplier -> id }}"   style="font-size: 25px ; cursor: pointer"></i>


            </td>


        </tr>


    @endforeach



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
            const isMobile = /Mobi|Android|iPhone|iPad|iPod/i.test(navigator.userAgent);

            const inputs = document.querySelectorAll('input[type="number"]');

            inputs.forEach((input, index) => {

                const handleSave = function () {
                    this.dispatchEvent(new Event('change'));

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
                                input.value = number.toFixed(2);
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
                                input.value = number.toFixed(2);
                            }

                            handleSave.call(this);
                        }
                    });
                }



        });


            loadMilkMealData($('#wid').val());

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

        function postDailyValue(date, val, supplier, field, type , bovinePrice , buffaloPrice , inputEl) {
            console.log(bovinePrice);
            console.log(buffaloPrice);
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
                        console.log(data.debug);
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
            // const overlay = document.getElementById('loading-overlay');
            //
            // // Show the overlay
            // overlay.style.display = 'flex';
            //
            // // Create a timer that ensures the loading stays for at least 10 seconds
            // const minDuration = 5000; // 5 seconds
            // const startTime = Date.now();

            fetch(`/weakMeals/${weaklyMealId}`)
                .then(response => response.json())
                .then(data => {
                    data.forEach(record => {
                        const date = record.date;
                        const type = record.type;
                        const supplierId = record.supplier_id;
                        const state = record.state ;


                        const bovineSelector = `input[data-date="${date}"][data-type="${type}"][data-field="0"][data-supplier="${supplierId}"]`;
                        const bovineInput = document.querySelector(bovineSelector);
                        const bovineSelector0 = `input[data-date="${date}"][data-type="0"][data-field="0"][data-supplier="${supplierId}"]`;
                        const bovineSelector1 = `input[data-date="${date}"][data-type="1"][data-field="0"][data-supplier="${supplierId}"]`;
                        const bovineInput0 = document.querySelector(bovineSelector0);
                        const bovineInput1 = document.querySelector(bovineSelector1);
                        if (bovineInput) {
                                bovineInput.value = record.bovine_weight;
                            if (record.isManufactured == 1) {


                                bovineInput0.readOnly = true;
                                bovineInput1.readOnly = true;


                            }
                            else {
                           //     bovineInput.readOnly = false;
                                bovineInput0.readOnly = false;
                                bovineInput1.readOnly = false;
                            }
                        }

                        const buffaloSelector = `input[data-date="${date}"][data-type="${type}"][data-field="1"][data-supplier="${supplierId}"]`;
                        const buffaloInput = document.querySelector(buffaloSelector);
                        if (buffaloInput) {
                            buffaloInput.value = record.buffalo_weight;
                        }

                        const bovineTotalSelector = `input[data-date="${date}"][data-type="1"][data-field="1"][data-supplier="${supplierId}"][name="total_bovine_weight[]"]`;

                        const bovineTotalInput = document.querySelector(bovineTotalSelector);
                        if (bovineTotalInput) {
                            bovineTotalInput.value = record.buffalo_weight;
                        }





                        const bovinePriceSelector = `input[data-date="${date}"][data-type="3"][data-field="2"][data-supplier="${supplierId}"][name="bovine_price[]"]`;

                        const bovinePriceInp = document.querySelector(bovinePriceSelector);
                        if (bovinePriceInp) {
                            bovinePriceInp.value = record.bovine_price;
                        }


                        const supplierInputs = document.querySelectorAll(`input[data-supplier="${supplierId}"]`);
                        supplierInputs.forEach(input => {
                            input.disabled = (state === 1); // disable if state == 1, otherwise enable
                        });
                        const postBtn = document.querySelector(`.postBtn[data-supplier="${supplierId}"]`);
                        if (postBtn) {
                            postBtn.style.display = (state === 1) ? 'none' : '';
                        }

                    });
                    calculateRowTotals();
                })
                .catch(err => {
                    console.error('Error loading milk meal data:', err);
                })
                .finally(() => {
                    // const elapsed = Date.now() - startTime;
                    // const remaining = minDuration - elapsed;
                    //
                    // setTimeout(() => {
                    //     overlay.style.display = 'none';
                    // }, Math.max(remaining, 0));
                });
        }



        function calculateRowTotals() {
            const rows = document.querySelectorAll('table tbody tr'); // Adjust the selector if needed

            rows.forEach(row => {
                const inputs = row.querySelectorAll('input');

                let totalBovine = 0;
                let totalBuffalo = 0;

                inputs.forEach(input => {
                    const field = input.getAttribute('data-field');
                    const value = parseFloat(input.value);
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

                if (totalBovineInput) totalBovineInput.value = totalBovine.toFixed(2);
                if (totalBuffaloInput) totalBuffaloInput.value = totalBuffalo.toFixed(2);

                if(priceBovineInput)  bovinePrice = priceBovineInput.value ;
                if(priceBuffaloInput)  buffaloPrice = priceBuffaloInput.value ;
                if (moneyTotalInput) moneyTotalInput.value = ((totalBuffalo * buffaloPrice) + (totalBovine * bovinePrice)).toFixed(2) ;

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
                        console.log(data.debug);
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
                        const postButton = row.find('.postBtn');
                        console.log(postButton);

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



    </script>

