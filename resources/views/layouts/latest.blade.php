<div class="col-header">
    <p class="font-weight-bold font-size-normal">Latest News</p>
</div>
@foreach ($latests as $latest)
<div class="card mt-1">
    <div class="card-img" style="">
    </div>
    <div class="card-body">
        <a href="http://" class="card-link float-left">{!! $latest->sections->section_name !!}</a>
            @php
            $time =(time()-strtotime($latest->created_at));
            $hour = $time / 3600;
            $floortime = floor($hour);
            $seconds = $hour - $floortime;
            $parsedtime = $floortime.' hr';
            if($seconds > 0){
                $parsedtime = $parsedtime.' '.floor($seconds).' mins';
            }
            @endphp
            <small class="text-muted float-right">{!! $parsedtime !!}</small>
            <span class="clearfix"></span>
        <div class="card-text ">
            <h3 style="line-height: 20px; font-size:20px">{!! $latest->topic !!}</h3>
        </div>
    </div>
</div>
<hr class="mt-2">
@endforeach
