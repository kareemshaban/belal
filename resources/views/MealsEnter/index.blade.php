<!DOCTYPE html>
<html lang="en">
@include('layouts.head')

<body>


    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        @include('layouts.sidebar')
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper" @if(Config::get('app.locale')=='ar' )
            style="margin-left: 0 ; margin-right: 260px ; direction: rtl;" @else
            style="margin-right: 0 ; margin-left: 260px ; direction: ltr;" @endif>
            <!--  Header Start -->
            @include('layouts.header')
            <!--  Header End -->
            <div class="body-wrapper-inner">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header"
                            style="display: flex ; justify-content: space-between ; align-items: center">
                            <h5 class="card-title fw-semibold " style="margin-bottom: 0 !important; color: #3cacc8 ">{{
                                __('main.meals_enter') }}</h5>
                            <button type="button" class="btn btn-info btn-lg" style="display: flex ; align-items: center;" id="createButton">
                                <span style="margin-left: 5px; margin-right: 5px"> {{ __('main.add_new') }} </span>
                                <iconify-icon icon="mingcute:plus-fill"></iconify-icon>
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-wrapper">

                                <table class="table table-striped  table-bordered table-hover" id="table">
                                    <thead>
                                        <th class="text-center"> # </th>
                                        <th class="text-center"> {{ __('main.client') }} </th>
                                        <th class="text-center"> {{ __('main.date') }} </th>
                                        <th class="text-center"> {{ __('main.meal') }} </th>
                                        <th class="text-center"> {{ __('main.item') }} </th>
                                        <th class="text-center"> {{ __('main.quantity') }} </th>
                                        <th class="text-center"> {{ __('main.boxes') }} </th>
                                        <th class="text-center"> {{ __('main.enteringTax') }} </th>
                                        <th class="text-center"> {{ __('main.actions') }} </th>
                                    </thead>
                                    <tbody>
                                        @foreach ( $meals as $meal )
                                        <tr>
                                            <td class="text-center"> {{ $meal -> id }} </td>
                                            <td class="text-center"> {{ $meal -> client }} </td>
                                            <td class="text-center"> {{ \Carbon\Carbon::parse($meal -> date) ->format('Y-m-d') }} </td>
                                            <td class="text-center"> {{ $meal -> code }} </td>
                                            <td class="text-center"> {{ $meal -> item_name }} -- {{$meal -> item_code}} </td>
                                            <td class="text-center"> {{ $meal -> quantity }} </td>
                                            <td class="text-center"> {{ $meal -> quantity  / 4}} </td>
                                            <td class="text-center"> {{ $meal -> enteringTax}} </td>
                                            <td class="text-center" style="gap: 5px; display: flex ">

                                                <button type="button" class="btn btn-danger deleteBtn" value="{{ $meal -> id }}"> <iconify-icon icon="mynaui:trash-solid" style="font-size: 20px"></iconify-icon> </button>
                                                <button type="button" class="btn btn-success editBtn" value="{{ $meal -> id }}"> <iconify-icon icon="akar-icons:edit" style="font-size: 20px"></iconify-icon> </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>


                        </div>
                    </div>

                    @include('MealsEnter.create')
                    @include('MealsEnter.deleteModal')

                    @include('layouts.footer')
                </div>
            </div>
        </div>
    </div>

    <script >
        $(document).on('click', '#createButton', function (event) {
        console.log('clicked');
        id = 0;
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            url: href,
            beforeSend: function () {
                $('#loader').show();
            },
            // return the result
            success: function (result) {
                var date = new Date();
                var currentDate = date.toISOString().substring(0,10);

                $('#createModal').modal("show");
                $(".modal-body #id").val(0);
                $(".modal-body #code").val("");
                $(".modal-body #item_id").val("");
                $(".modal-body #client_id").val("");
                $(".modal-body #date").val(currentDate);
                $(".modal-body #quantity").val("0");
                $(".modal-body #boxes").val("0");
                $(".modal-body #enteringTax").val("0");
                $(".modal-body #description").val("");

                $(".modal-body #item_id").prop('disabled', false);
                $(".modal-body #client_id").prop('disabled', false);

                selectItemAction();
                quantityTextChange();


            },
            complete: function () {
                $('#loader').hide();
            },
            error: function (jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $('#loader').hide();
            },
            timeout: 8000
        })
    });

    $(document).on('click', '.editBtn', function(event) {
       let id = event.currentTarget.value ;
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            type:'get',
            url:'/meals_enter-get' + '/' + id,
            dataType: 'json',

            success:function(response){
                console.log(response);
                if(response){
                    let href = $(this).attr('data-attr');

                    var date = new Date(response.date);
                    var day = date.getDate(),
                        month = date.getMonth() + 1,
                        year = date.getFullYear();
                    month = (month < 10 ? "0" : "") + month;
                    day = (day < 10 ? "0" : "") + day;
                    var operationDate = year + "-" + month + "-" + day ;


                    $.ajax({
                        url: href,
                        beforeSend: function() {
                            $('#loader').show();
                        },
                        // return the result
                        success: function(result) {
                            $('#createModal').modal("show");
                            $(".modal-body #id").val(response.id);
                            $(".modal-body #code").val(response.code);
                            $(".modal-body #item_id").val(response.item_id);
                            $(".modal-body #client_id").val(response.client_id);
                            $(".modal-body #date").val(operationDate);
                            $(".modal-body #quantity").val(response.quantity);
                            $(".modal-body #boxes").val(response.quantity/4);
                            $(".modal-body #enteringTax").val(response.enteringTax);
                            $(".modal-body #description").val(response.description);
                            $(".modal-body #item_id").prop('disabled', true);
                            $(".modal-body #client_id").prop('disabled', true);

                            selectItemAction();
                            quantityTextChange();
                        },
                        complete: function() {
                            $('#loader').hide();
                        },
                        error: function(jqXHR, testStatus, error) {
                            console.log(error);
                            alert("Page " + href + " cannot open. Error:" + error);
                            $('#loader').hide();
                        },
                        timeout: 8000
                    })
                } else {

                }
            }
        });
    });

    $(document).on('click', '.deleteBtn', function(event) {
        id = event.currentTarget.value ;
        console.log(id);
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            url: href,
            beforeSend: function() {
                $('#loader').show();
            },
            // return the result
            success: function(result) {
                $('#deleteModal').modal("show");
            },
            complete: function() {
                $('#loader').hide();
            },
            error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $('#loader').hide();
            },
            timeout: 8000
        })
    });
    $(document).on('click', '.btnConfirmDelete', function(event) {
        console.log(id);
        confirmDelete();
    });
    $(document).on('click', '.cancel-modal', function(event) {
        $('#deleteModal').modal("hide");
        id = 0 ;
    });




    function confirmDelete(){
        let url = "{{ route('meals_enter-destroy', ':id') }}";
        url = url.replace(':id', id);
        document.location.href=url;
    }

    function selectItemAction(){
        $(".modal-body #item_id").change(function(e){
            var id = e.target.value;
            itemChangeAction(id);
        });
    }
    function itemChangeAction(id){
        $.ajax({
            type:'get',
            url:'/item_meals' + '/' + id,
            dataType: 'json',
            success:function(response){
                console.log((response).length );
                if(response){
                    var prefix = "" ;
                    if(response.length  > 0){
                        prefix =   String(response.length + 1 ).padStart(3, '0') + '-ME-' + response[0].item_name + '--' + response[0].item_code;
                        $(".modal-body #code").val(prefix);
                        $(".modal-body #enteringTax").val(0);

                    } else {
                        $.ajax({
                            type:'get',
                            url:'/item-get' + '/' + id,
                            dataType: 'json',
                            success:function(response){
                                if(response){
                                    var prefix = "" ;

                                    prefix =   String( 1 ).padStart(3, '0') + '-ME-' +
                                        response.name + '--' + response.code;


                                    $(".modal-body #code").val(prefix);
                                    $.ajax({
                                        type:'get',
                                        url:'/settings_get',
                                        dataType: 'json',
                                        success:function(response){
                                            console.log(response);
                                            if(response){
                                                var qnt = $(".modal-body #boxes").val();

                                                $(".modal-body #enteringTax").val(response.enteringTax * qnt);

                                            } else {
                                                $(".modal-body #enteringTax").val("0");
                                            }
                                        } ,
                                        error: function (err) {
                                            $(".modal-body #enteringTax").val("0");
                                        }
                                    });

                                } else {
                                    $(".modal-body #code").val("");
                                }
                            }
                        });

                        $(".modal-body #code").val(prefix);

                    }



                } else {
                    $(".modal-body #code").val("");
                }
            } ,
            error: function (err) {
                $(".modal-body #code").val("");
            }
        });
    }
  function quantityTextChange(){
      $(".modal-body #quantity").change(function(e){
          var val = e.target.value ;
          $(".modal-body #boxes").val(val > 0 ? val / 4 : 0);
          itemChangeAction($(".modal-body #item_id").val());

      });

      $(".modal-body #quantity").keyup(function(e){
          var val = e.target.value ;
          $(".modal-body #boxes").val(val > 0 ? val / 4 : 0);
          itemChangeAction($(".modal-body #item_id").val());
      });

  }





    </script>
</body>

</html>
