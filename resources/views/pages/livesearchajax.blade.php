<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(!empty($posts ))  
{ 
    $count = 1;
    $outputhead = '';
    $outputbody = '';  
    $outputtail ='';

    $outputhead .= '<table id="example1" class="table table-bordered table-striped" style="width: 100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                ';
                  
    foreach ($posts as $post)    
    {   
   
   
    $outputbody .=  ' 
                
                            <tr> 
		                        <td>'.$count++.'</td>
		                        <td>'.$post->species.'</td>
                                           
		             </tr> 
                    ';
                
    }  

    $outputtail .= ' 
                        </tbody>
                    </table>';
         
    echo $outputhead; 
    echo $outputbody; 
    echo $outputtail; 
 }  
 
 else  
 {  
    echo 'Data Not Found';  
 } 
 ?> 
<!--<link rel="stylesheet" type="text/css" href="{{ asset('/front/css/datatables.min.css')}}"/>-->
<!--<script type="text/javascript" src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>-->
<style>
/*.navbar{border-radius: 0px !important;}
.pagination > .active > a, .pagination > .active > a:focus, .pagination > .active > a:hover, .pagination > .active > span, .pagination > .active > span:focus, .pagination > .active > span:hover{ background:#20c997 !important}
.pagination>li>a, .pagination>li>span {border:none; }
.pagination>li>a, .pagination>li>span{color:black !important }
#example1_length{ float:left;}*/
</style>
<script>
$(function () {
$('#example1').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": false,
    "order": [[0, 'desc']],
    "info": false,
    "autoWidth": true,
    "aoColumnDefs": [
        {
            'bSortable': false,
            'aTargets': ['action', 'text-holder']
        }]



})
})
</script>