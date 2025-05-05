<!DOCTYPE html>

@include('layouts.head')

<style>
    .form-group {
        margin-top: 10px ;
    }
</style>

<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->

        @include('layouts.sidebar' , ['slag' => 0 , 'subSlag' => 0 ])
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->

            @include('layouts.nav')

            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">
                    <div style="display: flex ; justify-content: space-between ; align-items: center">
                        <h4 class="fw-bold py-3" style="margin-bottom: 0">
                            <span class="text-muted fw-light">{{__('main.dashboard')}} /</span> {{__('main.my_profile')}}
                        </h4>

                    </div>

                  @include('flash-message')

                    <!-- Responsive Table -->
                    <div class="card">
                        <h5 class="card-header">{{__('main.my_profile')}}</h5>
                        <div class="card-body">
                            <div class="container-fluid">
                            <form class="center" method="POST" action="{{ route('store-user') }}"
                                  enctype="multipart/form-data" >
                                @csrf
                               <h2 style="color: #B57E10 ; font-size: 18px"> {{__('main.account_info')}} </h2>
                               <div class="row" style="padding:25px;border:solid 2px #eee;border-radius:15px;">
                                   <div class="col-lg-6 col-md-6 col-sm-12">
                                       <div class="form-group">
                                           <label> {{__('main.name')}} <span style="font-size: 14px ; color: red">*</span></label>
                                           <input type="text" name="name" id="name"
                                                  class="form-control @error('name') is-invalid @enderror"
                                                  placeholder="{{ __('main.name') }}" autofocus
                                                   value="{{$user -> name}}" required @if($user -> type > 0) readonly @endif/>
                                           @error('name')
                                           <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                           @enderror

                                           <input id="id" name="id" type="hidden" value="{{$user -> id}}"/>

                                       </div>
                                   </div>
                                  @if($user -> type == 0)
                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                           <div class="form-group">
                                               <label> {{__('main.role')}} <span style="font-size: 14px ; color: red">*</span></label>
                                               <input type="text" name="role" id="role"
                                                      class="form-control @error('role') is-invalid @enderror"
                                                      placeholder="{{ __('main.role') }}" autofocus
                                                      @if(Config::get('app.locale')=='ar' )   value="{{$user -> role_ar}}"
                                                      @else value="{{$user -> role_en}}" @endif readonly/>
                                               @error('role')
                                               <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                               @enderror
                                               <input id="role_id" name="role_id" type="hidden" value="{{$user -> role_id}}"/>
                                           </div>
                                       </div>
                                      @else
                                       <div class="col-lg-6 col-md-6 col-sm-12"></div>
                                  @endif


                                   <div class="col-lg-6 col-md-6 col-sm-12">
                                       <div class="form-group">
                                           <label> {{__('main.email')}} <span style="font-size: 14px ; color: red">*</span></label>
                                           <input type="text" name="email" id="email"
                                                  class="form-control @error('email') is-invalid @enderror"
                                                  placeholder="{{ __('main.email') }}" autofocus
                                                  value="{{$user -> email}}" required @if($user -> type > 0) readonly @endif/>
                                           @error('email')
                                           <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                           @enderror

                                       </div>
                                   </div>

                                   <div class="col-lg-6 col-md-6 col-sm-12">
                                       <div class="form-group">
                                           <label> {{__('main.password')}} <span style="font-size: 14px ; color: red">*</span></label>
                                           <div style="display: flex ; gap: 20px">
                                               <input type="text" name="password" id="password"
                                                      class="form-control @error('password') is-invalid @enderror"
                                                      placeholder="{{ __('main.password') }}" autofocus
                                                      value="*********" required/>
                                               <img src="{{asset('assets/img/reset-password.png')}}"  style="cursor: pointer" id="resetPassword"
                                                    width="40" height="40" data-toggle="tooltip" data-placement="top" title="{{__('main.reset_password')}}">

                                           </div>



                                           @error('password')
                                           <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                           @enderror

                                       </div>
                                   </div>

                               </div>

                            </form>

                                    @if($user -> type == 1)
                                    <form class="center" method="POST" action="{{ route('update-supplier') }}"
                                          enctype="multipart/form-data" >
                                    @csrf

                                        <h2 style="color: #B57E10 ; font-size: 18px ; margin-top: 20px">
                                            {{__('main.personal_info')}}  <span class="badge bg-info">({{__('main.user1')}}) </span>
                                        </h2>
                                     <div style="padding:25px;border:solid 2px #eee;border-radius:15px;">


                                        <div class="row" style="margin-bottom: 10px;">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>{{ __('main.name') }}  <span style="color: red ; font-size: 14px"> * </span> </label>
                                                    <input type="text" name="name" id="name"
                                                           class="form-control @error('name') is-invalid @enderror"
                                                           placeholder="{{ __('main.name') }}" autofocus  required value="{{$supplier -> name}}"/>
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                    <input  name="id" id="id" type="hidden" value="{{$supplier -> id}}"/>

                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>{{ __('main.company') }} <span style="color: red ; font-size: 14px"> * </span> </label>
                                                    <input type="text" name="company" id="company"
                                                           class="form-control @error('company') is-invalid @enderror"
                                                           placeholder="{{ __('main.company') }}" autofocus  required value="{{$supplier -> company}}"/>
                                                    @error('company')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 10px">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>{{__('main.country')}} <span style="color: red ; font-size: 14px"> * </span></label>
                                                    <select class="form-control @error('country_id') is-invalid @enderror" id="country_id" name="country_id" required>
                                                        @foreach($countries as $country)
                                                            <option value="{{$country -> id}}" @if($supplier -> country_id == $country -> id) selected @endif>
                                                                @if(Config::get('app.locale')=='ar' )
                                                                    {{$country -> name_ar}}
                                                                @else
                                                                    {{$country -> name_en}}
                                                                @endif
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('company')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror

                                                </div>

                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>{{__('main.city')}} <span style="color: red ; font-size: 14px"> * </span></label>
                                                  <input id="mcity_id" name="mcity_id" value="{{$supplier -> city_id}}" type="hidden">
                                                    <select class="form-control @error('city_id') is-invalid @enderror" id="city_id" name="city_id" required>

                                                    </select>
                                                    @error('company')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror

                                                </div>

                                            </div>

                                        </div>
                                        <div class="row" style="margin-bottom: 10px;">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>{{ __('main.phone') }}  </label>
                                                    <input type="text" name="phone" id="phone"
                                                           class="form-control @error('phone') is-invalid @enderror"
                                                           placeholder="{{ __('main.phone') }}" autofocus value="{{$supplier -> phone}}"  />
                                                    @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror


                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>{{ __('main.mobile') }} <span style="color: red ; font-size: 14px"> * </span></label>
                                                    <input type="text" name="mobile" id="mobile"
                                                           class="form-control @error('mobile') is-invalid @enderror"
                                                           placeholder="{{ __('main.mobile') }}" autofocus required value="{{$supplier -> mobile}}"/>
                                                    @error('mobile')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 10px;">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>{{ __('main.email') }}  </label>
                                                    <input type="text" name="email" id="email"
                                                           class="form-control @error('email') is-invalid @enderror"
                                                           placeholder="{{ __('main.email') }}" autofocus  value="{{$supplier -> email}}" />
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror


                                                </div>
                                            </div>


                                        </div>
                                        <div class="row" style="margin-bottom: 10px;">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>{{ __('main.vatNumber') }}  </label>
                                                    <input type="text" name="vatNumber" id="vatNumber"
                                                           class="form-control @error('vatNumber') is-invalid @enderror"
                                                           placeholder="{{ __('main.vatNumber') }}" autofocus value="{{$supplier -> vatNumber}}" />
                                                    @error('vatNumber')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror


                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>{{ __('main.registrationNumber') }}</label>
                                                    <input type="text" name="registrationNumber" id="registrationNumber"
                                                           class="form-control @error('registrationNumber') is-invalid @enderror"
                                                           placeholder="{{ __('main.registrationNumber') }}" autofocus value="{{$supplier -> registrationNumber}}"/>
                                                    @error('registrationNumber')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>{{ __('main.address') }}</label>
                                                    <textarea type="text" name="address" id="address"
                                                              class="form-control @error('address') is-invalid @enderror"
                                                              placeholder="{{ __('main.address') }}" autofocus > {{$supplier -> address}} </textarea>
                                                    @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror

                                                </div>
                                            </div>

                                        </div>
                                        <div >
                                            <label for="img" class="col-form-label">{{ __('main.logo') }}:</label>
                                            <div class="row" style="display: flex; align-items: center;">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="custom-file">

                                                        <input class="form-control" type="file" id="logo" name="logo"
                                                               accept="*">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 text-right">
                                                    @if($supplier -> logo == "")
                                                        <img src= "{{ asset('assets/img/picture.png') }}" id="logo-img" width="80px"
                                                             class="profile-img"/>
                                                        @else
                                                        <img src= "{{ asset('images/Supplier/' . $supplier->logo)}}" id="logo-img" width="80px"
                                                             class="profile-img"/>
                                                    @endif


                                                </div>
                                            </div>
                                        </div>
                                         <div class="row" style="margin-top: 40px">
                                             <div class="col-12 text-center">
                                                 <button type="submit" class="btn btn-warning">{{ __('main.save_btn') }}</button>

                                             </div>

                                         </div>
                                     </div>
                                    </form>

                                @elseif($user -> type == 2)
                                    <form class="center" method="POST" action="{{ route('update-client') }}"
                                          enctype="multipart/form-data" >
                                        @csrf
                                        <h2 style="color: #B57E10 ; font-size: 18px">
                                            {{__('main.personal_info')}}  <span class="badge bg-primary">({{__('main.user2')}}) </span>
                                        </h2>
                                    </form>
                                @endif
                            </div>

                        </div>


                    </div>
                    <!--/ Responsive Table -->
                </div>
                <!-- / Content -->

                <!-- Footer -->
                @include('layouts.footer_design')
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
</div>

@include('cpanel.Users.passwordReset')
@include('layouts.footer')
<script type="text/javascript">
    $(document).ready(function () {
        // Your code here
        getCountryCities($('#country_id').val() , 0);
    });

    $('#country_id').on('change', function() {
        getCountryCities(this.value , 0);
    });


    $(document).on('click', '#resetPassword', function (event) {
        console.log('clicked');
        var id = $('#id').val() ;
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            url: href,
            beforeSend: function () {
                $('#loader').show();
            },
            // return the result
            success: function (result) {
                $('#resetPasswordModal').modal("show");
                $(".modal-body #id").val(id);
                $(".modal-body #new_password").val("");
                $(".modal-body #password2").val("");


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


    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#logo-img').attr('src', e.target.result);

            }
            reader.readAsDataURL(input.files[0]);

        }
    }
    $("#logo").change(function () {
        readURL(this);
    });

    function getCountryCities(country_id , city_id){
        $.ajax({
            type:'get',
            url:'/getCountryCities' + '/' + country_id,
            dataType: 'json',

            success:function(response){
                console.log(response);
                $('#city_id').empty()
                if(response){
                    for (var i=0;i<response.length;i++){

                        var option = $('<option />').val(response[i].id).html(response[i].name_ar);

                        // Conditionally select the option
                        if (response[i].id == $('#mcity_id').val()) {
                            option.prop('selected', true); // Set as selected if the condition matches
                        }

                        $('#city_id').append(option);


                    }

                    if(city_id > 0){
                        $("#city_id").val(city_id);
                    }

                } else {

                }
            }
        });
    }
</script>
</body>
</html>
