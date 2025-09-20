<!DOCTYPE html>
<html>
@include('layouts.head')

<body>

<div class="card" style="width: 98%; margin: auto">
    <div style="display: flex ; justify-content: space-between">
        <h5 class="card-header"> {{__('main.supplier')}} :   {{$supplier -> name}} </h5>

        <h5 class="card-header">
            (
            @if (Config::get('app.locale')=='en' )
                {{$dayName}}
            @else
                {{$dayName_ar}}
            @endif
            <span style="color: grey">  {{\Carbon\Carbon::parse($startOfWeek) -> format('Y-m-d') }}</span>

            ---
            @if (Config::get('app.locale')=='en' )
                {{$end_dayName}}
            @else
                {{$end_dayName_ar}}
            @endif
            <span style="color: grey">  {{\Carbon\Carbon::parse($endOfWeek) -> format('Y-m-d') }}</span>
            )
        </h5>


    </div>


    @include('flash-message')

    <div class="table-responsive">

        <table class="table table-striped table-hover  table-bordered view_table">
            <thead>
            @php
                use Carbon\Carbon;
                use Carbon\CarbonPeriod;

                $start = Carbon::parse($startOfWeek);
                $end = Carbon::parse($endOfWeek);
                $period = CarbonPeriod::create($start, $end);
                Carbon::setLocale('ar');
            @endphp

            <tr>
                <th class="text-center">{{__('main.day')}}</th>
                <th class="text-center">{{__('main.morning_meal')}}</th>
                <th class="text-center">{{__('main.evening_meal')}}</th>
            </tr>


            </thead>
            <tbody>
               @foreach($period as $day)
                   <tr>
                       <td class="text-center">
                           @if (Config::get('app.locale')=='ar' )
                               {{ $day->translatedFormat('l') }}
                           @else
                               {{ $day->format('l') }}

                           @endif
                       </td>
                       {{-- Meals of type 0 --}}
                       <td class="text-center">
                           @php
                               $matchedMeal = $meals->first(function($meal) use ($day) {
                                   return \Carbon\Carbon::parse($meal->date)->toDateString() === $day->toDateString()
                                       && $meal->type == 0;
                               });
                           @endphp

                           @if($matchedMeal)
                               {{ $matchedMeal-> bovine_weight }} {{-- or any field like $matchedMeal->total --}}
                           @else
                               —
                           @endif
                       </td>

                       {{-- Meals of type 1 (optional) --}}
                       <td class="text-center">
                           @php
                               $matchedMealType1 = $meals->first(function($meal) use ($day) {
                                   return \Carbon\Carbon::parse($meal->date)->toDateString() === $day->toDateString()
                                       && $meal->type == 1;
                               });
                           @endphp

                           @if($matchedMealType1)
                               {{ $matchedMealType1->bovine_weight }}
                           @else
                               —
                           @endif
                       </td>
                   </tr>



               @endforeach


            </tbody>
            <tfoot>
               <tr>
                 <td class="text-center " colspan="1"> {{__('main.total')}} </td>
                   <td class="text-center" colspan="2"> {{$totalWeight}}
                       <span style="margin-right: 5px ; margin-left: 5px"> كيلو </span>
                   </td>
               </tr>
               <tr>
                   <td class="text-center" colspan="1"> {{__('main.price')}} </td>
                   <td class="text-center" colspan="2"> {{$meals[0] -> bovine_price ?? 0}}
                       <span style="margin-right: 5px ; margin-left: 5px"> جنية </span>
                   </td>
               </tr>
               <tr>
                   <td class="text-center" colspan="1"> {{__('main.total_money')}} </td>
                   <td class="text-center" colspan="2"> {{$totalMoney}}
                       <span style="margin-right: 5px ; margin-left: 5px"> جنية </span>
                   </td>
               </tr>
               <tr>
                   <td class="text-center" colspan="1"> {{__('main.before_balance')}} </td>
                   <td class="text-center" colspan="2"> {{$beforeBalance}}
                       <span style="margin-right: 5px ; margin-left: 5px"> جنية </span>
                   </td>
               </tr>
               <tr>
                   <td class="text-center" colspan="1"> {{__('main.required')}} </td>
                   <td class="text-center" colspan="2"> {{$totalMoney +$beforeBalance }}
                       <span style="margin-right: 5px ; margin-left: 5px"> جنية </span>
                   </td>
               </tr>
               <tr>
                   <td class="text-center" colspan="1"> {{__('main.paid')}} </td>
                   <td class="text-center" colspan="2"> {{$weekPaid}}
                       <span style="margin-right: 5px ; margin-left: 5px"> جنية </span>
                   </td>
               </tr>
               <tr>
                   <td class="text-center" colspan="1"> {{__('main.remain')}} </td>
                   <td class="text-center" colspan="2"> {{$totalMoney +$beforeBalance -$weekPaid }}
                       <span style="margin-right: 5px ; margin-left: 5px"> جنية </span>
                   </td>
               </tr>
            </tfoot>





        </table>

    </div>


</div>

<script>
    window.addEventListener('load', function () {
        // Wait a moment to let the page fully render
        setTimeout(() => {
            window.print();

            // Close after the user finishes printing (works in most browsers)
            window.addEventListener('afterprint', function () {
                setTimeout(() => {
                    window.close();
                }, 300); // small delay to ensure cleanup
            });

            // Safari fallback – no afterprint support
            setTimeout(() => {
                window.close();
            }, 2000); // force close after 2 seconds
        }, 500); // delay before triggering print
    });
</script>




</body>
</html>
