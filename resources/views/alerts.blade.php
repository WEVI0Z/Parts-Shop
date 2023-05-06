<style>
    .alerts {
        width: 350px;
        margin: 20px auto;
        padding: 20px 40px;

        font-size: 20px;

        background: #e3d5ca;
    }

    .message {
    }

    .errors {
    }

    .error {
        color: darkred;
    }
</style>

    @if(session("error"))
        <div class="alerts">
            <p class="error">! {{session("error")}} !</p>
        </div>
    @endif

    @if(session("message"))
        <div class="alerts">
            <p class="message">{{session("message")}}</p>
        </div>
    @endif

    @if($errors->any())
        <div class="alerts">
            @foreach($errors->all() as $error)
                <ul class="errors">
                    <li>
                        <p class="error">! {{$error}} !</p>
                    </li>
                </ul>
            @endforeach
        </div>
    @endif
