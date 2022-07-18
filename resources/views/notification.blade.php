<div class="col-lg-12">
    @if(Session::has('success') || Session::has('error'))
    <div class="alert alert-{{(Session::has('success'))?'success':'danger'}} alert-dismissible alert-dismissable"
        role="alert">
        <button type="button" class="close" aria-hidden="true" data-dismiss="alert">×</button>
        {{(Session::get('success'))??Session::get('error')}}
    </div>
    @endif
</div>
