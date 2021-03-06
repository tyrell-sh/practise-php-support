<?php
use yii\helpers\Url;
?>

<form class="layui-form" method="post">
    <div class="layui-form-item">
        <label class="layui-form-label">AppKey:</label>
        <div class="layui-input-inline">
            <input type="text" name="app_key" placeholder="" required  lay-verify="required" autocomplete="off" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">TimeStamp:</label>
        <div class="layui-input-inline">
            <input type="text" name="timestamp" placeholder="" required  lay-verify="required" autocomplete="off" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit="" lay-filter="submitButton">确认</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>

<script type="text/javascript">
    baseConfig = $.extend(baseConfig,{
        requestUrl:'<?= Url::toRoute(['debug-key', 'is_ajax' => 1])?>'
    });

    layui.use('form', function() {
        let form = layui.form;

        //监听提交
        form.on('submit(submitButton)', function(data) {
            $.post(baseConfig.requestUrl, data.field, function(jsondata) {
                if (jsondata.code == 1) {
                    layer.alert("<b>DebugKey:</b> <br/>" + jsondata.data.debug_key)
                }else {
                    layer.alert(jsondata.msg);
                    return true;
                }
            });
            return false;
        });
    });
</script>
