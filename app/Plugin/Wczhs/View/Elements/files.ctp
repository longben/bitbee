<table id="dg" class="easyui-datagrid" style="width:auto;height:auto"
    data-options="url:'/admin/wczhs/course_memberships/json_data.json?u=<?=$this->Session->read('id')?>',fitColumns:true,singleSelect:true,rownumbers:true,pagination:true,pageSize:20">
    <thead>  
        <tr>
            <th data-options="field:'user_nicename',formatter:function(value,row){return row.User.user_nicename;}">宝宝</th>  
            <th data-options="field:'course_name',formatter:function(value,row){return row.Course.name;}">课程</th>  
            <th data-options="field:'patriarch',formatter:function(value,row){return row.CourseMembership.patriarch;}" width="50">家长</th>  
            <th data-options="field:'date_of_filing',formatter:function(value,row){return row.CourseMembership.date_of_filing;}" width="50">填表时间</th>
            <th data-options="field:'action',formatter:view">操作</th>
        </tr>  
    </thead>  
</table>

<script type="text/javascript">
function view(value, row){
    return '<a href="/app/files/' + row.CourseMembership.id + '" target="_blank">查看详情</a>';
}
</script>
