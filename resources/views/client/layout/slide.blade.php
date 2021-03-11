<div id="carouselExampleIndicators" class="carousel slide container" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php $i=0; ?>
        @foreach($slide as $sl)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}"
                @if($i == 0)
                class="active"
                @endif
            ></li>
            <?php $i++; ?>
        @endforeach
    </ol>
    <div class="carousel-inner">
        <?php $i=0; ?>
        @foreach($slide as $sl)
            <div
                @if($i == 0)
                class="carousel-item active"
                @else
                class="carousel-item"
                @endif
            >
                <?php $i++; ?>
                <img src="{{asset('upload/slide/'.$sl->Hinh)}}" alt="{{$sl->NoiDung}}" class="d-block w-100" >
            </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
