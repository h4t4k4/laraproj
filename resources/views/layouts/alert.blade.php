<div class="row">
                <div class="col-sm-8 offset-sm-2">
                    @if(Session::has('message'))
                        <p class="alert alert-success">
                            {{Session::get('message')}}
                            {{Session::put('message',null)}}
                        </p>
                    @elseif(Session::has('error'))
                    <p class="alert alert-danger">
                            {{Session::get('error')}}
                            {{Session::put('error',null)}}
                        </p>
                    @endif
                </div>
            </div>
