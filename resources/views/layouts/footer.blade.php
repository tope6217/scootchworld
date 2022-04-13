<section class="footer">
    <style>
        ul{
            padding: 0;
            margin:0;
            list-style: none;
            text-align: center
        }
        li{
            padding:4px;
            text-transform: capitalize;
        }
        .footer{
            background: rgb(228, 225, 225)
        }
    </style>
    @php
     $categorys = App\category::where('is_active',1)->limit(16)->get();
     $count = count($categorys);
     $limit = 4;
    @endphp
    <div class="container ">
        <div class="row">

            <div class="col-lg-3">
              @if($count > 0)
                <ul>
                    @for ($i = 0; ($i < $count && $i < $limit) ; $i++)
                        <li>{{ $categorys[$i]->category_name }}</li>
                        @php
                            //$limit += 1;
                        @endphp
                    @endfor
                </ul>
               @endif
            </div>
            <div class="col-lg-3">
                @if($count > $limit-3)
                <ul>
                    @for ($i = 4; ($i < $count && $i < $limit+4); $i++)
                        <li>{{ $categorys[$i]->category_name }}</li>
                        @php
                         //   $limit += 1;
                        @endphp
                    @endfor
                </ul>
                @endif
            </div>
            <div class="col-lg-3">
                @if($count > $limit+4-3)
                <ul>
                    @for ($i = 8; ($i < $count && $i < $limit+8); $i++)
                        <li>{{ $categorys[$i]->category_name }}</li>
                        @php
                         //   $limit += 1;
                        @endphp
                    @endfor
                </ul>
                @endif
            </div>
            <div class="col-lg-3">
                @if($count > $limit+12-3)
                <ul>
                    @for ($i = 12; ($i < $count && $i < $limit+12); $i++)
                        <li>{{ $categorys[$i]->category_name }}</li>
                    @endfor
                </ul>
                @endif
            </div>
        </div>
    </div>

</section>
