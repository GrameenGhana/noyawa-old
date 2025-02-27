@extends('layouts.docs')

{{-- Content --}}
@section('contents')
<div id="version">
                        <ul class="nolist">
 <li class="current"><a href="http://41.191.245.72/data" title="Excel Downloads" target="_blank">Excel Downloads</a></li>                           
                        </ul>
 </div>

<h1>Clients List</h1>


<table id="blogs" class="table table-striped table-hover">
    <thead>
        <tr>
            <th class="col-md-1">Id</th>
            <th class="col-md-2">Phone Number</th>
            <th class="col-md-1">Gender</th>
            <th class="col-md-1">Age</th>
            <th class="col-md-1">Edu. Level</th>
            <th class="col-md-1">Status</th>
            <th class="col-md-2">Created At</th>
        </tr>
    </thead>
    <tbody>
        <tr>			
            <td></td>
            <td></td>
            <td></td>			
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            
    </tbody>
</table>


<br>


@stop

{{-- Scripts --}}
@section('scripts')
<script type="text/javascript">
    var oTable;
    $(document).ready(function() {
        oTable = $('#blogs').dataTable({
"aaSorting": [[0, 'desc']],
            "sDom": "<'row'<'col-md-6'l><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
            "sPaginationType": "bootstrap",
            "oLanguage": {
                "sLengthMenu": "_MENU_ records per page"
            },
"bSortable": true,         
   "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "{{ URL::to('noyawa/getclients') }}"
            

        });
    });
</script>
@stop
