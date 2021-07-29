<style>
    .secondblock {
        background-color: var(--mainFon);
    }
    .smile {
        width: 30px;
        height: 30px;
        margin-bottom: .5rem;
    }
    .title-joke {
        font-size: 1.7rem;
        font-weight: 500;
        line-height: 1.2;
        margin-bottom: .5rem;
    }
</style>

<section class="secondblock">
    <div class="container">
        <div class="row justify-content-around">
            @foreach($posts as $post)
                <div class="col-md-4 justify-content-around pt-4 pb-4">
                    <span><img src="{{asset('img/smile.png')}}" class="smile" alt=""></span>
                    <span class="title-joke">{{$post->title}}</span><br>
                    <br>
                    <div>{!!$post->content!!}</div>
                </div>
            @endforeach
        </div>
    </div>
</section>


