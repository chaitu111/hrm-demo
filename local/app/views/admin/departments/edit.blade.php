
{{-- This is ajax called inside the index page modal  --}}

<hr>
<p class="text-success">
<strong>Designations</strong> (empty if you want to delete the designation )

</p>

{{'';$i=0}}
@foreach($department->Designations as $designations)

<div class="form-group">

 <div class="col-md-6">
    <input class="form-control form-control-inline input-medium" name="designation[{{$i}}]" id="designation" type="text" value="{{$designations['designation']}}" placeholder="Designation #1"/>
    <input type="hidden" name="designationID[{{$i}}]" id="designation" type="text" value="{{$designations['id']}}" placeholder="Designation #1"/>
 </div>
{{'';$i++;}}
</div>
@endforeach
{{-- This is ajax called inside the index page modal  --}}




