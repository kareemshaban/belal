<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-md" role="document" style="min-width: 700px">
        <div class="modal-content">
            <div class="modal-header" style="background: #F8F8F8 ; border-radius: 8px">
                <label class="modelTitle"> </label>


                <i class='bx bxs-x-square text-danger modal-close' data-bs-dismiss="modal" style="font-size: 25px ; cursor: pointer"></i>


            </div>
            <div class="modal-body" id="smallBody">

                <div class="container-fluid">

                    <form class="center" method="POST" action="{{ route('daily_meals-store') }}"
                          enctype="multipart/form-data" id="MealForm">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('main.code') }} <span style="font-size: 14px ; color: red">*</span></label>
                                    <input type="text" name="code" id="code"
                                           class="form-control @error('code') is-invalid @enderror"
                                           placeholder="{{ __('main.code') }}" autofocus required readonly/>
                                    @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                                <input type="hidden" id="id" name="id">
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('main.weakly_meal') }} <span style="font-size: 14px ; color: red">*</span></label>
                                    <select  name="weakly_meal_id" id="weakly_meal_id"
                                           class="form-control @error('weakly_meal_id') is-invalid @enderror"  required>
                                        <option value=""> {{__('main.select')}} </option>
                                        @foreach($weaklyMeals as $meal)
                                            <option value="{{$meal -> id}}"> {{$meal -> code}} </option>
                                        @endforeach
                                    </select>
                                    @error('weakly_meal_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 10px">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('main.supplier') }} <span style="font-size: 14px ; color: red">*</span> </label>
                                    <select  name="supplier_id" id="supplier_id"
                                             class="form-control @error('supplier_id') is-invalid @enderror"
                                             autofocus  required>
                                        <option value=""> {{__('main.select')}}</option>
                                        @foreach($suppliers as $supplier)
                                            <option value="{{$supplier -> id}}"> {{$supplier -> name}} </option>
                                        @endforeach

                                    </select>
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('main.daily_meal_type') }} <span style="font-size: 14px ; color: red">*</span> </label>
                                    <select  name="type" id="type"
                                           class="form-control @error('type') is-invalid @enderror" autofocus required>
                                        <option value="0">{{__('main.daily_meal_type0')}}</option>
                                        <option value="1">{{__('main.daily_meal_type1')}}</option>
                                    </select>
                                    @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>


                        </div>
                        <div class="row" style="margin-top: 10px">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('main.date_time') }} <span style="font-size: 14px ; color: red">*</span> </label>
                                    <input type="text"  name="date" id="date"
                                           class="form-control date_time @error('date') is-invalid @enderror"
                                           placeholder="0" autofocus required/>
                                    @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('main.hasBonus') }}  </label>
                                    <select  name="hasBonusS" id="hasBonusS"  disabled
                                             class="form-control @error('hasBonus') is-invalid @enderror" autofocus required>
                                        <option value="0">{{__('main.hasBonus0')}}</option>
                                        <option value="1">{{__('main.hasBonus1')}}</option>
                                    </select>
                                    <input  name="hasBonus" id="hasBonus" type="hidden"/>
                                    @error('hasBonus')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 10px">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('main.buffalo_weight') }} <span style="font-size: 14px ; color: red">*</span> </label>
                                    <input type="number" step="any"  name="buffalo_weight" id="buffalo_weight"
                                           class="form-control @error('buffalo_weight') is-invalid @enderror"
                                           placeholder="0" autofocus required/>
                                    @error('buffalo_weight')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <input type="hidden" id="buffalo_min_limit" name="buffalo_min_limit">
                                    <input type="hidden" id="buffalo_max_limit" name="buffalo_max_limit">

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('main.bovine_weight') }} <span style="font-size: 14px ; color: red">*</span> </label>
                                    <input type="number" step="any"  name="bovine_weight" id="bovine_weight"
                                           class="form-control @error('bovine_weight') is-invalid @enderror"
                                           placeholder="0" autofocus required/>
                                    @error('bovine_weight')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <input type="hidden" id="bovine_min_limit" name="bovine_min_limit">
                                    <input type="hidden" id="bovine_max_limit" name="bovine_max_limit">
                                </div>
                            </div>

                        </div>
                        <div class="row" style="margin-top: 10px">

                            <div class="col-12">
                                <div class="form-group">
                                    <label>{{ __('main.notes') }} </label>
                                    <textarea type="text" name="notes" id="notes"
                                           class="form-control @error('notes') is-invalid @enderror"
                                              placeholder="{{__('main.notes')}}" autofocus rows="2"> </textarea>
                                    @error('notes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>
                        </div>


                        <div class="row" style="margin-top: 40px">
                            <div class="col-12 text-center">
                                <button type="button" class="btn btn-primary" onclick="valdiateRequest()">{{ __('main.save_btn') }}</button>

                            </div>

                        </div>




                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
