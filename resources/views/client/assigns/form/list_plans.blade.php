<!--
|‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
| Form row
|‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
!-->
<div class="tab-pane">
    <div class="row gap-y text-center">

        @foreach($Page->auxiliar['plans'] as $plan)
            <div class="col-md-6 col-lg-4">
                <div class="rounded shadow-1 hover-shadow-3 transition-5s bg-white">
                    <p class="text-uppercase fs-13 fw-500 bb-1 py-3 ls-2">{{$plan['name']}}</p>
                    <br>
                    <h2 class="fs-60 fw-500"><span class="price-dollar">R$</span> {{$plan['value_formatted_front']}}</h2>
                    <br>
                    <i>
                        <b>{{$plan['registers']}}</b> Registros
                    </i>
                    <br>
                    @foreach($Page->auxiliar['descriptions'] as $i => $description)
                        <small>
                            <b>{{$description}}</b> <i class="fa @if($plan['options'][$i]) fa-check @else fa-remove @endif"></i>
                        </small>
                        <br>
                    @endforeach
                    <br>
                    <a class="btn btn-flat btn-success" href="{{route('assigns.choose', $plan['id'])}}">Escolher</a>
                    <br><br>
                </div>
            </div>
        @endforeach
    </div>
</div>


