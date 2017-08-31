
@if(Session::has('fail'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <strong> {{Session::get('fail')}}</strong>
    </div>
@endif

@if(Session::has('warning'))
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <strong> {{Session::get('warning')}}</strong>
    </div>
@endif


@if(Session::has('success'))
         <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <strong>{{Session::get('success')}}</strong>
        </div>
@endif

@if (Session::has('flash_message'))
    {{session('flash_message')}}
    <div class="alert alert-success {{ Session::has('flash_message_important') ? 'alert-important' : ''}}" >
        @if (Session::has('flash_message_important'))
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times</button>
        @endif
        {{ session('flash_message')}}
    </div>
@endif
@if(count($errors) > 0)
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <ul>
            @foreach($errors->all() as $error)
               <li>
                   {{$error}}
               </li>

            @endforeach
        </ul>
    </div>
@endif