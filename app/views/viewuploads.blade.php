@extends('layouts.docs')

{{-- Content --}}
@section('contents')
<h1>Excel Uploads</h1>
<table id="blogs" class="table table-striped table-hover">
    <thead>
        <tr>
            <th class="col-md-1">Id</th>
            <th class="col-md-3">Name</th>
            <th class="col-md-2">Extension</th>
            <th class="col-md-1">Records#</th>
            <th class="col-md-2">Status</th>
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
    </tbody>
</table>
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
            "sAjaxSource": "{{ URL::to('noyawa/getuploads') }}"
            

        });
    });
</script>
@stop
