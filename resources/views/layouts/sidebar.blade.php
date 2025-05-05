

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" >
    <div class="app-brand demo">
        <a href="{{route('index')}}" class="app-brand-link">
              <span class="app-brand-logo demo">
                  <img  src="{{asset('assets/img/logo_side.png')}}" style="height: 60px" />
              </span>

        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item @if($slag == 0)  active @endif">
            <a href="{{route('index')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">{{__('main.dashboard')}}</div>
            </a>
        </li>


        <li class="menu-item @if($slag == 1)  active @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">{{__('main.basicData')}}</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item @if($subSlag == 11)  active @endif">
                    <a href="{{route('stores')}}" class="menu-link">
                        <div data-i18n="Without menu">{{__('main.stores')}}</div>
                    </a>
                </li>
                <li class="menu-item @if($subSlag == 12)  active @endif">
                    <a href="{{route('safes')}}" class="menu-link">
                        <div data-i18n="Without navbar">{{__('main.safes')}}</div>
                    </a>
                </li>
                <li class="menu-item @if($subSlag == 13)  active @endif">
                    <a href="{{route('expenses_types')}}" class="menu-link">
                        <div data-i18n="Without navbar">{{__('main.recipit_type')}}</div>
                    </a>
                </li>

            </ul>
        </li>

        <li class="menu-header small text-uppercase"><span class="menu-header-text">{{__('main.product_department')}}</span></li>
        <!-- Cards -->

        <!-- User interface -->
        <li class="menu-item @if($slag == 4)  active @endif">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div data-i18n="User interface">{{__('main.product_list')}}</div>
            </a>
            <ul class="menu-sub">

                <li class="menu-item @if($subSlag == 44)  active @endif">
                    <a href="{{route('items')}}" class="menu-link">
                        <div data-i18n="Buttons">{{__('main.products')}}</div>
                    </a>
                </li>


            </ul>
        </li>

        <li class="menu-header small text-uppercase"><span class="menu-header-text">{{__('main.cars_department')}}</span></li>

        <li class="menu-item @if($slag == 5)  active @endif">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-copy"></i>
                <div data-i18n="Extended UI">{{__('main.cars_list')}}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item @if($subSlag == 51)  active @endif">
                    <a href="{{route('cars')}}" class="menu-link">
                        <div data-i18n="Perfect Scrollbar">{{__('main.cars_list')}}</div>
                    </a>
                </li>
                <li class="menu-item @if($subSlag == 52)  active @endif">
                    <a href="{{route('cars')}}" class="menu-link">
                        <div data-i18n="Text Divider">{{__('main.cars_meals')}}</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">{{__('main.factory_department')}}</span>
        </li>
        <li class="menu-item @if($slag == 2)  active @endif" >
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">{{__('main.suppliers')}}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item @if($subSlag == 21)  active @endif">
                    <a href="{{route('suppliers')}}"  class="menu-link">
                        <div data-i18n="Account">{{__('main.suppliers_list')}}</div>
                    </a>
                </li>

            </ul>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">{{__('main.milk_department')}}</span>
        </li>
        <li class="menu-item @if($slag == 3)  active @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">{{__('main.weakly_meals')}}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item @if($subSlag == 31)  active @endif">
                    <a href="{{route('weakly_meals')}}"  class="menu-link">
                        <div data-i18n="Account">{{__('main.weakly_meals_list')}}</div>
                    </a>
                </li>


            </ul>
        </li>
        <li class="menu-item @if($slag == 6)  active @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Elements">{{__('main.daily_meals')}}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item @if($subSlag == 61)  active @endif">
                    <a href="{{route('daily_meals')}}" class="menu-link">
                        <div data-i18n="Basic Inputs">{{__('main.daily_meals_list')}}</div>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Components -->


        <!-- Extended components -->




        <!-- Forms & Tables -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">{{__('main.cheese_department')}}</span></li>
        <!-- Forms -->

        <li class="menu-item @if($slag == 7)  active @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Layouts">{{__('main.cheese_meals')}}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item @if($subSlag == 71)  active @endif">
                    <a href="{{route('cheese-meals')}}" class="menu-link">
                        <div data-i18n="Vertical Form">{{__('main.cheese_meals_list')}}</div>
                    </a>
                </li>

            </ul>
        </li>


        <li class="menu-header small text-uppercase"><span class="menu-header-text">{{__('main.accounting_department')}}</span></li>
        <!-- Forms -->
        <li class="menu-item @if($slag == 8)  active @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Elements">{{__('main.sales')}}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item  @if($subSlag == 81)  active @endif">
                    <a href="{{route('index')}}" class="menu-link">
                        <div data-i18n="Basic Inputs">{{__('main.sales_list')}}</div>
                    </a>
                </li>
                <li class="menu-item  @if($subSlag == 82)  active @endif">
                    <a href="{{route('index')}}" class="menu-link">
                        <div data-i18n="Basic Inputs">{{__('main.add_sales')}}</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item  @if($slag == 9)  active @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Layouts">{{__('main.stock_exchange')}}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item @if($subSlag == 91)  active @endif">
                    <a href="{{route('index')}}" class="menu-link">
                        <div data-i18n="Vertical Form">{{__('main.stock_exchange_list')}}</div>
                    </a>
                </li>
                <li class="menu-item @if($subSlag == 91)  active @endif">
                    <a href="{{route('index')}}" class="menu-link">
                        <div data-i18n="Vertical Form">{{__('main.stock_exchange_add')}}</div>
                    </a>
                </li>

            </ul>
        </li>
        <li class="menu-item  @if($slag == 10)  active @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Layouts">{{__('main.recipits')}}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item @if($subSlag == 101)  active @endif">
                    <a href="{{route('index')}}" class="menu-link">
                        <div data-i18n="Vertical Form">{{__('main.recipit_list')}}</div>
                    </a>
                </li>
                <li class="menu-item @if($subSlag == 102)  active @endif">
                    <a href="{{route('index')}}" class="menu-link">
                        <div data-i18n="Vertical Form">{{__('main.recipit_add')}}</div>
                    </a>
                </li>

            </ul>
        </li>
        <li class="menu-item  @if($slag == 11)  active @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Layouts">{{__('main.catches')}}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item @if($subSlag == 111)  active @endif">
                    <a href="{{route('index')}}" class="menu-link">
                        <div data-i18n="Vertical Form">{{__('main.catches_list')}}</div>
                    </a>
                </li>
                <li class="menu-item @if($subSlag == 112)  active @endif">
                    <a href="{{route('index')}}" class="menu-link">
                        <div data-i18n="Vertical Form">{{__('main.catch_add')}}</div>
                    </a>
                </li>

            </ul>
        </li>
        <li class="menu-item  @if($slag == 12)  active @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Layouts">{{__('main.box_recipit')}}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item @if($subSlag == 121)  active @endif">
                    <a href="{{route('index')}}" class="menu-link">
                        <div data-i18n="Vertical Form">{{__('main.box_recipit_list')}}</div>
                    </a>
                </li>
                <li class="menu-item @if($subSlag == 122)  active @endif">
                    <a href="{{route('index')}}" class="menu-link">
                        <div data-i18n="Vertical Form">{{__('main.box_recipit_add')}}</div>
                    </a>
                </li>

            </ul>
        </li>
        <li class="menu-item  @if($slag == 13)  active @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Layouts">{{__('main.loans')}}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item @if($subSlag == 131)  active @endif">
                    <a href="{{route('index')}}" class="menu-link">
                        <div data-i18n="Vertical Form">{{__('main.loans_list')}}</div>
                    </a>
                </li>
                <li class="menu-item @if($subSlag == 132)  active @endif">
                    <a href="{{route('index')}}" class="menu-link">
                        <div data-i18n="Vertical Form">{{__('main.loadn_add')}}</div>
                    </a>
                </li>

            </ul>
        </li>



        <li class="menu-header small text-uppercase"><span class="menu-header-text">{{__('main.reports_department')}}</span></li>
        <!-- Forms -->
        <li class="menu-item @if($slag == 14)  active @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Elements">{{__('main.report_list')}}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item @if($subSlag == 101)  active @endif">
                    <a href="{{route('index')}}" class="menu-link">
                        <div data-i18n="Basic Inputs">{{__('main.visit_reports')}}</div>
                    </a>
                </li>
                <li class="menu-item @if($subSlag == 102)  active @endif">
                    <a href="{{route('index')}}" class="menu-link">
                        <div data-i18n="Basic Inputs">{{__('main.quotations_request_report')}}</div>
                    </a>
                </li>
                <li class="menu-item @if($subSlag == 103)  active @endif">
                    <a href="{{route('index')}}" class="menu-link">
                        <div data-i18n="Basic Inputs">{{__('main.quotations_report')}}</div>
                    </a>
                </li>
                <li class="menu-item @if($subSlag == 104)  active @endif">
                    <a href="{{route('index')}}" class="menu-link">
                        <div data-i18n="Basic Inputs">{{__('main.quotations_request_report_by_company')}}</div>
                    </a>
                </li>
                <li class="menu-item @if($subSlag == 105)  active @endif">
                    <a href="{{route('index')}}" class="menu-link">
                        <div data-i18n="Basic Inputs">{{__('main.quotations_request_report_by_product')}}</div>
                    </a>
                </li>
                <li class="menu-item @if($subSlag == 106)  active @endif">
                    <a href="{{route('index')}}" class="menu-link">
                        <div data-i18n="Basic Inputs">{{__('main.quotations_request_report_by_supplier')}}</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Misc -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">{{__('main.users_and_auth_department')}}</span></li>
        <li class="menu-item @if($slag == 15)  active @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Elements">{{__('main.users_list')}}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item @if($subSlag == 151)  active @endif">
                    <a href="{{route('users')}}" class="menu-link">
                        <div data-i18n="Basic Inputs">{{__('main.users')}}</div>
                    </a>
                </li>
                <li class="menu-item @if($subSlag == 152)  active @endif">
                    <a href="{{route('roles')}}" class="menu-link">
                        <div data-i18n="Basic Inputs">{{__('main.roles')}}</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('auth')}} @if($subSlag == 153)  active @endif" class="menu-link">
                        <div data-i18n="Basic Inputs">{{__('main.auth')}}</div>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</aside>
