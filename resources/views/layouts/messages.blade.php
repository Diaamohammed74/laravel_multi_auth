@if (session()->has('success'))
<div class="alert alert-success" style="color:black;" role="alert">
    {{session('success')}}
</div>
@elseif (session()->has('delete'))
<div class="alert alert-danger" style="color:black;" role="alert">
    {{session('delete')}}
</div>
@endif