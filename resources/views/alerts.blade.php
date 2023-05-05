<div class="alerts">
    @if(session("error"))
        <p class="error">{{session("error")}}</p>
    @endif

    @if(session("message"))
        <p class="message">{{session("message")}}</p>
    @endif

    @if($errors->any())
        @foreach($errors->all() as $error)
            <ul class="errors">
                <li>
                    <p class="error">{{$error}}</p>
                </li>
            </ul>
        @endforeach
    @endif
</div>
